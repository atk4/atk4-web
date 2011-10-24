<?php
abstract class Model_ATK_SurveyResult extends Model_Table {
    function init(){
        parent::init();

        $this->addField('user_id')->refModel('Model_ATK_User_Valid');   // can be only filled by valid user

        $this->addField('user_survey_id')->refModel('Model_ATK_UserSurvey');

        $this->addField('created_dts')->system(true)->defaultValue(false);
        $this->addField('is_completed')->type('boolean');
    }
    function beforeInsert(&$data){
        $c=get_class($this);
        $c=preg_replace('/^Model_/','',$c);
        $survey=$this->add('Model_ATK_Survey');
        $survey->loadBy('model',$c);
        if(!$survey->isInstanceLoaded())throw $this->exception('Survey not found')
            ->addMoreInfo('class',$c);


        $us=$this->add('Model_ATK_UserSurvey');
        $us->setMasterField('user_id',$this->api->auth->get('id'));
        $us->loadBy('survey_id',$survey->get('id'));
        if(!$us->isInstanceLoaded())$us->update(array('survey_id'=>$survey->get('id')));

        $data['user_survey_id']=$us->get('id');
        $data['is_completed']=false;

        return parent::beforeInsert($data);
    }
    function complete(){
        $us=$this->getRef('user_survey_id');
        $us->set('is_completed',true)->update();
        $this->set('is_completed',true)->update();
        return $this;
    }
}

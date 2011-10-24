<?php
/**
  * Represents a user which can be surveyed
  */
class Model_ATK_User_Surveyable extends Model_ATK_User {
    public $survey_id = null;
    function init(){
        parent::init();

        $this->addField('user_survey_id')->calculated(true);
        $this->addField('survey_is_invited')->calculated(true);
    }
    function calculate_user_survey_id(){
        return 'atk_user_survey.id';
    }
    function calculate_survey_is_invited(){
        return 'atk_user_survey.is_invited';
    }
    function dsql($instance=null,$select_mode=true,$entity_code=null){
        $dsql=parent::dsql($instance,$select_mode,$entity_code);

        if($select_mode){
            $dsql->join('atk_user_survey','atk_user_survey.user_id=atk_user.id and atk_user_survey.survey_id='.((int)$this->survey_id),'left');
            $dsql->where('(atk_user_survey.id is null) or (atk_user_survey.is_invited!="Y")');
        }
        return $dsql;
    }
    function setSurvey($survey){
        if(is_object($survey))$survey=$survey->get('id');

        $this->survey_id=$survey;
        return $this;
    }
    function sendInvite(){
        // First - generate UserSurvey
        $this->api->stickyForget('atk_survey_id');

        $us=$this->add('Model_ATK_UserSurvey');
        $us->setMasterField('user_id',$this->get('id'));
        $us->setMasterField('survey_id',$this->survey_id);
        $us->loadBy('survey_id',$this->survey_id);
        if(!$us->isInstanceLoaded())$us->update();


        $m=$this->prepareEmail('survey');
        $m->set('url',$this->getMailURL($us->getRef('survey_id')->get('page')));
        $m->set('subject','Agile Toolkit Survey: '.$us->getRef('survey_id')->get('name'));
        $m->set('title',$us->getRef('survey_id')->get('name'));
        $m->set('descr',nl2br($us->getRef('survey_id')->get('descr')));
        $m->send($this->get('email'));

        $this->api->stickyGET('atk_survey_id');

        $us->set('is_invited',true)->update();
    }
}

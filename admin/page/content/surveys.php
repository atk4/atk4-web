<?php
class page_content_surveys extends Page {
    function page_index(){

        $cr=$this->add('CRUD');
        $cr->setModel('ATK_Survey');

        if($cr->grid){
            $cr->grid->addColumn('expander','details');
        }
    }
    function page_details(){
        $m=$this->add('Model_ATK_Survey')->loadData($_GET['atk_survey_id']);
        $this->api->stickyGET('atk_survey_id');

        $tt=$this->add('Tabs');

        $t=$tt->addTab('Completed Surveys');

        $cc=$t->add('Columns');
        $us=$this->add('Model_ATK_UserSurvey')->setMasterField('survey_id',$_GET['atk_survey_id']);

        $lcrud=$cc->addColumn()->add('CRUD');
        $lcrud->setModel($m->get('model'),null,array('id','user','created_dts','is_completed'));
        if($lcrud->grid)$lcrud->grid->addPaginator();
        $us_crud=$cc->addColumn()->add('CRUD');
        $us_crud->setModel($us);
        if($us_crud->grid)$us_crud->grid->addPaginator();

        $tt->addTabURL($this->api->getDestinationURL('../surveyable'),'Surveyable');
    }
    function page_surveyable(){
        $this->api->stickyGET('atk_survey_id');
        $t=$this;
        $surv_crud=$t->add('CRUD');
        $surv_crud->setModel('ATK_User_Surveyable',array('id','email','is_email_confirmed','name','user_survey_id','survey_is_invited'))
            ->setSurvey($_GET['atk_survey_id']);

        if($surv_crud->grid){
            $surv_crud->grid->addColumn('button','invite');
            $surv_crud->grid->addPaginator(50);

            $f=$this->add('Form');
            $f->addSubmit('Invite');
            $ids=$f->addField('line','ids');
            $surv_crud->grid->addSelectable($ids);
            if($f->isSubmitted()){
                $ids=json_decode($f->get('ids'));
                foreach($ids as $id){
                    $m=$this->add('Model_ATK_User_Surveyable')->loadData($id);
                    $m->setSurvey($_GET['atk_survey_id']);
                    $m->sendInvite();
                    $m->destroy();
                    //$surv_crud->grid->getModel()->loadData($id)->sendInvite();
                }
                $surv_crud->grid->js(null,$this->js()->univ()->successMessage('Invited '.count($ids)))->reload()->execute();
            }


            if($_GET['invite']){
                $surv_crud->grid->getModel()->loadData($_GET['invite'])->sendInvite();
                $surv_crud->grid->js(null,$this->js()->univ()->successMessage('Invited'))->reload()->execute();
            }
        }

    }
}

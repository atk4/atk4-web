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

        $cc->addColumn()->add('CRUD')->setModel($m->get('model'),null,array('id','user','created_dts','is_completed'));
        $us_crud=$cc->addColumn()->add('CRUD');
        $us_crud->setModel($us);

        $t=$tt->addTab('Surveyable');
        $surv_crud=$t->add('CRUD');
        $surv_crud->setModel('ATK_User_Surveyable',array('id','email','is_email_confirmed','name','user_survey_id','survey_is_invited'))->setSurvey($_GET['atk_survey_id']);

        if($surv_crud->grid){
            $surv_crud->grid->addColumn('button','invite');
            $surv_crud->grid->addPaginator(50);
            if($_GET['invite']){
                $surv_crud->grid->getModel()->loadData($_GET['invite'])->sendInvite();
                $surv_crud->grid->js(null,$this->js()->univ()->successMessage('Invited'))->reload()->execute();
            }
        }

    }
}

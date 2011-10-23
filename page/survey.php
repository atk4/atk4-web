<?php
/**
  * This page will show surveys user can participate in
  */
class page_survey extends Page {
    public $m,$form;
    function init(){
        parent::init();


        $menu=$this->api->add('Menu',null,'Menu');
		$menu->current_menu_class='current';
		$menu->inactive_menu_class='';
        


        $this->api->dbConnectATK();
        $this->api->auth->check();





        $m=$this->add('Model_ATK_SurveyResult_FirstProject');
        $m->setMasterField('user_id',$this->api->auth->get('id'));
        $m->loadBy('user_id',$this->api->auth->get('id'));
        if(!$m->isInstanceLoaded())$m->update();    // create blank




        $menu->addMenuItem('About You','survey');
        $menu->addMenuItem('Improvements','survey/step2');
        $menu->addMenuItem('Skills-check','survey/step3');
        $menu->addMenuItem('Finish','survey/thanks');

        $this->title=$this->add('H2');

        $this->m=$m;
        $form = $this->add('MVCForm');
        $this->form=$form;
        $form->setFormClass('vertical');
        $form->addSubmit();
    }
    function nextStep($step){
        if($this->form->isSubmitted()){
            $this->form->update();
            $this->js()->univ()->location($this->api->getDestinationURL('./'.$step))->execute();
        }
    }


    function page_index(){

        if(!$this->recall('compl_checked',false)){
            if($m->get('is_completed')){
                $this->js(true)->univ()->dialogOK('Warning',
                        'You have already completed this survey once, but if you wish to review your answers, go ahead');
                if($this->memorize('compl_checked',true));
            }
        }


        $this->title->set('A Bit About Yourself...');
        $this->form->setModel($this->m,array('background','php_experience','frameworks','languages','oop_level','atk_progress','atk_continue'));
        $this->nextStep('step2');
    }
    function page_step2(){
        $this->title->set('How Can We Improve Agile Toolkit?');

        $a=array();
        if(!$this->m->get('atk_continue')){
            $a[]='atk_stop_why';
            $a[]='atk_stop_descr';
        }
        $a[]='atk_time';$a[]='atk_improve_doc';$a[]='atk_improve_license';
        $a[]='atk_improve_license_descr'; $a[]='atk_features';
        $this->form->setModel($this->m,$a);
        $this->nextStep('../step3');
    }
    function page_step3(){
        $this->title->set('How Skilled Your Are in Agile Toolkit?');
        $this->form->setModel($this->m,array('prof_ui','prof_js','prof_ajax','prof_models','prof_views','prof_templates','prof_deploy','prof_share','prof_educate'));
        $this->nextStep('../thanks');
    }
    function page_thanks(){
        $this->title->set('Thank you for filling out the survey!');
        $this->form->destroy();

        $this->m->set('is_completed',true)->update();

        $this->add('P')->set('Based on your specified experienced we have build some suggestions for you on how to get better
                with agile toolkit');

        $res=$this->m->getSuggestion();
        if($res){
            $this->add('View_Hint')->set($res);
        }else $this->add('View_Hint')->set("<i>\"".$this->api->getUser()->get('name').', practically perfect in every way." </i></p><p>You should join Agile Toolkit Core Team!');

        $this->add('Button')->set('Back to site')->js('click')->univ()->location('/');
    }
}

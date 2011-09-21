<?php
class page_register extends Page {
    function init(){
        parent::init();

        $this->api->dbConnectATK();
        $form=$this->add('MVCForm');
        $form->setModel('ATK_User_Pending',array('email','full_name'));

        $form->addSubmit('Register');

        $backjs=$this->js()->parent()->atk4_load($this->api->getDestinationURL('login',array('cut_object'=>'rightbox')));
        $focusjs=$this->js()->closest('.page_login')->find('input')->eq(0)->focus();
        $form->addButton('Cancel')->js('click',array($backjs,$focusjs));


        $form->onSubmit(function($form){
            $form->update();
            $id=$form->getModel()->get('id');
            $form->js()->univ()->successMessage('Registration confirmation have been sent to your email')->closeDialog()->execute();
        });
    }
}

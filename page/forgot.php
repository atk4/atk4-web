<?php
class Page_forgot extends Page {
    function init(){
        parent::init();
        $form=$this->add('Form');
        $form->add('P')->set('Enter your email to retrieve password reset link');
        $email=$form->addField('line','email','Email')->validateNotNULL();


        $backjs=$this->js()->parent()->atk4_load($this->api->getDestinationURL('login',array('cut_object'=>'rightbox')));
        $focusjs=$this->js()->closest('.page_login')->find('input')->eq(0)->focus();


        $form->addSubmit('Send Instructions');
        $form->addButton('Cancel')->js('click',array($backjs,$focusjs));
        if($form->isSubmitted()){
            $this->api->dbConnectATK();

            // load user
            $user=$this->add('Model_ATK_User')->loadBy('email',$form->get('email'));
            if($user->isInstanceLoaded()){
                $user->sendReminder();
            }

            $form->js(null,array(
                        $this->js()->univ()->closeDialog(),
                        $form->js()->univ()->successMessage('Password reset instructions have been sent to you by email')
                        ))->execute();
        }
    }
}

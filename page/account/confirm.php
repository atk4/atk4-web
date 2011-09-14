<?php
class page_account_confirm extends Page {
    function init(){
        parent::init();
        if(!$_GET['t'])$this->api->redirect('/');
        $this->api->stickyGET('t');

        $m=$this->add('Model_ATK_User_Pending');
        $m->addField('password')->system(true);
        $m->loadBy('token_email',$_GET['t']);
        if(!$m->isInstanceLoaded()){
            $this->api->redirect($this->api->getDestinationURL('/',array('t'=>false)));
        }

        $form=$this->add('Form');
        $form->addField('readonly','email',$m->get('email'));
        $f=$form->addField('password','password','Choose password');
        $f->add('StrengthChecker',null,'after_field');
        $form->addField('password','password_confirm','Confirm password');
        $form->addSubmit();

        $form->onSubmit(function($form) use($m){
            // Verify password matching
            if($form->get('password')!=$form->get('password_confirm'))
                throw $form->exception('Passwords do not match')->setField('password_confirm');


            $m->set('is_email_confirmed',true);
            $m->set('token_email','');
            $m->set('password',$form->api->auth->encryptPassword($form->get('password'),$m->get('email')));
            $m->update();

            $form->js()->hide('slow')->univ()->dialogOK('Thank you','Thank you for completing registration',
                $form->js()->_enclose()->univ()->redirect($form->api->getDestinationURL('commercial/account',array('t'=>false))))
                ->execute();
        });

    }
}

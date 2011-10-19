<?php
class page_account_passwd extends Page {
    function init(){
        parent::init();
        $m=$this->add('Model_ATK_User_Valid');
        $m->addField('password')->system(true);
        $m->loadBy('email',$this->api->auth->get('email'));


        if(!$m->isInstanceLoaded()){
            $this->add('View_Error')->set('Problem');
            return;
        }


        $form=$this->add('Form');
        $f=$form->addField('password','password','New password');
        $f->add('StrengthChecker',null,'after_field');
        $form->addField('password','password_confirm','Confirm password');

        $form->onSubmit(function($form) use($m){
            // Verify password matching
            if($form->get('password')!=$form->get('password_confirm'))
                throw $form->exception('Passwords do not match')->setField('password_confirm');


            $m->set('token_email','');
            $m->set('password',$form->api->auth->encryptPassword($form->get('password'),$m->get('email')));
            $m->update();

            $form->js()->univ()->closeDialog()->successMessage('Your password has been changed')
                ->execute();
        });

    }
}

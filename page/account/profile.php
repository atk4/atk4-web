<?php
class page_account_profile extends Page {
    function init(){
        parent::init();

        $user_model=$this->add('Model_ATK_User_Valid')
            ->loadData($this->api->auth->get('id'));


        $cc=$this->add('Columns');

        $c=$cc->addColumn();
        $c->add('H3')->set('Details');
        $form=$c->add('MVCForm');
        $form->setModel($user_model,
                array('full_name'));
        if($form->isSubmitted()){
            $form->update();
            $form->js()->univ()->closeDialog()->execute();
        }




        $c=$cc->addColumn();
        $c->add('H3')->set('Change Password');
        $form=$c->add('Form');
        $form->addField('password','password','Old Password')->validateNotNULL('Enter old password here');
        $f=$form->addField('password','new_password','New Password')->validateNotNULL();
        $f->add('StrengthChecker',null,'after_field');
        $form->addField('password','ver_password','Confirm')->validateNotNULL();
        $form->addSubmit('Change');
        $form->onSubmit(function($form) use($user_model){

            $auth=$form->api->auth;
            $l=$user_model->get('email');
            $p=$form->get('password');

            // Manually encrypt password
            $enc_p = $auth->encryptPassword($p,$l);

            // Manually verify login
            if(!$auth->verifyCredintials($l,$enc_p)){
                throw $form->exception('Incorrect Old Password')
                    ->setField('password');
            }

            if($form->get('new_password')!=$form->get('ver_password'))
                throw $form->exception('New passwords don\'t match')
                    ->setField('ver_password');

            $enc_p = $auth->encryptPassword($form->get('new_password'),$l);
            $user_model->addField('password');
            $user_model->set('password',$enc_p)->update();

            $form->js(null, $form->js()->reload()
            )->univ()->successMessage('Password has been changed')->execute();

        });
    }
}

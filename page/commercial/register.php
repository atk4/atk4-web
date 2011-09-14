<?php
class page_commercial_register extends Page {
    function init(){
        parent::init();

        $this->add('H1')->set('Manual Registration');
        $this->add('P')->set('Normally your email will be recorded when you download software or subscribe. This form allows you to manually specify it. Entering Name field is optional.');
        $form=$this->add('MVCForm');
        $form->setModel('ATK_User_Pending',array('email','full_name'));
        $form->onSubmit(function($form){
            $form->update();
            $id=$form->getModel()->get('id');
            $form->js()->univ()->successMessage('Successfully registered with id='.$id)->execute();
        });


        $this->add('H3')->set('Soft-register');
        $this->add('P')->set('Soft registration will add your email if it is not in the database,  but will not complain if you are already registered');
        $form=$this->add('Form');
        $form->addField('line','email');
        $form->addSubmit();
        $form->onSubmit(function($form){
            $id=$form->add('Model_ATK_User_Pending')->softRegister($form->get('email'));
            $form->js()->univ()->successMessage('id='.$id)->execute();
        });
    }
}

<?php
class page_commercial_account extends Page {
    function init(){
        parent::init();

        if(!$this->api->auth->isLoggedIn()){


            $this->add('View_OAuth')
                ->setController('Controller_OAuth_Google');


            /*
            $this->add('Columns');

            $cc=$this->add('Frame')->setTitle('Login required')->add('Columns');
            $left=$cc->addColumn();
            $right=$cc->addColumn();


            $form=$left->add('Form');
            $form->addField('line','email');

            $form=$right->add('Form');
            $form->addField('line','email');
            */

        }
    }
}

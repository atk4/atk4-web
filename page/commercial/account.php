<?php
class page_commercial_account extends Page {
    function init(){
        parent::init();

        if(!$this->api->auth->isLoggedIn()){
            $this->api->redirect('commercial/store');
        }

        $this->add('View',null,'AccountBox','AccountBox')->template->set($i=$this->api->auth->get());

        $this->add('H3')->set('Licenses');
        $g=$this->add('MVCGrid');
		$g->setModel($this->add('Model_ATK_User_Me')->getPurchases(),array('domain','type','expires','cost','is_paid'));
		$g->addColumn('expander','info');

        $this->js('click')->_selector('a.popup')->univ()->frameURL($this->js()->_selectorThis()->attr('name'),$this->js()->_selectorThis()->attr('href'));



        /*
        $this->add('View_OAuth')
            ->setController('Controller_OAuth_Google');
            */


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
    function defaultTemplate(){
        return array('page/commercial/account');
    }
}

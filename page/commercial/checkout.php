<?php
class page_commercial_checkout extends Page {
    function init(){
        parent::init();

        $user_model=$this->add('Model_ATK_User_Valid')
            ->loadData($this->api->auth->get('id'));
        if(!$user_model->isInstanceLoaded()){
            $this->js(true)->atk4_load($this->api->getDestinationURL('login',array('cut_page'=>1,'return'=>'commercial/checkout')));
			return;
        }

        $this->add('P')->set('<b>Refund policy:</b> if you are not satisfied with Agile Toolkit and it does not live to your commercial
                expectations, request a refund and your money will be returned within first 30 days from your purchase.');

        $form = $this->add('MVCForm');
        $form->setModel($user_model->getPurchases(),array('domain'));
        $form->addSubmit('Continue');
    }
}

<?php
class page_ppproxy extends Page {
    function init(){
        parent::init();
        $this->api->dbConnectATK();

        $user_model=$this->add('Model_ATK_User');
        $user_model->loadData($this->api->auth->get('id'));
        if(!$user_model->isInstanceLoaded())$this->api->redirect('/');

        if($this->add('billing_Model_PaymentMethod_PayPal')->ppproxy()){
            $purchase = $user_model->getPurchases();
            $purchase->loadData($_GET['ipn']);

            $purchase->set('is_paid',true)->update();

            $this->api->redirect('commercial/thankyou');
        }
    }
}

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
			$id=null;
			if(!$id)$id=$_POST['item_number'];
			if(!$id)$id=$_GET['ipn'];
			if(!$id)$id=$_GET['id'];
			if(!$id)$id=$_GET['success'];
            $purchase->loadData($id);

            $purchase->set('is_paid',true)->update();
			if($_POST['txt_id'])$purchase->set('purchase_ref',$_POST['txt_id']);

            $this->api->redirect('commercial/thankyou');
        }
        if($_GET['cancel']){
            $this->api->redirect($this->api->getDestinationURL('commercial/account'));
        }
    }
}

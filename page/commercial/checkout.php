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
                expectations, request a refund and your money will be returned within first 14 days from your purchase. No questions asked.');

        $this->add('H3')->set('License details');

        $cc=$this->add('Columns');
        $c=$cc->addColumn();


        $this->api->stickyGET('type');
        $type=basename($_GET['type']);
        $license_model=$this->add('Model_ATK_Purchase_'.$type);
        $license_model->setMasterField('atk_user_id',$user_model->get('id'));

        $license_model->getField('is_paid')->system(true);
        $license_model->getField('expires_dts')->system(true);
        $license_model->getField('purchase_ref')->system(true);


        $form = $c->add('MVCForm');
        $form->addField('readonly','type','License Type')->set($type);
        $form->setModel($license_model);
        $form->addSubmit('Continue');


        $c=$cc->addColumn();
        $c->add('P')->set('The information about your project will help us provide you with the best support, suggestions and advice in your project.')
            ->setStyle('padding-top','70px');

        if($form->isSubmitted()){
            $purchase=$form->update();

            $url=$this->add('billing_Model_PaymentMethod_PayPal')->charge($license_model->get('cost','USD'));

            $url->set('descr','Blah blah');

            $form->js()->univ()->location($url->set('id',$purchase->get('id')))->execute();

        }

    }
}

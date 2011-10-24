<?php
class page_newsletter extends Page {
	function init(){
		parent::init();


        $this->api->dbConnectATK();
        $form=$this->add('MVCForm');
        $form->setModel('ATK_User_Pending',array('email','full_name'));

        $form->addSubmit('Subscribe');

        $backjs=$this->js()->parent()->atk4_load($this->api->getDestinationURL('login',array('cut_object'=>'rightbox')));
        $focusjs=$this->js()->closest('.page_login')->find('input')->eq(0)->focus();


        $form->onSubmit(function($form){
            $form->update();
            $id=$form->getModel()->get('id');
			$form->getModel()->sendToken();
            $form->js()->univ()->successMessage('Thank you for subscribing. We have sent you email confirmation')->closeDialog()->execute();
        });



        return;
		$f=$this->add('Form');
		$f->js(true)->removeClass("atk-form-simple")->addClass("atk-form-vertical");
		$f->addField('line','email')->setProperty('size',40)->setNotNull();
		//$f->addField('checkbox','quote','I might want Agile to handle my next Web Software project');
		//$f->addField('checkbox','atk','I would like to get updates on Agile Toolkit');
		$f->addField('line','name','Full Name')->setProperty('size',40)->setNotNull();
		$f->addSubmit('Subscribe');
	//	$c=$this->add('Controller_crm_CampaignMonitor');

		if($f->isSubmitted()){
			$result=$c->addRequest('AddSubscriber')
				->set('ListID',$this->api->getConfig('crm/cm/list/atk'))
				->set('Email',$f->get('email'))
				->set('Name',$f->get('name'))
				->process()->result;
			$f->js()->univ()->location($this->api->getDestinationURL('./thankyou'))->execute();
		}
	}
	function defaultTemplate(){
		return array('page/newsletter');
	}
}

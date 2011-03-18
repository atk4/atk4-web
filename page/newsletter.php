<?php
class page_newsletter extends Page {
	function init(){
		parent::init();

		$f=$this->add('Form');
		$f->js(true)->removeClass("atk-form-simple")->addClass("atk-form-vertical");
		$f->addField('line','email')->setProperty('size',40)->setNotNull();
		//$f->addField('checkbox','quote','I might want Agile to handle my next Web Software project');
		//$f->addField('checkbox','atk','I would like to get updates on Agile Toolkit');
		$f->addField('line','name','Full Name')->setProperty('size',40)->setNotNull();
		$f->addSubmit('Subscribe');
		$c=$this->add('Controller_crm_CampaignMonitor');

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

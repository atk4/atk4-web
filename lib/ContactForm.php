<?php
class ContactForm extends Form {
	function init(){
		parent::init();

		$this->addField('line','your_name')->setProperty('size','60')->js(true)->focus();
		$this->addField('line','your_email')->setProperty('size','60');
		$this->addField('line','your_phone')->setProperty('size','60');
		$this->addField('line','company')->setProperty('size','60');

		$this->addField('text','more_information')->setProperty('rows','10')->setProperty('cols','50');

		$this->addButton('Talk');
	}
}

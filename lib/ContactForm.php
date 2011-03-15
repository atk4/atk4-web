<?php
class ContactForm extends MVCForm {
	function init(){
		parent::init();
        $this->api->dbConnect();

        $this->setModel('Contact');

		$this->getElement('name')->setProperty('size','60')->js(true)->focus();
		$this->getElement('email')->setProperty('size','60');
		$this->getElement('phone')->setProperty('size','60');
		$this->getElement('company')->setProperty('size','60');

		$this->getElement('moreinfo')->setProperty('rows','10')->setProperty('cols','50');
		//$this->addSubmit('Talk');
        $this->getElement('Save')->setLabel('Talk');

        if($this->isSubmitted()){
            $this->update();
			$m = $this->add("TMail")->loadTemplate("contact", ".html");
			$m->setTag($this->getAllData());
			$m->send($this->api->getConfig("email/contact", "j@agiletech.ie"));
            $this->js()->univ()->successMessage('Thank you for getting in touch!')->execute();
        }
	}
}

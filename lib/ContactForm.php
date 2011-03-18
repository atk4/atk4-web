<?php
class ContactForm extends MVCForm {
	function init(){
		parent::init();
		$this->js(true)->removeClass("atk-form-simple")->addClass("atk-form-vertical");
		$this->setLayout("contact_form_layout");
        $this->api->dbConnect();

        $this->setModel('Contact');

		$this->getElement('name')->js(true)->focus();
		$this->getElement('email');
		$this->getElement('phone');
		$this->getElement('company');

		$this->getElement('moreinfo')->setProperty("rows", 4)->setProperty("cols","");
		//$this->addSubmit('Talk');
        $this->getElement('Save')->setLabel('Send it now');

        if($this->isSubmitted()){
            $this->update();
			$m = $this->add("TMail")->loadTemplate("contact", ".html");
			$m->setTag($this->getAllData());
			$m->send($this->api->getConfig("email/contact", "j@agiletech.ie"));
            $this->js()->univ()->successMessage('Thank you for getting in touch!')->execute();
        }
	}
}

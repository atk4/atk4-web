<?php
class page_intro_greeted extends page_intro_generic {
	function init(){
		parent::init();
		$this->sidebar->destroy();
		$this->add('P')->set(htmlspecialchars($_GET['text']));
		$this->add('HtmlElement')->setElement('a')->setAttr('href',$this->api->getDestinationURL('../javascript'))->set('Back');
	}
}

<?php
class page_download_success extends Page {
	function init(){
		parent::init();
		$this->add('Controller_JSProxy')->proxy('http://platform.twitter.com/widgets.js');
		$this->template->trySet('file',addslashes(htmlspecialchars($_GET['file'])));
		$this->js(true)->univ()->setTimeout($this->js()->_enclose()->univ()->location('/distfiles/'.$_GET['file']),1000);
	}
	function defaultTemplate(){
		return array('page/download/success');
	}
}

class Controller_JSProxy extends AbstractController {
	function proxy($url){
		$this->owner->js(true,'$.atk4.includeJS("'.$this->api->getDestinationURL(null,array($this->name=>1)).'",true);');
		if(isset($_GET[$this->name])){
			readfile($url);
			exit;
		}
	}
}

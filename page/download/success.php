<?php
class page_download_success extends Page {
	function init(){
		parent::init();
		$this->add('Controller_JSProxy')->proxy('http://platform.twitter.com/widgets.js');
		/*
		$f=$this->add('Form',null,null,array('form_empty'));
		//$f->js(true)->addClass('tweet_this_form');
		$f->setFormClass('form-twitter');
		$f->setLayout("download_success_form_layout");

	//	$this->js(true)->univ()->setTimeout($this->js()->_enclose()->univ()->location('/distfiles/'.$_GET['file']),1000);

		$this->template->trySet('file',addslashes(htmlspecialchars($_GET['file'])));
		$f->addField('text','t','Tweet This')
			->set('I just downloaded Agile Toolkit (PHP UI Framework). Check out their interactive introduction http://agiletoolkit.org/intro. #atk4');
		$f->addSubmit('Tweet');
		if($f->isSubmitted()){
			$f->js()->univ()->location('http://twitter.com?status='.rawurlencode($f->get('t')))->execute();
			exit;
		}
		*/
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

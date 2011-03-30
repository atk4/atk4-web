<?php
class page_intro_tweet extends Page {
	function init(){
		$f=$this->add('Form','tweety');
		$f=$this->add('Form',null,null,array('form_empty'));
		$f->setFormClass('form-twitter');
		$f->setLayout("download_success_form_layout");

		$this->template->trySet('file',addslashes(htmlspecialchars($_GET['file'])));
		$tt=$f->addField('text','t','Tweet This')
			->set('Nice introduction for Agile Toolkit, PHP UI Framework - http://agiletoolkit.org/intro. #atk4');
		$bb=$f->addSubmit('Tweet');
		$bb->js(true)->insertAfter($tt);
		if($f->isSubmitted()){
			$f->js()->univ()->location('http://twitter.com?status='.rawurlencode($f->get('t')))->execute();
			exit;
		}
	}
}

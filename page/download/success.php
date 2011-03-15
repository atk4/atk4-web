<?php
class page_download_success extends Page {
	function init(){
		parent::init();
		$f=$this->add('Form');

	//	$this->js(true)->univ()->location('/distfiles/'.$_GET['file']);

		$this->template->trySet('file',addslashes(htmlspecialchars($_GET['file'])));
		$f->addField('text','t','Tweet This')
			->set('I just downloaded Agile Toolkit PHP Framework. Check out their interactive introduction
					http://agiletoolkit.com/intro. #atk4');
		$f->addSubmit('Tweet');
		if($f->isSubmitted()){
			$f->js()->univ()->location('http://twitter.com?status='.urlencode($f->get('t')))->execute();
			exit;
		}
				//http://twitter.com/?status=Vērts%20izlasīt%20-%20Putni%20ziemā%20(Laura%20Līdaka%20Ingmārs%20Līdaka,%202007)%20http://ej.uz/whnx
	}
	function defaultTemplate(){
		return array('page/download/success');
	}
}

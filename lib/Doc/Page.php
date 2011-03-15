<?php
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();

		$this->sidebar=$this->add('Menu',null,null,array('view/sidebar','Menu'));
		$this->sidebar->current_menu_class='current blue-i';
		$this->sidebar->inactive_menu_class='';



		/*
		$f=$this->sidebar->add('Form');
		$f->template->set('form_class','vertical');
		$help=$f->addField('text','help','Help us improve documentation!')
			->set('don\'t use this yet, it\'s not being saved. Page: '.$this->api->page);
		$f->addButton('Submit Feedback')->js('click',$f->js()->submit());
		if($f->isSubmitted()){

			// TODO: save feedback

			$f->js(null,$help->js()->val(''))->univ()
				->successMessage('Thank you for your feedback')->execute();
		}
		*/
	}
	function subPage($name){
		$this->sidebar->addMenuItem($name,$hr=str_replace(array('page_','_'),array('','/'),
					get_class($this)).'/'.$name);
		return $this->sidebar->isCurrent($hr);

	}
	function subPageHandler($p){
	}
}

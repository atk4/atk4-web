<?php
class page_doc_form extends Doc_Page {
	function init(){
		parent::init();

		$this->subPage('quick_start','Form Quick Start') ;
		$this->subPage('fields','Standard Fields') ;
		$this->subPage('enhancing','Enhancing Form') ;
		$this->subPage('validation','Validation') ;
		$this->subPage('submit','Handling Submit') ;
		$this->subPage('database','Database Integration') ;
		$this->subPage('models','Model-based Form') ;
		$this->subPage('styling','Styling and layouts') ;
		$this->subPage('ajax','AJAX and Dynamics') ;
		$this->subPage('upload','Using File Upload') ;
		$this->subPage('limitations') ;

	}
    function initMainPage(){
        $this->api->redirect('./quick_start');
    }
    function defaultTemplate(){
		$top_page=str_replace('page_','', get_class($this));
        if($this->api->page!=$top_page){
            // subpage
            $sub_page=str_replace($top_page.'_','',$this->api->page);
            return array('page/'.str_replace('_','/',$top_page).'/'.$sub_page);
        }
        return parent::defaultTemplate(); //array('page/'.str_replace('_','/',$this->api->page));
    }
}

class GreetingForm extends Form {
    function init(){
        parent::init();
        $this->addField('line','name')->validateNotNull();
        $this->addSubmit('Greet');
        if($this->isSubmitted()){
            $this->js()->univ()->alert('Hello, '.$this->get('name'))->execute();
        }
    }
}

class Controller_EmployeeWithHint extends Controller {
    public $model_name='Model_Employee';
    function initForm(){
        parent::initForm();
        if($this->owner->hasField('salary'))
            $this->owner->getElement('salary')->setFieldHint('&nbsp;$3000 max');
    }
}

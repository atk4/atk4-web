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

class StylingForm extends Form {
    function init(){
        parent::init();
        $f=$this;

        $f->addField('line','name')->validateNotNull()
            ->setFieldHint('Click "Register" to see error');
        $f->addField('line','email')
            ->validateNotNull()
            ->validateField('filter_var($this->get(), FILTER_VALIDATE_EMAIL)')
            ;

        $f->addField('password','password')->validateNotNull()
            ->setProperty('max-length',30)->setFieldHint('30 characters maximum');

        $p2=$f->addField('password','password2')
            ->validateField('$this->get()==$this->owner->getElement("password")->get()',
                    'Passwords do not match');




        $f->addSeparator();

        $f->addField('DatePicker','date_birth','Birthdate');

        $f->addField('dropdown','age')
            ->setValueList(array('','11 - 20', '21 - 30', '31 - 40'));

        $f->addField('text','about')
            ->setProperty('cols',45)->setProperty('rows','5')
            ->validateField('5000>=strlen($this->get())','Too long');

        $f->addSeparator();

        $f->addField('radio','sex')
            ->setValueList(array('m'=>'Male','f'=>'Female'))
            ;  // automatically validated to be one of value list



        $f->addField('checkbox','agreeRules','I Agree to Rules and Terms'
                )->validateNotNull('You must agree to the rules');

        $f->addSubmit('Register');

    }
    function render(){
        parent::render();
        $this->js(true)->atk4_form('fieldError','password2','Passwords do not match');
        $this->js(true)->atk4_form('fieldError','age','Age is not entered - sample longer error which may span');

        $this->js(true)->atk4_form('fieldError','about','Sample error on textarea field');
    }
}

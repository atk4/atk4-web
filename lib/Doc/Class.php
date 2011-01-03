<?
class Doc_Class extends Doc_View {
	public $is_active=false;
	function init(){
		parent::init();
	}
	function setName($name){
		$this->class_name=$name;
		parent::setName($name);
		if($this->owner->sidebar)
			$this->owner->sidebar->addMenuItem($name,$hr=str_replace(array('page_','_'),array('','/'),
						get_class($this->owner)).'/'.$name);
		$this->is_active=$this->owner->sidebar->isCurrent($hr);
		if($this->is_active){
			$this->initMethods();
		}
		return $this;
	}

	function addMethod($name){
		$this->add('Doc_Method')->setName($name);
	}
	function addLink($type,$dest,$descr=null){
	}
	function addNote($text){
		$this->add('Doc_Note')
			->set('Content',$text);
	}







	function initMethods(){
		$this->add('Doc_Method')
			->setName('init');
	}
	function render(){
		if(!$this->is_active)return;

		return parent::render();
	}

	function defaultTemplate(){
		return array('doc/view/doc_class');
	}

}

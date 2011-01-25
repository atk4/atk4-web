<?
class Doc_Class extends Doc_View {
	public $is_active=false;
	function setName($name){
		$this->class_name=$name;
		parent::setName($name);
		$this->is_active=true;
		if($this->owner instanceof Doc_Page){
			$this->is_active=$this->owner->subPage($name);
		}
		if($this->is_active){
			$this->initMethods();
		}
		return $this;
	}

	function addMethod($name){
		return $this->add('Doc_Method')->setName($name);
	}
	function addAliasMethod($name,$alias){
		return $this->add('Doc_Method')->setName($name)->setDescr('Same as '.$alias);
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

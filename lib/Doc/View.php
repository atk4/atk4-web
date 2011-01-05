<?
/*
   This is generic documentation view. Documentation views can
   be hierarchical
   */
class Doc_View extends View {


	public $name;
	public $descr;
	public $type;

	function set($a,$b=null){
		$this->template->set($a,$b);
		return $this;
	}
	function setName($n){
		return $this->set('name',$n);
	}
	function setDescr($d){
		$this->add('Text')->set($d);
		return $this;
	}
	function defaultTemplate(){
		return array('doc/view/doc_token');
	}

	function addLink($type,$dest,$descr=null){
	}
	function addNote($name){
		return $this->add('Doc_Note')
			->setName($name);
	}
	function addExample($name){
		return $this->add('Doc_Note')
			->setName($name);
	}
	function addMoreInfo($name){
		return $this->add('Doc_Note')
			->setName($name);
	}

}

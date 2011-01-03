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
	function defaultTemplate(){
		return array('doc/view/doc_token');
	}
}

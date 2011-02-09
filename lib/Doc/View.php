<?php
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
		if($this->template->is_set('Notes'))$n=$this->add('Doc_Note',null,'Notes');
		else $n=$this->add('Doc_Note');
		return $n->setName($name);
	}
	function addExample($caption=null){
		$e=$this->add('Doc_Code');
		if($caption)$e->setName($caption);
		return $e;
	}
	function addMoreInfo($name){
		if($this->template->is_set('MoreInfo'))$n=$this->add('Doc_MoreInfo',null,'MoreInfo');
		else $n=$this->add('Doc_MoreInfo');
		return $n->setName($name);
	}

}

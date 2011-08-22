<?php
class Doc_Execute extends Doc_View {

	public $code;
	public $exec;

	function setCode($code){
		$p=$this->add('View',null,'execute');
		$this->executeDemo($p,$code);

		return $this;
	}

	function executeDemo($p,$code){
        $page=$p;
		eval($code);
	}

	function defaultTemplate(){
		return array('doc/view/doc_execute');
	}

}

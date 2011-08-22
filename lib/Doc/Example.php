<?php
class Doc_Example extends Doc_View {

	public $code;
	public $exec;

	function setCode($code){
		//$this->setDescr($code);
		$this->add('Doc_Code',null,'code')
			->setDescr($code)
			;

		$p=$this->add('View',null,'example');
		$this->executeDemo($p,$code);

		return $this;
	}

	function executeDemo($p,$code){
        $page=$p;
		eval($code);
	}

	function defaultTemplate(){
		return array('doc/view/doc_example');
	}

}

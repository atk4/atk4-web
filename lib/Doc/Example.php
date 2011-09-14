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

        // Connect to alternative database
        $dbs=$this->api->db;
        @$this->api->db = $this->api->db_examples;

		$this->executeDemo($p,$code);

        $this->api->db_examples = $this->api->db;
        $this->api->db=$dbs;

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

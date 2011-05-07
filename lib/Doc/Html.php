<?php
class Doc_Html extends Doc_View {

	function setDescr($d){
		$this->add('Text')->set(highlight_string(html_entity_decode($d),true));
		return $this;
	}

	function defaultTemplate(){
		return array('doc/view/doc_code');
	}

}

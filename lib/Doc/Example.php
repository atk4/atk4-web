<?
class Doc_Example extends Doc_View {

	function init(){
		parent::init();
		$this->js()
			->_load('syntaxhighlighter/scripts/shCore')
			->_load('syntaxhighlighter/scripts/shBrushPhp')
			;
	}
	function setDescr($d){
		$this->add('Text')->set(str_replace(array('&lt;?php','php?&gt;'),'',highlight_string('<?php'.$d.'php?>',true)));
		return $this;
	}

	function defaultTemplate(){
		return array('doc/view/doc_example');
	}

}

<?php
class Doc_Code extends Doc_View {

	function setDescr($d){
		$this->add('Text')->set(str_replace(array('&lt;?php','php?&gt;'),'',highlight_string('<?php'.$d.'php?>',true)));
		return $this;
	}

	function defaultTemplate(){
		return array('doc/view/doc_code');
	}

}

<?
class Doc_Example extends Doc_View {

	function setDescr($d){
		$this->add('Text')->set(highlight_string('<?'.$d.'?>',true));
		return $this;
	}

	function defaultTemplate(){
		return array('doc/view/doc_example');
	}

}

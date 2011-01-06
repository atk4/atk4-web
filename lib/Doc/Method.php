<?
class Doc_Method extends Doc_View {
	function addArgument($n,$info){
		return $this
			->add('Doc_Argument')
			->setName($n)
			->setDescr($info);
	}

	function addObsoleteArgument($n,$version){
		return $this->addArgument($n,'OBSOLETE. Will be removed in v'.$version);
	}
	function defaultTemplate(){
		return array('doc/view/doc_method');
	}
}

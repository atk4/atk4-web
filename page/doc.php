<?
class page_doc extends Page {
	function init(){
		parent::init();
		$this->add('Button',null,'start')->js('click')->univ()->dialogURL('test','test');
	}
	function defaultTemplate(){
		return array('page/doc');
	}
}

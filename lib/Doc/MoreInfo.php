<?
class Doc_MoreInfo extends Doc_View {
	function init(){
		parent::init();
		$this->js(true)->univ()->moreInfoTrigger();
	}

	function defaultTemplate(){
		return array('doc/view/doc_moreinfo');
	}

}

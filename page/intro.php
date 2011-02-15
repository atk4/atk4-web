<?php
class page_intro extends Page {
	function init(){
		parent::init();
		$this->api->redirect('./start');
	}
}

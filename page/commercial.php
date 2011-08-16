<?php
class page_commercial extends Page {
	function init(){
		parent::init();
		$this->api->redirect('./account');
	}
}

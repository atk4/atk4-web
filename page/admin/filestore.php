<?php
class page_admin_filestore extends Page_Filestore_FileAdmin {
	function init(){
		parent::init();
		$this->api->auth->check();
	}
}

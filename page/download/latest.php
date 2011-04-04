<?php
class page_download_latest extends Page {
	function init(){
		parent::init();
		header('Location: /download/success?file=atk4-example-4.0.2.zip');
	}
}

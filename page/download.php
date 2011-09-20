<?php

class page_download extends Page {
	function init(){
		parent::init();
        $this->api->redirect('commercial/store');
        // TODO: add this page back
		for ($i = 1; $i <= 4; $i++){
			$this->js('click')->_selector('#download'.$i)->univ()->frameURL('<i class="icon-arrow-big"></i>Downloading...',
                $this->js()->_selectorThis()->attr('href'),array('customClass'=>'popup-download', 'width' => 500, 'resizable' => false, 'draggable' => false));
		}
	}
	function defaultTemplate(){
		return array("page/download", "_top");
	}
}

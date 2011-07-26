<?php
class page_index extends Page {
	function init(){
		parent::init();

        $this->js('click')->_selector('#index-download-button')->univ()->frameURL('<i class="icon-arrow-big"></i>Downloading...',
                $this->js()->_selectorThis()->attr('href'),array('customClass'=>'popup-download', 'width' => 500, 'resizable' => false, 'draggable' => false));

        $this->js('click')->_selector('.neon.mvc')->univ()->frameURL('Models in Agile Toolkit',
                $this->api->getDestinationURL('./in/models'));

        $this->js('click')->_selector('.neon.jquery')->univ()->frameURL('jQuery in Agile Toolkit',
                $this->api->getDestinationURL('./in/jquery'));

        $this->js('click')->_selector('.neon.ui')->univ()->frameURL('User Interface in Agile Toolkit',
                $this->api->getDestinationURL('./in/ui'));

    //$this->js(true)->univ()->successMessage("<i class=\"icon icon-success\"></i> Growl Test");
	}
    function defaultTemplate(){
        return 'Content';
    }
}

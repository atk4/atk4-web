<?php
class page_index extends Page {
	function init(){
		parent::init();

        $this->js('click')->_selector('#index-download-button')->univ()->frameURL('<i class="icon-arrow-big"></i>Downloading...',
                $this->js()->_selectorThis()->attr('href'),array('customClass'=>'popup-download', 'width' => 500, 'resizable' => false, 'draggable' => false));

		if($_GET['cut_page']){
			$it=$this->add('IndexTabs');
			$it->js(true)->_selector(false)->_load('jquery.scrollTo-min')->scrollTo('#actionbar',500);
		}else{
			$this->add('IndexTabs',null,'TabContent');
		}


	}
    function defaultTemplate(){
        return 'Content';
    }
}

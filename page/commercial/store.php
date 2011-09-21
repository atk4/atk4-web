<?php
class page_commercial_store extends Page {
    function init(){
        parent::init();

        $this->js('click')->_selector('#download-button')
            ->univ()->frameURL('Downloading Agile Toolkit',$this->api->getDestinationURL('/download/box'));

        $this->js('click')->_selector('#buy-single')
            ->univ()->frameURL('Purchase single-domain license',$this->api->getDestinationURL('/commercial/checkout',array('type'=>'Single')));

        $this->js('click')->_selector('#buy-multi')
            ->univ()->frameURL('Purchase single-domain license',$this->api->getDestinationURL('/commercial/checkout',array('type'=>'Multi')));
    }
    function defaultTemplate(){
        return array('page/commercial/store');
    }
}

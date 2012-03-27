<?php
class page_commercial_sto extends PAge {
    function init(){
        parent::init();
        $this->Api->redirect('commercial/store');
    }
}

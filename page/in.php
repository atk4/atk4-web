<?php
/* Sub-pages for index page */
class page_in extends Doc_Page {
    function init(){
        parent::init();
        $this->api->dbConnect();
    }
}

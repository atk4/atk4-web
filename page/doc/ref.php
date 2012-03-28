<?php
class page_doc_ref extends Page {
    function init(){
        parent::init();
        header('Location: /dox/html');
        exit;
    }
}

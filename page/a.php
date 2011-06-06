<?php
class page_a extends Doc_Page {
    function render(){
        if($_GET['button'])return $this->js()->univ()->alert('Nothing happened :)')->execute();
        parent::render();
    }
}

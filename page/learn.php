<?php
class page_learn extends Doc_Page {
    function render(){
        if($_GET['button'])return $this->js()->univ()->alert('Nothing happened :)')->execute();
        parent::render();
    }
}

<?
class page_tutorial_jobeet extends Doc_Page {
    function render(){
        if($_GET['button'])return $this->js()->univ()->alert('Nothing happened :)')->execute();
        parent::render();
    }
}

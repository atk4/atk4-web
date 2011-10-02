<?php
class page_doc_sc extends Page {
    function init(){
        parent::init();
        $this->api->dbConnectATK();
    }

    function page_index(){
        $this->add('MVCLister',null,'Videos','Videos')
            ->setModel('ATK_Video_Screencast')
            ->addCondition('is_public',true);
    }

    function page_play(){
        $m=$this->add('VideoPlayer',null,'Videos')
            ->setModel('ATK_Video_Screencast')
            ->loadData($_GET['id']);

        $this->template->trySet('title',$m->get('name'));
    }

    function defaultTemplate(){
        return array('page/doc/sc');
    }
}

class VideoPlayer extends View {
    function render(){
        $s=$this->getModel()->get('src');
        $e=pathinfo($s);
        $e=$e['extension'];
        switch($e){
            case'mov':
                $this->template=$this->template->cloneRegion('mediaelementjs');return parent::render();
            case'f4v':
                $this->template=$this->template->cloneRegion('flash');return parent::render();
            default: 
                $this->add('View_Error')->set('Unknown extension: '.htmlspecialchars($e))->render();
        }
        //var_dump(pathinfo($s));
        $this->template->del('resources');
        parent::render();
    }
    function defaultTemplate(){
        return array('view/videoplayer');
    }
}

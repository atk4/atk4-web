<?php
class BreadCrumb extends View {
    // This class implements advanced breadcrumb. Add this to all documentations and it
    // will allow user navigate through documentation in all directions.
    function init(){
        parent::init();
        $this->api->add('Sitemap');

        // determine current page
        $p=&$this->api->sitemap;
        $next=$use_next=false;

        $base_link=array();
        foreach(explode('_',$this->api->page) as $part){

            if(!$base_link){
                $crumb=$this->add('View',null,'first','first');
            }else{
                $crumb=$this->add('CompleteLister',null,'crumbs','crumb');
                $data=array();
                foreach($p as $page=>$val){
                    if($page===0)continue;
                    $row=array();
                    $row['title']=$title=is_string($val)?$val:$val[0];
                    $row['page']=
                        $this->api->getDestinationURL($pp=implode('/',$base_link).'/'.$page);

                    if($use_next===true){
                        $use_next=false;
                        $next=$row;
                    }

                    if($page==$part){
                        $row['current']='current';
                        $use_next=true;
                        $crumb->template->set('page',$row['page']);
                    }else{
                        $row['current']='';
                    }
                    $data[]=$row;
                }
                $crumb->setStaticSource($data);
            }


            if(!isset($p[$part]))break;
            $p=&$p[$part];
            $crumb->template->trySet('title',is_string($p)?$p:$p[0]);
            $base_link[]=$part;
        }
        $this->template->set('crumbs','');


        $next2=false;
        if($this->owner->template->is_set('toc')){
            if($this->owner->template->get('toc')){
                $crumb=$this->owner->add('CompleteLister',null,'toc','toc');
            }else{
                $crumb=$this->owner->add('CompleteLister',null,'toc',array('doc/view/toc'));
            }
            $data=array();
            $npk=1;
            if(is_array($p))foreach($p as $page=>$val){
                if($page===0)continue;
                $row=array();
                $row['npk']=$npk++;
                $row['current']=$page==$part?'current':'';
                $row['title']=$title=is_string($val)?$val:$val[0];
                $row['name']=$page;
                $row['page']=
                    $this->api->getDestinationURL(implode('/',$base_link).'/'.$page);
                if(!$next2)$next2=$row;
                $data[]=$row;
            }
            $crumb->setStaticSource($data);
        }

        if($this->owner->template->is_set('Next')){
            $n=$this->owner->add('View',null,'Next',array('doc/view/next_button'));
            $n->template->set($next2?$next2:$next);
        }
    }
    function render(){
        if(explode('_',$this->api->page)>1)parent::render();
    }
    function defaultTemplate(){
        return array('view/breadcrumb');
    }
}

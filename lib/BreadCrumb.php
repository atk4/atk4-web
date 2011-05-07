<?php
class BreadCrumb extends View {
    // This class implements advanced breadcrumb. Add this to all documentations and it
    // will allow user navigate through documentation in all directions.
    function init(){
        parent::init();
        $this->api->add('Sitemap');

        // determine current page
        $p=&$this->api->sitemap;

        $base_link=array();
        foreach(explode('_',$this->api->page) as $part){
            if(!isset($p[$part]))break;

            if(!$base_link){
                $crumb=$this->add('View',null,'first','first');
            }else{
                $crumb=$this->add('CompleteLister',null,'crumbs','crumb');
                $data=array();
                foreach($p as $page=>$val){
                    if($page===0)continue;
                    $row=array();
                    $row['current']=$page==$part?'current':'';
                    $row['title']=$title=is_string($val)?$val:$val[0];
                    $row['page']=
                        $this->api->getDestinationURL(implode('_',$base_link).'/'.$page);
                    $data[]=$row;
                }
                $crumb->setStaticSource($data);
            }

            $p=&$p[$part];

            $crumb->template->trySet('title',is_string($p)?$p:$p[0]);
            $base_link[]=$part;
        }

        if($this->owner->template->is_set('toc')){
            if($this->owner->template->get('toc')){
                $crumb=$this->owner->add('CompleteLister',null,'toc','toc');
            }else{
                $crumb=$this->owner->add('CompleteLister',null,'toc',array('doc/view/toc'));
            }
            $data=array();
            foreach($p as $page=>$val){
                if($page===0)continue;
                $row=array();
                $row['current']=$page==$part?'current':'';
                $row['title']=$title=is_string($val)?$val:$val[0];
                $row['name']=$page;
                $row['page']=
                    $this->api->getDestinationURL(implode('_',$base_link).'/'.$page);
                $data[]=$row;
            }
            $crumb->setStaticSource($data);
        }
    }
    function defaultTemplate(){
        return array('view/breadcrumb');
    }
}

<?php
class jMyUI extends jUI {
    function getJS($obj){
        foreach($obj->js as $key=>$chains){
            if($key=='click'){
                $sel=array();
                foreach($chains as $chain){
                    $s=$chain->selector?$chain->selector:'#'.$obj->name;
                    $js=$obj->js('click','clicky.log("'.$this->api->page.'#'.$s.'")');
                    if($chain->selector)->_selector($chain->selector);
                }
            }
        }
        return parent::getJS($obj);
    }
}

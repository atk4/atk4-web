<?php
class jMyUI extends jUI {
    function getJS($obj){
        foreach($obj->js as $key=>$chains){
            if($key=='click'){
                $sel=array();
                foreach($chains as $chain){
                    $s=$chain->selector?$chain->selector:'#'.$obj->name;
                    if(isset($sel[$s]))continue;
                    $obj->js('click','clicky.log("'.$this->api->page.'#'.$s.'")')->_selector($s);
                    $sel[$chain->selector]=true;
                }
            }
        }
        return parent::getJS($obj);
    }
}

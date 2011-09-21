<?php
class jMyUI extends jUI {
    function getJS($obj){
        foreach($obj->js as $key=>$chains){
            if($key=='click'){
                $sel=array();
                foreach($chains as $chain){
                    $s=$chain->selector?$chain->selector:'#'.$chain->owner->name;
                    $js=$obj->js('click','clicky.log("'.$this->api->page.'#'.$s.'")')
                        ->_enclose(false)
                        ->_selector($s);
                }
            }
        }
        return parent::getJS($obj);
    }
}

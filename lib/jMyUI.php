<?php
class jMyUI extends jUI {
    function getJS($obj){
        foreach($obj->js as $key=>$chains){
            if($key=='click'){
                $sel=array();
                foreach($chains as $chain){
                    $s=$chain->selector?$chain->selector:'#'.$chain->owner->name;

                    if($chain->selector)$n=$chain->selector;else$n=$chain->owner->short_name;
                    if(!$n)$n=$chain->owner->name;

                    if($chain->owner instanceof Button){
                        $nn=preg_replace('/[^a-zA-Z0-9=]/','',$chain->owner->template->get('Content'));
                        if($nn)$n=$nn;
                    }

                    $p=$this->api->getDestinationURL();

                    $js=$obj->js('click','clicky.log("'.$p.'#'.$n.'")')
                        ->_enclose(false,false)
                        ->_selector($s);
                }
            }
        }
        return parent::getJS($obj);
    }
}

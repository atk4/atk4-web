<?php
class View_SlotMachine extends AbstractView {
    function init(){
        parent::init();
        $this->template->set('slot1',rand(1,9));
        $this->template->set('slot2',rand(1,9));
        $this->template->set('slot3',rand(1,9));
    }
    function defaultTemplate(){
        return array('view/slotmachine');
    }
}

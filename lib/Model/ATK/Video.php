<?php
class Model_ATK_Video extends Model_Table {
    public $entity_code='atk_video';
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('ord')->system(true);
        $this->setOrder(null,'ord');

        $this->addField('is_public')->type('boolean');
        $this->addField('src');
        $this->addField('descr')->type('text');

        $this->addField('type');
    }
}

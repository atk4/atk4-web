<?php
class Model_ATK_MoreInfo extends Model_ATK_PageContent {
    public $table='atk_moreinfo';
    public $entity_code='atk_moreinfo';
    function init(){
        parent::init();

        $this->addField('url')->caption('Resource URL');
        $this->addField('name')->caption('Label');
    }
}

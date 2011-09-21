<?php
class Model_Book extends Model_Table {
    public $entity_code='book';
    public $table_alias='b';
    function init(){
        parent::init();
        $this->addField('name');
        $this->addField('isbn')->mandatory(true);
        $this->addField('publisher_id')->refModel('Model_Publisher');
        $this->addField('author_id')->refModel('Model_Author');
    }
}

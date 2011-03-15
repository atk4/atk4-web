<?php
class Model_Feedback extends Model_Table {
    public $entity_code='feedback';
    public $table_alias='fb';

    function init(){
        parent::init();
        $this->addField('name')->caption('Your Name');
        $this->addField('page')->system(true);
        $this->addField('descr')->caption('Suggestion or Feedback')->datatype('text');
        $this->addField('date')->system(true)->defaultValue(date('Y-m-d'));
    }
}

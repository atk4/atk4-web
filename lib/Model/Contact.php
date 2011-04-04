<?php
class Model_Contact extends Model_Table {
	public $entity_code='contact';
	public $table_alias='c';

	function defineFields(){
		parent::defineFields();

        $this->addField('name')
            ->mandatory(true);
        $this->addField('email')
            ->mandatory(true);
        $this->addField('phone');
        $this->addField('company');
        $this->addField('moreinfo')
            ->datatype('text')
            ->mandatory(true);

		$this->addField('onsite')->datatype('int');

	}
}

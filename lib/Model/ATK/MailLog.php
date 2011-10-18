<?php
class Model_ATK_MailLog extends Model_Table {
	public $entity_code='atk_maillog';
    function init(){
        parent::init();
        $this->addField('from');
        $this->addField('to');
        $this->addField('subject');
        $this->addField('body');
        $this->addField('headers');

        $this->addField('user_id')
            ->refModel('Model_ATK_User')
            ->defaultValue($this->api->auth->get('id'));
    }
}

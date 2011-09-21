<?php
class Model_ATK_Purchase extends Model_Table {
	public $entity_code='atk_purchase';
    function init(){
        parent::init();
        //$this->addField('file');
        $this->addField('atk_user_id')->refModel('Model_ATK_User');

        $this->addField('is_paid')->type('boolean')->defaultValue('false');
        $this->addField('cost')->type('money')->caption('Cost (USD)');

        $this->addField('domain');
        $this->addField('type');
        $this->addField('expires_dts')->type('datetime');
        $this->addField('expires')->calculated(true);

        $this->addField('purchased_dts')->type('datetime')->defaultValue(date('Y-m-d H-i-s'))->system(true);

        $this->addField('purchase_ref');
    }
    function calculate_expires(){
        return 'expires_dts';
    }
}

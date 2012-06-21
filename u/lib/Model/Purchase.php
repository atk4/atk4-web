<?php
class Model_Purchase extends Model_Table {
	public $table='atk_purchase';
    function init(){
        parent::init();
        $this->hasOne('User');
        $this->hasMany('Certificate');

        $this->addField('is_paid')->type('boolean')->defaultValue('false');
        $this->addField('cost')->type('money')->caption('Paid Amount');

        $this->addField('domain')->caption('Project Name');
        $this->addField('type');
        $this->addField('purchased_dts')->defaultValue(date('Y-m-d H-i-s'))->system(true)->caption('Purchased');
        $this->addField('expires_dts')->caption('Expires');

        $this->addField('purchase_ref');

        $this->addField('project_type');
        $this->addField('project_url');
        $this->addField('project_info');
    }
}

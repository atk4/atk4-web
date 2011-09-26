<?php
class Model_ATK_Purchase_Single extends Model_ATK_Purchase {
    function init(){
        parent::init();

        $this->getField('cost')->defaultValue('1.00')->type('readonly');
        $this->getField('type')->defaultValue('Single')->system(true);
        $this->getField('expires_dts')->defaultValue(date('Y-m-d',strtotime('+1 year')));

        $this->addField('project_type')->type('list')->listData(array(
                    'Select...',
                    'intern'=>'Internal project for our company',
                    'client'=>'Interface for our company clients',
                    'saas'=>'Software as a Service solution',
                    'personal'=>'Personal web project or experiment',
                    'store'=>'On-line store / eCommerce',
                    'Other...',
                    ))
                    ;

        $this->addField('project_info')->type('text')->caption('Please provide more info about your project');
    }
}

<?php
class Model_ATK_PageContent extends Model_Table {
    /**
     * This class describes models which can be added on the page
     */
    function init(){
        parent::init();

        $this->addField('page')->caption('Appears on page');
        $this->addField('is_approved')->type('boolean')->defaultValue('Y');
        $this->addField('atk_user_id')->refModel('Model_ATK_User');
    }
    function onlyPage($page){
        $this->setMasterField('page',$page);
        $this->getField('is_approved')->defaultValue('N')->system(true);
        $this->addCondition('is_approved','Y');
        $this->getField('atk_user_id')->defaultValue($this->api->auth->get('id'))->system(true);
    }
}

<?php
class Model_ATK_UserSurvey extends Model_Table {
    public $entity_code='atk_user_survey';
    function init(){
        parent::init();

        $this->addField('user_id')->refModel('Model_ATK_User');
        $this->addField('survey_id')->refModel('Model_ATK_Survey');

        $this->addField('is_invited')->type('boolean');
        $this->addField('is_completed')->type('boolean');
    }
}

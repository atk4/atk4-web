<?php
class Model_ATK_User_Emailprefs extends Model_ATK_User {
    function init(){
        parent::init();
        $this->addField('email_global')->type('boolean')->caption('Enable Notifications');
        $this->addField('email_major_releases')->type('boolean')->caption('Notify on Major Releases');
        $this->addField('email_minor_releases')->type('boolean')->caption('Notify on Minor Releases');
        $this->addField('email_blog')->type('boolean')->caption('Notify on New Blog Post');
        $this->addField('email_survey')->type('boolean')->caption('Notify on New Surveys');
    }
}

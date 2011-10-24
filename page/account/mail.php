<?php
class page_account_mail extends Page {
    function init(){
        parent::init();

        $this->add('H1')->set('Email notification preferences');

        $f=$this->add('FormAndSave');
        $f->setModel('ATK_User_Emailprefs',
                array('email','email_global','email_major_releases','email_minor_releases','email_blog','email_survey'))
            ->loadData($this->api->auth->get('id'));

        $f->getElement('email_global')->js(true)->univ()->bindConditionalShow(array(
                    ''=>array(),
                    'Y'=>array('email_major_releases','email_minor_releases','email_blog','email_survey')
                    ),'dl')->autoChange(1);
                    

        $f->getElement('email_global')->setFieldHint('Keeps you informed and helps us get your feedback.');
        $f->getElement('email_major_releases')->setFieldHint('Approximatelly twice a year');
        $f->getElement('email_minor_releases')->setFieldHint('Once a month');
        $f->getElement('email_blog')->setFieldHint('Once every two weeks');
        $f->getElement('email_survey')->setFieldHint('Once every few months');


    }
}

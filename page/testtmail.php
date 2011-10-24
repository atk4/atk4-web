<?php
class page_testtmail extends Page {
    function init(){
        parent::init();
        $this->api->dbConnectATK();

        $t=$this->add('TMail');
        $t->addTransport('Echo');//->setModel('ATK_MailLog');
        $t->addTransport('SES');
        $t->setTemplate('user/welcome');
        $t->set('Name','John Smith');
        $t->set('Sign','Signature');

        $t->send('r@agiletech.ie','info@agiletech.ie');

       // $this->add('MVCGrid')->setModel('ATK_MailLog');
        exit;
    }
}

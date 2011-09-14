<?php
class Model_ATK_User_Pending extends Model_ATK_User {
    function init(){
        parent::init();
        $this->setMasterField('is_email_confirmed',false);
    }
    function sendToken(){
        if(!$this->isInstanceLoaded())throw $this->exception('Pending user record is not loaded for sendToken');
        $this->set('token_email',$token=uniqid('atketk',true));
        $url=$this->api->getDestinationURL('account/confirm',array('t'=>$token))->useAbsoluteURL();


        $t=$this->add('TMail');
        $t->loadTemplate('user_token');
        $t->setTag($this->get());
        $t->setTag('url',$url);
        $t->send($this->get('email'));
        $this->update();
        return $this;
    }

}

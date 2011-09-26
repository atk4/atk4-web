<?php
class Model_ATK_User_Pending extends Model_ATK_User {
    function init(){
        parent::init();
        $this->setMasterField('is_email_confirmed',false);
    }
    function sendToken($url=null){
        if(!$this->isInstanceLoaded())throw $this->exception('Pending user record is not loaded for sendToken');
        $this->set('token_email',$token=uniqid('atketk',true));
        if(!$url)$url=$this->api->getDestinationURL('account/confirm');

        $url = $url->set('t',$token)->useAbsoluteURL();
		$url=str_replace('/admin/','/',$url);

        $t=$this->prepareEmail('token');
        $t->setTag('url',$url);
        $t->send($this->get('email'));

        $this->update();
        return $this;
    }

}

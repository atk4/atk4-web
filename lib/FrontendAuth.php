<?php
class FrontendAuth extends AtkAuth {
    function check(){
        if(!$this->api->auth->isLoggedIn()){
            $this->api->js(true)->univ()->dialogURL('Login to access this page',
                    $this->api->getDestinationURL('login',array('redirect'=>$this->api->page)));

            $this->api->page_object->add('View_Error')->set('Access to this page requires authentication');

            throw $this->exception('','StopInit');
        }
        return parent::check();
    }
}

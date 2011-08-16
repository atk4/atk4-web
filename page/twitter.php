<?php
    
class page_twitter extends Page {
    function init(){

        $oauth = $this->add("Controller_OAuth_Twitter");

        if($oauth->check()){
            echo "success";
        }
        if ($_GET["reset"]){
            $oauth->resetAuthToken();
        }
        if ($error = $_GET["error"]){
            /* could not get oAuth */
			echo $error;
            var_dump(base64_decode($error));
        } else {
            $token = $oauth->getAuthToken();
        }
        if ($_GET["test"]){
            $tw = $this->add("SNI_Twitter");
            $tw->setOAuth($oauth);
            //$tw->statusUpdate(date("Y-m-d H:i:s") . "test");
            print_r($tw->getUserProfile("romaninsh"));
        }
    }
}

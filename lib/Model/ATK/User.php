<?php
class Model_ATK_User extends Model_Table {

	public $entity_code='atk_user';
    function init(){
        parent::init();

        $this->addField('email');
        $this->addField('is_email_confirmed')->type('boolean')->defaultValue(false);

        $this->addField('full_name');
        $this->addField('name')->calculated(true);

        // 3rd party auth services
        $this->addField('twitter_token');
        $this->addField('google_token');
        $this->addField('facebook_token');

        $this->addField('token_email');
    }
    function calculate_name(){
        return 'coalesce(full_name,email)';
    }

    /* {{{ Registration  */
    function sendEmail($email,$template){
        $m=$this->add('TMail');
        $m->loadTemplate('user_'.$template);
        return $m->send($email);
    }
    function softRegister($email,$name=null){
        $m=$this->add('Model_ATK_User')->getBy('email',$email);
        if($m)return($m['id']);

        $m=$this->add('Model_ATK_User_Pending');
        $m->set('email',$email);
        if(!is_null($name))$m->set('name',$name);
        $m->update();
        $m->sendToken();
        return $m->get('id');
    }
    /** Called when user downloads file */
    function registerDownloadByEmail($email,$file){
        $id=$this->softRegister($email);
        $d=$this->add('Model_ATK_Download')->update(array('file'=>$file, 'atk_user_id'=>$id));
        return $this;
    }
    /** Called when user sends donation */
    function registerDonationByEmail($amount,$file){
        $id=$this->softRegister($email);
        $d=$this->add('Model_ATK_Dontaion')->update(array('amount'=>$amount, 'atk_user_id'=>$id));
        return $this;
    }
    /** Called when user purchases commercial version */
    function registerPurchaseByEmail($data,$file){
        $id=$this->softRegister($email);
        $d=$this->add('Model_ATK_Purchase')->set($data)
            ->set('atk_user_id',$id)->update();
        return $this;
    }
    function getPurchases(){
        return $this->add('Model_ATK_Purchase')
            ->setMasterField('atk_user_id',$this->get('id'));
    }
    function getDonations(){
        return $this->add('Model_ATK_Donation')
            ->setMasterField('atk_user_id',$this->get('id'));
    }
    function getDownloads(){
        return $this->add('Model_ATK_Download')
            ->setMasterField('atk_user_id',$this->get('id'));
    }

    function beforeInsert($data){
        // even when children add more conditions, email shouldn't duplicate!
        $em=$data['email'];
        $m=$this->add('Model_ATK_User')->getBy('email',$em);
        if($m)throw $this->exception('This email is already registered','ValidityCheck')->setField('email');
        return parent::beforeInsert($data);
    }


    function setToken($service,$token){
        // Saves association between us and service
        $this->set('token_'.$service,$token);
        $this->update();
    }
    function removeToken($service){
        $this->set('token_'.$service,'');
        $this->update();
    }
}

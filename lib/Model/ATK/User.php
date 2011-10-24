<?php
class Model_ATK_User extends Model_Table {

	public $entity_code='atk_user';
    function init(){
        parent::init();

        $this->addField('email');
        $this->addField('is_email_confirmed')->type('boolean')->defaultValue(false);

        $this->addField('full_name');
        $this->addField('name')->calculated(true);
        $this->addField('status')->calculated(true);

        $this->addField('created_dts')->defaultValue('Y-m-d H:i:s');
        $this->addField('logged_dts');


        // 3rd party auth services
        $this->addField('twitter_token');
        $this->addField('google_token');
        $this->addField('facebook_token');

        $this->addField('token_email')->system(true);
    }
    function calculate_name(){
        return 'coalesce(if(full_name="",email,full_name),email)';
    }
    function toStringSQL($id,$alias){
        return '(select '.$this->calculate_name().' from '.$this->entity_code.' where id='.$id.') '.$alias;
    }
    function calculate_status(){
        return <<<EOF
if(is_email_confirmed!='Y', 'Pending',
 if(password is null or password='', 'No Password',

     'Active'
 )
)
EOF;
    }

    /* {{{ Registration  */
    function prepareEmail($template){
        $m=$this->add('TMail');
        $m->loadTemplate('user/'.$template,'.html');
        $m->setTag($this->get());
        $m->addTransport('SES');

        if($this->get('token_email')){
            $_GET['t']=$this->get('token_email');
            $this->api->stickyGET('t');
        }

        $m->set('pref',$this->getMailURL('account/mail'));

        return $m;//->send($email);
    }
    function sendReminder($url=null){
        if(!$this->isInstanceLoaded())throw $this->exception('User is not loaded for sending out Password Reminder');
        $this->set('token_email',$token=uniqid('atketk',true).'-'.$this->get('id'));
        if(!$url)$url=$this->api->getDestinationURL('account');

        $url = $url->set('t_recovery',$token)->useAbsoluteURL();
		$url=str_replace('/admin/','/',$url);

        $t=$this->prepareEmail('reminder');
        $t->setTag('url',$url);
        $t->set('ip',$_SERVER['REMOTE_ADDR']);
        $t->send($this->get('email'));

        $this->update();
        return $this;
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
    function getMailURL($page){
        $url=$this->api->getDestinationURL($page)->useAbsoluteURL();
		$url=str_replace('/admin/','/',$url);
        return $url;
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

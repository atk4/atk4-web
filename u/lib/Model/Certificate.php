<?php
class Model_Certificate extends Model_Table {
	public $table="atk_certificate";
	function init(){
		parent::init();
		
		$this->hasOne('Purchase');

		$this->addField('license_data');
		$this->addField('cert_id');
		$this->addField('domain');
		$this->addField('type');
		$this->addField('license_checksum');
		$this->addField('certificate')->type('text');
		$this->addField('issued_dts');
		$this->addField('expires_dts');

	}
	public $purchase,$user;
	function generateCert($domain){
		$this->purchase = $this->ref('atk_purchase_id');
		$this->user = $this->purchase->ref('atk_user_id');

		$fx="getData_".$this->purchase['type'];
		$data=$this->$fx($domain);

		$key=openssl_get_privatekey(file_get_contents($this->api->getConfig('atk4_priv_key')));
		openssl_sign($data,$signature,$key);
		openssl_free_key($key);
		$signature=base64_encode($signature);

		$this['license_data']=$data;
		$this['cert_id']=$this->user['email'];
		$this['domain']=$domain;
		$this['license_checksum']=md5($data);
		$this['certificate']=$signature;
		$this['issued_dts']=date('Y-m-d H:m:s');
		return $this->save();
	}
	function getData_Single($domain){
		$this['type']='single';
		$this->dsql()->set('expires_dts',date('Y-m-d H:i:s',strtotime('+2 days')))->debug()->update();
		return $domain.'|'.$this->user['email'].'|single';
	}
	function getData_Multi($domain){
		$this['type']='multi';
		$this['expires_dts']=$this->purchase['expires_dts'];
		return $domain.'|'.$this->user['email'].'|multi';
	}
	function getData_AGPL($domain){
		$this['type']='agpl';
		$this->dsql()->set('expires_dts',date('Y-m-d H:i:s',strtotime('+2 days')))->update();
		return $domain.'|'.$this->user['email'].'|agpl|'.$purchase['project_url'];
	}
}
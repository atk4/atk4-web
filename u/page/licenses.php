<?php
class page_licenses extends Page {
	function init(){
		parent::init();
		
		if(!$_GET['id'])$this->api->redirect('/');
		$this->api->stickyGET('id');

		$this->purchase=$this->add('Model_Purchase_My')->load($_GET['id']);
	}
	function page_index(){

		switch($this->purchase['type']){
			case 'Single':$this->add('H1')->set('Single-domain Unlimited License: '.$this->purchase['domain']);break;
			case 'Multi':$this->add('H1')->set('Multi-domain Yearly License: '.$this->purchase->ref('atk_user_id')->get('name'));break;
			case 'AGPL':$this->add('H1')->set('Open-Source (AGPL) License: '.$this->purchase['domain']);break;
		}

		$cc=$this->add('Columns');
		$c=$cc->addColumn(6);

		switch($this->purchase['type']){
			case 'Multi':$c->add('P')->set('Unlimited domains, unlimited applications, unlimited servers without need
				to open-source any of your code. This License is Valid for single developer for 1 year term.');

				$this->purchase->getElement('project_info')->editable(false);
				$this->purchase->getElement('domain')->editable(false);

				break;
			case 'Single':$c->add('P')->set('Great for both commercial and non-commercial projects, personal projects
				and intranet applications. Open-Source license is free to use, but you must specify
				a web-page where your product can be downloaded.');

				$this->purchase->getElement('expires_dts')->editable(false);

				break;
			case 'AGPL':$c->add('P')->set('Great for both commercial and non-commercial projects, personal projects
				and intranet applications. Your open-source application will be a great inspiration to other developers
				of Agile Toolkit, therefore we would like that you keep your sources public and updated');


				break;

		}

		$c->add('H4')->set('Purchase Details');
		$f=$c->add('Form');
		$m=$this->purchase;
		$m->getField('purchased_dts')->editable(true);
		$f->setModel($m,array('domain','type','download_url','purchased_dts','expires_dts'));


		$f->js(true)->find('input')->attr('readonly',true);

		$c=$cc->addColumn(6);
		$c->add('H4')->set('Certificates');
		$c->add('View_Info')->set('You will need a unique certificate to use Agile Toolkit on a new domain');
		$m=$this->add('Model_Certificate');
		$m->addCondition('atk_purchase_id',$_GET['id']);
		$g=$c->add('Grid');
		$g->setModel($m,array('domain','license_checksum','issued_dts','expires_dts'));
		$g->addButton('Generate New Certificate')->js('click')->univ()
			->frameURL('New Certificate',$this->api->url('./add'));
		$g->addColumn('button','install');
		if($_GET['install']){
			$this->js()->univ()->frameURL('Certificate Installation Instructions',
				$this->api->url('./install',array('cert_id'=>$_GET['install'])))->execute();
		}
	}
	function page_install(){
		$this->cert=$this->purchase->ref('Certificate')->load($_GET['cert_id']);

		$this->add('H3')->set('Your certificate is ready to install. Copy the following code into your config.php file:');

		$f=$this->add('Form');
		$instr='';
		$instr.="\n\n // License fingerprint: ".$this->cert->get('license_checksum')."\n";
		$instr.="\$config['license']['atk4']['id']='".$this->cert->get('cert_id')."';\n";
		$instr.="\$config['license']['atk4']['type']='".$this->cert->get('type')."';\n";
		if($this->cert->get('type')=='agpl'){
			$instr.="\$config['license']['atk4']['repo']='".$this->cert->get('repo')."';\n";
		}
		$instr.="\$config['license']['atk4']['certificate']=\n";
		$c=explode('.',chunk_split($this->cert->get('certificate'),50,'.'));
		foreach($c as $line){
			if(!$line)break;
			$instr.="  '$line'.\n";
		}

		$instr=substr($instr,0,-2).";\n // License Data End\n\n";

		$f->setClass('stacked');
		$f->addField('text','instr','')->set($instr)->setAttr('rows',15);

	}
	function page_add(){
		$cc=$this->add('Columns');
		$c=$cc->addColumn(6);
		$f=$c->add('Form');
		$f->addClass('stacked');
		$f->addField('line','domain');
		$f->addSubmit('Generate');

		$c=$cc->addColumn(6);
		$c->add('P')->set('Your once your certificate is generated, you will be able to add it into 
			your config.php. Agile Toolkit will recognize the certificate and will label your installation
			as valid');

		$c->add('P')->set('We require that you register your installation even if you are using it include 
			open-source or non-profit projects. This way we can ensure that you are sharing source code
			of your project as per license agreement');

		if($f->isSubmitted()){
			$m=$this->add('Model_Certificate');
			$m->addCondition('atk_purchase_id',$_GET['id']);
			$m->generateCert($f->get('domain'));

			$f->js()->univ()->location($this->api->url('..'))->execute();
		}

	}
}
<?php
class page_index extends Page {
    function init(){
        parent::init();
        //$this->add('CRUD')->setModel('User');
        $this->account=$this->add('Model_User_Me')->load($this->api->getUserID());
    }
    function initMainPage() {
        $this->add('View',null,null,array('view/userinfo'))
        	->addClass('float-right')->setModel($this->account);

        $this->add('H1')->set('Accound Details for '.$this->account['name']);

        $cc=$this->add('Columns');
        $c=$cc->addColumn(6);

        $c->add('H4')->set('Active Licenses');
        $g=$c->add('Grid');
        $g->addButton('Register Open-Source Project');
        $g->setModel('Purchase_My',array('paid_amount','domain','type','expires_dts'));
        $g->addColumn('button','manage');
        if($_GET['manage']){
        	$this->js()->univ()->location($this->api->url('licenses',array('id'=>$_GET['manage'])))->execute();
        }

        $c=$cc->addColumn(6);
        $c->add('H4')->set('Public Profile');
        $f=$c->add('Form');
        $f->setModel($this->account,array('email','full_name'));
        $f->js(true)->find('input')->attr('readonly',true);

        $c->add('H4')->set('Add-on distributions');
        $c->add('P')->set('Here you may register Agile Toolkit add-ons which you wish to publically distribute.
         You will require to reserve add-on name first, then provide first add-on verison within 30 days. 
         Reservation costs nothing and you can reserve name once again when it expires.');

        $crud=$c->add('CRUD',array('allow_add'=>false));
        $crud->setModel('Addon',array('name','expires_dts','cost','paypal'),array('name','expires_dts'));
        $g=$crud->grid;
        if($g){
        	$g->addButton('Reserve Add-on Name')->js('click')->univ()->frameURL('Reserve Add-on Name',$this->api->url('./addonreg'));
        	$g->addColumn('button','versions');
        	if($_GET['versions']){
        		$m=$g->model->load($_GET['versions']);
        		$this->js()->univ()->frameURL('Manage Versions for: '.$m['name'],$this->api->url('./versions',
        			array('id'=>$_GET['versions'])))
        			->execute();

        	}
        }
    }
    function page_versions(){
    	$this->api->stickyGET('id');
    	$this->addon=$this->add('Model_Addon_My')->load($_GET['id']);

    	$m=$this->addon->ref('Addon_Version');
    	$m->getElement('checksum')->editable(false);
    	$cr=$this->add('CRUD');$cr->setModel($m);
    	if($cr->form)$cr->form->setClass('stacked');
    }
    function page_addonreg(){
    	$cc=$this->add('Columns');

    	$c=$cc->addColumn(6);
    	$f=$c->add('Form');

    	$f->addClass('stacked');
    	$f->setModel('Addon_My');
    	$f->getElement('name')->add('View',null,'after_field')->setElement('ins')
    		->set('Must consist of a-z characters and underscores only');

    	$f->addSubmit();
    	if($f->isSubmitted()){
    		if(!preg_match('/^[a-z_]*$/',$f->get('name'))){
    			$f->displayError('name','Incorrect format');
    		}
    		if($this->add('Model_Addon')->getBy('name',$f->get('name'))){
    			$f->displayError('name','Name is already used by another add-on');
    		}
    		$f->update()->js()->univ()->location($this->api->url('..'))->execute();
    	}

    	$c=$cc->addColumn(6);
    	$c->add('P')->set('Reserve name for your addon before you start developing it. This way 
    		noone else can make use of your add-on name while it is in development. Names are unique.');

    	$c->add('P')->set('If you wish to make money with your add-on you can specify per-download cost.
    		Users will require to pay before they get to download your add-on.');

    	$c->add('P')->set('If your add-on\'s source is closed, you must be owner of a Multi-Site license.');

    	$c->add('P')->set('30% of the cost will be deducted as a processing fee, the rest of sales will
    		be deposited into your paypal account on a monthly basis');
    }
}

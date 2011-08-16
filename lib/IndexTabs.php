<?php
class IndexTabs extends View {
	function init(){
		parent::init();

		// This will make sure content we add here will pass our current setting along
		$this->api->stickyGET($this->name);

		$this->api->template->set('link_comparison',$u=$this->api->getDestinationURL(null,array($this->name=>null)));
		$this->api->template->set('link_example',$u=$this->api->getDestinationURL(null,array($this->name=>'example')));
		$this->api->template->set('link_tour',$this->api->getDestinationURL('intro'));

		switch($_GET[$this->name]){
			case'example':
				$this->js(true)->_selector('#example')->addClass('current');

				$this->js(true)->_selector('#example')->addClass('current');
				$p=$this;
				$this->add('Doc_Code',null,'example')
					->setDescr(<<<'EOT'
$f=$p->add('Form');
$f->addField('line','name')->validateNotNull();
$f->addField('line','surname');
$f->addSubmit();
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').
	  ' '.$f->get('surname'))->execute();
}
EOT
);

					// Same as above
$f=$p->add('Form',null,'form');
$f->addField('line','name')->validateNotNull();
$f->addField('line','surname');
$f->addButton('Try me')->js('click',$f->js()->submit());
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').' '.$f->get('surname'))->execute();
}

				$this->add('Doc_MoreInfo',null,'link')
					->setName('Where is MVC?')
					->setDescr(<<<'EOT'
<p>Model-View-Controller in Aglie Toolkit is the essential yet optional feature. For simple tasks such as 
greeting user with the form, no MVC is needed. For complex projects, most of the forms will be built
entirely with Models. 
</p>
EOT
);

				break;

			case'tour':
				$this->add('MagicIntro');
				break;

			default:
				$this->js(true)->_selector('#comparison')->addClass('current');
				$this->js(true)->univ()->indexCompareSwitch();
				break;
		}
	}
	function defaultTemplate(){
		switch($_GET[$this->name]){
			case'example':
				return array('view/index/tab_example');
			case'tour':
				return 'Content';
			default:
				return array('view/index/tab_compare');

		}
	}
}

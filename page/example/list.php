<?php
class page_example_list extends Page {

	function init(){
		parent::init();


		$d=dir(dirname(__FILE__));
		$demos=array();

		while (false !== ($entry = $d->read())) {
			if($entry[0]=='.')continue;
			if($entry[0]=='_')continue;
			if(substr($entry,-4)!='.php')continue;
			$entry=substr($entry,0,-4);
			if($entry=='list')continue;
			$demos[]=array(
					'name'=>'<a href="'.$this->api->getDestinationURL('../'.$entry).'">'.$entry.'</a>',
					'link'=>$this->api->getDestinationURL('../'.$entry)->useAbsoluteURL()
					);
		}

		$this->add('H1')->set('Demo Files');

		$this->add('Grid',null,null,array('grid_striped'))
			->addColumn('html','name')
			->addColumn('text','link','Link for you to share')
			->setStaticSource($demos);

	}
}

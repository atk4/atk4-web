<?php
class Doc_Example_Image extends Doc_Example {
	function init(){
		parent::init();

		$this->add('H2')->set('Image Uploading');
		$this->add('P')->set('Image uploading and storing is implemented as additional layer on top of Files and Filestore.
				You will need to have a separate table for Image storage. By default the original image is stored in
				filestore but image is also being resized to the thumbnail size, then stored as a separate file.
				');

		$this->add('P')->set('By using Image class you can tweak the resolution of your thumbnails, then the image would
				be handled completely automatically by the controller.
				');

		$this->add('P')->set('Implementation of Image comes as a Model, Class, View and Form Field. You can further extend
				your image class to add relationship between image and your users for example.
				');


		$this->setCode(<<<'EOD'

$c=$p->add('Controller_Filestore_Image');
$c->addField('sample_file')->datatype('boolean');
$c->setMasterField('sample_file',true);

$c->setMaxResize('thumb', 100,200);

$f=$p->add('Form');
$f->addField('image','upload_image')->setController($c);

$p->add('H4')->set('Previously Uploaded Images');

$c->setActualFields(array('original_filename','filesize'));
$g=$p->add('MVCGrid')->setController($c);

$f->addButton('Refresh')->js('click',$p->js()->reload());

EOD
);


	}
}

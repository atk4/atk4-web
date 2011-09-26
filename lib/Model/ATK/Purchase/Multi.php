<?php
class Model_ATK_Purchase_Multi extends Model_ATK_Purchase {
    function init(){
        parent::init();

        $this->getField('cost')->defaultValue('460')->type('readonly');
        $this->getField('type')->defaultValue('Multi')->system(true);
		$this->getField('domain')->editable(false);

    }
}

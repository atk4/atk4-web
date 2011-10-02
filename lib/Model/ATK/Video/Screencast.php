<?php
class Model_ATK_Video_Screencast extends Model_ATK_Video {
    function init(){
        parent::init();

        $this->setMasterField('type','screencast');

        $this->addField('atk_version')->defaultValue('4.1');
        $this->addField('complexity')->type('list')->listData(array(
                    'Select...',
                    'Intro'=>'Introduction for new users',
                    'Learner'=>'Watch this if you are learning Agile Toolkit',
                    'Extend'=>'Extend your knowledge of Agile Toolkit',
                    ))
                    ;
    }
}

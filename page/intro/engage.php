<?php
class page_intro_engage extends page_intro_generic {
	function init(){
		parent::init();
		$this->api->dbConnect();

		$p=$this->add('Doc_View');

		$p->add('H1')->set('Next Steps');

		$p->add('Quote')->set('
                The more I\'m seeing about agiletoolkit the more I\'m liking what I see! Will be spending some time with it -
                looks quite promising for future developments!
				');

		$p->add('P')->set('
				Agile Toolkit is set out to change the web development. Think about it — it\'s simpler, affordable, promotes
                open-source and supports commercial projects. It combines best practices of back-end and front-end
                development. It uses second most popular programming language in the world.
				');

		$p->add('P')->set('
                Contribute by spreading the word about Agile Toolkit. Watch out for new releases and documentation updates.
				');


        $p=$this->add('HtmlElement')->addClass('box metallic');
        $p->add('H2')->set('Lets get intimate!');

        $f=$p->add('Form');

        // Prepare hint
        $this->hint=$f->add('Hint',null,'hint')
            ->set('Field-related information will appear here');
        $this->hint->js(true)->css(array('float'=>'right','width'=>'300px'));

		$f->addField('line','email','email')
            ->setFieldHint('&nbsp; optional')
            ->js('focus',$this->showHint('Newsletter Subscription','We would like to ocassionally send you newsletter
                        containing Agile Toolkit security
                        updates, new feature highlights and other important information.'));

		$f->addField('line','name','Full Name')
            ->setFieldHint('&nbsp; optional')
            ->js('focus',$this->showHint('Your Full Name','Knowing your name will help us to properly address you in the
                        newsletters.
                        '));

		$f->addField('dropdown','interest','Your Interest')
            ->setValueList(array(
                        'dev'=>'Developer',
                        'busines'=>'Business Owner',
                        'journalist'=>'Journalist',
                        'other'=>'Other',
                        ))
            ->js('focus',$this->showHint('What is your interest in Agile Toolkit?','
                        Knowing your interest will help us to choose the right lingo and update type
                        '));

		$f->addField('slider','booring','Impact')
            ->setLabels('Lifechanging','Minor')
            ->js('change',$this->showHint('Is Agile Toolkit a big deal?','
                        Do you think that approach used in Agile Toolkit could become big?
                        '));

		$f->addField('checkbox','proj','try Agile Toolkit in your next project?')
            ->js('change',$this->showHint('Learning Agile Toolkit is exciting!',
                        'It takes 1-3 weeks to master Agile Toolkit. Would you like to give Agile Toolkit a try in your next
                        project?
                        '));

		$f->addField('radio','proj','Decision maker')
            ->setValueList(array(
                        'me'=>'myself',
                        'boss'=>'someone else',
                        ))
            ->js('change',$this->showHint('Who is the decision maker?',
                        'Are you free to decide which framework to use or will you need to convince someone else to try Agile
                        Toolkit?
                        '));

        $f->addSeparator('');
		$f->addField('checkbox','subscribe','subscribe to Agile Toolkit newsletter')
            ->set(true);
		$f->addField('checkbox','download','download Open-Source version of Agile Toolkit');

        $f->addSubmit('Proceed');

	}
    function showHint($hdr,$txt){
        return 
            $this->hint->js(null,
                    $this->hint->js()->find('b')->text($hdr)
                    )->find('p')->text($txt);
    }
}

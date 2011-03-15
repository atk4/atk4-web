<?php
class Doc_Filestore_File extends Doc_Class {
	function init(){
		parent::init();
		$this->set('descr','
				DBlite class will allow your application to interact with SQL database. To define, which database type should
				be used (MySQL, PostrgreSQL, etc) as well as provide database access information, you need to supply DSN
				(Database Source Name).	Typically [DSN is supplied in configuration file].

				In typical applications you do not need to use DBlite class directly. Use [$api->dbConnect()] to establish
				connection automatically. This will ceate DBlite object, which will be accessible through $api->db property.

				It is strongly advised to used [DSQL class] for any database interactions. However, should you require direct
				database access, you may use DBlite directly.

				Finally - you can establish multiple connections to multiple databases by creating additional instances
				of DBlite.
				');
	}
}

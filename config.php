<?php
	return [
		'database'=>[
			'name' =>'shop',
			'username'=>'root',
			'password'=>'hieuthao',
			'connection'=>'mysql:host=127.0.0.1',
			'options'=>[
				PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
			]
		]
	];
?>
<?php
	return array(
		'login'		=>	'account/login',
		'register'		=>	'account/register',
		
		'asave/([0-9]+)/([0-9]+)'		=>	'admin/asave/$1/$2',
		'bad/([0-9]+)'		=>	'admin/bad/$1',
		'good/([0-9]+)'		=>	'admin/good/$1',
		'admin/([0-9]+)'		=>	'admin/application/$1',
		'admin/logout'		=>	'admin/logout',
		'admin'		=>	'admin/index',
		
		'save/([0-9]+)/([0-9]+)'		=>	'user/save/$1/$2',
		'application/([0-9]+)'		=>	'user/application/$1',
		'application'		=>	'user/create',
		'user/logout'		=>	'user/logout',
		'user'		=>	'user/index',
		''			=>	'user/index',
	);
<?php

DEFINE("PHP_REDMINE_API_ROOT", getcwd());
spl_autoload_register(function($class){
	$args = explode('\\', strtolower($class));
	if(sizeof($args) > 2 && $args[0] == "jsanahuja" && $args[1] == "redmine"){
		array_shift($args);
		require_once(PHP_REDMINE_API_ROOT .'/'. implode('\\', $args) .'.php');
	}else{
		print_r($args);
	}
});

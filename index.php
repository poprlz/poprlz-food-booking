<?php
include dirname(__FILE__).'/protected/config/common.conf.php';
include dirname(__FILE__).'/protected/config/routes.conf.php';
include dirname(__FILE__).'/protected/config/db.conf.php';

#Just include this for production mode
//include $config['BASE_PATH'].'deployment/deploy.php';
include $config['BASE_PATH'].'Doo.php';
include $config['BASE_PATH'].'app/DooConfig.php';

# Uncomment for auto loading the framework classes.
//spl_autoload_register('Doo::autoload');

Doo::conf()->set($config);

# remove this if you wish to see the normal PHP error view.
include $config['BASE_PATH'].'diagnostic/debug.php';

# database usage
//Doo::useDbReplicate();	#for db replication master-slave usage
Doo::db()->setMap($dbmap);
Doo::db()->setDb($dbconfig, $config['APP_MODE']);
Doo::db()->sql_tracking = true;	#for debugging/profiling purpose

Doo::app()->route = $route;

# Uncomment for DB profiling
//Doo::logger()->beginDbProfile('poprlz');
Doo::app()->run();
//Doo::logger()->endDbProfile('poprlz');
//Doo::logger()->rotateFile(20);
//Doo::logger()->writeDbProfiles();

Doo::logger()->writeLogs("log_".date('Ymd_His',time()).".txt",false);
?>
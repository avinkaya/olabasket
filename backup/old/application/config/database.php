<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group 			= 'default';
$active_record 			= TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'ismpl_production';
$db['default']['password'] = 'ismpl_production';
$db['default']['database'] = 'ismpl_production';

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = APPPATH . 'cache';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */

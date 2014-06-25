<?php
(!defined('STS')?header('location: ../'):Null);



/** Start Editing Here **/


###### Page Title ######
$pt = 'Simulation';

###### Debug Mode ######
$db = false;














/** Don't edit bellow **/


include_once('includes/class.math.php');
$math = new math();
define('WEBSITETITLE', $pt);
define('SESSIONDEBUG', $db);
?>
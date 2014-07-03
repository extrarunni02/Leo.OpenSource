
<?php 
  // Hi, Jack!
  date_default_timezone_set("Europe/Moscow");
  header('Content-type: text/html; charset=utf-8');
  define('root', dirname(__FILE__));
  require_once(root . '/bin/core.php');
 
  $core = new PNix();


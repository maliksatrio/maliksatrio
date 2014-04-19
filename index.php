<?php
error_reporting(E_ALL);

/* Nama folder aplikasi */
$application_folder = 'application';

/* Ganti pemisah direktori pada unix untuk konsistensi  */
define('ROOT', str_replace("\\", "/", realpath(dirname(__FILE__))) . '/');

/* Menentukan BASEPATH sebagai root aplikasi */
define('BASEPATH', ROOT . $application_folder . '/');

/* Awal output buffering */
ob_start();

session_start();

/* Menjalankan program melalui router */
require BASEPATH . 'core/router.php';
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
$router = new Router();
$router->do_request();



/* Akhir output buffering */
@ob_end_flush();

/* Tampilan Error */
function show_error($message = '') {
  ob_end_clean();
  $error = '<html><head><title>Error</title>';
  $error .= '<style type="text/css">';
  $error .= '#error {margin: 30px auto; width: 600px; '.
            ' padding: 10px; '.
            ' background: #404040; color: white ; text-align: center; box-shadow:0 0 12px 12px;}';
  $error .= '</style>';
  $error .= '</head><body><div id="error">';
  if($message == '') {
    $message = '<b>404 - Page not found!</b>';
  }
  $error .= $message;
  $error .= '</div></body></html>';
  exit ($error);
}

/* Akhir file index.php */
/* Lokasi: ./index.php */
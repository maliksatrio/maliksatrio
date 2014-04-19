<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller {
  protected $load;
  protected $mcrypt;
  protected $model;
  protected $Rs;
  private static $instance;
  public $config;
  
  public function __construct() {
    self::$instance = $this;
    
    require_once BASEPATH . 'core/loader.php';
    require_once BASEPATH . 'core/config.php';
    require_once BASEPATH . 'core/model.php';
    require_once BASEPATH . 'lib/Excel/PHPExcel.php';
    require_once BASEPATH . 'lib/Encrypt/MCrypt.php';
    
    $this->mcrypt=new MCrypt();
    $this->model = new Model();
    $this->load = new Loader();
    $this->config = new Config();
    $objExcel = new PHPExcel();
    
   
    
	if(!$this->config->item('site_open')) {
		show_error('Maaf, web ini sedang dalam perbaikan.');
    }
    if($this->config->item('use_database')) {
		//$this->load_db();
    }
    
  }

  public static function &get_instance() {
	return self::$instance;
  }
  function load_db() {
	include BASEPATH.'core/database.php';
	$this->Rs = new Database();
  }
}

function &get_instance() {
  return Controller::get_instance();
}

function base_url($clear = true) {
  $CI =& Controller::get_instance();
  if($clear) {
    return $CI->config->item('base_url');
  }
    return $CI->config->item('base_url') . 'index.php/';
}
function base_name(){
    return str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
}




function redirect($uri = '', $method = 'location', $http_response_code = 302) {
  if ( ! preg_match('#^https?://#i', $uri)) {
      $uri = site_url($uri);
  }

  switch($method) {
      case 'refresh'	: header("Refresh:0;url=".$uri);
          break;
      default			: header("Location: ".$uri, TRUE, $http_response_code);
          break;
  }
  exit;
}

/* Akhir file controller.php */
/* Lokasi: ./controller.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Loader {
  protected $mcrypt;
  public function __construct() {
    require_once BASEPATH . 'lib/Encrypt/MCrypt.php';
    
    $this->mcrypt=new MCrypt();  
  }

  public function view($view, $var = '') {
    @ob_start();
    if(is_array($var)) {
      $the_vars = extract($var);
    }
    include BASEPATH.'views/'.$view.'.php';
	
    @ob_end_flush();
  }
  public function layout($view, $var = '') {
    @ob_start();
    if(is_array($var)) {
      $the_vars = extract($var);
    }
    include BASEPATH.'views/layout/'.$view.'.php';
	
    @ob_end_flush();
  }

  public function model($model, $name = '') {
    /* Mengambil instance */
    $CI =& get_instance();
    /* Cek apakah name kosong, menggunakan name model */
    if($name == '') {
      $name = strtolower($model);
    }
    /* Jika name ada, tampilkan pesan error */
    if(isset ($CI->$name)) {
      show_error('Error - model name "'. $name .'" is already defined');
    } else {
      $filename = BASEPATH.'models/'.strtolower($model).'.php';
      if(file_exists($filename)) {
        require_once BASEPATH.'core/model.php';
        require_once $filename;
        $model = ucfirst(strtolower($model));
        $CI->$name = new $model();
      } else {
        show_error('Error - Model file "'. $name .'" could not be found');
      }
    }
  }

  public function library($lib, $name = '') {
    /* Mengambil instance */
    $CI =& get_instance();
    /* Cek apakah name kosong, menggunakan name model */
    if($name == '') {
      $name = strtolower($lib);
    }
    /* Jika name ada, tampilkan pesan error */
    if(isset ($CI->$name)) {
      show_error('Error - library name "'. $name .'" is already defined');
    } else {
      $lib = ucfirst(strtolower($lib));
      $filename = BASEPATH.'libraries/'.$lib.'.php';
      if(file_exists($filename)) {
        require_once $filename;
        $CI->$name = new $lib();
      } else {
        show_error('Error - Model file "'. $name .'" could not be found');
      }
    }
  }
}

/* Akhir file loader.php */
/* Lokasi: ./loader.php */
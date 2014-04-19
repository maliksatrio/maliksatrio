<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *--------------------
 *Create By : [Malik]
 *--------------------
 *
 */
class Database {
    public static $db_config;
    public static $db_conn;
    private $result;
    
    public function __construct() {
        
    }
  

    public function connect($config_name = 'default') {
        require BASEPATH.'config/database.php';
        self::$db_config = $db[$config_name];
        self::$db_conn = mysql_connect(self::$db_config['hostname'],self::$db_config['username']);	
        if(self::$db_conn) {
            mysql_select_db(self::$db_config['databasename']);
            return TRUE;
        }
        show_error('[Connection Error] <br/> '."[HOST=".self::$db_config['hostname']."]<br/> 
                                                [PORT=".self::$db_config['port']."]<br/>
                                                [DBNAME=".self::$db_config['databasename']."]<br/>
                                                [USER=".self::$db_config['username']."]<br/>
                                                [PASSWORD=".self::$db_config['password']."]");
    }
    
   
    public function disconnect() {
        if(mysql_close(self::$db_conn)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }  
}

/* Akhir file database.php */
/* Lokasi: ./database.php */
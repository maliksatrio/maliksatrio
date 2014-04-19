<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model {
  protected $db;
  protected $_result;
  protected $_table;

  function __construct($table = '') {
    //$this->db =& Database::handler();
    require_once BASEPATH . 'core/database.php';
    $this->db=new Database;
    if($table == '') {
      $table = strtolower(get_class($this));
    }
    $this->_table = $table;
  }
  function selectAll($table_name,$where='',$show=1) {
    $sQuerySelect="SELECT * 
                   FROM $table_name ".
                   $where;  
    //echo '</br>'.$sQuerySelect;                       
    if ($result=$this->Open($sQuerySelect)){
        if ($show==1){
            $row = mysql_fetch_array($result);
            return $row;    
        }elseif ($show==2){
            return $result;
        }
            
    }else{
        return false;
    }
    
  }
    function Open ($query) {
        //$this->db->connect();
        $this->db->connect();
    	$result=mysql_query($query);
        
    	if ($result){
            $this->db->disconnect();
    		return $result;
    	}else{
    	    $this->db->disconnect();
    		show_error('Error Query : ['.$query.']');
    	}
    }
    
    function RecordCount($result){
        if (mysql_num_rows($result)){
            return mysql_num_rows($result);
        }else{
            show_error('Error Result : [ '.$result.' ]');
        }
    }
    
    function QueryInsert($table,$data){
        $str = "INSERT INTO $table ";
        $strn = "(";
        $strv = " VALUES (";
        while(list($name,$value) = each($data)) {
            if(is_bool($value)) {
                $strn .= "$name,";
                $strv .= ($value ? "true":"false") . ",";
                continue;
            }
            
            if(is_string($value)) {
                $strn .= "$name,";
                $strv .= "'$value',";
                continue;
            }
            
            if(is_numeric($value)) {
                $strn .= "$name,";
                $strv .= "$value,";
                continue;
            }
            
            if (!is_null($value) and ($value != "")) {
                $strn .= "$name,";
                $strv .= "$value,";
                continue;
            }
            
        }
        $strn[strlen($strn)-1] = ')';
        $strv[strlen($strv)-1] = ')';
        $str .= $strn . $strv;
        return $str;
    }
    function QueryUpdate($table,$array,$where)
    {
    
       $str = "UPDATE $table ";
       $strn = "SET ";
       while(list($name,$value) = each($array)) {
    
           if(is_bool($value)) {
                    $strn .= "$name,";
                    continue;
            };
    
           if(is_string($value)) {
                    $strn .= " $name = '$value',";
                    continue;
            }
            if(is_numeric($value)) {
                    $strn .= " $name = $value,";
                    continue;
            }
           if (!is_null($value) and ($value != "")) {
                    $strn .= "$name,";
                    continue;
           }
       }
       
       $strn=substr($strn,0,-1);
       
       $str .= $strn ." ". $where;
       echo $str;
       return $str;
    
    }
    function QuerySelect($select){
        $str='';
        while(list($name,$value)=each($select)){
            $str .=  $name ." ". $value." ";
        }
        return $str;
    }
    function cWhere($where='',$value){
        $where .= ($where==''?" WHERE ":" AND ") .$value;    
        return $where;
    }
    function GetWhere($field,$operator,$value1,$value2,$where,$status=''){
        $operator= strtoupper($operator);
        $status=strtolower($status);
        if ($status==''){
            if ($operator=="="){
                if (is_string($value1)) {
                    $where .= ($where==''?" ":" AND ") ." $field  $operator  '$value1'";    
                }elseif (is_numeric($value1)){
                    $where .= ($where==''?" ":" AND ") ." $field  $operator  $value1";
                }
            }elseif ($operator=="LIKE"){
                $where .= ($where==''?" ":" AND ") ." $field  $operator  '%$value1%'";
            }elseif ($operator=="IN"){
                $where .= ($where==''?" ":" AND ") ." $field  $operator  ($value1)";
            }elseif ($operator=="BETWEEN"){
                $where .= ($where==''?" ":" AND ") ." $field  $operator  $value1 AND $value2 ";
            }elseif ($operator=="GROUP BY"){
                $where .= " $operator $field ";
            }elseif ($operator=="ORDER BY"){
                $where .= " $operator $field ";
            }  
        }elseif ($status!=''){
            if ($operator=="="){
                if (is_string($value1)) {
                    $where .= ($where==''?" ":" AND ") ." $status($field)  $operator  $status('$value1')";    
                }elseif (is_numeric($value1)){
                    $where .= ($where==''?" ":" AND ") ." $field  $operator  $value1";
                }
            }elseif ($operator=="LIKE"){
                $where .= ($where==''?" ":" AND ") ." $status($field)  $operator  $status('%$value1%')";
            }elseif ($operator=="IN"){
                $where .= ($where==''?" ":" AND ") ." $field  $operator  ($value1)";
            }elseif ($operator=="BETWEEN"){
                $where .= ($where==''?" ":" AND ") ." $field  $operator  $value1 AND $value2 ";
            }elseif ($operator=="GROUP BY"){
                $where .= " $operator $field ";
            }elseif ($operator=="ORDER BY"){
                $where .= " $operator $field ";
            }            
        }
        
        return $where;
    }
    
}

/* Akhir file model.php */
/* Lokasi: ./model.php */
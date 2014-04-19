<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends Model {
    
    

    function __construct()
    {
        
        parent::__construct();
    }
    function getAccount($fWhere='',$show=1){
        (!empty($fWhere))?$where=$this->cWhere('',$fWhere):$where='';
        return $this->selectAll('tbllogin',$where,$show);
    }
    
    
    
    function bLogin($username,$password)
    {
        $where="";
        $where=$this->cWhere($where,"username='$username'");
        $where=$this->cWhere($where,"password='$password'");
        return $this->selectAll('tbllogin',$where);
    }
    
    
    function hstLogin($ip_login,$status_login,$id_username){
        $insert['ip_login']=$ip_login;
        $insert['status_login']=$status_login;
        $insert['id_username']=$id_username;
        $this->Open($this->QueryInsert('tbllogin_hst',$insert));
    }
    
    function sumHstLogin($status_login=''){
        (!empty($status_login))?$where=$this->cWhere('',"status_login='$status_login'"):$where='';    
        $this->cWhere($where,"date_login=now()"); 
        $sQuerySelect="SELECT count(id) AS jml
                       FROM tbllogin_hst".
                       $where
                       ;
        if ($result=$this->Open($sQuerySelect)){
            $row = mysql_fetch_array($result);
            return $row['jml'];    
        }else{
            return false;
        }
        
    }
    function insertAccount($insert){
        $this->Open($this->QueryInsert('tbllogin',$insert));
        return true;
    }
    function updatetAccount($update,$where=''){
        $this->Open($this->QueryUpdate('tbllogin',$update,$where));
        return true;
    }

   
    
}
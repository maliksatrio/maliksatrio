<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller {
  
  
   
  public function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    if (isset($_SESSION['LoginSession'])){
        $getdata=$_SESSION['LoginSession'];
        ($getdata['hasil'])?redirect(base_url()."admin"):FALSE;    
    }
       
    
  }
  
  function index() {
    $this->index_login();
  }
  function index_login(){
    $data['title']="Login - Website";
    $data['info_login']=isset($_SESSION['info_login'])?$_SESSION['info_login']:false;
    session_unset(isset($_SESSION['info_login'])?$_SESSION['info_login']:false);
    $this->load->view('v_login',$data);
  }
  function cmd_login(){
    $username=$_POST['txt_username'];
    $password=$_POST['txt_password'];
    $password=$this->mcrypt->encrypt($password);
    
    if ($row=$this->m_login->bLogin($username,$password)){
        
        $this->m_login->hstLogin($_SERVER['REMOTE_ADDR'],1,$row['id']);
        $data['hasil']=true;
        $data['row']=$row;
        $_SESSION['LoginSession']=$data;
        redirect(base_url()."admin");
    }else{
        $_SESSION['info_login']='Wrong Username or Password';
        $this->m_login->hstLogin($_SERVER['REMOTE_ADDR'],2,0);
        redirect(base_url()."login");
    }
    
  }
  
  
}
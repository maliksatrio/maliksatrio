<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Controller {
  
  
  private $row;

  public function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_level");
    if (isset($_SESSION['LoginSession'])){
        $getdata=$_SESSION['LoginSession'];
        $this->row=$getdata['row'];
        ($getdata['hasil'])?false:redirect(base_url()); 
    }else{
        redirect(base_url());  
    }
        
    
  }
  
  function index() {  
    //var_dump($this->row);
    $this->dashboard();
  }
  function not_content(){
    $data['nama']=$this->row['nama_lengkap'];
    $data['dir_avatar']=$this->row['dir_avatar'];
    
    $data['header_title']="Screet Room";
    $row_ket_level=$this->m_level->idGetLevel($this->row['id_level']);
    $data['keterangan_level']=$row_ket_level['keterangan_level'];
    $data['row_level']=$this->m_level->GetLevel(1);
    return $data;
  }
  
  /* dashboard */
  function dashboard(){
    $data['nc']=$this->not_content();
    $data['total_login']=$this->m_login->sumHstLogin();
    $data['total_login_succ']=$this->m_login->sumHstLogin(1);
    $data['total_login_fail']=$this->m_login->sumHstLogin(2);
    $data['title']="Dashboard";
    $data['sub_title']="website information";
    $data['content']='content_dashboard';    
    $this->load->view('v_admin',$data);
  }
  /* dashboard */
  /* account */
  function account($level,$status,$id=''){
    $data['nc']=$this->not_content();
    $row_id_level=$this->m_level->ketGetLevel($level);
    switch($status){
        case 'view':
            $data['row_login']=$this->m_login->getAccount("id_level="."'".$row_id_level['id']."'",2);
            break; 
        case 'update':
            $data['row_login_update']=$this->m_login->getAccount("id='".$this->mcrypt->decrypt($id)."'");
            break;           
        
    }
    
    $data['title']=ucwords($status)." Account";
    $data['sub_title']=ucwords($status)." ".$level." Account";
    $data['id_level_account']=$row_id_level['id'];
    $data['level']=$level;
    $data['status']=$status;
    $data['content']='user/content_'.$status;  
    $this->load->view('v_admin',$data); 
  }
  
  function action_account($status,$id_level,$update_status,$id){
    switch($status){
        case 'new':
            $insert['username']=$_POST['username'];
            $insert['password']=$this->mcrypt->encrypt($_POST['pass']);
            $insert['nama_lengkap']=$_POST['nama_lengkap'];
            $insert['id_level']=$this->mcrypt->decrypt($id_level);
            $insert['dir_avatar']=$_POST['dir_path'];
            $this->m_login->insertAccount($insert);
            redirect($_SERVER['HTTP_REFERER']);
            break;
        case "update";
            switch($update_status){
                case "personalinformation":
                    $update['nama_lengkap']=$_POST['nama_lengkap'];
                    $update['dir_avatar']=$_POST['dir_path'];
                    $where=$this->model->cWhere('','id='.$this->mcrypt->decrypt($id));
                    $this->m_login->updatetAccount($update,$where);
                    redirect($_SERVER['HTTP_REFERER']);                
            }
            
    }
    
  }
  
  /* account */
  
  
  /* logout */
  function logout(){
    session_destroy();
    redirect(base_url());
  }
  /* logout */
  
  
  
}
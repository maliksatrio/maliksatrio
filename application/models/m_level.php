<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_level extends Model {
    function __construct()
    {
        
        parent::__construct();
    }
    function getLevel($status_level=''){
        (!empty($status_level))?$where=$this->cWhere('',"status_level='$status_level'"):$where='';
        return $this->selectAll('tbllevel',$where,2);
    }
    function idGetLevel($id=''){
        (!empty($id))?$where=$this->cWhere('',"id=$id"):$where='';
        return $this->selectAll('tbllevel',$where);
    }
    function ketGetLevel($keterangan=''){
        (!empty($keterangan))?$where=$this->cWhere('',"keterangan_level='$keterangan'"):$where='';
        return $this->selectAll('tbllevel',$where);
    }
}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
 
        public function fetch_user_login($username,$password)
        {
                $this->db->where('a_username',$username);
                $this->db->where('a_password',$password);
                $query = $this->db->get('admin');
                return $query->row();
        }
        public function list_all()
        {   
                $query = $this->db->get('admin');
                return $query->result();
        }
        public function insert_admin()
	{
		$data = array(
                'a_name' => $this->input->post('a_name'),
                'a_username' => $this->input->post('a_username'),
                'a_password' => sha1($this->input->post('a_password'))
                );
                $query=$this->db->insert('admin',$data);
	}
 
 
//show form edit
	 public function read($id){
                $this->db->where('id',$id);
                $query = $this->db->get('admin');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
    public function update_admin()
        {
                $data = array(
                    'a_name' => $this->input->post('a_name'),
                    'a_status' => $this->input->post('a_status')
                );
                $this->db->where('id', $this->input->post('id'));
                $query=$this->db->update('admin',$data);
        }
 
 
        public function update_pwd_admin()
        {
                $data = array(
                    'a_password' => sha1($this->input->post('admin_pwd1'))
                );
                $this->db->where('id', $this->input->post('id'));
                $query=$this->db->update('admin',$data);
        }
 
 
        public function del_admin($id)
        {
               $this->db->delete('admin',array('id'=>$id));
 
        }
 
 
}
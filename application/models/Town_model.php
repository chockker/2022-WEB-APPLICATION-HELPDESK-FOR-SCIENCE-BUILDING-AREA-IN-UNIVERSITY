<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Town_model extends CI_Model {
    public function read_town_all ()
    {
        $query = $this->db->get('town');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
    }
    public function insert_town ()
    {
        $data = array(
          't_num' =>$this->input->post('t_num'),
          't_name' =>$this->input->post('t_name'),
          't_fl_amt' =>$this->input->post('t_fl_amt')
        );
        $query=$this->db->insert('town',$data);
    }
    //show form town_edit
	public function read($t_id)
    {
        $this->db->where('t_id',$t_id);
        $query = $this->db->get('town');
        if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
        }
        return FALSE;
    }
    public function update_town()
    {
                $data = array(
                    't_num' => $this->input->post('t_num'),
                    't_name' => $this->input->post('t_name'),
                    't_fl_amt' => $this->input->post('t_fl_amt')
                );
                $this->db->where('t_id', $this->input->post('t_id'));
                $query=$this->db->update('town',$data);
    }
    public function del_town($t_id)
    {
               $this->db->delete('town',array('t_id'=>$t_id));
               $this->db->query('ALTER TABLE town AUTO_INCREMENT 1');
 
    }
    
}
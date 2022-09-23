<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Jobs_model extends CI_Model {
    public function read_jobs_all ()
    {
        $query = $this->db->get('job_type');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
    }
    public function insert_jobs ()
    {
        $data = array(
          'j_name' =>$this->input->post('j_name')
        );
        $query=$this->db->insert('job_type',$data);
    }
    //show form jobstype_edit
	 public function read($j_id)
     {
        $this->db->where('j_id',$j_id);
        $query = $this->db->get('job_type');
        if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
        }
        return FALSE;
    }
    public function update_jobs_type()
        {
                $data = array(
                    'j_name' => $this->input->post('j_name'),
                );
                $this->db->where('j_id', $this->input->post('j_id'));
                $query=$this->db->update('job_type',$data);
        }
    public function del_jobs($j_id)
        {
               $this->db->delete('job_type',array('j_id'=>$j_id));
               $this->db->query('ALTER TABLE job_type AUTO_INCREMENT 1');
        }
}

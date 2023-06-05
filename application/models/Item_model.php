<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Item_model extends CI_Model {
    //query floor_all
    public function read_item_all($r_name)
    {
        $this->db->where('i_address',$r_name);
        $query = $this->db->get('item');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
    }
    public function item_all()
    {
        $query = $this->db->get('item');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
    }
    public function insert_item()
	{
		$data = array(
                'i_codename' => $this->input->post('i_codename'),
                'i_name' => $this->input->post('i_name'),
                'i_type' => $this->input->post('j_name'),
                'town' => $this->input->post('t_num'),
                'i_address' => $this->input->post('r_name'),
                'i_remark' => $this->input->post('i_remark')
                );
                $query=$this->db->insert('item',$data);
	}
    public function read_detail($i_id)
    {
                $this->db->where('i_id',$i_id);
                $query = $this->db->get('item');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
    }
    public function read_town_floor($town,$floor)
    {
                $this->db->where('floor',$floor);
                $this->db->where('town',$town);
                $query = $this->db->get('item');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
    }
    public function update_item()
    {
        $data = array(
            'i_codename' => $this->input->post('i_codename'),
            'i_name' => $this->input->post('i_name'),
            'i_type' => $this->input->post('j_name'),
            'town' => $this->input->post('t_num'),
            'i_address' => $this->input->post('r_name'),
            'i_remark' => $this->input->post('i_remark')
            );
            $this->db->where('i_id', $this->input->post('i_id'));
            $query=$this->db->update('item',$data);
 
    }
    public function del_item($i_id)
    {
            $this->db->delete('item',array('i_id'=>$i_id));
            $this->db->query('ALTER TABLE item AUTO_INCREMENT 1');
    }
}
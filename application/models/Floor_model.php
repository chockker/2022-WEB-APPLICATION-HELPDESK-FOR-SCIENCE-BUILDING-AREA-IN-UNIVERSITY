<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Floor_model extends CI_Model {
    //query floor_all
    public function read_floor_all ()
    {
        $query = $this->db->get('floor');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
    }
    // query floor_detail_all
    public function read_floor_list ()
    {
        $query = $this->db->get('floor_detail');
        return $query->result();
    }
    public function insert_floor_detail()
	{
        $filename = $this->upload->file_name;
		$data = array(
                'fld_name' => $this->input->post('fld_name'),
                'floor' => $this->input->post('floor'),
                'town' => $this->input->post('town'),
                'fld_img' => $filename

        );
        $this->db->insert('floor_detail',$data);
	}
    public function read_detail($fld_id)
    {
                $this->db->where('fld_id',$fld_id);
                $query = $this->db->get('floor_detail');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
    }

    public function read_detail_by_town($t_num)
    { 
                $this->db->where('town',$t_num);
                $query = $this->db->get('floor_detail');
                return $query->result();
    }
    public function read_detail_by_town_add($t_num)
    { 
                $this->db->where('town',$t_num);
                $query = $this->db->get('floor_detail');
                return $query->result();
    }

    public function update_floor_detail()
    {
            $filename = $this->upload->file_name;
            $data = array(
                'fld_name' => $this->input->post('fld_name'),
                'floor' => $this->input->post('floor'),
                'town' => $this->input->post('town'),
                'fld_img' => $filename
            );
            $this->db->where('fld_id', $this->input->post('fld_id'));
            $query=$this->db->update('floor_detail',$data);
    }
    public function del_floor_detail($fld_id)
    {
            $this->db->delete('floor_detail',array('fld_id'=>$fld_id));
            $this->db->query('ALTER TABLE floor_detail AUTO_INCREMENT 1');

    }
    public function read_flplan($town,$floor)
    {
                $this->db->where('floor',$floor);
                $this->db->where('town',$town);
                $query = $this->db->get('floor_detail');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
    }
}
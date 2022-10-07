<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Room_model extends CI_Model {
    
    public function read_room_all($town,$floor)
    {
        $this->db->where('town',$town);
        $this->db->where('floor',$floor);
        $query = $this->db->get('room');
        return $query->result();
    }
    public function read_town_floor($town,$floor)
    {
        $this->db->where('town',$town);
        $this->db->where('floor',$floor);
        $query = $this->db->get('room');
        if($query->num_rows() > 0){
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }
    public function room_all()
    {
        $query = $this->db->get('room');
        return $query->result();
    }
    public function insert_room()
    {
        $data = array(
                'r_name' => $this->input->post('r_name'),
                'r_type' => $this->input->post('r_type'),
                'floor' => $this->input->post('floor'),
                'town' => $this->input->post('town'),
        );
        $this->db->insert('room',$data);
    }
    public function read_detail($r_id)
    {
                $this->db->where('r_id',$r_id);
                $query = $this->db->get('room');
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
    }
    public function update_room()
    {
            $data = array(
                'r_name' => $this->input->post('r_name'),
                'r_type' => $this->input->post('r_type'),
                'floor' => $this->input->post('floor'),
                'town' => $this->input->post('town'),
            );
            $this->db->where('r_id', $this->input->post('r_id'));
            $query=$this->db->update('room',$data);
    }
    public function del_room($r_id)
    {
            $this->db->delete('room',array('r_id'=>$r_id));
            $this->db->query('ALTER TABLE room AUTO_INCREMENT 1');

    }
}
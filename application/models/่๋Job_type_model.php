public function get_detail_job($j_id){
                $this->db->select('j.*');
                $this->db->from('job_type j');
                $this->db->where('j.j_id',$j_id);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
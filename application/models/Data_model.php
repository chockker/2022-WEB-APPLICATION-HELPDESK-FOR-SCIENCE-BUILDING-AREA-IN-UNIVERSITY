<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_model extends CI_Model {

        public function all()
        {
                $this->db->from('case_report');
                $this->db->join('item','i_codename = c_item','left');       
                $query = $this->db->get();
                return $query->result();
        }

        public function insert_case()
        {
                $filename = $this->upload->file_name;
                $data = array(
                        'c_name' => $this->input->post('c_name'),
                        'c_type' => $this->input->post('j_name'),
                        'c_town' => $this->input->post('t_num'),
                        'c_room' => $this->input->post('r_name'),
                        'c_item' => $this->input->post('i_codename'),
                        'c_detail' => $this->input->post('c_detail'),
                        'c_img' => $filename

                );
                $this->db->insert('case_report', $data);
        }
        public function lastid($c_name)
                {
                $this->db->select_max('c_id');
                $this->db->from('case_report c');
                $this->db->where('c.c_name',$c_name);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
        public function get_detail($c_id)
        {
                $this->db->select('c.*');
                $this->db->from('case_report c');
                $this->db->where('c.c_id',$c_id);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
        public function update_job()
        {
                //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
                //date_default_timezone_set('Asia/Bangkok');
                //index.php
                //https://www.codexworld.com/how-to/change-timezone-in-codeigniter/
                $data = array(
                    'c_status' => $this->input->post('c_status'),
                    'c_ad_id' => $this->input->post('c_ad_id'),
                    'c_ad_name' => $this->input->post('c_ad_name'),
                    'c_case_update_log' => $this->input->post('c_case_update_log'),
                    'c_case_update' => date('Y-m-d H:i:s')
                );
                $this->db->where('c_id', $this->input->post('c_id'));
                $query=$this->db->update('case_report',$data);
        }
        //count by status 1
        public function status1()
        {
                $this->db->select('c_status, COUNT(c_id) AS totalstatus1');
                $this->db->from('case_report');
                $this->db->where('c_status',1);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
        //count by status 2
        public function status2()
        {
                $this->db->select('c_status, COUNT(c_id) AS totalstatus2');
                $this->db->from('case_report');
                $this->db->where('c_status',2);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
 
        //count by status 3
        public function status3()
        {
                $this->db->select('c_status, COUNT(c_id) AS totalstatus3');
                $this->db->from('case_report');
                $this->db->where('c_status',3);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
 
        //count by status 4
        public function status4()
        {
                $this->db->select('c_status, COUNT(c_id) AS totalstatus4');
                $this->db->from('case_report');
                $this->db->where('c_status',4);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
      //query by status  
        public function by_status($status_id)
        {
            $this->db->where('c_status',$status_id);
            $query = $this->db->get('case_report');
            return $query->result();
        }
        //query count by case_type
        public function countbycasetype()
        {
            $this->db->select('c_type, COUNT(c_id) as casetotal');
            $this->db->group_by('c_type');
            $this->db->order_by('casetotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }     
 
        //query count by status
        public function countbycasestatus()
        {
            $this->db->select('c_status, COUNT(c_id) as statustotal');
            $this->db->group_by('c_status');
            $this->db->order_by('statustotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }
        public function countbyitem()
        {
            $this->db->select('c_item, COUNT(c_id) as itemtotal');
            $this->db->group_by('c_item');
            $this->db->order_by('itemtotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }
        //query by jobstype
        public function by_jobstype($c_type)
        {
            $this->db->where('c_type',$c_type,TRUE);
            $query = $this->db->get('case_report');
            return $query->result();
        }
        public function del_report($c_id)
        {
                
               $this->db->delete('case_report',array('c_id'=>$c_id));
               //$this->db->query('ALTER TABLE case_report AUTO_INCREMENT 1');
        }
        //////////////////////////////////Date find////////////////////////////////////
        public function date_report_query($date_start,$date_end)
        {
                $this->db->from('case_report');
                $this->db->join('item','i_codename = c_item','left'); 
               $this->db->where('DATE (c_date_save) BETWEEN"'.date('Y-m-d',strtotime($date_start)).'" AND"'.date('Y-m-d',strtotime($date_end)).'"');
               $query = $this->db->get();
               return $query->result();
        }
        public function countbyitem2($date_start,$date_end)
        {
            $this->db->select('c_item, COUNT(c_id) as itemtotal');
            $this->db->where('DATE (c_date_save) BETWEEN"'.date('Y-m-d',strtotime($date_start)).'" AND"'.date('Y-m-d',strtotime($date_end)).'"');
            $this->db->group_by('c_item');
            $this->db->order_by('itemtotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }
        public function date_report_chart_1($date_start,$date_end)
        {
                $this->db->select('c_type, COUNT(c_id) as casetotal'); 
                $this->db->where('DATE (c_date_save) BETWEEN"'.date('Y-m-d',strtotime($date_start)).'" AND"'.date('Y-m-d',strtotime($date_end)).'"');
                $this->db->group_by('c_type');
                $this->db->order_by('casetotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
        public function date_report_chart_2($date_start,$date_end)
        {
                $this->db->select('c_status, COUNT(c_id) as statustotal'); 
                $this->db->where('DATE (c_date_save) BETWEEN"'.date('Y-m-d',strtotime($date_start)).'" AND"'.date('Y-m-d',strtotime($date_end)).'"');
                $this->db->group_by('c_status');
                $this->db->order_by('statustotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
        public function date_month_report_query($m_date,$y_date)
        {
                $this->db->from('case_report');
                $this->db->join('item','i_codename = c_item','left'); 
               $this->db->where('MONTH(c_date_save)',$m_date);
               $this->db->where('YEAR(c_date_save)',$y_date);
               $query = $this->db->get();
               return $query->result();
        }
        public function countbyitem3($m_date,$y_date)
        {
            $this->db->select('c_item, COUNT(c_id) as itemtotal');
            $this->db->where('MONTH(c_date_save)',$m_date);
            $this->db->where('YEAR(c_date_save)',$y_date);
            $this->db->group_by('c_item');
            $this->db->order_by('itemtotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }
        public function date_month_report_chart_1($m_date,$y_date)
        {
                $this->db->select('c_type, COUNT(c_id) as casetotal');
                $this->db->where('MONTH(c_date_save)',$m_date);
                $this->db->where('YEAR(c_date_save)',$y_date);
                $this->db->group_by('c_type');
                $this->db->order_by('casetotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
        public function date_month_report_chart_2($m_date,$y_date)
        {
                $this->db->select('c_status, COUNT(c_id) as statustotal');
                $this->db->where('MONTH(c_date_save)',$m_date);
                $this->db->where('YEAR(c_date_save)',$y_date);
                $this->db->group_by('c_status');
                $this->db->order_by('statustotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
        public function date_year_report_query($yy_date)
        {
                $this->db->from('case_report');
                $this->db->join('item','i_codename = c_item','left'); 
               $this->db->where('YEAR(c_date_save)',$yy_date);
               $query = $this->db->get();
               return $query->result();
        }
        public function countbyitem4($yy_date)
        {
            $this->db->select('c_item, COUNT(c_id) as itemtotal');
            $this->db->where('YEAR(c_date_save)',$yy_date);
            $this->db->group_by('c_item');
            $this->db->order_by('itemtotal','desc');
            $query = $this->db->get('case_report');
            return $query->result();
        }
        public function date_year_report_chart_1($yy_date)
        {
                $this->db->select('c_type, COUNT(c_id) as casetotal');
                $this->db->where('YEAR(c_date_save)',$yy_date);
                $this->db->group_by('c_type');
                $this->db->order_by('casetotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
        public function date_year_report_chart_2($yy_date)
        {
                $this->db->select('c_status, COUNT(c_id) as statustotal');
                $this->db->where('YEAR(c_date_save)',$yy_date);
                $this->db->group_by('c_status');
                $this->db->order_by('statustotal','desc');
                $query = $this->db->get('case_report');
                return $query->result();
        }
/////////////////////function for Ajax///////////////////////
        public function getroomOftown($t_num)
        {
                $this->db->where('town',$t_num);
                $room = $this->db->get('room');
                return $room->result();
        }
        public function getitemOfroom($r_name)
        {
                //$this->db->where('town',$towm);
                $this->db->where('i_address',$r_name);
                $item = $this->db->get('item');
                return $item ->result();

        }

/////////////////////function for tech///////////////////////
        public function tnall()
        {
                $this->db->select('*');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $query = $this->db->get();
                return $query->result();
        }
        //count by status 1
        public function tstatus1()
        {
                $this->db->select('c_status, COUNT(cw_id) AS totaltstatus1');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_status',1);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
        //count by status 2
        public function tstatus2()
        {
                $this->db->select('c_status, COUNT(cw_id) AS totaltstatus2');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_status',2);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
 
        //count by status 3
        public function tstatus3()
        {
                $this->db->select('c_status, COUNT(cw_id) AS totaltstatus3');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_status',3);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
 
        //count by status 4
        public function tstatus4()
        {
                $this->db->select('c_status, COUNT(cw_id) AS totaltstatus4');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_status',4);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }
 
      //query by status  
        public function by_status0($status_id)
        {
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_status',$status_id);
                $query = $this->db->get();
                return $query->result();
        }
        //query count by case_type
        public function countbycasetype0()
        {
            $this->db->select('cw_type, COUNT(cw_id) as casetotal0');
            $this->db->group_by('cw_type');
            $this->db->order_by('casetotal0','desc');
            $query = $this->db->get('case_work');
            return $query->result();
        }     
 
        //query count by status
        public function countbycasestatus0()
        {
            $this->db->select('cw_status, COUNT(cw_id) as statustotal0');
            $this->db->group_by('cw_status');
            $this->db->order_by('statustotal0','desc');
            $query = $this->db->get('case_work');
            return $query->result();
        }
        public function t_work_join()
        {
                $this->db->select('*');
                $this->db->from('case_report');
                $this->db->join('case_work','cw_id = c_id','left');
                $query = $this->db->get();
                return $query->result();
        }
        public function insert_tnjob($cw_id)
        {
                $data = array(
                        'cw_id' => $cw_id,
                        'cw_as_name' => $this->input->post('cw_as_name')
                );
                $this->db->insert('case_work', $data);
        }
        public function del_report_work($cw_id)
        {
               $this->db->delete('case_work',array('cw_id'=>$cw_id));
        }
        public function print_report($cw_id)
        {
                $this->db->select('*');
                $this->db->from('case_work');
                $this->db->join('case_report','c_id = cw_id','left');
                $this->db->where('c_id',$cw_id);
                $query = $this->db->get();
                return $query->result();
        }

}


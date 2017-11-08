<?php

class View_assistance_model extends MY_Model{
	public $table = 'view_assistance'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
        public $column_search = array('id','date','hospital','nm','patient',
            'bed','technician','destination','sus','proc','time','start',
            'end','access','site','precaution','maq','or','home_choice',
            'doctor','agreement','note');
        public $column_order = array('id','date','hospital','nm','patient',
            'bed','technician','destination','sus','proc','time','start',
            'end','access','site','precaution','maq','or','home_choice',
            'doctor','agreement','note');
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	public function __construct(){
            parent::__construct();
            $this->timestamps = FALSE;
	}

	var $order = array('id' => 'asc'); // default order

	private function _get_datatables_query($search_value=false, $post_order=false){

            $this->db->from($this->table);
            $i = 0;

            foreach ($this->column_search as $item) // loop column 
            {
                    if($search_value) // if datatable send POST for search
                    {

                            if($i===0){ // first loop
                                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                                    $this->db->like($item, $search_value);
                            }else{
                                    $this->db->or_like($item, $search_value);
                            }

                            if(count($this->column_search) - 1 == $i) //last loop
                                    $this->db->group_end(); //close bracket
                    }
                    $i++;
            }

            if($post_order) // here order processing
            {
                    $this->db->order_by($this->column_order[$post_order['0']['column']], $post_order['0']['dir']);
            } 
            else if(isset($this->order))
            {
                    $order = $this->order;
                    $this->db->order_by(key($order), $order[key($order)]);
            }
	}

	function get_datatables($start=false, $length=false, $search_value=false, $post_order=false, $p_start=false, $p_end=false){
            $this->_get_datatables_query($search_value, $post_order);
            
            if($length != -1)
                $this->db->limit($length, $start);

            $where_arr = array();
            
            if($p_start != false){
                $where_arr['date_off >='] = $p_start." 00:00:00";
            }
            
            if($p_end != false){
                $where_arr['date_off <='] = $p_end." 23:59:59";
            }
            
            $this->db->where($where_arr);
            
            $query = $this->db->get();
//echo $this->db->last_query(); 
            return $query->result();
	}

	function count_filtered($search_value=false, $post_order=false){
            $this->_get_datatables_query($search_value, $post_order);
            $query = $this->db->get();
            return $query->num_rows();
	}

	public function count_all(){
            $this->db->from($this->table);
            return $this->db->count_all_results();
	}

        
}
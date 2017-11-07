<?php

class Assistance_model extends MY_Model
{
	public $table = 'assistance'; // you MUST mention the table name
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

	private function _get_datatables_query(){
		
		$this->db->from($this->table);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if(@$_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(null !== @$_POST['order']) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if(@$_POST['length'] != -1)
		$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

        
}
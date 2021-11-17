<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// membuat class Product
class Product extends CI_Model{
    
    function __construct() {
        $this->proTable = 'products';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }
    
	// membuat fungsi get rows
	// mengambil data product dari database
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // mengembalikan nilai data
        return !empty($result)?$result:false;
    }
    
	// membuat fungsi order dengan mengambil id
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // mengorder items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // mengembalikan data yang diambil
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
	// membuat fungsi insert atau memasukkan data
    public function insertCustomer($data){
		// menambahkan data dan modifikasi data jika tidak termasuk
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
		// memasukkan data customer
        $insert = $this->db->insert($this->custTable, $data);

        // mengembalikan nilai status
        return $insert?$this->db->insert_id():false;
    }
    
	// membuat fungsi memasukkan orderan
    public function insertOrder($data){
		// menambahkan dan modifikasi jika tidak termasuk data
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // memasukkan data order
        $insert = $this->db->insert($this->ordTable, $data);

        // mengembalikan nilai status
        return $insert?$this->db->insert_id():false;
    }
    
	// membuat fungsi insert order
    public function insertOrderItems($data = array()) {
        
        // memasukkan item yang di order
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // mengembalikan nilai status
        return $insert?true:false;
    }
    
}

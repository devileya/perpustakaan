<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keyword_model extends CI_Model
{
    public function get(){
        return $this->db->get('keyword')->result();
    }

    public function insert($data){
        $this->db->insert('keyword', $data);
    }

    public function search($kata_kunci){
        $result =  $this->db->get_where('keyword', array('kata_kunci' => $kata_kunci));
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    }

    public function insert_multiple($data){
        $this->db->insert_batch('keyword', $data);
    }
    function empty_table(){
        return $this->db->empty_table('keyword');
    }
}
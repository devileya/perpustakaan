<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public $table = 'buku';
	public $id    = 'id';
	public $order = 'DESC';

	function __construct() {
		parent::__construct();
	}

	public function get(){
	    $this->db->order_by('no_klas');
	    return $this->db->get($this->table)->result();
    }

	function lists(){
		$this->db->where('nama_buku !=', '');
		$this->db->order_by('nama_buku');
		return $this->db->get($this->table)->result();
	}

	function empty_table(){
	    return $this->db->empty_table('buku');
    }

	public function insert_multiple($data){    
		$this->db->insert_batch('buku', $data);  
	}

	public function simpan($data){
		$this->db->insert('buku', $data);
	}

	public function view($id){
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}

	public function searchs(){
			$q = $this->input->GET('q', TRUE);
			$data = $this->db->query("SELECT * from buku where nama_buku like '%$q%' or kategori like '%$q%' or nama_klasifikasi like '%$q%' or sinopsis like '%$q%'");
		return $data->result();
	}

	public function searchs2(){
		$q = $this->input->GET('q', TRUE);
		$subs = substr($q, 0, 1);
		
		$data = $this->db->query("SELECT nama_klasifikasi, no_klas,LEFT(no_klas,1) AS satu FROM buku where no_kategori = '$q' group by no_klas");
		return $data->result();
	}

	function getkategori($id)
	{
		$this->db->where('nomor_kategori', $id);
		return $this->db->get('kategori')->row()->nama_kategori;
	}

    function getByNoKategori($no_kategori)
    {
        $this->db->where('no_kategori', $no_kategori);
        return $this->db->get($this->table)->result();
    }

    function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    function getByNoKlasifikasi($start, $end)
    {
        $this->db->where('no_klas BETWEEN "'.$start.'" AND "'.$end.'"');
        $this->db->group_by('no_klas');
        return $this->db->get($this->table)->result();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
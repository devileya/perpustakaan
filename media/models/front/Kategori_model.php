<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public $table = 'kategori';
	public $id    = 'id';

	function __construct() {
		parent::__construct();
	}

	function lists(){
		$this->db->order_by('nomor_kategori');
		return $this->db->get($this->table)->result();
	}

	function simpan($data){
		$this->db->insert($this->table, $data);
	}

	function getbyid($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}

	function getbyno($no)
	{
		$this->db->where('nomor_kategori', $no);
		return $this->db->get($this->table)->row();
	}

	function getByNoKategori($no)
	{
		$this->db->where('nomor_kategori', $no);
		return $this->db->get($this->table)->result();
	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

    function getSubKategoriByNoKategori($no_kategori) {
        $result = $this->db->query("SELECT * FROM `subkategori` WHERE id_subkategori IN (SELECT id_subkategori FROM klasifikasi2 WHERE id_kategori = (SELECT id FROM kategori WHERE nomor_kategori = $no_kategori))");
        return $result->result();
    }

}
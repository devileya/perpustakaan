<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klasifikasi_model extends CI_Model {

    public $table = 'klasifikasi2';
    public $id    = 'id';

    function __construct() {
        parent::__construct();
    }

    function lists(){
        $this->db->order_by('no_klasifikasi');
        return $this->db->get($this->table)->result();
    }

    function simpan($data){
        $this->db->insert($this->table, $data);
    }

    function getbyid($id)
    {
        $this->db->where('id_klas', $id);
        return $this->db->get($this->table)->row();
    }

    function getbynoklas($no_klas)
    {
        $this->db->where('no_klasifikasi', $no_klas);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where('id_klas', $id);
        $this->db->update($this->table, $data);
    }

    function hapus($id)
    {
        $this->db->where('id_klas', $id);
        $this->db->delete($this->table);
    }

    function getByNoKategori($no_kategori) {
        $result = $this->db->query("SELECT * FROM klasifikasi2 WHERE id_kategori = (SELECT id FROM kategori WHERE nomor_kategori = $no_kategori)");
        return $result->result();
    }

    function getSubKategoriByNoKategori($no_kategori) {
        $result = $this->db->query("SELECT * FROM `subkategori` WHERE id_subkategori IN (SELECT id_subkategori FROM klasifikasi2 WHERE id_kategori = (SELECT id FROM kategori WHERE nomor_kategori = $no_kategori))");
        return $result->result();
    }

    function getSubKategoriByNoKlasifikasi($no_klasifikasi) {
        $result = $this->db->query("SELECT * FROM `subkategori` WHERE id_subkategori = (SELECT id_subkategori FROM klasifikasi2 WHERE no_klasifikasi = $no_klasifikasi)");
        return $result->row();
    }

    function getByRangeNoKlasifikasi($start, $end)
    {
        $this->db->where('no_klasifikasi BETWEEN '.$start.' AND '.$end.'.99999');
        $this->db->group_by('no_klasifikasi');
        return $this->db->get($this->table)->result();
    }
}
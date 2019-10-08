<?php
/**
 * Created by PhpStorm.
 * User: arif_siregar
 * Date: 06/08/2019
 * Time: 15:29
 */

class Tabel_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    public function get($nama_tabel){
        return $this->db->get($nama_tabel)->result();
    }

    public function searchs($nama_tabel){
        $q = $this->input->GET('q', TRUE);
        $data = $this->db->query("SELECT * from $nama_tabel where no_klas like '%$q%' or keterangan like '%$q%'");
        return $data->result();
    }
}
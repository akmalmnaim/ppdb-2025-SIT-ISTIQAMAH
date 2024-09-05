<?php
class ProsespenerimaanModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function hitungKuota()
    {
        $tahun = cekSetting('tahun');
        $this->db->select_sum('kuota');
        $query = $this->db->get_where('prosespenerimaan',['tahun'=>$tahun,'aktif'=>1]);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $sum = $row->kuota;
            return $sum;
        } else {
            return '0';
        }
    }
}

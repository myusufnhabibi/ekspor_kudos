<?php

class Fungsi
{

    function user_login()
    {
        $ci = get_instance();
        $ci->load->model('auth_model');
        $sesi = $ci->session->userdata('id_user');
        $hasil = $ci->auth_model->get('tbl_user', $sesi, 'id_user')->row();
        return $hasil;
    }

    function device()
    {
        $ci = get_instance();
        $ci->load->model('auth_model');
        $device = $ci->auth_model->get('tbl_user', '0', 'level')->row();
        return $device;
    }

    function grafik($method, $key, $ket)
    {
        error_reporting(0);
        $ci = get_instance();
        $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $grafik = [];
        $labels = [];
        for ($bulan = 0; $bulan < 12; $bulan++) {
            $setor = $ci->laporan_model->$method($bulan + 1)->row_array();
            // $jual = $this->Tabungan_model->groupby_grafik_jual($bulan)->row_array();
            // $harga[] = $jual['jual'];
            // $s[] = ['bulan' => $label[$bulan], 'setor' => $setor['setor']];
            $s[] = (int)$setor[$key];
            $b[] = $label[$bulan];
            if ($setor != null) {
                $grafik = $s;
                $labels = $b;
            }
        }
        // $callback = ['harga' => $harga, 'label' => $label];
        if ($ket == 'data') {
            return json_encode($grafik);
        } else {
            return json_encode($labels);
        }
    }

    function kode_otomatis($param, $batasan, $param2, $param3)
    {
        $ci = get_instance();
        $query = "SELECT MAX(substr($param, $batasan, 3)) as kode from $param2";
        $ambil = $ci->db->query($query);

        if ($ambil->num_rows() > 0) {
            $data = $ambil->row_array();
            $kodemax = intval($data['kode']) + 1;
        } else {
            $kodemax = 1;
        }
        // return $tambah;
        $kodemax = str_pad($kodemax, 3, "0", STR_PAD_LEFT);
        return $jadi = $param3 . $kodemax;
    }

    function kode_transaksi()
    {
        $ci = get_instance();
        $query = "SELECT MAX(substr(no_pesan, 11, 3)) as kode from tbl_pemesanan";
        $ambil = $ci->db->query($query);

        if ($ambil->num_rows() > 0) {
            $data = $ambil->row_array();
            $kodemax = intval($data['kode']) + 1;
        } else {
            $kodemax = 1;
        }
        // return $tambah;
        $kodemax = str_pad($kodemax, 3, "0", STR_PAD_LEFT);
        return $jadi = "PO" . date('Ymd') . $kodemax;
    }
}

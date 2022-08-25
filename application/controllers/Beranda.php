<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model(['Export_model', 'Pemesanan_model', 'Penagihan_model', 'laporan_model']);
    }

    public function admin()
    {
        $data['title'] = "Beranda";
        $data['customer'] = $this->Export_model->get('tbl_customer')->num_rows();
        $data['pomasuk'] = $this->Pemesanan_model->get('*', 'tbl_pemesanan', null, null, null, null, 'no_pesan')->num_rows();
        $data['pobelum'] = $this->Export_model->po_not_in_export()->num_rows();
        $data['posudah'] = $this->Export_model->get('tbl_export', null, null, null, null, 'no_pesan', 'tbl_pemesanan')->num_rows();

        $data['grafik'] = $this->fungsi->grafik('groupby_grafik_pesan', 'pesan', 'data');
        $data['label'] = $this->fungsi->grafik('groupby_grafik_pesan', 'pesan', 'label');
        $data['grafik_export'] = $this->fungsi->grafik('groupby_grafik_export', 'export', 'data');
        $data['label_export'] = $this->fungsi->grafik('groupby_grafik_export', 'export', 'label');
        $this->template->load('template', 'admin/beranda', $data);
    }

    public function gudang()
    {
        $data['title'] = "Beranda";
        $data['pobelum'] = $this->Export_model->po_not_in_export()->num_rows();
        $data['pobelumdetail'] = $this->Export_model->po_not_in_export()->result_array();
        $this->template->load('template', 'gudang/beranda', $data);
    }

    public function finance()
    {
        $data['title'] = "Beranda";
        $data['invbelum'] = $this->Penagihan_model->po_not_in_penagihan()->num_rows();
        $data['invbelumdetail'] = $this->Penagihan_model->po_not_in_penagihan()->result_array();
        $this->template->load('template', 'finance/beranda', $data);
    }
}

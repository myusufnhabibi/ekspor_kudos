<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model(['Penagihan_model', 'Pemesanan_model']);
    }

    public function load_po()
    {
        $id = $this->input->post('id', true);
        $data = $this->Penagihan_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->row_array();
        $cek = $this->Penagihan_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->num_rows();
        $hasil = ['hasil' => $data, 'cek' => $cek];
        echo json_encode($hasil);
    }

    public function cek_tanggal()
    {
        $tgl = $this->input->post('tglBeli');
        $cek = $this->Penagihan_model->groupby_po_tagih($tgl)->num_rows();
        $hasil = $this->Penagihan_model->groupby_po_tagih($tgl)->result_array();
        $callback = ['hasil' => $hasil, 'cek' => $cek];
        echo json_encode($callback);
    }

    public function detail_tagih()
    {
        $nomer = $this->input->post('nomer');
        $header = $this->Penagihan_model->po_tagih_detail('*, sum(total) total', $nomer)->row_array();
        $hasil = $this->Penagihan_model->po_tagih_detail('*', $nomer)->result_array();
        $callback = ['hasil' => $hasil, 'header' => $header];
        echo json_encode($callback);
    }

    public function index()
    {
        $data['title'] = "Data Penagihan";
        $this->template->load('template', 'finance/penagihan', $data);
    }

    public function atagih()
    {
        $data['pos'] = $this->Penagihan_model->po_not_in_penagihan()->result_array();
        $data['title'] = "Tambah Penagihan";
        $this->template->load('template', 'finance/atagih', $data);
    }

    public function atagih2()
    {
        $id = $this->input->get('po_tagih', true);
        // $data['pos'] = $this->Penagihan_model->po_not_in_export()->result_array();
        $data['po'] = $this->Penagihan_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->row_array();
        $data['cek'] = $this->Penagihan_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->num_rows();
        $data['barangs'] = $this->Penagihan_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'kode_barang', 'tbl_barang')->result_array();
        $data['total'] = $this->Pemesanan_model->get('sum(total) total_semua, currency', 'tbl_pemesanan', $id, 'no_pesan')->row_array();
        $data['title'] = "Tambah Penagihan";
        $this->template->load('template', 'finance/atagih2', $data);
    }


    public function add_tagih()
    {
        $post = $this->input->get(null, true);
        $hasil = $this->Penagihan_model->add_tagih($post);

        $payload = ['cek' => $hasil];
        echo json_encode($payload);
    }
}

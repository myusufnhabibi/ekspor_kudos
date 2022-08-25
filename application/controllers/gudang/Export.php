<?php
defined('BASEPATH') or exit('No direct script access allowed');

class export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Export_model');
    }

    public function load_po()
    {
        $id = $this->input->post('id', true);
        $data = $this->Export_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->row_array();
        $cek = $this->Export_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->num_rows();
        $hasil = ['hasil' => $data, 'cek' => $cek];
        echo json_encode($hasil);
    }

    public function load_contain()
    {
        $id = $this->input->post('nomer', true);
        $data = $this->Export_model->get('tbl_container', $id, 'id_container')->row_array();
        $hasil = ['hasil' => $data];
        echo json_encode($hasil);
    }

    public function cek_tanggal()
    {
        $tgl = $this->input->post('tglBeli');
        $cek = $this->Export_model->groupby_po_export($tgl)->num_rows();
        $hasil = $this->Export_model->groupby_po_export($tgl)->result_array();
        $callback = ['hasil' => $hasil, 'cek' => $cek];
        echo json_encode($callback);
    }

    public function detail_export()
    {
        $nomer = $this->input->post('nomer');
        $header = $this->Export_model->po_export_detail('*, sum(qty) total', $nomer)->row_array();
        $hasil = $this->Export_model->po_export_detail('*', $nomer)->result_array();
        $callback = ['hasil' => $hasil, 'header' => $header];
        echo json_encode($callback);
    }

    public function index()
    {
        $data['title'] = "Data Export";
        $this->template->load('template', 'gudang/export', $data);
    }

    public function aexport()
    {
        $data['pos'] = $this->Export_model->po_not_in_export()->result_array();
        $data['title'] = "Tambah Export";
        $this->template->load('template', 'gudang/aexport', $data);
    }

    public function aexport2()
    {
        $id = $this->input->get('po_export', true);
        // $data['pos'] = $this->Export_model->po_not_in_export()->result_array();
        $data['po'] = $this->Export_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->row_array();
        $data['cek'] = $this->Export_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'id_customer', 'tbl_customer')->num_rows();
        $data['containers'] = $this->Export_model->get('tbl_container')->result_array();
        $data['barangs'] = $this->Export_model->get('tbl_pemesanan', $id, 'no_pesan', null, null, 'kode_barang', 'tbl_barang')->result_array();
        $data['title'] = "Tambah Export";
        $this->template->load('template', 'gudang/aexport2', $data);
    }


    public function add_export()
    {
        $post = $this->input->get(null, true);
        $idCon = $this->input->get('containerExport', true);
        $ct = $this->Export_model->get('tbl_container', $idCon, 'id_container')->row_array();
        $no_contain = $ct['no_container'];
        $type = $ct['type'];

        $po = $this->input->get('no', true);
        $export = $this->input->get('noExport', true);
        // $tgl = $this->input->get('tglPlan', true);
        $hasil = $this->Export_model->add_export($post);
        $datad = $this->Export_model->get_notif($po)->row_array();

        $message = "*NOTIFICATION*

For PO (Purchase Order) above number: *$po* being packed and shipped today from PT. Kudos Istana Furniture with details as below 
Export Number: *$export* 
Container Number: *$no_contain* 
Container Size: *$type*

*MARKETING - PT. Kudos Istana Furniture*
Lingkar R Agil Kusumadya Street – Mijen Km. 7, Kaliwungu, Kedungdowo, Kaliwungu, Kudus City, East Java 59361 Indonesia
        ";

        $payload = ['cek' => $hasil, 'nomer' => $datad['no_telepon'], 'pesan' => $message];
        echo json_encode($payload);
    }

    public function deletepemesanan($id)
    {
        $this->db->where('no_pesan', $id);
        $this->db->delete('tbl_pemesanan');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/master/pemesanan');
    }
}

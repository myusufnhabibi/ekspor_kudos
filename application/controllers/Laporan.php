<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model', 'lm');
    }

    public function po($id)
    {
        $data['customer'] = $this->lm->get('tbl_customer')->result_array();
        if ($id == 'masuk') {
            $data['title'] = "Laporan PO Masuk";
            $this->template->load('template', 'laporan/index', $data);
        } else if ($id == 'belum') {
            $data['title'] = "Laporan PO Belum Terexport";
            $this->template->load('template', 'laporan/index', $data);
        } else if ($id == 'sudah') {
            $data['title'] = "Laporan PO Sudah Terexport";
            $this->template->load('template', 'laporan/index', $data);
        } else if ($id == 'tertagih') {
            $data['title'] = "Laporan PO Sudah Tertagih";
            $this->template->load('template', 'laporan/index', $data);
        } else if ($id == 'btertagih') {
            $data['title'] = "Laporan PO Belum Tertagih";
            $this->template->load('template', 'laporan/index', $data);
        }
    }

    public function proses_lap()
    {
        $post = $this->input->post(null, true);
        $cust = $post['cust'] == 'all' ? null : $post['cust'];
        if ($post['id'] == 'masuk') {
            $data['datas'] = $this->lm->get_po($post['tglAwal'], $post['tglAkhir'], $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po($post['tglAwal'], $post['tglAkhir'], $cust)->num_rows();
            $data['title'] = "Laporan PO Masuk";
        } else if ($post['id'] == 'belum') {
            $data['datas'] = $this->lm->get_po_belum($post['tglAwal'], $post['tglAkhir'], $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_belum($post['tglAwal'], $post['tglAkhir'], $cust)->num_rows();
            $data['title'] = "Laporan PO Belum Terexport";
        } else if ($post['id'] == 'sudah') {
            $data['datas'] = $this->lm->get_po_sudah($post['tglAwal'], $post['tglAkhir'], $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_sudah($post['tglAwal'], $post['tglAkhir'], $cust)->num_rows();
            $data['title'] = "Laporan PO Sudah Terexport";
        } else if ($post['id'] == 'tertagih') {
            $data['datas'] = $this->lm->get_po_tertagih($post['tglAwal'], $post['tglAkhir'], $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_tertagih($post['tglAwal'], $post['tglAkhir'], $cust)->num_rows();
            $data['title'] = "Laporan PO Sudah Tertagih";
        } else if ($post['id'] == 'btertagih') {
            $data['datas'] = $this->lm->get_po_btertagih($post['tglAwal'], $post['tglAkhir'], $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_btertagih($post['tglAwal'], $post['tglAkhir'], $cust)->num_rows();
            $data['title'] = "Laporan PO Belum Tertagih";
        }
        $data['cust'] = $cust;
        $data['id'] = $post['id'];
        $data['tgl_awal'] = $post['tglAwal'];
        $data['tgl_akhir'] = $post['tglAkhir'];
        $this->load->view('laporan/cari_lap', $data);
    }

    public function cetak_lap()
    {
        $nomer =  $this->input->get('cust', true);
        $tgl_awal = $this->input->get('tgl_awal', true);
        $tgl_akhir = $this->input->get('tgl_akhir', true);
        $id = $this->input->get('id', true);
        $cust = $nomer == 'all' ? null : $nomer;
        if ($id == 'masuk') {
            $data['datas'] = $this->lm->get_po($tgl_awal, $tgl_akhir, $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po($tgl_awal, $tgl_akhir, $cust)->num_rows();
            $data['title'] = "Laporan PO Masuk";
        } else if ($id == 'belum') {
            $data['datas'] = $this->lm->get_po_belum($tgl_awal, $tgl_akhir, $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_belum($tgl_awal, $tgl_akhir, $cust)->num_rows();
            $data['title'] = "Laporan PO Belum Terexport";
        } else if ($id == 'sudah') {
            $data['datas'] = $this->lm->get_po_sudah($tgl_awal, $tgl_akhir, $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_sudah($tgl_awal, $tgl_akhir, $cust)->num_rows();
            $data['title'] = "Laporan PO Sudah Terexport";
        } else if ($id == 'tertagih') {
            $data['datas'] = $this->lm->get_po_tertagih($tgl_awal, $tgl_akhir, $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_tertagih($tgl_awal, $tgl_akhir, $cust)->num_rows();
            $data['title'] = "Laporan PO Sudah Tertagih";
        } else if ($id == 'btertagih') {
            $data['datas'] = $this->lm->get_po_btertagih($tgl_awal, $tgl_akhir, $cust)->result_array();
            $data['jumlah'] = $this->lm->get_po_btertagih($tgl_awal, $tgl_akhir, $cust)->num_rows();
            $data['title'] = "Laporan PO Belum Tertagih";
        }
        $data['cust'] = $cust;
        $data['id'] = $id;
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $this->load->view('laporan/print_lap', $data);
    }
}

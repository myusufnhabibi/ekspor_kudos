<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Pemesanan_model');
    }

    public function load_cust()
    {
        $nomer = $this->input->post('nomer');
        $data = $this->Pemesanan_model->get('*', 'tbl_customer', $nomer, 'id_customer')->row_array();
        $hasil = ['hasil' => $data];
        echo json_encode($hasil);
    }


    public function load_barang()
    {
        $id = $this->input->post('id', true);
        $data = $this->Pemesanan_model->get('*', 'tbl_barang', $id, 'kode_barang')->row_array();
        $hasil = ['hasil' => $data];
        echo json_encode($hasil);
    }

    public function index()
    {
        $data['title'] = "Data Pemesanan";
        $data['pemesanans'] = $this->Pemesanan_model->get('*, sum(total) semua', 'tbl_pemesanan', null, null, 'tbl_customer', 'id_customer', 'no_pesan')->result_array();
        $this->template->load('template', 'admin/pemesanan', $data);
    }

    public function apemesanan()
    {
        $param = $this->uri->segment(4);
        if ($param) {
            $cek = $this->Master_model->get('*', 'tbl_pemesanan', $param, 'no_pesan')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Pemesanan";
                $data['pemesanan'] = $this->Master_model->get('*', 'tbl_pemesanan', $param, 'no_pesan')->row_array();
            } else {
                redirect('admin/master/pemesanan');
            }
        } else {
            $data['customers'] = $this->Pemesanan_model->get('*', 'tbl_customer')->result_array();
            $data['barangs'] = $this->Pemesanan_model->get('*', 'tbl_barang')->result_array();
            $data['title'] = "Tambah Pemesanan";
        }
        $this->template->load('template', 'admin/apemesanan', $data);
    }


    public function add_pemesanan()
    {
        $post = $this->input->get(null, true);
        $this->Pemesanan_model->add_po($post);
        if ($this->db->affected_rows() > 0) {
            echo "1";
        }
    }

    public function dpesan($id)
    {
        $data['title'] = "Detail Data Pemesanan";
        $data['pemesanans'] = $this->Pemesanan_model->get('*', 'tbl_pemesanan', $id, 'no_pesan', 'tbl_barang', 'kode_barang')->result_array();
        $data['total'] = $this->Pemesanan_model->get('*, sum(total) total', 'tbl_pemesanan', $id, 'no_pesan', 'tbl_customer', 'id_customer', null, 'tbl_user', 'id_user')->row_array();
        $this->template->load('template', 'admin/dpesan', $data);
    }

    public function deletepemesanan($id)
    {
        $this->db->where('no_pesan', $id);
        $this->db->delete('tbl_pemesanan');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/pemesanan');
    }

    public function aturjadwal($id)
    {
        $data['title'] = "Atur Jadwal Kirim";
        $data['tgl_pemesanans'] = $this->Pemesanan_model->jadwal()->result_array();
        // echo json_encode($jadwal);

        $data['pemesanan'] = $this->Pemesanan_model->get('*', 'tbl_pemesanan', $id, 'no_pesan', 'tbl_customer', 'id_customer')->row_array();
        $this->template->load('template', 'admin/jadwal', $data);
    }

    public function jadwal()
    {
        $data['title'] = "Jadwal Export";
        // $data['tgl_pemesanans'] = $this->Pemesanan_model->get('*, (tgl_renc_kirim + INTERVAL 1 day) tgl_end', 'tbl_pemesanan', 1, 'status_jadwal', 'tbl_customer', 'id_customer', 'no_pesan')->result_array();
        $data['tgl_pemesanans'] = $this->Pemesanan_model->jadwal()->result_array();

        $this->template->load('template', 'admin/jadwal_export', $data);
    }


    public function export()
    {
        $data['title'] = "Data Export";
        $this->template->load('template', 'gudang/export', $data);
    }
}

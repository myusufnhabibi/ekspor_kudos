<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Master_model');
    }

    public function user()
    {
        $id = $this->fungsi->user_login()->id_user;
        $data['users'] = $this->Master_model->not_in($id)->result_array();
        $data['title'] = 'Data User';
        $this->template->load('template', 'admin/user', $data);
    }

    public function auser()
    {
        $param = $this->uri->segment(4);
        if ($param) {
            $cek = $this->Master_model->get('tbl_user', $param, 'id_user')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah User";
                $data['kontak'] = $this->Master_model->get('tbl_user', $param, 'id_user')->row_array();
            } else {
                redirect('admin/master/user');
            }
        } else {
            $data['title'] = "Tambah User";
        }
        $this->template->load('template', 'admin/auser', $data);
    }


    public function add_user()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->addUser($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('admin/master/user');
        }
    }

    public function update_user()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->updateUser($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diupdate');
            redirect('admin/master/user');
        }
    }

    public function deleteUser()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/master/user');
    }

    public function container()
    {
        $data['containers'] = $this->Master_model->get('tbl_container')->result_array();
        $data['title'] = 'Data Container';
        $this->template->load('template', 'admin/container', $data);
    }

    public function acontainer()
    {
        $param = $this->uri->segment(4);
        if ($param) {
            $cek = $this->Master_model->get('tbl_container', $param, 'id_container')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Container";
                $data['container'] = $this->Master_model->get('tbl_container', $param, 'id_container')->row_array();
            } else {
                redirect('admin/master/container');
            }
        } else {
            $data['title'] = "Tambah Container";
        }
        $this->template->load('template', 'admin/acontainer', $data);
    }


    public function add_container()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->addcontainer($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('admin/master/container');
        }
    }

    public function update_container()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->updatecontainer($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diupdate');
            redirect('admin/master/container');
        }
    }

    public function deletecontainer()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id_container', $id);
        $this->db->delete('tbl_container');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/master/container');
    }

    public function customer()
    {
        $data['customers'] = $this->Master_model->get('tbl_customer')->result_array();
        $data['title'] = 'Data Customer';
        $this->template->load('template', 'admin/customer', $data);
    }

    public function acustomer()
    {
        $param = $this->uri->segment(4);
        if ($param) {
            $cek = $this->Master_model->get('tbl_customer', $param, 'id_customer')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Customer";
                $data['customer'] = $this->Master_model->get('tbl_customer', $param, 'id_customer')->row_array();
            } else {
                redirect('admin/master/customer');
            }
        } else {
            $data['title'] = "Tambah Customer";
        }
        $this->template->load('template', 'admin/acustomer', $data);
    }


    public function add_customer()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->addcustomer($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('admin/master/customer');
        }
    }

    public function update_customer()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->updatecustomer($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diupdate');
            redirect('admin/master/customer');
        }
    }

    public function deletecustomer()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id_customer', $id);
        $this->db->delete('tbl_customer');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/master/customer');
    }

    public function barang()
    {
        $data['barangs'] = $this->Master_model->get('tbl_barang')->result_array();
        $data['title'] = 'Data Barang';
        $this->template->load('template', 'admin/barang', $data);
    }

    public function abarang()
    {
        $param = $this->uri->segment(4);
        if ($param) {
            $cek = $this->Master_model->get('tbl_barang', $param, 'kode_barang')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Barang";
                $data['barang'] = $this->Master_model->get('tbl_barang', $param, 'kode_barang')->row_array();
            } else {
                redirect('admin/master/barang');
            }
        } else {
            $data['title'] = "Tambah Barang";
        }
        $this->template->load('template', 'admin/abarang', $data);
    }


    public function add_barang()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->addbarang($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('admin/master/barang');
        }
    }

    public function update_barang()
    {
        $post = $this->input->post(null, true);
        $this->Master_model->updatebarang($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diupdate');
            redirect('admin/master/barang');
        }
    }

    public function deletebarang()
    {
        $id = $this->uri->segment(4);
        $this->db->where('kode_barang', $id);
        $this->db->delete('tbl_barang');
        $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
        redirect('admin/master/barang');
    }
}

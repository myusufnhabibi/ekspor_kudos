<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // sudah_login();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $data['title'] = "Login";
    $this->load->view('auth/login', $data);
  }

  public function proses_login()
  {
    $post = $this->input->post(null, true);
    $login = $this->Auth_model->do_login($post);

    if ($login > 1) {
      redirect('Admin/Beranda');
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('id_user');
    redirect('auth');
  }

  public function load_user()
  {
    $lokasi = $this->input->post('lokasi');
    $hasil = $this->Auth_model->get('tb_setting', $lokasi, 'id_rtrw')->row_array();
    $callback = ['hasil' => $hasil];
    echo json_encode($callback);
  }

  public function setting()
  {
    $data['title'] = "Setting Notifikasi WA";
    $this->template->load('template', 'auth/setting_dn', $data);
  }

  public function ubah_pwd()
  {
    $post = $this->input->post(null, true);
    $user = $this->Auth_model->get('tbl_user', $this->fungsi->user_login()->id_user, 'id_user')->row_array();
    if (password_verify($post['pwd_awal'], $user['password'])) {
      $this->Auth_model->ubahPwd($post);
      if ($this->db->affected_rows() == 1) {
        $this->session->unset_userdata('id_user');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('gagal', 'Password Saat ini salah!');
      redirect('Auth/setting');
    }
  }
  public function ubah_pwd_n()
  {
    $post = $this->input->post(null, true);
    $user = $this->Auth_model->get('tbl_nasabah', $this->fungsi->nasabah_login()->nomer_rek, 'nomer_rek')->row_array();
    if (password_verify($post['pwd_awal'], $user['password'])) {
      $this->Auth_model->ubahPwd_n($post);
      if ($this->db->affected_rows() == 1) {
        $this->session->unset_userdata('nomer_rek');
        redirect('Auth/login_n');
      }
    } else {
      $this->session->set_flashdata('gagal', 'Password Saat ini salah!');
      redirect('Auth/setting');
    }
  }
}

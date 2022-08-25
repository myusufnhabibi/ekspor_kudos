<?php

class Auth_model extends CI_Model
{
    public function get($tb, $id = null, $param = null, $tb2 = null, $param2 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        // $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function do_login($post)
    {
        $user = $this->db->get_where('tbl_user', ['username' => $post['username']])->row_array();

        if ($user) {
            if (sha1($post['password']) == $user['password']) {
                // if ($user['aktif'] == '1') {
                $data = [
                    'id_user' => $user['id_user'],
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == '1') {
                    redirect('admin/beranda');
                } else  if ($user['level'] == '2') {
                    redirect('gudang/beranda');
                } else {
                    redirect('finance/beranda');
                }
                // } else {
                //     $this->session->set_flashdata('pesan', 'Maaf akun anda sudah expired!');
                //     redirect('auth');
                // }
            } else {
                $this->session->set_flashdata('pesan', 'Username/ Password anda salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Username/ Password anda salah');
            redirect('auth');
        }
    }

    public function do_daftar($post)
    {
        $user = $this->db->get_where('tb_penduduk', ['NIK' => $post['nik']])->row_array();

        if ($user) {
            $this->session->set_flashdata('pesan', 'NIK Sudah terdaftar, Silahkan login kembali!');
            redirect('Auth/daftar');
        } else {
            $data = [
                'NIK' => $post['nik'],
                'nama_lengkap' => $post['nama'],
                'password' => md5($post['password']),
                'foto' => $this->uploadImage('image', $post['nik']),
                'id_rtrw' => $post['rt'],
                'cek_rt' => 'belum',
                'tgl_cek_rt' => null,
                'id_user' => $post['id_user'],
                'status_penduduk' => 'belum',
                'aktif' => 'ya'
            ];

            $this->db->insert('tb_penduduk', $data);
            return $user;
        }
    }

    private function uploadImage($param, $nik)
    {
        $config['upload_path'] = './assets/profile-penduduk/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']     = '2048';
        $config['file_name']  = $nik . "-" . round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param)) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function ubahPwd($post)
    {
        $param['password'] = password_hash($post['pwd1'], PASSWORD_DEFAULT);
        $this->db->where('id_user', $this->fungsi->user_login()->id_user);
        $this->db->update('tbl_user', $param);
    }
}

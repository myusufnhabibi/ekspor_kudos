<?php

class Master_model extends CI_Model
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

    public function not_in($id)
    {
        $this->db->select('*');
        if ($id != null) {
            $this->db->where_not_in('id_user', $id);
        }
        $this->db->where_not_in('level', '0');
        return $this->db->get('tbl_user');
    }

    public function addUser($post)
    {
        $prefix = $post['level'] == '1' ? 'ADM' : ($post['level'] == '2' ? 'GDG' : 'FNC');
        $param = [
            'id_user' => $this->fungsi->kode_otomatis('id_user', 4, 'tbl_user', $prefix),
            'nama' => ucfirst($post['nama']),
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'no_wa' => $post['wa'],
            'level' => $post['level']
        ];
        $this->db->insert('tbl_user', $param);
    }

    public function updateUser($post)
    {
        $param['nama'] = ucfirst($post['nama']);
        $param['username'] = $post['username'];
        $param['no_wa'] = $post['wa'];
        // $param['level'] = $post['level'];
        if (!empty($post['password'])) {
            $param['password'] = sha1($post['password']);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $param);
    }

    public function addcontainer($post)
    {
        $param = [
            'no_container' => $post['no'],
            'type' => $post['type']
        ];
        $this->db->insert('tbl_container', $param);
    }

    public function updatecontainer($post)
    {
        $param['no_container'] = $post['no'];
        $param['type'] = $post['type'];
        $this->db->where('id_container', $post['id']);
        $this->db->update('tbl_container', $param);
    }

    public function addcustomer($post)
    {
        $param = [
            'id_customer' => $this->fungsi->kode_otomatis('id_customer', 5, 'tbl_customer', 'CUST'),
            'nama_customer' => $post['nama'],
            'no_telepon' => $post['no'],
            'alamat' => $post['alamat'],
            'negara' => $post['negara'],
            'email' => $post['email'],
        ];
        $this->db->insert('tbl_customer', $param);
    }

    public function updatecustomer($post)
    {
        $param['nama_customer'] = $post['nama'];
        $param['no_telepon'] = $post['no'];
        $param['alamat'] = $post['alamat'];
        $param['negara'] = $post['negara'];
        $param['email'] = $post['email'];
        $this->db->where('id_customer', $post['id']);
        $this->db->update('tbl_customer', $param);
    }

    public function addbarang($post)
    {
        $param = [
            'kode_barang' => $post['kode'],
            'nama_barang' => $post['nama'],
            'satuan' => $post['satuan']
        ];
        $this->db->insert('tbl_barang', $param);
    }

    public function updatebarang($post)
    {
        $param['nama_barang'] = $post['nama'];
        $param['satuan'] = $post['satuan'];
        $this->db->where('kode_barang', $post['kode']);
        $this->db->update('tbl_barang', $param);
    }
}

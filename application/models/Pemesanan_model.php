<?php

class Pemesanan_model extends CI_Model
{
    public function get($select, $tb, $id = null, $param = null, $tb2 = null, $param2 = null, $group = null, $tb3 = null, $param3 = null)
    {
        $this->db->select($select);
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($tb3 != null) {
            $this->db->join($tb3, $param3 = $param3);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        // $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_gudang()
    {
        return $this->db->query("SELECT no_wa from tbl_user where level = '2' LIMIT 0, 1");
    }

    public function not_in($id)
    {
        $this->db->select('*');
        if ($id != null) {
            $this->db->where_not_in('id_user', $id);
        }
        return $this->db->get('tbl_user');
    }

    public function add_po($post)
    {
        $code = $post['item_code'];
        $count = count($code);
        for ($i = 0; $i < $count; $i++) {
            $this->db->insert('tbl_pemesanan', [
                'no_pesan' => $post['no'],
                'tgl_pesan' => $post['tgl'],
                'id_customer' => $post['customer'],
                'currency' => $post['curen'],
                'kode_barang' => $code[$i],
                'qty' => $post['item_qty'][$i],
                'harga' => $post['item_price'][$i],
                'total' => $post['item_qty'][$i] * $post['item_price'][$i],
                'id_user' => $this->fungsi->user_login()->id_user
            ]);
        }
    }

    public function jadwal()
    {
        return $this->db->query("SELECT *, (tgl_renc_kirim + INTERVAL 1 day) tgl_end FROM tbl_pemesanan a, tbl_barang b, tbl_customer c WHERE a.kode_barang=b.kode_barang and a.id_customer=c.id_customer and status_jadwal = 1 and no_pesan in (SELECT no_pesan FROM tbl_export) group by no_pesan");
    }

    public function update_po($post)
    {
        $param['tgl_renc_kirim'] = $post['tglrenca'];
        $param['status_jadwal'] = 1;
        $this->db->where('no_pesan', $post['no']);
        return $this->db->update('tbl_pemesanan', $param);
    }
}

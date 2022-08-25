<?php

class Penagihan_model extends CI_Model
{
    public function get($tb, $id = null, $param = null, $tb2 = null, $param2 = null, $id7 = null, $param7 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->where($param2, $tb2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        if ($id7 != null) {
            $this->db->join($param7, $id7);
        }
        // $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function groupby_po_tagih($param)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_penagihan b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->where("DATE_FORMAT(tgl_invoice,'%Y-%m')", $param);
        // $this->db->where('tgl_setor', $param);
        $this->db->group_by('a.no_pesan');
        $query = $this->db->get();
        return $query;
    }

    public function po_tagih_detail($select, $param)
    {
        $this->db->select($select);
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_penagihan b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->join('tbl_barang d', 'd.kode_barang=a.kode_barang');
        $this->db->where("a.no_pesan", $param);
        $query = $this->db->get();
        return $query;
    }

    public function po_not_in_penagihan()
    {
        return $this->db->query("SELECT a.no_pesan, b.nama_customer, a.currency, a.tgl_pesan, sum(total) total_inv FROM tbl_pemesanan a, tbl_customer b WHERE a.id_customer=b.id_customer and status_jadwal = 1 and no_pesan not in (SELECT no_pesan FROM tbl_penagihan) group by no_pesan");
    }

    public function add_tagih($post)
    {
        $param = [
            'no_invoice' => $post['no'],
            'no_pesan' => $post['nopo'],
            'tgl_invoice' => $post['tglPlan'],
            'total_invoice' => $post['total'],
        ];
        return $this->db->insert('tbl_penagihan', $param);
    }
}

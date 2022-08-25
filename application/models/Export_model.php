<?php

class Export_model extends CI_Model
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

    public function get_notif($id)
    {
        return $this->db->query("SELECT no_telepon FROM tbl_customer a, tbl_pemesanan b WHERE a.id_customer=b.id_customer and b.no_pesan = '$id' GROUP BY a.id_customer;");
    }

    public function groupby_po_export($param)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_export b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->where("DATE_FORMAT(tgl_plan_kapal,'%Y-%m')", $param);
        // $this->db->where('tgl_setor', $param);
        $this->db->group_by('a.no_pesan');
        $query = $this->db->get();
        return $query;
    }

    public function po_export_detail($select, $param)
    {
        $this->db->select($select);
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_export b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->join('tbl_barang d', 'd.kode_barang=a.kode_barang');
        $this->db->join('tbl_container e', 'e.id_container=b.id_container');
        $this->db->join('tbl_user f', 'f.id_user=b.id_user');
        $this->db->where("a.no_pesan", $param);
        $query = $this->db->get();
        return $query;
    }

    public function po_not_in_export()
    {
        return $this->db->query("SELECT * FROM tbl_pemesanan a, tbl_customer c WHERE a.id_customer=c.id_customer and status_jadwal = 1 and no_pesan not in (SELECT no_pesan FROM tbl_export) group by no_pesan");
    }

    public function add_export($post)
    {
        $param = [
            'no_pesan' => $post['no'],
            'no_export' => $post['noExport'],
            'tgl_plan_kapal' => $post['tglPlan'],
            'sopir' => $post['sopir'],
            'nopol' => $post['nopol'],
            'id_container' => $post['containerExport'],
            'id_user' => $this->fungsi->user_login()->id_user
        ];
        return $this->db->insert('tbl_export', $param);
    }
}

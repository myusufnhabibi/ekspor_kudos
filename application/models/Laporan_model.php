<?php

class Laporan_model extends CI_Model
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
            $this->db->where($param7, $id7);
        }
        // $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_po($date, $edate, $cust = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_customer b', 'a.id_customer=b.id_customer');
        $this->db->join('tbl_barang c', 'a.kode_barang=c.kode_barang');
        $this->db->where('tgl_pesan BETWEEN "' . $date . '" AND "' . $edate . '"');
        if ($cust != null) {
            $this->db->where('a.id_customer', $cust);
        }
        $this->db->order_by('tgl_pesan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_po_belum($date, $edate, $cust = null)
    {
        if ($cust != null) {
            $query = "SELECT * FROM tbl_pemesanan a, tbl_customer b, tbl_barang c WHERE a.id_customer=b.id_customer and a.kode_barang=c.kode_barang and no_pesan not in (SELECT no_pesan FROM tbl_export) and tgl_pesan between '$date' and '$edate' and a.id_customer = '$cust' order by tgl_pesan ASC";
        } else {
            $query = "SELECT * FROM tbl_pemesanan a, tbl_customer b, tbl_barang c WHERE a.id_customer=b.id_customer and a.kode_barang=c.kode_barang and no_pesan not in (SELECT no_pesan FROM tbl_export) and tgl_pesan between '$date' and '$edate' order by tgl_pesan ASC";
        }
        return $this->db->query($query);
    }

    public function get_po_sudah($date, $edate, $cust = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_export b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->join('tbl_barang d', 'd.kode_barang=a.kode_barang');
        $this->db->join('tbl_container e', 'e.id_container=b.id_container');
        $this->db->where('tgl_plan_kapal BETWEEN "' . $date . '" AND "' . $edate . '"');
        if ($cust != null) {
            $this->db->where('a.id_customer', $cust);
        }
        $this->db->order_by('tgl_plan_kapal', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_po_btertagih($date, $edate, $cust = null)
    {
        if ($cust != null) {
            $query = "SELECT * FROM tbl_pemesanan a, tbl_customer b, tbl_barang c WHERE a.id_customer=b.id_customer and a.kode_barang=c.kode_barang and no_pesan not in (SELECT no_pesan FROM tbl_penagihan) and tgl_pesan between '$date' and '$edate' and a.id_customer = '$cust' order by tgl_pesan ASC";
        } else {
            $query = "SELECT * FROM tbl_pemesanan a, tbl_customer b, tbl_barang c WHERE a.id_customer=b.id_customer and a.kode_barang=c.kode_barang and no_pesan not in (SELECT no_pesan FROM tbl_penagihan) and tgl_pesan between '$date' and '$edate' order by tgl_pesan ASC";
        }
        return $this->db->query($query);
    }

    public function get_po_tertagih($date, $edate, $cust = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemesanan a');
        $this->db->join('tbl_penagihan b', 'a.no_pesan=b.no_pesan');
        $this->db->join('tbl_customer c', 'c.id_customer=a.id_customer');
        $this->db->join('tbl_barang d', 'd.kode_barang=a.kode_barang');
        $this->db->where('tgl_invoice BETWEEN "' . $date . '" AND "' . $edate . '"');
        if ($cust != null) {
            $this->db->where('a.id_customer', $cust);
        }
        $this->db->order_by('tgl_invoice', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function groupby_grafik_pesan($param)
    {
        $tahun = date("Y");
        $this->db->select("DATE_FORMAT(tgl_pesan,'%Y-%m') bulan_tahun, sum(qty) as pesan");
        $this->db->from('tbl_pemesanan');
        $this->db->where("DATE_FORMAT(tgl_pesan,'%Y')", $tahun);
        $this->db->where("MONTH(tgl_pesan)", $param);
        $this->db->group_by("DATE_FORMAT(tgl_pesan,'%Y-%m')");
        $query = $this->db->get();
        return $query;
    }

    public function groupby_grafik_export($param)
    {
        $tahun = date("Y");
        $this->db->select("DATE_FORMAT(tgl_plan_kapal,'%Y-%m') bulan_tahun, sum(qty) as export");
        $this->db->from('tbl_export');
        $this->db->join('tbl_pemesanan', 'no_pesan');
        $this->db->where("DATE_FORMAT(tgl_plan_kapal,'%Y')", $tahun);
        $this->db->where("MONTH(tgl_plan_kapal)", $param);
        $this->db->group_by("DATE_FORMAT(tgl_plan_kapal,'%Y-%m')");
        $query = $this->db->get();
        return $query;
    }
}

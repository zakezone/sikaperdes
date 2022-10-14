<?php

namespace App\Models\Data;

use CodeIgniter\Model;

class Data_kawasan extends Model
{
    protected $table = 'kawasan_bank_data';
    protected $primaryKey = 'id';

    var $column_orderkab = array('id', 'nm_kec', 'nm_kab', 'nm_kawasan', 'tahun_pembentukan', 'verifikasi');
    var $order = array('id' => 'asc');

    public function getDataTahun()
    {
        $builder = $this->db->table('kawasan_bank_data');
        $builder->select('tahun_pembentukan');
        $builder->distinct();
        $builder->where('verifikasi', "disetujui");
        $builder->orderBy('tahun_pembentukan', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function getJmlDesa($nmkawasan)
    {
        $builder = $this->db->table('kawasan_bank_data');
        $builder->selectCount('nm_des');
        $builder->where('nm_kawasan', $nmkawasan);
        return $builder->get()->getRowArray();
    }

    public function getJmlKec($nmkawasan)
    {
        $builder = $this->db->table('kawasan_bank_data');
        $builder->select('nm_kec');
        $builder->distinct();
        $builder->where('nm_kawasan', $nmkawasan);
        return count($builder->get()->getResultArray());
    }

    public function getDataKawasan($search_value, $order, $length, $start, $tahunfilt)
    {
        if ($tahunfilt == "" || $tahunfilt == "all") {
            $filter = " AND tahun_pembentukan != ''";
        } else {
            $filter = " AND tahun_pembentukan = '$tahunfilt'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "nm_kec LIKE '%$keyword%' $filter OR nm_kab LIKE '%$keyword%' $filter OR nm_kawasan LIKE '%$keyword%' $filter OR tahun_pembentukan LIKE '%$keyword%' $filter";
        } else {
            $search = "id != 0 $filter";
        }

        if ($order) {
            $result_order = $this->column_orderkab[$order['0']['column']];
            $result_dir = $order['0']['dir'];
        } elseif ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }

        if ($length != -1);
        $builder = $this->db->table('kawasan_bank_data');
        $query = $builder->select('nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi')->distinct()->where($search)->where('verifikasi', 'disetujui')->orderBy($result_order, $result_dir);
        if ($start != 0 || $length != 0) {
            $query = $builder->limit($length, $start);
        }
        return $query->get()->getResultArray();
    }

    public function recordsTotalKawasan()
    {
        $builder = $this->db->table('kawasan_bank_data');
        $builder->select('nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi');
        $builder->distinct();
        $builder->where('verifikasi', 'disetujui');
        return $builder->get()->getResultArray();
    }

    public function recordsFilteredKawasan($search_value, $tahunfilt)
    {
        if ($tahunfilt == "" || $tahunfilt == "all") {
            $filter = " AND tahun_pembentukan != ''";
        } else {
            $filter = " AND tahun_pembentukan = '$tahunfilt'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "AND (nm_kec LIKE '%$keyword%' $filter OR nm_kab LIKE '%$keyword%' $filter OR nm_kawasan LIKE '%$keyword%' $filter OR tahun_pembentukan LIKE '%$keyword%' $filter)";
        } else {
            $search = "$filter";
        }

        $sQuery = "SELECT COUNT(DISTINCT nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi) as jml FROM kawasan_bank_data WHERE id != 0 AND verifikasi = 'disetujui' $search";
        $query = $this->query($sQuery)->getRowArray();
        return $query;
    }
}

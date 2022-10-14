<?php

namespace App\Models\Data;

use CodeIgniter\Model;

class Data_download_sie extends Model
{
    protected $table = 'sie_primary_download_data';
    protected $primaryKey = 'id';

    public function getData()
    {
        return $this->findAll();
    }

    public function download_bumdes($tanggalupload) ///////////////////////////////////////////////////////////////// BUMDES
    {
        $builder = $this->db->table('bumdes');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }
}

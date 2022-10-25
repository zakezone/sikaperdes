<?php

namespace App\Models\Provinsi;

use CodeIgniter\Model;

class User_provinsi_model extends Model
{
    protected $table = 'sikaperdes_primary_user';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['kd_wilayah', 'is_active'];

    var $column_order = array('user_id', 'kd_wilayah', 'nama', 'kd_login', 'tk_instansi', 'ampuan', 'akses', 'opd');
    var $order = array('user_id' => 'asc');

    public function defaultgetRole($search_value, $order, $length, $start, $filtkabupaten, $filtkecamatan, $filtkeldesa)
    {
        if ($filtkabupaten == "" && $filtkecamatan == "" && $filtkeldesa == "") {
            $filter = "";
        } elseif ($filtkabupaten != "" && $filtkecamatan == "" && $filtkeldesa == "") {
            $filter = " AND id_kab = '$filtkabupaten'";
        } elseif ($filtkabupaten != "" && $filtkecamatan != "" && $filtkeldesa == "") {
            $filter = " AND id_Kec = '$filtkecamatan'";
        } elseif ($filtkabupaten != "" && $filtkecamatan != "" && $filtkeldesa != "") {
            $filter = " AND kd_wilayah = '$filtkeldesa'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "nama LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR kd_login LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR opd LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR ampuan LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR akses LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR tk_instansi LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter";
        } else {
            $search = "role_id != 1 AND role_id != 2 $filter";
        }

        if ($order) {
            $result_order = $this->column_order[$order['0']['column']];
            $result_dir = $order['0']['dir'];
        } elseif ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }

        if ($length != -1);
        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->where('role_id !=', 1);
        $builder->where('role_id !=', 2);
        $query = $builder->select('*')->where($search)->orderBy($result_order, $result_dir);
        if ($start != 0 || $length != 0) {
            $query = $builder->limit($length, $start);
        }
        return $query->get()->getResultArray();
    }

    public function recordsTotal()
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->select('tanggal');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        return $builder->get()->getResultArray();
    }

    public function recordsFiltered($search_value, $filtkabupaten, $filtkecamatan, $filtkeldesa)
    {
        if ($filtkabupaten == "" && $filtkecamatan == "" && $filtkeldesa == "") {
            $filter = "";
        } elseif ($filtkabupaten != "" && $filtkecamatan == "" && $filtkeldesa == "") {
            $filter = " AND id_kab = '$filtkabupaten'";
        } elseif ($filtkabupaten != "" && $filtkecamatan != "" && $filtkeldesa == "") {
            $filter = " AND id_Kec = '$filtkecamatan'";
        } elseif ($filtkabupaten != "" && $filtkecamatan != "" && $filtkeldesa != "") {
            $filter = " AND kd_wilayah = '$filtkeldesa'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "AND (nama LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR kd_login LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR opd LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR ampuan LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR akses LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter OR tk_instansi LIKE '%$keyword%' AND role_id != 1 AND role_id != 2 $filter)";
        } else {
            $search = "AND role_id != '1' AND role_id != '2' $filter";
        }

        $sQuery = "SELECT COUNT(user_id) as jml FROM sikaperdes_primary_user WHERE user_id != '' $search";
        $query = $this->query($sQuery)->getRowArray();
        return $query;
    }

    public function editProfile($user_id, $input, $file)
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $notifikasi = $this->db->table('sikaperdes_notifikasi');

        $nama = $input['nama'];
        $email = $input['email'];
        $hp = $input['hp'];

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/user/profile/', $nmfile);
            if ($input['imagelama'] != 'default.png') {
                unlink('img/user/profile/' . $input['imagelama']);
            }
        }
        $builder->set('image', $nmfile);
        $builder->set('nama', $nama);
        $builder->set('email', $email);
        $builder->set('hp', $hp);
        $builder->where('user_id', $user_id);
        $builder->update();

        $notifikasi->set('image_user', $nmfile);
        $notifikasi->set('upload_by', $nama);
        $notifikasi->where('user_id', $user_id);
        $notifikasi->update();
    }

    public function Notifikasiakses($input, $user, $kd_login)
    {
        $builder = $this->db->table('sikaperdes_notifikasi');
        if ($input['role'] == 2) {
            $role = 'Administrator';
        } else if ($input['role'] == 3) {
            $role = 'Moderator';
        } else if ($input['role'] == 4) {
            $role = 'Member';
        } else if ($input['role'] == 5) {
            $role = 'Belum Assign';
        } else if ($input['role'] == 6) {
            $role = 'Kabupaten';
        } else if ($input['role'] == 7) {
            $role = 'Provinsi';
        }

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Role Akses Assign",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kd_login['kd_login'] . ' ' .  '(' . $role . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Role Akses",
            "target" => "3",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kd_login['kd_login'] . ' ' . '(' . $role . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }

    public function Notifikasihapus($kd_login, $user)
    {
        $builder = $this->db->table('sikaperdes_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Hapus User",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kd_login . " (Dihapus)",
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Hapus User",
            "target" => "3",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kd_login . " (Dihapus)",
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }
}

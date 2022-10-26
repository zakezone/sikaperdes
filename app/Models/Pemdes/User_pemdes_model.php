<?php

namespace App\Models\Pemdes;

use CodeIgniter\Model;

class User_pemdes_model extends Model
{
    protected $table = 'sikaperdes_primary_user';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['kd_wilayah', 'is_active'];

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

    // public function Notifikasiakses($input, $user, $kd_login)
    // {
    //     $builder = $this->db->table('sikaperdes_notifikasi');
    //     if ($input['role'] == 2) {
    //         $role = 'Administrator';
    //     } else if ($input['role'] == 3) {
    //         $role = 'Moderator';
    //     } else if ($input['role'] == 4) {
    //         $role = 'Member';
    //     } else if ($input['role'] == 5) {
    //         $role = 'Belum Assign';
    //     } else if ($input['role'] == 6) {
    //         $role = 'Kabupaten';
    //     } else if ($input['role'] == 7) {
    //         $role = 'Provinsi';
    //     }

    //     $insert1 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Role Akses Assign",
    //         "target" => "2",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $kd_login['kd_login'] . ' ' .  '(' . $role . ')',
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $insert2 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Role Akses",
    //         "target" => "3",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $kd_login['kd_login'] . ' ' . '(' . $role . ')',
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $builder->insert($insert1);
    //     $builder->insert($insert2);
    // }

    // public function Notifikasihapus($kd_login, $user)
    // {
    //     $builder = $this->db->table('sikaperdes_notifikasi');

    //     $insert1 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Hapus User",
    //         "target" => "2",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $kd_login . " (Dihapus)",
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $insert2 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Hapus User",
    //         "target" => "3",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $kd_login . " (Dihapus)",
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $builder->insert($insert1);
    //     $builder->insert($insert2);
    // }
}

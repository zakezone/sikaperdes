<?php

namespace App\Validation;

class Userrulesikaperdes
{
    protected $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function validasiSIE(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $user = $builder->getWhere(['kd_login' => $data['kd_login']])->getRowArray();

        if (!password_verify($data['password'], $user['password']))
            return false;

        if (password_verify($data['password'], $user['password']))
            return true;
    }

    public function aktivasiSIE(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $user = $builder->getWhere(['kd_login' => $data['kd_login']])->getRowArray();

        if ($user['is_active'] != 1)
            return false;

        if ($user['is_active'] == 1)
            return true;
    }

    public function unassignSIE(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $user = $builder->getWhere(['kd_login' => $data['kd_login']])->getRowArray();

        if ($user['role_id'] == 100)
            return false;

        if ($user['role_id'] != 100)
            return true;
    }

    public function registrasiSIE(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sikaperdes_primary_user');
        $user = $builder->getWhere(['kd_login' => $data['kd_login']])->getRowArray();

        if (!$user)
            return false;

        if ($user)
            return true;
    }

    // public function ruleSalur(string $str, string $fields, array $data)
    // {
    //     @list($thousand, $decimal, $message) = explode(',', $data['januari']);
    //     $thousand = (empty($thousand) || $thousand === 'COMMA') ? ',' : '.';
    //     $decimal = (empty($decimal) || $decimal === 'DOT') ? '.' : ',';
    //     $message = (empty($message)) ? 'Format inputan salur invalid' : $message;

    //     $regExp = "/^\s*[$]?\s*((\d+)|(\d{1,3}(\{thousand}\d{3})+)|(\d{1,3}(\{thousand}\d{3})(\{decimal}\d{3})+))(\{decimal}\d{2})?\s*$/";
    //     $regExp = str_replace("{thousand}", $thousand, $regExp);
    //     $regExp = str_replace("{decimal}", $decimal, $regExp);

    //     $ok = preg_match($regExp, $data['januari']);
    //     if (!$ok) {
    //         return FALSE;
    //     }
    //     return TRUE;
    // }
}

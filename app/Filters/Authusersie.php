<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authusersie implements FilterInterface
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('zakezone');
    }
    // ini tu tugasnya = jika pada saat ada yg akses kehalaman admin tapi sessionnya ga sesuai dengan kondisi maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('role_id_sikaperdes')) {
            return redirect()->to(site_url('/user/panel'));
        } else {
            $buildermenu = $this->db->table('sikaperdes_primary_user_menu');
            $builderaccessmenu = $this->db->table('sikaperdes_primary_user_access_menu');
            $role_id = session()->get('role_id_sikaperdes');
            $menu = $request->uri->getSegment(2);
            // dd($role_id);
            $queryMenu = $buildermenu->getWhere(['menu' => $menu])->getRowArray();
            // dd($queryMenu);
            $menu_id = $queryMenu['id'];

            $builderaccessmenu->where(['role_id' => $role_id, 'menu_id' => $menu_id]);
            $userAccess = $builderaccessmenu->countAllResults();
            // dd($userAccess);
            if ($userAccess < 1) {
                return redirect()->to(site_url('user/blocked'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

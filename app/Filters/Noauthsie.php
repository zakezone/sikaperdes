<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauthsie implements FilterInterface
{
    // ini tu tugasnya = jika pada saat ada yg akses loginpage tapi punya session maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('role_id_sikaperdes') == 1)
            return redirect()->to(site_url('user/admin/dashboard'));
        if (session()->get('role_id_sikaperdes') == 2)
            return redirect()->to(site_url('user/provinsi/dashboard'));
        if (session()->get('role_id_sikaperdes') == 3)
            return redirect()->to(site_url('user/pemkab/dashboard'));
        if (session()->get('role_id_sikaperdes') == 4)
            return redirect()->to(site_url('user/kecamatan/dashboard'));
        if (session()->get('role_id_sikaperdes') == 5)
            return redirect()->to(site_url('user/pemdes/dashboard'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

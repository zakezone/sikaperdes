<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Deletedatasie implements FilterInterface
{
    // ini tu tugasnya = Membatasi dokumen yang bisa diakses berdasarkan sesion permendagri_id nya harus sesuai dengan file_id yg sedang dibuka(untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('role_id_sikaperdes')) {
            return redirect()->to(site_url('/user/panel'));
        } else {
            $role_id = session()->get('role_id_sikaperdes');
            $kd_wilayah = $request->uri->getSegment(6);
            if ($role_id != 1 && $kd_wilayah != 1) {
                return redirect()->to(site_url('user/blocked'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

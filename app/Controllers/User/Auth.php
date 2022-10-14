<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $validation;
    protected $email;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validation = \Config\Services::validation();
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        if (isset($_POST['signin'])) {
            $this->validation->setRule('kd_login', 'KODE LOGIN', 'required|numeric|min_length[8]|max_length[14]|trim', ['numeric' => 'KODE LOGIN hanya diisi angka (tanpa spasi)', 'required' => 'KODE LOGIN tidak boleh kosong', 'min_length' => 'KODE LOGIN minimal 8 digit', 'max_length' => 'KODE LOGIN maximal 14 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/auth')->withInput();
            }
            $this->validation->setRule('password', 'Password', 'registrasiSIE[kd_login,password]|aktivasiSIE[kd_login,password]|validasiSIE[kd_login,password]|unassignSIE[kd_login,password]', ['validasiSIE' => 'Kesalahan input Password', 'aktivasiSIE' => 'Akun belum di aktifkan. Hubungi petugas!', 'registrasiSIE' => 'KODE LOGIN belum terdaftar. Hubungi petugas!', 'unassignSIE' => 'Akun belum di assign. Hubungi petugas!']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/auth')->withInput();
            } else {
                $builder = $this->db->table('sikaperdes_primary_user');
                $user = $builder->getWhere(['kd_login' => $this->request->getVar('kd_login')])->getRowArray();
                $this->login($user);

                if ($user['role_id'] == 1) {
                    return redirect()->to(site_url('user/admin/dashboard'));
                }
                if ($user['role_id'] == 2) {
                    return redirect()->to(site_url('user/provinsi/dashboard'));
                }
                if ($user['role_id'] == 3) {
                    return redirect()->to(site_url('user/pemkab/dashboard'));
                }
                if ($user['role_id'] == 4) {
                    return redirect()->to(site_url('user/kecamatan/dashboard'));
                }
                if ($user['role_id'] == 5) {
                    return redirect()->to(site_url('user/pemdes/dashboard'));
                }
            }
        }
        $data = [
            'title' => 'Login | SIKAPERDES PROV JATENG',
            'validation' => $this->validation
        ];
        return view('sikaperdes/user/auth/login', $data);
    }

    // function registration()
    // {
    //     if (isset($_POST['regis'])) {
    //         $this->validation->setRules(
    //             [
    //                 'email' => [
    //                     'label'  => 'Email',
    //                     'rules'  => 'required|trim|valid_email|is_unique[sikaperdes_primary_user.email]',
    //                     'errors' => [
    //                         'required' => 'Email tidak boleh kosong',
    //                         'valid_email' => 'Format email tidak sesuai',
    //                         'is_unique' => 'Email sudah terdaftar'
    //                     ],
    //                 ],
    //                 'kd_login' => [
    //                     'label'  => 'KODELOGIN',
    //                     'rules'  => 'required|numeric|min_length[18]|max_length[18]|trim|is_unique[sikaperdes_primary_user.kd_login]',
    //                     'errors' => [
    //                         'required' => 'KODE LOGIN tidak boleh kosong',
    //                         'min_length' => 'KODE LOGIN harus 18 digit (hanya diisi angka tanpa spasi)',
    //                         'max_length' => 'KODE LOGIN harus 18 digit (hanya diisi angka tanpa spasi)',
    //                         'is_unique' => 'KODE LOGIN sudah terdaftar',
    //                         'numeric' => 'KODE LOGIN hanya diisi angka (tanpa spasi)'
    //                     ],
    //                 ],
    //                 'nama' => [
    //                     'label'  => 'Nama',
    //                     'rules'  => 'required|trim',
    //                     'errors' => [
    //                         'required' => 'Nama tidak boleh kosong'
    //                     ],
    //                 ],
    //                 'kab_kota_ampuan' => [
    //                     'label'  => 'KabKotaAmpuan',
    //                     'rules'  => 'required|trim',
    //                     'errors' => [
    //                         'required' => 'Kabupaten/Kota ampuan tidak boleh kosong'
    //                     ],
    //                 ],
    //                 'tk_instansi' => [
    //                     'label'  => 'TKInstansi',
    //                     'rules'  => 'required|trim',
    //                     'errors' => [
    //                         'required' => 'Pilih Tingkat Instansi'
    //                     ],
    //                 ],
    //                 'hp' => [
    //                     'label'  => 'HP',
    //                     'rules'  => 'required|alpha_numeric_punct|min_length[11]|max_length[15]|trim',
    //                     'errors' => [
    //                         'required' => 'Nomor HP tidak boleh kosong',
    //                         'alpha_numeric_punch' => 'Nomor HP hanya diisi angka (tanpa spasi)',
    //                         'min_length' => 'Nomor HP minimal harus 11 digit',
    //                         'max_length' => 'Nomor HP maximal hanya 15 digit'
    //                     ],
    //                 ],
    //                 'password' => [
    //                     'label'  => 'Password',
    //                     'rules'  => 'required|trim|min_length[6]',
    //                     'errors' => [
    //                         'required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit'
    //                     ],
    //                 ],
    //             ]
    //         );
    //         if (!$this->validation->withRequest($this->request)->run()) {
    //             return redirect()->to('user/registrasi')->withInput();
    //         } else {
    //             $builderuser = $this->db->table('sikaperdes_primary_user');
    //             $buildertoken = $this->db->table('sikaperdes_primary_user_token');

    //             $email = $this->request->getVar('email');
    //             $datareg = [
    //                 'nama' => htmlspecialchars($this->request->getVar('nama')),
    //                 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    //                 'image' => 'default.png',
    //                 'role_id' => 9,
    //                 'email' => htmlspecialchars($email),
    //                 'kd_login' => htmlspecialchars($this->request->getVar('kd_login')),
    //                 'ampuan' => htmlspecialchars($this->request->getVar('kab_kota_ampuan')),
    //                 'tk_instansi' => htmlspecialchars($this->request->getVar('tk_instansi')),
    //                 'kd_wilayah' => 9,
    //                 'tanggal' => time(),
    //                 'hp' => htmlspecialchars($this->request->getVar('hp')),
    //                 'is_active' => 2,
    //             ];

    //             // token untuk Aktivasi
    //             $token = base64_encode(random_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'tanggal' => time()
    //             ];

    //             $builderuser->insert($datareg);
    //             $buildertoken->insert($user_token);

    //             $this->_sendEmail($token, 'verify');

    //             return redirect('user/konfirmasi-email');
    //         }
    //     }
    //     $data = [
    //         'title' => 'Registrasi | SIE PROV JATENG',
    //         'validation' => $this->validation
    //     ];
    //     return view('sikaperdes/user/auth/registration', $data);
    // }

    // function confirm_email()
    // {
    //     $data = [
    //         'title' => 'Konfirmasi | SIE PROV JATENG',
    //     ];
    //     return view('sikaperdes/user/auth/konfirmasiemail', $data);
    // }

    function confirm_resetpass()
    {
        $data = [
            'title' => 'Konfirmasi | SIE PROV JATENG',
        ];
        return view('sikaperdes/user/auth/konfirmasireset', $data);
    }

    function forgotpassword()
    {
        if ($this->session->get('role_id_sikaperdes')) {
            return redirect('user/panel');
        }
        if (isset($_POST['forgot'])) {
            $this->validation->setRule('email', 'Email', 'required|trim|valid_email', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/lupa-password')->withInput();
            } else {
                $builderuser = $this->db->table('sikaperdes_primary_user');
                $buildertoken = $this->db->table('sikaperdes_primary_user_token');

                $email = $this->request->getVar('email');
                $user = $builderuser->getWhere(['email' => $email, 'is_active' => 1])->getRowArray();

                if ($user) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'tanggal' => time()
                    ];

                    $buildertoken->insert($user_token);
                    $this->_sendEmail($token, 'forgot');

                    return redirect('user/konfirmasi-resetpass');
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Email belum terdaftar/aktif!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect('user/lupa-password');
                }
            }
        }
        $data = [
            'title' => 'Lupa Password | SIE PROV JATENG',
            'validation' => $this->validation
        ];
        return view('sikaperdes/user/auth/forgot-password', $data);
    }

    private function login($user)
    {
        $data = [
            'email_sikaperdes' => $user['email'],
            'kd_login_sikaperdes' => $user['kd_login'],
            'opd_sikaperdes' => $user['opd'],
            'role_id_sikaperdes' => $user['role_id'],
            'id_sikaperdes' => $user['user_id'],
            'kd_wilayah_sikaperdes' => $user['kd_wilayah'],
        ];
        $this->session->set($data);
        return true;
    }

    public function logout()
    {
        $data = [
            'email_sikaperdes',
            'kd_login_sikaperdes',
            'opd_sikaperdes',
            'role_id_sikaperdes',
            'id_sikaperdes',
            'kd_wilayah_sikaperdes',
            'reset_pass'
        ];
        $this->session->remove($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Anda telah logged out!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect('user/panel');
    }

    private function _sendEmail($token, $type)
    {
        $this->email->setFrom('dispermades.adm@gmail.com', 'SIE DISPERMADESDUKCAPIL. PROV. JATENG');
        $this->email->setTo($this->request->getVar('email'));

        if ($type == 'verify') {
            $this->email->setSubject('Aktivasi Akun SIE-DISPERMADESDUKCAPIL Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/user/verify?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Aktivasi</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
        } else if ($type == 'forgot') {
            $this->email->setSubject('Reset password SIE-DISPERMADESDUKCAPIL Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/user/resetpassword?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Reset password</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->printDebugger();
            die;
        }
    }

    // function verify()
    // {
    //     $builderuser = $this->db->table('sikaperdes_primary_user');
    //     $buildertoken = $this->db->table('sikaperdes_primary_user_token');

    //     $email = $this->request->getVar('email');
    //     $token = $this->request->getVar('token');

    //     $user = $builderuser->getWhere(['email' => $email])->getRowArray();

    //     if ($user) {
    //         $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
    //         if ($user_token) {
    //             if (time() - $user_token['tanggal'] < (60 * 60 * 24)) {
    //                 $builderuser->set('is_active', 1);
    //                 $builderuser->where('email', $email);
    //                 $builderuser->update();
    //                 $buildertoken->delete(['email' => $email]);

    //                 $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>' . $email . ' telah diaktifkan. silahkan <b>menghubungi petugas AMPUAN untuk verifikasi ID KEMENDAGRI!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    //                 return redirect('user/panel');
    //             } else {

    //                 $builderuser->delete(['email' => $email]);
    //                 $buildertoken->delete(['email' => $email]);

    //                 $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Aktivasi akun gagal: Aktivasi telah expired silahkan register kembali!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    //                 return redirect('user/panel');
    //             }
    //         } else {
    //             $this->session->setFlashdata('message', '<div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert"><i class="mdi mdi-alert-circle-outline label-icon"></i>Aktivasi akun gagal: Token sudah pernah digunakan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    //             return redirect('user/panel');
    //         }
    //     } else {
    //         $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Aktivasi akun gagal: Email tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    //         return redirect('user/panel');
    //     }
    // }

    function resetPassword()
    {
        $builderuser = $this->db->table('sikaperdes_primary_user');
        $buildertoken = $this->db->table('sikaperdes_primary_user_token');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        if ($email == null) {
            return redirect('user/panel');
        }
        $user = $builderuser->getWhere(['email' => $email])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                $reset_email = ['reset_pass' => $email];
                $this->session->set($reset_email);
                $this->changePassword();
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! Tautan token tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect('user/panel');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! Email tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/panel');
        }
    }

    function changePassword()
    {
        $builderuser = $this->db->table('sikaperdes_primary_user');
        $buildertoken = $this->db->table('sikaperdes_primary_user_token');

        if (!$this->session->get('reset_pass')) {
            return redirect('user/panel');
        }
        if (isset($_POST['gantipas'])) {
            $this->validation->setRule('password1', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/ganti-password')->withInput();
            }
            $this->validation->setRule('password2', 'Password', 'matches[password1]', ['matches' => 'Pencocokan password tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/ganti-password')->withInput();
            } else {
                $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
                $email = $this->session->get('reset_pass');

                $builderuser->set('password', $password);
                $builderuser->where('email', $email);
                $builderuser->update();
                $buildertoken->delete(['email' => $email]);

                $this->session->remove('reset_pass');
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Password berhasil <b>diubah</b>. Silahkan login!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect('user/panel');
            }
        }
        $data = [
            'title' => 'Ganti Password | SIE PROV JATENG',
            'validation' => $this->validation
        ];
        echo view('sikaperdes/user/auth/change-password', $data);
    }

    public function blocked()
    {
        return view('sikaperdes/user/auth/blocked');
    }

    public function blockedakses()
    {
        return view('sikaperdes/user/auth/blockedakses');
    }
}

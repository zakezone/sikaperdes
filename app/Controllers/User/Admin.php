<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\User_admin_model;
use App\Models\Admin\User_regapi_model;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;

class Admin extends BaseController
{
    protected $Admin_model;
    protected $Regapi_model;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Admin_model = new User_admin_model();
        $this->Regapi_model = new User_regapi_model();
        $this->Filterdatakabupaten_model = new Filtkabupaten();
        $this->Filterdatakecamatan_model = new Filtkecamatan();
        $this->Filterdatakeldesa_model = new Filtkeldesa();
        helper('zakezone');
    }

    public function dashboard()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Dashboard', 'li_1' => 'Admin', 'li_2' => 'Dashboard']),
        ];
        return view('sikaperdes/user/admin/dashboard', $data);
    }

    public function role_management()
    {
        $this->session->remove('keywordapi');
        $builder = $this->db->table('sikaperdes_primary_user');

        $filtkabupaten = '';
        $filtkecamatan = '';
        $filtkeldesa = '';
        if (isset($_POST['filter'])) {
            $filtkabupaten = $this->request->getPost('filtkabupaten');
            $filtkecamatan = $this->request->getPost('filtkecamatan');
            $filtkeldesa = $this->request->getPost('filtkeldesa');
        }

        $data = [
            'title' => 'Role',
            'user' => $builder->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'rolak' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $this->session->get('role_id_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Role Management', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'listKabupaten' => $this->Filterdatakabupaten_model->select('kd_wilayah, akses')->where('kd_wilayah !=', '2')->orderBy('kd_wilayah')->findAll(),
            'listKecamatan' => $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->orderBy('kd_wilayah')->findAll(),
            'listKeldesa' => $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->orderBy('kd_wilayah')->findAll(),
            'filtkabupaten' => $filtkabupaten,
            'filtkecamatan' => $filtkecamatan,
            'filtkeldesa' => $filtkeldesa,
        ];

        return view('sikaperdes/user/admin/rolemanagement', $data);
    }

    public function ajaxserverSide_rolemanagement()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $filtkabupaten = $this->request->getPost('filtkabupaten');
        $filtkecamatan = $this->request->getPost('filtkecamatan');
        $filtkeldesa = $this->request->getPost('filtkeldesa');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing = $this->Admin_model->defaultgetRole($search_value, $order, $length, $start, $filtkabupaten, $filtkecamatan, $filtkeldesa);
        $recordsTotal = $this->Admin_model->recordsTotal();
        $recordsFiltered = $this->Admin_model->recordsFiltered($search_value, $filtkabupaten, $filtkecamatan, $filtkeldesa);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key['nama'];
            $row[] = $key['kd_login'];
            $row[] = $key['opd'];
            $row[] = $key['ampuan'];
            $row[] = $key['akses'];
            $row[] = $key['tk_instansi'];
            $row[] = '<a href="role_edit/' . $key['user_id'] . '' . "/" . '' . $key['kd_wilayah'] . '" class="badge bg-info">Edit</a> <a href="role_access/' . $key['role_id'] . '" class="badge bg-warning">Configure</a>';
            $data[] = $row;
        }

        $json_data = array(
            'draw' => intval($param['draw']),
            'recordsTotal' => count($recordsTotal),
            'recordsFiltered' => $recordsFiltered['jml'],
            'data' => $data,
            $csrfName => $csrfHash,
        );

        return $this->response->setJSON($json_data);
    }

    public function ajaxfiltkecamatan()
    {
        $filtkabupaten = $this->request->getVar('filtkabupaten');
        if ($this->request->getVar('searchTerm')) {
            $listKecamatan = $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->like('akses', $this->request->getVar('searchTerm'))->orLike('kd_wilayah', $this->request->getVar('searchTerm'))->orderBy('kd_wilayah')->findAll();
        } else {
            $listKecamatan = $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->orderBy('kd_wilayah')->findAll();
        }
        $data = [];
        foreach ($listKecamatan as $lkec) {
            $data[] = [
                'id' => $lkec['kd_wilayah'],
                'text' => $lkec['kd_wilayah'] . ' - ' . $lkec['akses']
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function ajaxfiltkeldesa()
    {
        $filtkecamatan = $this->request->getVar('filtkecamatan');
        if ($this->request->getVar('searchTerm')) {
            $listKeldesa = $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->like('akses', $this->request->getVar('searchTerm'))->orLike('kd_wilayah', $this->request->getVar('searchTerm'))->orderBy('kd_wilayah')->findAll();
        } else {
            $listKeldesa = $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->orderBy('kd_wilayah')->findAll();
        }
        $data = [];
        foreach ($listKeldesa as $lkdes) {
            $data[] = [
                'id' => $lkdes['kd_wilayah'],
                'text' => $lkdes['kd_wilayah'] . ' - ' . $lkdes['akses']
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function role_edit($user_id, $kd_wilayah)
    {
        $this->session->remove('keywordapi');
        $editrole = $this->db->table('sikaperdes_primary_role');
        $editrole->where('id !=', 1);

        $data = [
            'title' => 'Role',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Role Edit', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'edit' => $this->db->table('sikaperdes_primary_user')->getWhere(['user_id' => $user_id])->getRowArray(),
            'tabrole' => $editrole->get()->getResultArray(),
            'permendagri' => $this->db->table('rm_admin')->where('kd_wilayah', $kd_wilayah)->orderBy('id_prov ASC')->get()->getRowArray(),
            'roleedit' => $this->db->table('rm_admin')->select(['kd_wilayah', 'role', 'akses'])->orderBy('id_prov ASC')->get()->getResultArray(),
            'tabactive' => $this->db->table('sikaperdes_primary_is_active')->get()->getResultArray()
        ];

        $this->validation->setRule('id', 'Id', 'trim|required', ['required' => 'Id tidak boleh dikosongkan']);
        if ($this->validation->withRequest($this->request)->run()) {
            $userupdate = $this->db->table('sikaperdes_primary_user');
            $userupdatedata = [
                "kd_wilayah" => $this->request->getVar('idpermendagri'),
                "role_id" => $this->request->getVar('role'),
                "is_active" => $this->request->getVar('is_active')
            ];
            $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Role <b>' . $data['edit']['nama'] . '</b> Berhasil diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $userupdate->where('user_id', $this->request->getVar('id'));
            $userupdate->update($userupdatedata);

            $this->session->setFlashdata('message', $flash);
            return redirect()->to('user/admin/role_management');
        } else {
            return view('sikaperdes/user/admin/role-edit', $data);
        }
    }

    public function role_access($role_id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $tabmenu = $this->db->table('sikaperdes_primary_user_menu');
        $tabmenu->where('id !=', 1);

        $data = [
            'title' => 'Role',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Konfigurasi Akses Menu', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'role' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $role_id])->getRowArray(),
            'kd_login' => $this->db->table('sikaperdes_primary_user')->getWhere(['role_id' => $role_id])->getRowArray(),
            'menu' => $tabmenu->get()->getResultArray(),
        ];
        return view('sikaperdes/user/admin/role-access', $data);
    }

    public function changeAccess()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $menu_id = $this->request->getVar('menuId');
        $role_id = $this->request->getVar('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->table('sikaperdes_primary_user_access_menu');
        $result->where($data);
        if ($result->countAllResults() < 1) {
            $result->insert($data);
        } else {
            $result->delete($data);
        }
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Akses menu</b> Berhasil dikonfigurasi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function profile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Admin', 'li_2' => 'Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
        ];

        return view('sikaperdes/user/admin/profile', $data);
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Admin', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/editprofile')->withInput();
            }
            if ($data['user']['email'] == '') {
                $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sikaperdes_primary_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/admin/editprofile')->withInput();
                }
            }
            if ($data['user']['hp'] == '') {
                $this->validation->setRule('hp', 'HP', 'required|alpha_numeric_punct|min_length[11]|max_length[15]|trim|is_unique[sikaperdes_primary_user.hp]', ['required' => 'Nomor HP tidak boleh kosong', 'alpha_numeric_punch' => 'Nomor HP hanya diisi angka (tanpa spasi)', 'min_length' => 'Nomor HP minimal harus 11 digit', 'max_length' => 'Nomor HP maximal hanya 15 digit', 'is_unique' => 'Nomor HP sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/admin/editprofile')->withInput();
                }
            }
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sikaperdes');
                $this->Admin_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/admin/profile');
            }
        }
        return view('sikaperdes/user/admin/editprofile', $data);
    }

    public function editemail()
    {
        $userid = $this->request->getVar('userid');
        $email = $this->request->getVar('email');

        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->set('email', $email);
        $builder->where('user_id', $userid);
        $builder->update();
    }

    public function edithp()
    {
        $userid = $this->request->getVar('userid');
        $hp = $this->request->getVar('hp');

        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->set('hp', $hp);
        $builder->where('user_id', $userid);
        $builder->update();
    }

    public function changepassword()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $data = [
            'title' => 'Ganti Password',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Ganti Password', 'li_1' => 'Admin', 'li_2' => 'Ganti Password']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('current_password', 'Current Password', 'required|trim', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password1', 'New Password', 'required|trim|min_length[6]', ['required' => 'Form tidak boleh dikosongkan', 'min_length' => 'Password minimal 6 karakter']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password2', 'New Password2', 'trim|matches[new_password1]', ['matches' => 'Input tidak sesuai dengan password baru']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            } else {
                $current_password = $this->request->getVar('current_password');
                $new_password = password_hash($this->request->getVar('new_password1'), PASSWORD_DEFAULT);
                if (!password_verify($current_password, $data['user']['password'])) {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Gagal! Password awal tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to('user/admin/ganti_password')->withInput();
                } else {
                    if (password_verify($current_password, $new_password)) {
                        $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Gagal! Password ini telah digunakan sebelumnya<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/admin/ganti_password')->withInput();
                    } else {
                        $builder = $this->db->table('sikaperdes_primary_user');
                        $builder->set('password', $new_password);
                        $builder->where('user_id', $this->session->get('id_sikaperdes'));
                        $builder->update();
                        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Password</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/admin/ganti_password');
                    }
                }
            }
        }
        return view('sikaperdes/user/admin/ganti-password', $data);
    }

    public function registrasi_api()
    {
        $this->session->remove('keyword');
        $start = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_role = $this->Regapi_model->getApiUser($cari);
        } else {
            $get_role = $this->Regapi_model->defaultgetApiUser();
        }

        $data = [
            'title' => 'Registrasi API',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'rolak' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $this->session->get('role_id_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Registrasi User API', 'li_1' => 'Admin', 'li_2' => 'Registrasi User API']),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'auth_api_key'),
            'validation' =>  $this->validation
        ];

        if ($cari) {
            $data['total_rows'] = $this->Regapi_model->getApiUser($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Regapi_model->defaultgetApiUser()->countAllResults();
        }

        return view('sikaperdes/user/admin/registerapi', $data);
    }

    public function register_api()
    {
        $email = $this->request->getVar('email');

        $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[auth_api_key.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
        $this->validation->setRule('aplication', 'Aplication', 'required|trim', ['required' => 'Nama aplikasi tidak boleh kosong']);
        $this->validation->setRule('password', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
        if ($this->validation->withRequest($this->request)->run()) {
            $input = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'aplication' => $this->request->getVar('aplication'),
                'created' => time()
            ];
            $builder = $this->db->table('auth_api_key');
            $builder->insert($input);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>' . $email . ' telah <b>diregistrasi!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/admin/registrasi_api');
        } else {
            $validation = $this->validation;
            $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Registrasi gagal: Periksa kembali inputan Anda masih ada yang salah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('user/admin/registrasi_api')->with('validation', $validation);
        }
    }

    public function hapusUserApi($id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $hapus = $this->db->table('auth_api_key');
        $hapus->delete(['id' => $id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>User berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/admin/registrasi_api');
    }

    public function hapussessionkeywordapi()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        return redirect()->to('user/admin/registrasi_api');
    }
}

<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;
use App\Models\Menu\Data_kawasan;

class Menu_admin extends BaseController
{
    protected $Menu_admin_kawasan;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;
    protected $validation;

    public function __construct()
    {
        $this->Menu_admin_kawasan = new Data_kawasan();
        $this->Filterdatakabupaten_model = new Filtkabupaten();
        $this->Filterdatakecamatan_model = new Filtkecamatan();
        $this->Filterdatakeldesa_model = new Filtkeldesa();
        date_default_timezone_set('Asia/Jakarta');
        session()->remove('keywordapi');
        helper('zakezone');
    }

    public function verifikasi_data_kawasan()
    {
        $data = [
            'title' => 'Verifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'DATA KAWASAN PERDESAAN', 'li_1' => 'Kawasan', 'li_2' => 'Verifikasi', 'li_3' => 'Data']),
            'getdatastatus' => ['all', 'pending', 'revisi', 'disetujui'],
        ];

        return view('sikaperdes/menu/kawasan/data_kawasan', $data);
    }

    public function load_data_kawasan()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $statusfilt = $this->request->getPost('statusfilt');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Menu_admin_kawasan->getDataKawasan($search_value, $order, $length, $start, $statusfilt);
        $recordsTotal = $this->Menu_admin_kawasan->recordsTotalKawasan();
        $recordsFiltered = $this->Menu_admin_kawasan->recordsFilteredKawasan($search_value, $statusfilt);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $jumlahdesa = $this->Menu_admin_kawasan->getJmlDesa($row[] = $key['nm_kawasan']);
            $jumlahkec = $this->Menu_admin_kawasan->getJmlKec($row[] = $key['nm_kawasan']);
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key['nm_kab'];
            $row[] = $jumlahkec;
            foreach ($jumlahdesa as $jd) {
                $row[] = $jd;
            }
            $row[] = $key['nm_kawasan'];
            $row[] = $key['tahun_pembentukan'];
            if ($key['verifikasi'] == "disetujui") {
                $row[] = '<a style="color:forestgreen;">' . $key['verifikasi'] . '</a>';
            } elseif ($key['verifikasi'] == "revisi") {
                $row[] = '<a style="color:goldenrod;">' . $key['verifikasi'] . '</a>';
            } else {
                $row[] = '<a style="color:red;">' . $key['verifikasi'] . '</a>';
            }
            $row[] = '<a href="verifikasi_review/' . $key['kd_kab'] .  "/"  . $key['kd_kawasan'] . '" class="badge bg-primary">Verifikasi</a>';
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

    public function verifikasireview($kd_kab, $kd_kawasan)
    {
        $whois = $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan])->getRowArray();

        $pk = $this->db->query("SELECT `potensi_kawasan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pk["potensi_kawasan"] != null) {
            $potensi_kawasan = explode("^", $pk["potensi_kawasan"]);
        } else {
            $potensi_kawasan = "-";
        }

        $pu = $this->db->query("SELECT `produk_unggulan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pu["produk_unggulan"] != null) {
            $produk_unggulan = explode("^", $pu["produk_unggulan"]);
        } else {
            $produk_unggulan = "-";
        }

        $ipu = $this->db->query("SELECT `img_produk_unggulan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($ipu["img_produk_unggulan"] != null) {
            $img_produk_unggulan = explode("^", $ipu["img_produk_unggulan"]);
        } else {
            $img_produk_unggulan = "-";
        }

        $pks = $this->db->query("SELECT `potensi_kerjasama_pihak3` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pks["potensi_kerjasama_pihak3"] != null) {
            $potensi_kerjasama_pihak3 = explode("^", $pks["potensi_kerjasama_pihak3"]);
        } else {
            $potensi_kerjasama_pihak3 = "-";
        }

        $data = [
            'title' => 'Verifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'VERIFIKASI DATA KAWASAN PERDESAAN "' . $whois['nm_kawasan'] . '"', 'li_1' => 'Kawasan', 'li_2' => 'Verifikasi', 'li_3' => 'Data']),
            'nm_kawasan' => $whois['nm_kawasan'],
            'dokumen' => $this->db->table('sikaperdes_kawasan_bank_data')->select('*')->distinct()->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getRowArray(),
            'dokumen_sk' => $this->db->table('sikaperdes_kawasan_bank_data')->select('*')->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getRowArray(),
            'potensi_kawasan' => $potensi_kawasan,
            'produk_unggulan' => $produk_unggulan,
            'img_produk_unggulan' => $img_produk_unggulan,
            'potensi_kerjasama_pihak3' => $potensi_kerjasama_pihak3,
            'bank_data' => $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getResultArray(),
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('status', 'Status', 'trim|required', ['required' => 'Status laporan belum terindex']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/verifikasi_review/' . $kd_kab . '/' . $kd_kawasan)->withInput();
            } else {
                $update = [
                    'verifikasi' => $this->request->getVar('status'),
                    'tgl_verifikasi' => time(),
                ];
                $verif = $this->db->table('sikaperdes_kawasan_bank_data');
                $verif->where('kd_kab', $kd_kab);
                $verif->where('kd_kawasan', $kd_kawasan);
                $verif->update($update);
                // if (isset($_POST['permendagri_id'])) {
                //     $input = $this->request->getVar();
                //     $this->Menu_admin_kawasan->Notifikasi($input);
                // }
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Verifikasi dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/verifikasi_data');
            }
        }

        return view('sikaperdes/menu/kawasan/verifikasi_data_kawasan', $data);
    }

    public function listinputdatakawasan()
    {
        $data = [
            'title' => 'Data Inputan',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'DATA KAWASAN PERDESAAN', 'li_1' => 'Kawasan', 'li_2' => 'List', 'li_3' => 'Data']),
            'getdatastatus' => ['all', 'pending', 'revisi', 'disetujui'],
        ];

        return view('sikaperdes/menu/kawasan/list_inputan_data_kawasan', $data);
    }

    public function list_datainput_kawasan()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $statusfilt = $this->request->getPost('statusfilt');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Menu_admin_kawasan->getDataKawasan($search_value, $order, $length, $start, $statusfilt);
        $recordsTotal = $this->Menu_admin_kawasan->recordsTotalKawasan();
        $recordsFiltered = $this->Menu_admin_kawasan->recordsFilteredKawasan($search_value, $statusfilt);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $jumlahdesa = $this->Menu_admin_kawasan->getJmlDesa($row[] = $key['nm_kawasan']);
            $jumlahkec = $this->Menu_admin_kawasan->getJmlKec($row[] = $key['nm_kawasan']);
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key['nm_kab'];
            $row[] = $jumlahkec;
            foreach ($jumlahdesa as $jd) {
                $row[] = $jd;
            }
            $row[] = $key['nm_kawasan'];
            $row[] = $key['tahun_pembentukan'];
            if ($key['verifikasi'] == "disetujui") {
                $row[] = '<a style="color:forestgreen;">' . $key['verifikasi'] . '</a>';
                $row[] = '<a href="../data/verifikasi_review/' . $key['kd_kab'] .  "/"  . $key['kd_kawasan'] . '" class="badge bg-info">Detail</a>';
            } elseif ($key['verifikasi'] == "revisi") {
                $row[] = '<a style="color:goldenrod;">' . $key['verifikasi'] . '</a>';
                $row[] = '<a href="revisi_review/' . $key['kd_kab'] .  "/"  . $key['kd_kawasan'] . '" class="badge bg-warning">Revisi</a>
                <a href="#" class="badge bg-danger deleting" id="sa-delete" data-kdkab="' . $key['kd_kab'] . '" data-kdkawasan="' . $key['kd_kawasan'] . '">Delete</a>';
                // $row[] = '<a href="#" class="badge bg-danger deleting" id="sa-delete" data-kdkab="' . $key['kd_kab'] . '" data-kdkawasan="' . $key['kd_kawasan'] . '">Delete</a>';
            } else {
                $row[] = '<a style="color:red;">' . $key['verifikasi'] . '</a>';
                $row[] = '<a href="#" class="badge bg-danger deleting" id="sa-delete" data-kdkab="' . $key['kd_kab'] . '" data-kdkawasan="' . $key['kd_kawasan'] . '">Delete</a>';
            }
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

    public function inputdatakawasan()
    {
        if (isset($_POST['submit'])) {
            $this->validation->setRule('id_kawasan', 'NMKAWASAN', 'trim|required', ['required' => 'Nama Kawasan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('jenisklasifikasi', 'JenisKlasifikasi', 'trim|required', ['required' => 'Jenis Klasifikasi harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('filtkabupaten', 'FilterKabupaten', 'trim|required', ['required' => 'Nama Kabupaten harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('filtkecamatan', 'FilterKecamatan', 'trim|required', ['required' => 'Nama Kecamatan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('filtkeldesa', 'Filterkeldesa', 'trim|required', ['required' => 'Nama Desa harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('tahun_pembentukan', 'Tahunpembentukan', 'trim|required', ['required' => 'Tahun Pembentukan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            // $this->validation->setRule('sk_lokasi_kawasan', 'SKlokasi', 'trim|required', ['required' => 'SK Lokasi Kawasan harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            // $this->validation->setRule('sk_tkpkp_kawasan', 'SKTKPKP', 'trim|required', ['required' => 'SK TKPKP Kawasan harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            // $this->validation->setRule('perbup_rpkp', 'Perbubrpkp', 'trim|required', ['required' => 'PERBUP RPKP harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            // $this->validation->setRule('perda_kab_pembangunan', 'Perdakabpembangunan', 'trim|required', ['required' => 'PERDA KAB Pembangunan harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            // $this->validation->setRule('perbup_pembangunan', 'Perbuppembangunan', 'trim|required', ['required' => 'PERBUP Pembangunan harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            // $this->validation->setRule('sk_tkpkp_kab_pembangunan', 'SKTKPKPKABpembangunan', 'trim|required', ['required' => 'SK TKPKP KAB Pembangunan harus diisi']);
            // if (!$this->validation->withRequest($this->request)->run()) {
            //     return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            // }
            $this->validation->setRule('potensi_kawasan0', 'Potensikawasan', 'trim|required', ['required' => 'Potensi[1] Kawasan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image0', 'Image0', 'trim|uploaded[image0]|mime_in[image0,image/png,image/jpg,image/jpeg]|max_size[image0,4096]', ['uploaded' => 'Gambar[1] Produk Unggulan harus diisi', 'mime_in' => 'Ekstensi Gambar[1] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[1] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image1', 'Image1', 'trim|mime_in[image1,image/png,image/jpg,image/jpeg]|max_size[image1,4096]', ['mime_in' => 'Ekstensi Gambar[2] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[2] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image2', 'Image2', 'trim|mime_in[image2,image/png,image/jpg,image/jpeg]|max_size[image2,4096]', ['mime_in' => 'Ekstensi Gambar[3] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[3] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image3', 'Image3', 'trim|mime_in[image3,image/png,image/jpg,image/jpeg]|max_size[image3,4096]', ['mime_in' => 'Ekstensi Gambar[4] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[4] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image4', 'Image4', 'trim|mime_in[image4,image/png,image/jpg,image/jpeg]|max_size[image4,4096]', ['mime_in' => 'Ekstensi Gambar[5] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[5] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image5', 'Image5', 'trim|uploaded[image5]|mime_in[image5,image/png,image/jpg,image/jpeg]|max_size[image5,4096]', ['uploaded' => 'Gambar peta Deliniasi harus diisi', 'mime_in' => 'Ekstensi peta Delimitasi harus png/jpg/jpeg', 'max_size' => 'Maximal file size peta Delimitasi harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            } else {
                $input = $this->request->getVar();
                $img_produk_unggulan1 = $this->request->getFile('image0');
                $img_produk_unggulan2 = $this->request->getFile('image1');
                $img_produk_unggulan3 = $this->request->getFile('image2');
                $img_produk_unggulan4 = $this->request->getFile('image3');
                $img_produk_unggulan5 = $this->request->getFile('image4');
                $img_peta_delimitasi = $this->request->getFile('image5');
                $this->Menu_admin_kawasan->inputData($input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Input dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/verifikasi_data');
            }
        }

        $data = [
            'title' => 'Input Data',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'INPUT DATA KAWASAN', 'li_1' => 'Menu', 'li_2' => 'Input', 'li_3' => 'Data Kawasan']),
            'listKabupaten' => $this->Filterdatakabupaten_model->select('kd_wilayah, akses')->orderBy('kd_wilayah')->findAll(),
            'listKecamatan' => $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->orderBy('kd_wilayah')->findAll(),
            'listKeldesa' => $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->orderBy('kd_wilayah')->findAll(),
            'namakawasan' => $this->db->table('sikaperdes_kawasan_id')->select('*')->get()->getResultArray(),
            'jenisklasifikasi' => $this->db->table('sikaperdes_kawasan_klasifikasi')->select('*')->get()->getResultArray(),
            'validation' =>  $this->validation
        ];

        return view('sikaperdes/menu/kawasan/input_data_kawasan', $data);
    }

    public function revisidatainputkawasan($kd_kab, $kd_kawasan)
    {
        $whois = $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan])->getRowArray();

        $pk = $this->db->query("SELECT `potensi_kawasan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pk["potensi_kawasan"] != null) {
            $potensi_kawasan = explode("^", $pk["potensi_kawasan"]);
        } else {
            $potensi_kawasan = "-";
        }

        $pu = $this->db->query("SELECT `produk_unggulan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pu["produk_unggulan"] != null) {
            $produk_unggulan = explode("^", $pu["produk_unggulan"]);
        } else {
            $produk_unggulan = "-";
        }

        $ipu = $this->db->query("SELECT `img_produk_unggulan` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($ipu["img_produk_unggulan"] != null) {
            $img_produk_unggulan = explode("^", $ipu["img_produk_unggulan"]);
        } else {
            $img_produk_unggulan = "-";
        }

        $pks = $this->db->query("SELECT `potensi_kerjasama_pihak3` FROM `sikaperdes_kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pks["potensi_kerjasama_pihak3"] != null) {
            $potensi_kerjasama_pihak3 = explode("^", $pks["potensi_kerjasama_pihak3"]);
        } else {
            $potensi_kerjasama_pihak3 = "-";
        }

        $data = [
            'title' => 'Verifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'REVISI DATA KAWASAN PERDESAAN "' . $whois['nm_kawasan'] . '"', 'li_1' => 'Kawasan', 'li_2' => 'Verifikasi', 'li_3' => 'Data']),
            'nm_kawasan' => $whois['nm_kawasan'],
            'dokumen' => $this->db->table('sikaperdes_kawasan_bank_data')->select('*')->distinct()->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getRowArray(),
            'dokumen_sk' => $this->db->table('sikaperdes_kawasan_bank_data')->select('*')->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getRowArray(),
            'potensi_kawasan' => $potensi_kawasan,
            'produk_unggulan' => $produk_unggulan,
            'img_produk_unggulan' => $img_produk_unggulan,
            'potensi_kerjasama_pihak3' => $potensi_kerjasama_pihak3,
            'bank_data' => $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getResultArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('potensi_kawasan0', 'Potensikawasan', 'trim|required', ['required' => 'Potensi[1] Kawasan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/revisi_review/' . $kd_kab . '/' . $kd_kawasan)->withInput();
            }
            $this->validation->setRule('image0', 'Image0', 'trim|mime_in[image0,image/png,image/jpg,image/jpeg]|max_size[image0,4096]', ['mime_in' => 'Ekstensi Gambar[1] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[1] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image1', 'Image1', 'trim|mime_in[image1,image/png,image/jpg,image/jpeg]|max_size[image1,4096]', ['mime_in' => 'Ekstensi Gambar[2] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[2] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image2', 'Image2', 'trim|mime_in[image2,image/png,image/jpg,image/jpeg]|max_size[image2,4096]', ['mime_in' => 'Ekstensi Gambar[3] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[3] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image3', 'Image3', 'trim|mime_in[image3,image/png,image/jpg,image/jpeg]|max_size[image3,4096]', ['mime_in' => 'Ekstensi Gambar[4] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[4] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image4', 'Image4', 'trim|mime_in[image4,image/png,image/jpg,image/jpeg]|max_size[image4,4096]', ['mime_in' => 'Ekstensi Gambar[5] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[5] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image5', 'Image5', 'trim|mime_in[image5,image/png,image/jpg,image/jpeg]|max_size[image5,4096]', ['mime_in' => 'Ekstensi peta Delimitasi harus png/jpg/jpeg', 'max_size' => 'Maximal file size peta Delimitasi harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_data_kawasan')->withInput();
            } else {
                $input = $this->request->getVar();
                if ($this->request->getFile('image0') != '') {
                    $img_produk_unggulan1 = $this->request->getFile('image0');
                } else {
                    $img_produk_unggulan1 = $img_produk_unggulan[0];
                }
                if ($this->request->getFile('image1') != '') {
                    $img_produk_unggulan2 = $this->request->getFile('image1');
                } else {
                    $img_produk_unggulan2 = $img_produk_unggulan[1];
                }
                if ($this->request->getFile('image2') != '') {
                    $img_produk_unggulan3 = $this->request->getFile('image2');
                } else {
                    $img_produk_unggulan3 = $img_produk_unggulan[2];
                }
                if ($this->request->getFile('image3') != '') {
                    $img_produk_unggulan4 = $this->request->getFile('image3');
                } else {
                    $img_produk_unggulan4 = $img_produk_unggulan[3];
                }
                if ($this->request->getFile('image4') != '') {
                    $img_produk_unggulan5 = $this->request->getFile('image4');
                } else {
                    $img_produk_unggulan5 = $img_produk_unggulan[4];
                }
                if ($this->request->getFile('image5') != '') {
                    $img_peta_delimitasi = $this->request->getFile('image5');
                } else {
                    $img_peta_delimitasi = $data['dokumen']['img_peta_delimitasi'];
                }

                $this->Menu_admin_kawasan->revisiData($kd_kab, $kd_kawasan, $input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Revisi dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/verifikasi_data');
            }
        }

        return view('sikaperdes/menu/kawasan/revisi_data_kawasan', $data);
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

    public function ajaxfiltdesa()
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

    public function deletedatakawasan($kd_kab, $kd_kawasan)
    {
        $hapus = $this->db->table('sikaperdes_kawasan_bank_data');

        $oldfile = $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kab' => $kd_kab, 'kd_kawasan' => $kd_kawasan])->getRowArray();
        $oldfileimgproduk = explode("^", $oldfile["img_produk_unggulan"]);

        $old_file1 = $oldfileimgproduk[0];
        unlink('img/uploadfile/produk_unggulan/' . $old_file1);

        if ($oldfileimgproduk[1] != '') {
            $old_file2 = $oldfileimgproduk[1];
            unlink('img/uploadfile/produk_unggulan/' . $old_file2);
        }

        if ($oldfileimgproduk[2] != '') {
            $old_file3 = $oldfileimgproduk[2];
            unlink('img/uploadfile/produk_unggulan/' . $old_file3);
        }

        if ($oldfileimgproduk[3] != '') {
            $old_file4 = $oldfileimgproduk[3];
            unlink('img/uploadfile/produk_unggulan/' . $old_file4);
        }

        if ($oldfileimgproduk[4] != '') {
            $old_file5 = $oldfileimgproduk[4];
            unlink('img/uploadfile/produk_unggulan/' . $old_file5);
        }

        $old_file_peta = $oldfile['img_peta_delimitasi'];
        unlink('img/uploadfile/peta_delimitasi/' . $old_file_peta);

        $hapus->delete(['kd_kab' => $kd_kab, 'kd_kawasan' => $kd_kawasan]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 data Kawasan berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/menu-admin/list_input_data_kawasan');
    }

    public function list_kawasan()
    {
        $data = [
            'title' => 'Daftar Kawasan',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'DATA DAFTAR ID KAWASAN', 'li_1' => 'Kawasan', 'li_2' => 'List', 'li_3' => 'ID']),
            'tab_idkawasan' => $this->db->table('sikaperdes_kawasan_id')->select('nm_kab, kd_kab')->distinct()->get()->getResultArray()
        ];

        return view('sikaperdes/menu/kawasan/list_kawasan', $data);
    }

    public function ajax_list_daftar_kawasan()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $filtkabupaten = $this->request->getPost('filtkabupaten');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order_daftar_kawasan = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Menu_admin_kawasan->getDaftarKawasan($search_value, $order_daftar_kawasan, $length, $start, $filtkabupaten);
        $recordsTotal = $this->Menu_admin_kawasan->recordsTotalDaftarKawasan();
        $recordsFiltered = $this->Menu_admin_kawasan->recordsFilteredDaftarKawasan($search_value, $filtkabupaten);

        $data = array();
        foreach ($listing as $key) {
            $row = array();
            $row[] = $key['id'];
            $row[] = $key['nm_kawasan'];
            $row[] = $key['nm_kab'];
            $row[] = '<a href="edit_daftar_kawasan/' . $key['kd_kab'] .  "/"  . $key['id'] . '" class="badge bg-warning">Edit</a>
            <a href="#" class="badge bg-danger deleting" id="sa-delete" data-kdkab="' . $key['kd_kab'] . '" data-kdkawasan="' . $key['id'] . '">Delete</a>';
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

    public function inputdaftarkawasan()
    {
        $data = [
            'title' => 'Tambah ID Kawasan',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'TAMBAH DAFTAR ID KAWASAN', 'li_1' => 'Kawasan', 'li_2' => 'Tambah', 'li_3' => 'ID']),
            'list_kab' => $this->db->table('sikaperdes_kawasan_id')->select('nm_kab, kd_kab')->distinct()->get()->getResultArray(),
            'validation' => $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('kd_kab', 'KDkab', 'trim|required', ['required' => 'Kabupaten harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_daftar_kawasan')->withInput();
            }
            $this->validation->setRule('nm_kawasan', 'Namakawasan', 'trim|required|alpha_space', ['required' => 'Nama Kawasan harus diisi', 'alpha_space' => 'Hanya dapat diisi alphabet dan spasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_daftar_kawasan')->withInput();
            } else {
                $nm_kab = $this->db->table('sikaperdes_filt_kabupaten_dispermadesdukcapil')->getWhere(['kd_wilayah' => $this->request->getVar('kd_kab')])->getRowArray();
                $builder = $this->db->table('sikaperdes_kawasan_id');
                $insert = array(
                    "kd_kab" => $this->request->getVar('kd_kab'),
                    "nm_kab" => $nm_kab['akses'],
                    "nm_kawasan" => strtoupper($this->request->getVar('nm_kawasan')),
                );
                $builder->insert($insert);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Daftar ID Kawasan berhasil ditambah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/daftar_kawasan');
            }
        }

        return view('sikaperdes/menu/kawasan/tambah_daftar_kawasan', $data);
    }

    public function editdaftarkawasan($kd_kab, $kd_kawasan)
    {
        $data = [
            'title' => 'Edit ID Kawasan',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'EDIT DAFTAR ID KAWASAN', 'li_1' => 'Kawasan', 'li_2' => 'Edit', 'li_3' => 'ID']),
            'list_kab' => $this->db->table('sikaperdes_kawasan_id')->select('nm_kab, kd_kab')->distinct()->get()->getResultArray(),
            'kd_kab_select' => $kd_kab,
            'nm_kawasan' => $this->db->table('sikaperdes_kawasan_id')->select('nm_kawasan')->getWhere(['id' => $kd_kawasan])->getRowArray(),
            'validation' => $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('kd_kab', 'KDkab', 'trim|required', ['required' => 'Kabupaten harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_daftar_kawasan/' . $kd_kab . '/' . $kd_kawasan)->withInput();
            }
            $this->validation->setRule('nm_kawasan', 'Namakawasan', 'trim|required|alpha_space', ['required' => 'Nama Kawasan harus diisi', 'alpha_space' => 'Hanya dapat diisi alphabet dan spasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_daftar_kawasan/' . $kd_kab . '/' . $kd_kawasan)->withInput();
            } else {
                $nm_kab = $this->db->table('sikaperdes_filt_kabupaten_dispermadesdukcapil')->getWhere(['kd_wilayah' => $this->request->getVar('kd_kab')])->getRowArray();

                $builder = $this->db->table('sikaperdes_kawasan_id');
                $builder->set('kd_kab', $this->request->getVar('kd_kab'));
                $builder->set('nm_kab', $nm_kab['akses']);
                $builder->set("nm_kawasan", strtoupper($this->request->getVar('nm_kawasan')));
                $builder->where('kd_kab', $kd_kab);
                $builder->where('id', $kd_kawasan);
                $builder->update();

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Daftar ID Kawasan berhasil di edit!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/daftar_kawasan');
            }
        }

        return view('sikaperdes/menu/kawasan/edit_daftar_kawasan', $data);
    }

    public function deletedaftarkawasan($kd_kab, $kd_kawasan)
    {
        $hapus = $this->db->table('sikaperdes_kawasan_id');
        $hapus->delete(['kd_kab' => $kd_kab, 'id' => $kd_kawasan]);

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Daftar ID Kawasan berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/menu-admin/daftar_kawasan');
    }

    public function list_klasifikasi()
    {
        $data = [
            'title' => 'Daftar Klasifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'DATA DAFTAR JENIS KLASIFIKASI', 'li_1' => 'Kawasan', 'li_2' => 'List', 'li_3' => 'Klasifikasi']),
            'tab_idkawasan' => $this->db->table('sikaperdes_kawasan_klasifikasi')->select('*')->get()->getResultArray()
        ];

        return view('sikaperdes/menu/kawasan/list_klasifikasi', $data);
    }

    public function ajax_list_jenis_klasifikasi()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order_jenis_klasifikasi = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Menu_admin_kawasan->getJenisKlasifikasi($search_value, $order_jenis_klasifikasi, $length, $start);
        $recordsTotal = $this->Menu_admin_kawasan->recordsTotalJenisKlasifikasi();
        $recordsFiltered = $this->Menu_admin_kawasan->recordsFilteredJenisKlasifikasi($search_value);

        $data = array();
        foreach ($listing as $key) {
            $row = array();
            $row[] = $key['id'];
            $row[] = $key['jenis_klasifikasi'];
            $row[] = '<a href="edit_jenis_klasifikasi/' . $key['id'] . '" class="badge bg-warning">Edit</a>
            <a href="#" class="badge bg-danger deleting" id="sa-delete" data-id="' . $key['id'] . '">Delete</a>';
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

    public function inputjenisklasifikasi()
    {
        $data = [
            'title' => 'Tambah Jenis Klasifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'TAMBAH DAFTAR JENIS KLASIFIKASI', 'li_1' => 'Kawasan', 'li_2' => 'Tambah', 'li_3' => 'Klasifikasi']),
            'validation' => $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('jenis_klasifikasi', 'JenisKlasifikasi', 'trim|required|alpha_space|is_unique[sikaperdes_kawasan_klasifikasi.jenis_klasifikasi]', ['required' => 'Nama Klasifikasi harus diisi', 'alpha_space' => 'Hanya dapat diisi alphabet dan spasi', 'is_unique' => 'Nama Klasifikasi sudah terdaftar']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/input_jenis_klasifikasi')->withInput();
            } else {
                $builder = $this->db->table('sikaperdes_kawasan_klasifikasi');
                $insert = array(
                    "jenis_klasifikasi" => strtoupper($this->request->getVar('jenis_klasifikasi')),
                );
                $builder->insert($insert);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Jenis Klasifikasi berhasil ditambah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/jenis_klasifikasi_list');
            }
        }

        return view('sikaperdes/menu/kawasan/tambah_jenis_klasifikasi', $data);
    }

    public function editjenisklasifikasi($id)
    {
        $data = [
            'title' => 'Edit Jenis Klasifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'EDIT JENIS KLASIFIKASI', 'li_1' => 'Kawasan', 'li_2' => 'Edit', 'li_3' => 'Klasifikasi']),
            'jenis_klasifikasi' => $this->db->table('sikaperdes_kawasan_klasifikasi')->select('*')->getWhere(['id' => $id])->getRowArray(),
            'validation' => $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('jenis_klasifikasi', 'JenisKlasifikasi', 'trim|required|alpha_space|is_unique[sikaperdes_kawasan_klasifikasi.jenis_klasifikasi]', ['required' => 'Nama Klasifikasi harus diisi', 'alpha_space' => 'Hanya dapat diisi alphabet dan spasi', 'is_unique' => 'Nama Klasifikasi sudah terdaftar']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-admin/edit_jenis_klasifikasi/' . $id)->withInput();
            } else {
                $builder = $this->db->table('sikaperdes_kawasan_klasifikasi');
                $builder->set("jenis_klasifikasi", strtoupper($this->request->getVar('jenis_klasifikasi')));
                $builder->where('id', $id);
                $builder->update();

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Jenis Klasifikasi berhasil di edit!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/jenis_klasifikasi_list');
            }
        }

        return view('sikaperdes/menu/kawasan/edit_jenis_klasifikasi', $data);
    }

    public function editnamaklasifikasi()
    {
        $id = $this->request->getVar('id');
        $jenis_klasifikasi = $this->request->getVar('jenis_klasifikasi');

        $builder = $this->db->table('sikaperdes_kawasan_klasifikasi');
        $builder->set('jenis_klasifikasi', $jenis_klasifikasi);
        $builder->where('id', $id);
        $builder->update();
    }

    public function deletejenisklasifikasi($id)
    {
        $hapus = $this->db->table('sikaperdes_kawasan_klasifikasi');
        $hapus->delete(['id' => $id]);

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>1 Jenis Klasifikasi berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/menu-admin/jenis_klasifikasi_list');
    }
}

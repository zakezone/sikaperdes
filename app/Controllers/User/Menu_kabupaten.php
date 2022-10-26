<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;
use App\Models\Menu\Data_kawasan_kabupaten;

class Menu_kabupaten extends BaseController
{
    protected $Menu_kabupaten_kawasan;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;
    protected $validation;

    public function __construct()
    {
        $this->Menu_kabupaten_kawasan = new Data_kawasan_kabupaten();
        $this->Filterdatakabupaten_model = new Filtkabupaten();
        $this->Filterdatakecamatan_model = new Filtkecamatan();
        $this->Filterdatakeldesa_model = new Filtkeldesa();
        date_default_timezone_set('Asia/Jakarta');
        session()->remove('keywordapi');
        helper('zakezone');
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
        $kd_kab = $this->session->get('kd_wilayah_sikaperdes');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Menu_kabupaten_kawasan->getDataKawasan($search_value, $order, $length, $start, $statusfilt, $kd_kab);
        $recordsTotal = $this->Menu_kabupaten_kawasan->recordsTotalKawasan($kd_kab);
        $recordsFiltered = $this->Menu_kabupaten_kawasan->recordsFilteredKawasan($search_value, $statusfilt, $kd_kab);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $jumlahdesa = $this->Menu_kabupaten_kawasan->getJmlDesa($row[] = $key['nm_kawasan']);
            $jumlahkec = $this->Menu_kabupaten_kawasan->getJmlKec($row[] = $key['nm_kawasan']);
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
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('jenisklasifikasi', 'JenisKlasifikasi', 'trim|required', ['required' => 'Jenis Klasifikasi harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('filtkecamatan', 'FilterKecamatan', 'trim|required', ['required' => 'Nama Kecamatan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('filtkeldesa', 'Filterkeldesa', 'trim|required', ['required' => 'Nama Desa harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('tahun_pembentukan', 'Tahunpembentukan', 'trim|required', ['required' => 'Tahun Pembentukan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('potensi_kawasan0', 'Potensikawasan', 'trim|required', ['required' => 'Potensi[1] Kawasan harus diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image0', 'Image0', 'trim|uploaded[image0]|mime_in[image0,image/png,image/jpg,image/jpeg]|max_size[image0,4096]', ['uploaded' => 'Gambar[1] Produk Unggulan harus diisi', 'mime_in' => 'Ekstensi Gambar[1] harus png/jpg/jpeg', 'max_size' => 'Maximal file size Gambar[1] harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            }
            $this->validation->setRule('image5', 'Image5', 'trim|uploaded[image5]|mime_in[image5,image/png,image/jpg,image/jpeg]|max_size[image5,4096]', ['uploaded' => 'Gambar peta Delimitasi harus diisi', 'mime_in' => 'Ekstensi peta Delimitasi harus png/jpg/jpeg', 'max_size' => 'Maximal file size peta Delimitasi harus <= 4mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/menu-kabupaten/input_data_kawasan')->withInput();
            } else {
                $input = $this->request->getVar();
                $img_produk_unggulan1 = $this->request->getFile('image0');
                $img_produk_unggulan2 = $this->request->getFile('image1');
                $img_produk_unggulan3 = $this->request->getFile('image2');
                $img_produk_unggulan4 = $this->request->getFile('image3');
                $img_produk_unggulan5 = $this->request->getFile('image4');
                $img_peta_delimitasi = $this->request->getFile('image5');
                $this->Menu_kabupaten_kawasan->inputData($input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Input dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-kabupaten/list_input_data_kawasan');
            }
        }

        $data = [
            'title' => 'Input Data',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'INPUT DATA KAWASAN', 'li_1' => 'Menu', 'li_2' => 'Input', 'li_3' => 'Data Kawasan']),
            'listKecamatan' => $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->orderBy('kd_wilayah')->findAll(),
            'listKeldesa' => $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->orderBy('kd_wilayah')->findAll(),
            'namakawasan' => $this->db->table('sikaperdes_kawasan_id')->select('*')->where('kd_kab', $this->session->get('kd_wilayah_sikaperdes'))->get()->getResultArray(),
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
                return redirect()->to('user/menu-kabupaten/revisi_review/' . $kd_kab . '/' . $kd_kawasan)->withInput();
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

                $this->Menu_kabupaten_kawasan->revisiData($kd_kab, $kd_kawasan, $input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Revisi dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-kabupaten/list_input_data_kawasan');
            }
        }

        return view('sikaperdes/menu/kawasan/revisi_data_kawasan', $data);
    }

    public function ajaxfiltkecamatan()
    {
        $filtkabupaten = $this->session->get('kd_wilayah_sikaperdes');
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
        return redirect()->to('user/menu-kabupaten/list_input_data_kawasan');
    }
}

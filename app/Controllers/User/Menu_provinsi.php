<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;
use App\Models\Menu\Data_kawasan;

class Menu_provinsi extends BaseController
{
    protected $Menu_provinsi_kawasan;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;
    protected $validation;

    public function __construct()
    {
        $this->Menu_provinsi_kawasan = new Data_kawasan();
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

        $listing =  $this->Menu_provinsi_kawasan->getDataKawasan($search_value, $order, $length, $start, $statusfilt);
        $recordsTotal = $this->Menu_provinsi_kawasan->recordsTotalKawasan();
        $recordsFiltered = $this->Menu_provinsi_kawasan->recordsFilteredKawasan($search_value, $statusfilt);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $jumlahdesa = $this->Menu_provinsi_kawasan->getJmlDesa($row[] = $key['nm_kawasan'], $row[] = $key['kd_kawasan']);
            $jumlahkec = $this->Menu_provinsi_kawasan->getJmlKec($row[] = $key['nm_kawasan'], $row[] = $key['kd_kawasan']);
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
                return redirect()->to('user/menu-provinsi/verifikasi_review/' . $kd_kab . '/' . $kd_kawasan)->withInput();
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
                //     $this->Menu_provinsi_kawasan->Notifikasi($input);
                // }
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Verifikasi dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-provinsi/verifikasi_data');
            }
        }

        return view('sikaperdes/menu/kawasan/verifikasi_data_kawasan', $data);
    }
}

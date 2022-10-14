<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Data\Data_kawasan;

class Data extends BaseController
{
    protected $Data_kawasan;
    // protected $validation;

    public function __construct()
    {
        $this->Data_kawasan = new Data_kawasan;
        date_default_timezone_set('Asia/Jakarta');
        session()->remove('keywordapi');
        helper('zakezone');
    }

    public function verifikasi_data_kawasan()
    {
        $data = [
            'title' => 'Data',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'DATA KAWASAN PERDESAAN', 'li_1' => 'Data', 'li_2' => 'Kawasan Perdesaan', 'li_3' => 'Terverifikasi']),
            'getdatatahun' => $this->Data_kawasan->getDataTahun(),
        ];

        return view('sikaperdes/data/kawasan/data_kawasan', $data);
    }

    public function load_data_kawasan()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $tahunfilt = $this->request->getPost('tahunfilt');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing =  $this->Data_kawasan->getDataKawasan($search_value, $order, $length, $start, $tahunfilt);
        $recordsTotal = $this->Data_kawasan->recordsTotalKawasan();
        $recordsFiltered = $this->Data_kawasan->recordsFilteredKawasan($search_value, $tahunfilt);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $jumlahdesa = $this->Data_kawasan->getJmlDesa($row[] = $key['nm_kawasan']);
            $jumlahkec = $this->Data_kawasan->getJmlKec($row[] = $key['nm_kawasan']);
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
            $row[] = '<a href="verifikasi_review/' . $key['kd_kab'] .  "/"  . $key['kd_kawasan'] . '" class="badge bg-info">Detail</a>';
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
        $whois = $this->db->table('kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan])->getRowArray();

        $pk = $this->db->query("SELECT `potensi_kawasan` FROM `kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pk["potensi_kawasan"] != null) {
            $potensi_kawasan = explode("^", $pk["potensi_kawasan"]);
        } else {
            $potensi_kawasan = "-";
        }

        $pu = $this->db->query("SELECT `produk_unggulan` FROM `kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($pu["produk_unggulan"] != null) {
            $produk_unggulan = explode("^", $pu["produk_unggulan"]);
        } else {
            $produk_unggulan = "-";
        }

        $ipu = $this->db->query("SELECT `img_produk_unggulan` FROM `kawasan_bank_data` WHERE `kd_kab` = $kd_kab AND `kd_kawasan` = $kd_kawasan")->getRowArray();
        if ($ipu["img_produk_unggulan"] != null) {
            $img_produk_unggulan = explode("^", $ipu["img_produk_unggulan"]);
        } else {
            $img_produk_unggulan = "-";
        }

        $data = [
            'title' => 'Verifikasi',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'VERIFIKASI DATA KAWASAN PERDESAAN "' . $whois['nm_kawasan'] . '"', 'li_1' => 'Kawasan', 'li_2' => 'Verifikasi', 'li_3' => 'Data']),
            'nm_kawasan' => $whois['nm_kawasan'],
            'dokumen' => $this->db->table('kawasan_bank_data')->select('*')->distinct()->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getRowArray(),
            'potensi_kawasan' => $potensi_kawasan,
            'produk_unggulan' => $produk_unggulan,
            'img_produk_unggulan' => $img_produk_unggulan,
            'bank_data' => $this->db->table('kawasan_bank_data')->getWhere(['kd_kawasan' => $kd_kawasan, 'kd_kab' => $kd_kab])->getResultArray(),
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
                $verif = $this->db->table('kawasan_bank_data');
                $verif->where('kd_kab', $kd_kab);
                $verif->where('kd_kawasan', $kd_kawasan);
                $verif->update($update);
                // if (isset($_POST['permendagri_id'])) {
                //     $input = $this->request->getVar();
                //     $this->Data_kawasan->Notifikasi($input);
                // }
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Verifikasi dokumen <b>berhasil</b> dikirim.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/menu-admin/verifikasi_data');
            }
        }

        return view('sikaperdes/data/kawasan/verifikasi_data_kawasan', $data);
    }
}

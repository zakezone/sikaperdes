<?php

namespace App\Models\Menu;

use CodeIgniter\Model;

class Data_kawasan_kabupaten extends Model
{
    protected $table = 'sikaperdes_kawasan_bank_data';
    protected $primaryKey = 'id';

    var $column_orderkab = array('id', 'nm_kec', 'nm_kab', 'nm_kawasan', 'tahun_pembentukan', 'verifikasi');
    var $order = array('id' => 'asc');

    public function getJmlDesa($nmkawasan)
    {
        $builder = $this->db->table('sikaperdes_kawasan_bank_data');
        $builder->select('nm_des');
        $builder->where('nm_kawasan', "$nmkawasan");
        return count($builder->get()->getRowArray());
    }

    public function getJmlKec($nmkawasan)
    {
        $builder = $this->db->table('sikaperdes_kawasan_bank_data');
        $builder->select('nm_kec');
        $builder->distinct();
        $builder->where('nm_kawasan', "$nmkawasan");
        return count($builder->get()->getResultArray());
    }

    public function getDataKawasan($search_value, $order, $length, $start, $statusfilt, $kd_kab)
    {
        if ($statusfilt == "" || $statusfilt == "all") {
            $filter = " AND verifikasi != '' AND kd_kab = '$kd_kab'";
        } else {
            $filter = " AND verifikasi = '$statusfilt' AND kd_kab = '$kd_kab'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "nm_kec LIKE '%$keyword%' $filter OR nm_kab LIKE '%$keyword%' $filter OR nm_kawasan LIKE '%$keyword%' $filter OR tahun_pembentukan LIKE '%$keyword%' $filter";
        } else {
            $search = "id != 0 $filter";
        }

        if ($order) {
            $result_order = $this->column_orderkab[$order['0']['column']];
            $result_dir = $order['0']['dir'];
        } elseif ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }

        if ($length != -1);
        $builder = $this->db->table('sikaperdes_kawasan_bank_data');
        $query = $builder->select('nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi')->distinct()->where($search)->orderBy($result_order, $result_dir);
        if ($start != 0 || $length != 0) {
            $query = $builder->limit($length, $start);
        }
        return $query->get()->getResultArray();
    }

    public function recordsTotalKawasan($kd_kab)
    {
        $builder = $this->db->table('sikaperdes_kawasan_bank_data');
        $builder->select('nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi');
        $builder->distinct();
        $builder->where('kd_kab', $kd_kab);
        return $builder->get()->getResultArray();
    }

    public function recordsFilteredKawasan($search_value, $statusfilt, $kd_kab)
    {
        if ($statusfilt == "" || $statusfilt == "all") {
            $filter = " AND verifikasi != '' AND kd_kab = '$kd_kab'";
        } else {
            $filter = " AND verifikasi = '$statusfilt' AND kd_kab = '$kd_kab'";
        };

        if ($search_value) {
            $keyword = $search_value;
            $search = "AND (nm_kec LIKE '%$keyword%' $filter OR nm_kab LIKE '%$keyword%' $filter OR nm_kawasan LIKE '%$keyword%' $filter OR tahun_pembentukan LIKE '%$keyword%' $filter)";
        } else {
            $search = "$filter";
        }

        $sQuery = "SELECT COUNT(DISTINCT nm_kab, kd_kab, nm_kawasan, kd_kawasan, tahun_pembentukan, verifikasi) as jml FROM sikaperdes_kawasan_bank_data WHERE id != 0 $search";
        $query = $this->query($sQuery)->getRowArray();
        return $query;
    }

    public function inputData($input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi)
    {
        $baru = $this->db->table('sikaperdes_kawasan_bank_data')->select('nm_kawasan')->getWhere(['kd_kab' => session()->get('kd_wilayah_sikaperdes'), 'kd_kawasan' => $input['id_kawasan']])->getRowArray();

        if (isset($baru)) { // ini jika sudah ada kawasan yang sudah ada / (input desa baru ke kawasan tersebut)
            $insertdatabase = $this->db->table('sikaperdes_kawasan_bank_data');
            $updatedatabase = $this->db->table('sikaperdes_kawasan_bank_data');
            $nm_kawasan = $this->db->table('sikaperdes_kawasan_id')->select('nm_kawasan')->where('id', $input['id_kawasan'])->get()->getRowArray();
            $nm_kab = $this->db->table('sikaperdes_filt_kabupaten_dispermadesdukcapil')->select('akses')->where('kd_wilayah', session()->get('kd_wilayah_sikaperdes'))->get()->getRowArray();
            $nm_kec = $this->db->table('sikaperdes_filt_kecamatan_dispermadesdukcapil')->select('akses')->where('kd_wilayah', $input['filtkecamatan'])->get()->getRowArray();
            $nm_des = $this->db->table('sikaperdes_filt_keldesa_dispermadesdukcapil')->select('akses')->where('kd_wilayah', $input['filtkeldesa'])->get()->getRowArray();

            $kumpulan_potensi_kawasan = [
                $input['potensi_kawasan0'],
                $input['potensi_kawasan1'],
                $input['potensi_kawasan2'],
                $input['potensi_kawasan3'],
                $input['potensi_kawasan4'],
                $input['potensi_kawasan5'],
                $input['potensi_kawasan6'],
                $input['potensi_kawasan7'],
                $input['potensi_kawasan8'],
                $input['potensi_kawasan9'],
            ];
            $potensi_kawasan = implode("^", $kumpulan_potensi_kawasan);
            $updatedatabase->set('potensi_kawasan', $potensi_kawasan);

            if ($input['produk_unggulan0'] == 'belum' || $input['produk_unggulan0'] == '') {
                $produk_unggulan0 = '-';
            } else {
                $produk_unggulan0 = $input['produk_unggulan0'];
            }
            $kumpulan_produk_unggulan = [
                $produk_unggulan0,
                $input['produk_unggulan1'],
                $input['produk_unggulan2'],
                $input['produk_unggulan3'],
                $input['produk_unggulan4'],
                $input['produk_unggulan5'],
                $input['produk_unggulan6'],
                $input['produk_unggulan7'],
                $input['produk_unggulan8'],
                $input['produk_unggulan9'],
            ];
            $produk_unggulan = implode("^", $kumpulan_produk_unggulan);
            $updatedatabase->set('produk_unggulan', $produk_unggulan);

            if ($input['potensi_kerjasama0'] == 'belum' || $input['potensi_kerjasama0'] == '') {
                $potensi_kerjasama0 = '-';
            } else {
                $potensi_kerjasama0 = $input['potensi_kerjasama0'];
            }
            $kumpulan_potensi_kerjasama = [
                $potensi_kerjasama0,
                $input['potensi_kerjasama1'],
                $input['potensi_kerjasama2'],
                $input['potensi_kerjasama3'],
                $input['potensi_kerjasama4'],
                $input['potensi_kerjasama5'],
                $input['potensi_kerjasama6'],
                $input['potensi_kerjasama7'],
                $input['potensi_kerjasama8'],
                $input['potensi_kerjasama9'],
            ];
            $potensi_kerjasama_pihak3 = implode("^", $kumpulan_potensi_kerjasama);
            $updatedatabase->set('potensi_kerjasama_pihak3', $potensi_kerjasama_pihak3);

            $oldfile = $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kab' => session()->get('kd_wilayah_sikaperdes'), 'kd_kawasan' => $input['id_kawasan']])->getRowArray();
            $oldfileimgproduk = explode("^", $oldfile["img_produk_unggulan"]);

            $nmfile1 = $img_produk_unggulan1->getRandomName();
            $old_file1 = $oldfileimgproduk[0];
            unlink('img/uploadfile/produk_unggulan/' . $old_file1);
            $img_produk_unggulan1->move('img/uploadfile/produk_unggulan', $nmfile1);
            if ($img_produk_unggulan2 != '') {
                $nmfile2 = $img_produk_unggulan2->getRandomName();
                if ($oldfileimgproduk[1] != '') {
                    $old_file2 = $oldfileimgproduk[1];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file2);
                }
                $img_produk_unggulan2->move('img/uploadfile/produk_unggulan', $nmfile2);
            } else {
                $nmfile2 = '';
                if ($oldfileimgproduk[1] != '') {
                    $old_file2 = $oldfileimgproduk[1];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file2);
                }
            }
            if ($img_produk_unggulan3 != '') {
                $nmfile3 = $img_produk_unggulan3->getRandomName();
                if ($oldfileimgproduk[2] != '') {
                    $old_file3 = $oldfileimgproduk[2];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file3);
                }
                $img_produk_unggulan3->move('img/uploadfile/produk_unggulan', $nmfile3);
            } else {
                $nmfile3 = '';
                if ($oldfileimgproduk[2] != '') {
                    $old_file3 = $oldfileimgproduk[2];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file3);
                }
            }
            if ($img_produk_unggulan4 != '') {
                $nmfile4 = $img_produk_unggulan4->getRandomName();
                if ($oldfileimgproduk[3] != '') {
                    $old_file4 = $oldfileimgproduk[3];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file4);
                }
                $img_produk_unggulan4->move('img/uploadfile/produk_unggulan', $nmfile4);
            } else {
                $nmfile4 = '';
                if ($oldfileimgproduk[3] != '') {
                    $old_file4 = $oldfileimgproduk[3];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file4);
                }
            }
            if ($img_produk_unggulan5 != '') {
                $nmfile5 = $img_produk_unggulan5->getRandomName();
                if ($oldfileimgproduk[4] != '') {
                    $old_file5 = $oldfileimgproduk[4];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file5);
                }
                $img_produk_unggulan5->move('img/uploadfile/produk_unggulan', $nmfile5);
            } else {
                $nmfile5 = '';
                if ($oldfileimgproduk[4] != '') {
                    $old_file5 = $oldfileimgproduk[4];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file5);
                }
            }
            $gambar_produk_unggulan = [
                $nmfile1,
                $nmfile2,
                $nmfile3,
                $nmfile4,
                $nmfile5,
            ];
            $img_produk_unggulan = implode("^", $gambar_produk_unggulan);
            $updatedatabase->set('img_produk_unggulan', $img_produk_unggulan);

            $petadelimitasi = $img_peta_delimitasi->getRandomName();
            $old_file_peta = $oldfile['img_peta_delimitasi'];
            unlink('img/uploadfile/peta_delimitasi/' . $old_file_peta);
            $img_peta_delimitasi->move('img/uploadfile/peta_delimitasi', $petadelimitasi);
            $updatedatabase->set('img_peta_delimitasi', $petadelimitasi);

            if ($input['sk_lokasi_kawasan'] != '') {
                $sk_lokasi_kawasan = $input['sk_lokasi_kawasan'];
            } else {
                $sk_lokasi_kawasan = "BELUM";
            }
            if ($input['sk_tkpkp_kawasan'] != '') {
                $sk_tkpkp_kawasan = $input['sk_tkpkp_kawasan'];
            } else {
                $sk_tkpkp_kawasan = "BELUM";
            }
            if ($input['perbup_rpkp'] != '') {
                $perbup_rpkp = $input['perbup_rpkp'];
            } else {
                $perbup_rpkp = "BELUM";
            }
            if ($input['perda_kab_pembangunan'] != '') {
                $perda_kab_pembangunan = $input['perda_kab_pembangunan'];
            } else {
                $perda_kab_pembangunan = "BELUM";
            }
            if ($input['perbup_pembangunan'] != '') {
                $perbup_pembangunan = $input['perbup_pembangunan'];
            } else {
                $perbup_pembangunan = "BELUM";
            }
            if ($input['sk_tkpkp_kab_pembangunan'] != '') {
                $sk_tkpkp_kab_pembangunan = $input['sk_tkpkp_kab_pembangunan'];
            } else {
                $sk_tkpkp_kab_pembangunan = "BELUM";
            }

            $insert = array(
                "nm_kab" => $nm_kab['akses'],
                "kd_kab" => session()->get('kd_wilayah_sikaperdes'),
                "nm_kec" => $nm_kec['akses'],
                "kd_kec" => $input['filtkecamatan'],
                "nm_des" => $nm_des['akses'],
                "kd_des" => $input['filtkeldesa'],
                "nm_kawasan" => $nm_kawasan['nm_kawasan'],
                "kd_kawasan" => $input['id_kawasan'],
                "potensi_kawasan" => $potensi_kawasan,
                "sk_lokasi_kawasan	" => $sk_lokasi_kawasan,
                "sk_tkpkp_kawasan" => $sk_tkpkp_kawasan,
                "perbup_rpkp" => $perbup_rpkp,
                "perda_kab_pembangunan" => $perda_kab_pembangunan,
                "perbup_pembangunan" => $perbup_pembangunan,
                "sk_tkpkp_kab_pembangunan" => $sk_tkpkp_kab_pembangunan,
                "produk_unggulan" => $produk_unggulan,
                "img_produk_unggulan" => $img_produk_unggulan,
                "img_peta_delimitasi" => $petadelimitasi,
                "klasifikasi" => $input['jenisklasifikasi'],
                "potensi_kerjasama_pihak3" => $potensi_kerjasama_pihak3,
                "keterangan" => $input['keterangan'],
                "tahun_pembentukan" => $input['tahun_pembentukan'],
                "verifikasi" => $input['verifikasi'],
                "tgl_verifikasi" => $input['tgl_verifikasi'],
                "created" => $input['created'],
            );
            $insertdatabase->insert($insert);

            $updatedatabase->set('sk_lokasi_kawasan', $sk_lokasi_kawasan);
            $updatedatabase->set('sk_tkpkp_kawasan', $sk_tkpkp_kawasan);
            $updatedatabase->set('perbup_rpkp', $perbup_rpkp);
            $updatedatabase->set('perda_kab_pembangunan', $perda_kab_pembangunan);
            $updatedatabase->set('perbup_pembangunan', $perbup_pembangunan);
            $updatedatabase->set('sk_tkpkp_kab_pembangunan', $sk_tkpkp_kab_pembangunan);
            $updatedatabase->set('klasifikasi', $input['jenisklasifikasi']);
            $updatedatabase->set('keterangan', $input['keterangan']);
            $updatedatabase->set('tahun_pembentukan', $input['tahun_pembentukan']);
            $updatedatabase->set('verifikasi', $input['verifikasi']);
            $updatedatabase->set('tgl_verifikasi', $input['tgl_verifikasi']);

            $updatedatabase->where('kd_kab', session()->get('kd_wilayah_sikaperdes'));
            $updatedatabase->where('kd_kawasan', $input['id_kawasan']);
            $updatedatabase->update();
        } else {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $nm_kawasan = $this->db->table('sikaperdes_kawasan_id')->select('nm_kawasan')->where('id', $input['id_kawasan'])->get()->getRowArray();
            $nm_kab = $this->db->table('sikaperdes_filt_kabupaten_dispermadesdukcapil')->select('akses')->where('kd_wilayah', session()->get('kd_wilayah_sikaperdes'))->get()->getRowArray();
            $nm_kec = $this->db->table('sikaperdes_filt_kecamatan_dispermadesdukcapil')->select('akses')->where('kd_wilayah', $input['filtkecamatan'])->get()->getRowArray();
            $nm_des = $this->db->table('sikaperdes_filt_keldesa_dispermadesdukcapil')->select('akses')->where('kd_wilayah', $input['filtkeldesa'])->get()->getRowArray();

            $kumpulan_potensi_kawasan = [
                $input['potensi_kawasan0'],
                $input['potensi_kawasan1'],
                $input['potensi_kawasan2'],
                $input['potensi_kawasan3'],
                $input['potensi_kawasan4'],
                $input['potensi_kawasan5'],
                $input['potensi_kawasan6'],
                $input['potensi_kawasan7'],
                $input['potensi_kawasan8'],
                $input['potensi_kawasan9'],
            ];
            $potensi_kawasan = implode("^", $kumpulan_potensi_kawasan);

            if ($input['produk_unggulan0'] == 'belum' || $input['produk_unggulan0'] == '') {
                $produk_unggulan0 = '-';
            } else {
                $produk_unggulan0 = $input['produk_unggulan0'];
            }
            $kumpulan_produk_unggulan = [
                $produk_unggulan0,
                $input['produk_unggulan1'],
                $input['produk_unggulan2'],
                $input['produk_unggulan3'],
                $input['produk_unggulan4'],
                $input['produk_unggulan5'],
                $input['produk_unggulan6'],
                $input['produk_unggulan7'],
                $input['produk_unggulan8'],
                $input['produk_unggulan9'],
            ];
            $produk_unggulan = implode("^", $kumpulan_produk_unggulan);

            if ($input['potensi_kerjasama0'] == 'belum' || $input['potensi_kerjasama0'] == '') {
                $potensi_kerjasama0 = '-';
            } else {
                $potensi_kerjasama0 = $input['potensi_kerjasama0'];
            }
            $kumpulan_potensi_kerjasama = [
                $potensi_kerjasama0,
                $input['potensi_kerjasama1'],
                $input['potensi_kerjasama2'],
                $input['potensi_kerjasama3'],
                $input['potensi_kerjasama4'],
                $input['potensi_kerjasama5'],
                $input['potensi_kerjasama6'],
                $input['potensi_kerjasama7'],
                $input['potensi_kerjasama8'],
                $input['potensi_kerjasama9'],
            ];
            $potensi_kerjasama_pihak3 = implode("^", $kumpulan_potensi_kerjasama);

            $nmfile1 = $img_produk_unggulan1->getRandomName();
            $img_produk_unggulan1->move('img/uploadfile/produk_unggulan', $nmfile1);
            if ($img_produk_unggulan2 != '') {
                $nmfile2 = $img_produk_unggulan2->getRandomName();
                $img_produk_unggulan2->move('img/uploadfile/produk_unggulan', $nmfile2);
            } else {
                $nmfile2 = '';
            }
            if ($img_produk_unggulan3 != '') {
                $nmfile3 = $img_produk_unggulan3->getRandomName();
                $img_produk_unggulan3->move('img/uploadfile/produk_unggulan', $nmfile3);
            } else {
                $nmfile3 = '';
            }
            if ($img_produk_unggulan4 != '') {
                $nmfile4 = $img_produk_unggulan4->getRandomName();
                $img_produk_unggulan4->move('img/uploadfile/produk_unggulan', $nmfile4);
            } else {
                $nmfile4 = '';
            }
            if ($img_produk_unggulan5 != '') {
                $nmfile5 = $img_produk_unggulan5->getRandomName();
                $img_produk_unggulan5->move('img/uploadfile/produk_unggulan', $nmfile5);
            } else {
                $nmfile5 = '';
            }

            $petadelimitasi = $img_peta_delimitasi->getRandomName();
            $img_peta_delimitasi->move('img/uploadfile/peta_delimitasi', $petadelimitasi);

            $gambar_produk_unggulan = [
                $nmfile1,
                $nmfile2,
                $nmfile3,
                $nmfile4,
                $nmfile5,
            ];
            $img_produk_unggulan = implode("^", $gambar_produk_unggulan);

            if ($input['sk_lokasi_kawasan'] != '') {
                $sk_lokasi_kawasan = $input['sk_lokasi_kawasan'];
            } else {
                $sk_lokasi_kawasan = "BELUM";
            }
            if ($input['sk_tkpkp_kawasan'] != '') {
                $sk_tkpkp_kawasan = $input['sk_tkpkp_kawasan'];
            } else {
                $sk_tkpkp_kawasan = "BELUM";
            }
            if ($input['perbup_rpkp'] != '') {
                $perbup_rpkp = $input['perbup_rpkp'];
            } else {
                $perbup_rpkp = "BELUM";
            }
            if ($input['perda_kab_pembangunan'] != '') {
                $perda_kab_pembangunan = $input['perda_kab_pembangunan'];
            } else {
                $perda_kab_pembangunan = "BELUM";
            }
            if ($input['perbup_pembangunan'] != '') {
                $perbup_pembangunan = $input['perbup_pembangunan'];
            } else {
                $perbup_pembangunan = "BELUM";
            }
            if ($input['sk_tkpkp_kab_pembangunan'] != '') {
                $sk_tkpkp_kab_pembangunan = $input['sk_tkpkp_kab_pembangunan'];
            } else {
                $sk_tkpkp_kab_pembangunan = "BELUM";
            }

            $insert = array(
                "nm_kab" => $nm_kab['akses'],
                "kd_kab" => session()->get('kd_wilayah_sikaperdes'),
                "nm_kec" => $nm_kec['akses'],
                "kd_kec" => $input['filtkecamatan'],
                "nm_des" => $nm_des['akses'],
                "kd_des" => $input['filtkeldesa'],
                "nm_kawasan" => $nm_kawasan['nm_kawasan'],
                "kd_kawasan" => $input['id_kawasan'],
                "potensi_kawasan" => $potensi_kawasan,
                "sk_lokasi_kawasan	" => $input['sk_lokasi_kawasan'],
                "sk_tkpkp_kawasan" => $input['sk_tkpkp_kawasan'],
                "perbup_rpkp" => $input['perbup_rpkp'],
                "perda_kab_pembangunan" => $input['perda_kab_pembangunan'],
                "perbup_pembangunan" => $input['perbup_pembangunan'],
                "sk_tkpkp_kab_pembangunan" => $input['sk_tkpkp_kab_pembangunan'],
                "produk_unggulan" => $produk_unggulan,
                "img_produk_unggulan" => $img_produk_unggulan,
                "img_peta_delimitasi" => $petadelimitasi,
                "klasifikasi" => $input['jenisklasifikasi'],
                "potensi_kerjasama_pihak3" => $potensi_kerjasama_pihak3,
                "keterangan" => $input['keterangan'],
                "tahun_pembentukan" => $input['tahun_pembentukan'],
                "verifikasi" => $input['verifikasi'],
                "tgl_verifikasi" => $input['tgl_verifikasi'],
                "created" => $input['created'],
            );
            $builder->insert($insert);
        }
    }

    public function revisiData($kd_kab, $kd_kawasan, $input, $img_produk_unggulan1, $img_produk_unggulan2, $img_produk_unggulan3, $img_produk_unggulan4, $img_produk_unggulan5, $img_peta_delimitasi)
    {
        $updatedatabase = $this->db->table('sikaperdes_kawasan_bank_data');

        $kumpulan_potensi_kawasan = [
            $input['potensi_kawasan0'],
            $input['potensi_kawasan1'],
            $input['potensi_kawasan2'],
            $input['potensi_kawasan3'],
            $input['potensi_kawasan4'],
            $input['potensi_kawasan5'],
            $input['potensi_kawasan6'],
            $input['potensi_kawasan7'],
            $input['potensi_kawasan8'],
            $input['potensi_kawasan9'],
        ];
        $potensi_kawasan = implode("^", $kumpulan_potensi_kawasan);
        $updatedatabase->set('potensi_kawasan', $potensi_kawasan);

        $kumpulan_produk_unggulan = [
            $input['produk_unggulan0'],
            $input['produk_unggulan1'],
            $input['produk_unggulan2'],
            $input['produk_unggulan3'],
            $input['produk_unggulan4'],
            $input['produk_unggulan5'],
            $input['produk_unggulan6'],
            $input['produk_unggulan7'],
            $input['produk_unggulan8'],
            $input['produk_unggulan9'],
        ];
        $produk_unggulan = implode("^", $kumpulan_produk_unggulan);
        $updatedatabase->set('produk_unggulan', $produk_unggulan);

        $kumpulan_potensi_kerjasama = [
            $input['potensi_kerjasama0'],
            $input['potensi_kerjasama1'],
            $input['potensi_kerjasama2'],
            $input['potensi_kerjasama3'],
            $input['potensi_kerjasama4'],
            $input['potensi_kerjasama5'],
            $input['potensi_kerjasama6'],
            $input['potensi_kerjasama7'],
            $input['potensi_kerjasama8'],
            $input['potensi_kerjasama9'],
        ];
        $potensi_kerjasama_pihak3 = implode("^", $kumpulan_potensi_kerjasama);
        $updatedatabase->set('potensi_kerjasama_pihak3', $potensi_kerjasama_pihak3);

        $oldfile = $this->db->table('sikaperdes_kawasan_bank_data')->getWhere(['kd_kab' => $kd_kab, 'kd_kawasan' => $kd_kawasan])->getRowArray();
        $oldfileimgproduk = explode("^", $oldfile["img_produk_unggulan"]);

        if ($img_produk_unggulan1 == $oldfileimgproduk[0]) {
            $nmfile1 = $oldfileimgproduk[0];
        } else {
            $nmfile1 = $img_produk_unggulan1->getRandomName();
            $old_file1 = $oldfileimgproduk[0];
            unlink('img/uploadfile/produk_unggulan/' . $old_file1);
            $img_produk_unggulan1->move('img/uploadfile/produk_unggulan', $nmfile1);
        }

        if ($img_produk_unggulan2 == $oldfileimgproduk[1]) {
            $nmfile2 = $oldfileimgproduk[1];
        } else {
            if ($img_produk_unggulan2 != '') {
                $nmfile2 = $img_produk_unggulan2->getRandomName();
                if ($oldfileimgproduk[1] != '') {
                    $old_file2 = $oldfileimgproduk[1];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file2);
                }
                $img_produk_unggulan2->move('img/uploadfile/produk_unggulan', $nmfile2);
            } else {
                $nmfile2 = '';
                if ($oldfileimgproduk[1] != '') {
                    $old_file2 = $oldfileimgproduk[1];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file2);
                }
            }
        }

        if ($img_produk_unggulan3 == $oldfileimgproduk[2]) {
            $nmfile3 = $oldfileimgproduk[2];
        } else {
            if ($img_produk_unggulan3 != '') {
                $nmfile3 = $img_produk_unggulan3->getRandomName();
                if ($oldfileimgproduk[2] != '') {
                    $old_file3 = $oldfileimgproduk[2];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file3);
                }
                $img_produk_unggulan3->move('img/uploadfile/produk_unggulan', $nmfile3);
            } else {
                $nmfile3 = '';
                if ($oldfileimgproduk[2] != '') {
                    $old_file3 = $oldfileimgproduk[2];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file3);
                }
            }
        }

        if ($img_produk_unggulan4 == $oldfileimgproduk[3]) {
            $nmfile4 = $oldfileimgproduk[3];
        } else {
            if ($img_produk_unggulan4 != '') {
                $nmfile4 = $img_produk_unggulan4->getRandomName();
                if ($oldfileimgproduk[3] != '') {
                    $old_file4 = $oldfileimgproduk[3];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file4);
                }
                $img_produk_unggulan4->move('img/uploadfile/produk_unggulan', $nmfile4);
            } else {
                $nmfile4 = '';
                if ($oldfileimgproduk[3] != '') {
                    $old_file4 = $oldfileimgproduk[3];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file4);
                }
            }
        }

        if ($img_produk_unggulan5 == $oldfileimgproduk[4]) {
            $nmfile5 = $oldfileimgproduk[4];
        } else {
            if ($img_produk_unggulan5 != '') {
                $nmfile5 = $img_produk_unggulan5->getRandomName();
                if ($oldfileimgproduk[4] != '') {
                    $old_file5 = $oldfileimgproduk[4];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file5);
                }
                $img_produk_unggulan5->move('img/uploadfile/produk_unggulan', $nmfile5);
            } else {
                $nmfile5 = '';
                if ($oldfileimgproduk[4] != '') {
                    $old_file5 = $oldfileimgproduk[4];
                    unlink('img/uploadfile/produk_unggulan/' . $old_file5);
                }
            }
        }
        $gambar_produk_unggulan = [
            $nmfile1,
            $nmfile2,
            $nmfile3,
            $nmfile4,
            $nmfile5,
        ];
        $img_produk_unggulan = implode("^", $gambar_produk_unggulan);
        $updatedatabase->set('img_produk_unggulan', $img_produk_unggulan);

        if ($img_peta_delimitasi == $oldfile['img_peta_delimitasi']) {
            $petadelimitasi = $oldfile['img_peta_delimitasi'];
        } else {
            $petadelimitasi = $img_peta_delimitasi->getRandomName();
            $old_file_peta = $oldfile['img_peta_delimitasi'];
            unlink('img/uploadfile/peta_delimitasi/' . $old_file_peta);
            $img_peta_delimitasi->move('img/uploadfile/peta_delimitasi', $petadelimitasi);
            $updatedatabase->set('img_peta_delimitasi', $petadelimitasi);
        }

        if ($input['sk_lokasi_kawasan'] != '') {
            $sk_lokasi_kawasan = $input['sk_lokasi_kawasan'];
        } else {
            $sk_lokasi_kawasan = "BELUM";
        }
        if ($input['sk_tkpkp_kawasan'] != '') {
            $sk_tkpkp_kawasan = $input['sk_tkpkp_kawasan'];
        } else {
            $sk_tkpkp_kawasan = "BELUM";
        }
        if ($input['perbup_rpkp'] != '') {
            $perbup_rpkp = $input['perbup_rpkp'];
        } else {
            $perbup_rpkp = "BELUM";
        }
        if ($input['perda_kab_pembangunan'] != '') {
            $perda_kab_pembangunan = $input['perda_kab_pembangunan'];
        } else {
            $perda_kab_pembangunan = "BELUM";
        }
        if ($input['perbup_pembangunan'] != '') {
            $perbup_pembangunan = $input['perbup_pembangunan'];
        } else {
            $perbup_pembangunan = "BELUM";
        }
        if ($input['sk_tkpkp_kab_pembangunan'] != '') {
            $sk_tkpkp_kab_pembangunan = $input['sk_tkpkp_kab_pembangunan'];
        } else {
            $sk_tkpkp_kab_pembangunan = "BELUM";
        }

        $updatedatabase->set('sk_lokasi_kawasan', $sk_lokasi_kawasan);
        $updatedatabase->set('sk_tkpkp_kawasan', $sk_tkpkp_kawasan);
        $updatedatabase->set('perbup_rpkp', $perbup_rpkp);
        $updatedatabase->set('perda_kab_pembangunan', $perda_kab_pembangunan);
        $updatedatabase->set('perbup_pembangunan', $perbup_pembangunan);
        $updatedatabase->set('sk_tkpkp_kab_pembangunan', $sk_tkpkp_kab_pembangunan);
        $updatedatabase->set('keterangan', $input['keterangan']);
        $updatedatabase->set('verifikasi', $input['verifikasi']);
        $updatedatabase->set('tgl_verifikasi', $input['tgl_verifikasi']);

        $updatedatabase->where('kd_kab', $kd_kab);
        $updatedatabase->where('kd_kawasan', $kd_kawasan);
        $updatedatabase->update();
    }
}

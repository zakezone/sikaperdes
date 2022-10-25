<?php
$this->db = \Config\Database::connect();
?>
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <?php
            $role_id = session()->get('role_id_sikaperdes');
            $queryMenu = "SELECT `sikaperdes_primary_user_menu`.`id`, `menu`
                    FROM `sikaperdes_primary_user_menu` JOIN `sikaperdes_primary_user_access_menu` 
                    ON `sikaperdes_primary_user_menu`.`id` = `sikaperdes_primary_user_access_menu`.`menu_id`
                    WHERE `sikaperdes_primary_user_access_menu`.`role_id` =  $role_id
                    ORDER BY `sikaperdes_primary_user_access_menu`.`menu_id` ASC
                ";
            $menu = $this->db->query($queryMenu)->getResult('array');
            ?>
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php foreach ($menu as $m) : ?>
                    <?php if ($m['menu'] == "Notifikasi") : ?>
                        <li hidden class="menu-title" data-key="t-menu"><?= $m['menu']; ?></li>
                    <?php else : ?>
                        <li class="menu-title" data-key="t-menu"><?= $m['menu']; ?></li>
                    <?php endif; ?>

                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                            FROM `sikaperdes_primary_user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->getResult('array');
                    ?>

                    <?php
                    $request = \Config\Services::request();
                    $url = $request->uri->getSegment(3);
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <?php if ($sm['title'] == "KAWASAN") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-KAWASAN"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php if (session()->get('role_id_sikaperdes') == 1 || session()->get('role_id_sikaperdes') == 2) : ?>
                                        <li>
                                            <a href="javascript: void(0);" class="has-arrow">
                                                <span data-key="t-kawasan">Verifikasi</span>
                                            </a>
                                            <ul class="sub-menu" aria-expanded="false">
                                                <li>
                                                    <a href="<?= base_url('user/menu-admin/verifikasi_data'); ?>">
                                                        <span data-key="t-kawasan">Data Kawasan</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="disabled text-muted" aria-disabled="true">
                                                        <span data-key="t-kawasan">BUMDESMA</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li <?php if ($url === 'list_input_data_kawasan') : ?> class="mm-active" <?php endif; ?>>
                                            <a href="javascript: void(0);" class="has-arrow">
                                                <span data-key="t-profile">Input Data</span>
                                            </a>
                                            <ul class="sub-menu" aria-expanded="false">
                                                <li>
                                                    <a href="<?= base_url('user/menu-admin/list_input_data_kawasan'); ?>">
                                                        <span data-key="t-kawasan">Kawasan Perdesaan</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('user/menu-admin/daftar_kawasan'); ?>">
                                                        <span data-key="t-kawasan">Daftar Kawasan</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('user/menu-admin/jenis_klasifikasi_list'); ?>">
                                                        <span data-key="t-kawasan">Klasifikasi (TEMA)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="disabled text-muted" aria-disabled="true">
                                                        <span data-key="t-profile">BUMDESMA</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php elseif ($sm['title'] == "Registrasi API" && session()->get('kd_login_sikaperdes') == '11111111111111') : ?>
                                <a hidden href="<?= base_url($sm['url']); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-menu"><?= $sm['title']; ?></span>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url($sm['url']); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-menu"><?= $sm['title']; ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="logogayeng border-0 text-center mx-4 mb-5">
            <img src="<?= base_url('img/thumbnail/jatenggayeng.png'); ?>" width="170">
        </div>
        <hr class="sidebar-divider mt-3">
        <hr class="sidebar-divider">
    </div>
</div>
<div class="main-content">
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/style.css" />

</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="<?php echo base_url(); ?>assets/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="#">
                <img src="<?php echo base_url(); ?>assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
                <img src="<?php echo base_url(); ?>assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url('master_lantai/getMasterLantai'); ?>">Master Lantai</a></li>
                            <li><a href="<?php echo base_url('master_divisi/getMasterDivisi'); ?>">Master Divisi</a></li>
                            <li><a href="<?php echo base_url('master_rak/getMasterRak'); ?>">Master Rak</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo base_url('lantai/getAllLantai'); ?>" class="dropdown-toggle">
                            <span class="micon bi bi-stack"></span><span class="mtext">Lantai</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Welcome...</h2>
            </div>
        </div>
    </div>
    
    <!-- js -->
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/layout-settings.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
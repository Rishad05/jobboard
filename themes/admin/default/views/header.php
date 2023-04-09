<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>
<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $page_title . ' | ' . $Settings->site_name; ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/logo.png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?= $assets ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/iCheck/square/green.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>plugins/redactor/redactor.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assets ?>dist/css/custom.css" rel="stylesheet" type="text/css" />
    <script src="<?= $assets ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->


</head>

<body class="skin-blue fixed sidebar-mini" style="background-color: #48A39D;">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= site_url(); ?>" class="logo">
                <img src="<?php echo base_url('themes/admin/default/assets/images/logo.png'); ?>" alt="LOGO" />
                <!--  <span class="logo-mini">
                    <?= $Settings->site_name; ?>
                </span>
                <span class="logo-lg">
                    <?= $Settings->site_name; ?>
                </span> -->
                <!--<img src="'.base_url('assets/uplaods/'.$Settings->logo).'" alt="'.$Settings->site_name.'" />-->
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="hidden-xs hidden-sm"><a href="#" class="clock"></a></li>
                        <li class="hidden-xs"><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <?php if ($UserType == 'admin') { ?>
                            <li class="hidden-xs"><a href="<?= site_url('admin/settings'); ?>"><i class="fa fa-cogs"></i></a>
                            </li>
                        <?php } ?>
                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                        <li class="dropdown user user-menu" style="padding-right:5px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('uploads/avatars/thumbs/' . ($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender') . '.png')) ?>" class="user-image" alt="Avatar" />
                                <span class="hidden-xs"><?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></span>
                            </a>
                            <ul class="dropdown-menu" style="padding-right:3px;">
                                <li class="user-header">
                                    <img src="<?= base_url('uploads/avatars/' . ($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender') . '.png')) ?>" class="img-circle" alt="Avatar" />
                                    <p>
                                        <?= $this->session->userdata('email'); ?>
                                        <small><?= lang('member_since') . ' ' . $this->session->userdata('created_on'); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id')); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="mm_welcome"><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i>
                            <span><?= lang('dashboard'); ?></span></a></li>
                    <li class="treeview mm_auth mm_management">
                        <a href="#"><i class="fa fa-users"></i>
                            <span>
                                <?= lang('Management'); ?>
                            </span>
                            <i class="fa fa-angle-left pull-right"></i> </a>

                        <ul class="treeview-menu">
                            <li id="auth_users"><a href="<?= site_url('users'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Admin_Users'); ?>
                                </a></li>
                            <li id="auth_create_user"><a href="<?= site_url('users/add'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Add_Admin_User'); ?>
                                </a></li>
                            <!-- <li id="auth_company"><a href="<?= site_url('company'); ?>"><i class="fa fa-circle-o"></i> <?= lang('Company List'); ?> </a></li>
                   <li id="auth_company"><a href="<?= site_url('company/add'); ?>"><i class="fa fa-circle-o"></i>
                     <?= lang('Company Add'); ?>
                     </a></li> -->
                        </ul>
                    </li>

                    <!-- <li class="treeview mm_company">
                        <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span> <?= lang('Company'); ?> </span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li id="company_index"><a href="<?= site_url('admin/company/'); ?>"><i
                                        class="fa fa-circle-o"></i> <?= lang('Company List'); ?> </a></li>
                            <li id="company_add"><a href="<?= site_url('admin/company/add'); ?>"><i
                                        class="fa fa-circle-o"></i> <?= lang(' Add Company'); ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_news">
                        <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>
                                <?= lang('News'); ?>
                            </span>
                            <i class="fa fa-angle-left pull-right"></i> </a>

                        <ul class="treeview-menu">
                            <li id="news_categories"><a href="<?= site_url('admin/news/categories'); ?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?= lang('Category_List'); ?>
                                </a></li>
                            <li id="news_index"><a href="<?= site_url('admin/news/'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('News_List'); ?>
                                </a></li>
                            <li id="news_add"><a href="<?= site_url('admin/news/add'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Add_News'); ?>
                                </a></li>
                            <li id="news_trash"><a href="<?= site_url('admin/news/trash?trash=1'); ?>"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                    <?= lang('Trash'); ?>
                                </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_services">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <span> <?= lang('Services'); ?></span>
                            <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="services_index"><a href="<?= site_url('admin/services'); ?>"><i
                                        class="fa fa-circle-o"></i> <?= lang('Services list'); ?>
                                </a></li>
                            <li id="services_add"><a href="<?= site_url('admin/services/add'); ?>"><i
                                        class="fa fa-circle-o"></i><?= lang('Add New services'); ?>
                                </a></li>
                        </ul>
                    </li> -->
                    <li class="treeview mm_jobboard">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <span> <?= lang('Jobboard'); ?></span>
                            <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="jobboard_index"><a href="<?= site_url('admin/jobboard'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Jobs list'); ?>
                                </a></li>
                            <li id="jobboard_add"><a href="<?= site_url('admin/jobboard/add'); ?>"><i class="fa fa-circle-o"></i><?= lang('Add New Job'); ?>
                                </a></li>
                            <li id="jobboard_category"><a href="<?= site_url('admin/jobboard/category'); ?>"><i class="fa fa-circle-o"></i><?= lang('Category'); ?>
                            <li id="jobboard_job_type"><a href="<?= site_url('admin/jobboard/job_type'); ?>"><i class="fa fa-circle-o"></i><?= lang('Job Type'); ?>
                            <li id="jobboard_minimum_requirement"><a href="<?= site_url('admin/jobboard/minimum_requirement'); ?>"><i class="fa fa-circle-o"></i><?= lang('Minimum requirement'); ?>
                                </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_slider">
                        <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>
                            <span>
                                <?= lang('Slider'); ?>
                            </span>
                            <i class="fa fa-angle-left pull-right"></i> </a>

                        <ul class="treeview-menu">
                            <li id="slider_index"><a href="<?= site_url('admin/slider/'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Slider_List'); ?>
                                </a></li>
                            <li id="slider_add"><a href="<?= site_url('admin/slider/add'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Add_Slider'); ?>
                                </a></li>
                        </ul>
                    </li>

                    <!-- <li class="treeview mm_trainingprogram">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>

                            <span>
                                <?= lang('Training and development'); ?>
                            </span>
                            <i class="fa fa-angle-left pull-right"></i> </a>

                        <ul class="treeview-menu">
                            <li id="trainingprogram_index"><a href="<?= site_url('admin/trainingprogram'); ?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?= lang('Training & development list'); ?>
                                </a></li>
                            <li id="trainingprogram_add"><a href="<?= site_url('admin/trainingprogram/add'); ?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?= lang('Add New Training'); ?>
                                </a></li>

                        </ul>
                    </li>
                    <li class="treeview mm_trainers">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <span> <?= lang('Trainer'); ?></span>
                            <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="trainers_index"><a href="<?= site_url('admin/trainers'); ?>"><i
                                        class="fa fa-circle-o"></i> <?= lang('Trainer list'); ?>
                                </a></li>
                            <li id="trainers_add"><a href="<?= site_url('admin/trainers/add'); ?>"><i
                                        class="fa fa-circle-o"></i><?= lang('Add New Trainer'); ?>
                                </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_teams">
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <span> <?= lang('Teams'); ?></span>
                            <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="teams_index"><a href="<?= site_url('admin/teams'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Teams list'); ?>
                                </a></li>
                            <li id="teams_add"><a href="<?= site_url('admin/teams/add'); ?>"><i
                                        class="fa fa-circle-o"></i><?= lang('Add New Teams Member'); ?>
                                </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_groups">
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i>
                            <span> <?= lang('Groups'); ?></span>
                            <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id=""><a href="<?= site_url('admin/group'); ?>"><i class="fa fa-circle-o"></i>
                                    <?= lang('Groups list'); ?>
                                </a></li>
                            <li id=""><a href="<?= site_url('admin/group/add'); ?>"><i
                                        class="fa fa-circle-o"></i><?= lang('Add New Group'); ?>
                                </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_slider">
                        <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>
                            <span>
                                <?= lang('Slider'); ?>
                            </span>
                            <i class="fa fa-angle-left pull-right"></i> </a>

                        <ul class="treeview-menu">
                            <li id="slider_index"><a href="<?= site_url('admin/slider/'); ?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?= lang('Slider_List'); ?>
                                </a></li>
                            <li id="slider_add"><a href="<?= site_url('admin/slider/add'); ?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?= lang('Add_Slider'); ?>
                                </a></li>
                        </ul>
                    </li>

                    <li class="treeview mm_gallery">
                        <a href="#">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>


                            <span>Gallery Manager</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li id="gallery_index"><a href="<?= site_url('admin/gallery'); ?>"><i
                                        class="fa fa-circle-o"></i> Gallery </a></li>
                            <li id="gallery_add"><a href="<?= site_url('admin/gallery/add'); ?>"><i
                                        class="fa fa-circle-o"></i> Gallery Add</a></li>
                            <li id="gallery_album"><a href="<?= site_url('admin/gallery/album'); ?>"><i
                                        class="fa fa-circle-o"></i> Album </a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_pages">
                        <a href="#"> <i class="fa fa-folder"></i> <span>Pages</span> <i
                                class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="pages_add"><a href="<?= site_url('admin/pages/add'); ?>"><i
                                        class="fa fa-circle-o"></i>Pages Add</a></li>
                            <li id="pages_index"><a href="<?= site_url('admin/pages'); ?>"><i
                                        class="fa fa-circle-o"></i>Pages List</a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_offers">
                        <a href="#"> <i class="fa fa-folder"></i> <span>FDB Offers</span> <i
                                class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="offers_add"><a href="<?= site_url('admin/offers/add'); ?>"><i
                                        class="fa fa-circle-o"></i>Offers Add</a></li>
                            <li id="offers_index"><a href="<?= site_url('admin/offers'); ?>"><i
                                        class="fa fa-circle-o"></i>Offers List</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="treeview mm_contactus">
                  <a href="#">
                 <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <span>Contact & Feedback</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li id="contactus_index"><a href="<?= site_url('admin/contactus/'); ?>"><i class="fa fa-circle-o"></i> Contact List </a></li>
                     <li id="contactus_feedback"><a href="<?= site_url('admin/contactus/feedback'); ?>"><i class="fa fa-circle-o"></i> Feedback List </a></li>
                  </ul>
               </li>  -->
                    <!-- <li class="treeview mm_fileupload">
                        <a href="#"> <i class="fa fa-folder"></i> <span>File Uploader</span> <i
                                class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="fileupload_add"><a href="<?= site_url('admin/fileupload/add'); ?>"><i
                                        class="fa fa-circle-o"></i>File Uploader Add</a></li>
                            <li id="fileupload_index"><a href="<?= site_url('admin/fileupload'); ?>"><i
                                        class="fa fa-circle-o"></i>File Uploader List</a></li>
                        </ul>
                    </li>
                    <li class="treeview mm_testimonial">
                        <a href="#"> <i class="fa fa-folder"></i> <span>Testimonials</span> <i
                                class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li id="testimonial_add"><a href="<?= site_url('admin/testimonial/add'); ?>"><i
                                        class="fa fa-circle-o"></i>Testimonial Add</a></li>
                            <li id="testimonial_index"><a href="<?= site_url('admin/testimonial'); ?>"><i
                                        class="fa fa-circle-o"></i>Testimonial</a></li>
                        </ul>
                    </li> -->
                    <li class="treeview mm_settings">
                        <a href="#">
                            <i class="fa fa-cogs" aria-hidden="true"></i>

                            <span>Settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li id="settings_index"><a href="<?= site_url('admin/settings'); ?>"><i class="fa fa-circle-o"></i>
                                    Settings </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?= $page_title; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i> <?= lang('home'); ?></a>
                    </li>
                    <?php
                    foreach ($bc as $b) {

                        if ($b['link'] === '#') {

                            echo '<li class="active">' . $b['page'] . '</li>';
                        } else {

                            echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                        }
                    }

                    ?>
                </ol>
            </section>
            <div class="col-lg-12 alerts">
                <div id="custom-alerts" style="display:none;">
                    <div class="alert alert-dismissable">
                        <div class="custom-msg"></div>
                    </div>
                </div>
                <?php if ($error) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-ban"></i> <?= lang('error'); ?></h4>
                        <?= $error; ?>
                    </div>
                <?php }
                if ($warning) { ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-warning"></i> <?= lang('warning'); ?></h4>
                        <?= $warning; ?>
                    </div>
                <?php }
                if ($message) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4> <i class="icon fa fa-check"></i> <?= lang('Success'); ?></h4>
                        <?= $message; ?>
                    </div>
                <?php } ?>
            </div>
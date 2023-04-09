<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">



    <title><?= $page_title.' | '.$Settings->site_name; ?></title>



    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>



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



</head>



<body class="skin-blue fixed sidebar-mini">



<div class="wrapper">



    <header class="main-header">



        <a href="<?= site_url(); ?>" class="logo">



            <span class="logo-mini">

			<a href="<?=base_url();?>"><img src="<?php echo  base_url('themes/admin/default/assets/images/icon.png') ; ?>" alt="LOGO" /></a>

			<?php 

			 if($this->UserType == 'company_admin' || $this->UserType == 'company_user' ){

            		$company  = $this->tec->getCompany($this->session->userdata('company_id'));

					echo  $company->company_name ;

			 }else{

				echo $Settings->site_name ; 	 

			 }
			 

			?>

            </span>



            <span class="logo-lg">

            <?php 

               if($this->UserType == 'company_admin' || $this->UserType == 'company_user' ){

            		$company  = $this->tec->getCompany($this->session->userdata('company_id'));

					echo  '<b>'.$company->company_name .'</b>';

			 }else{

				echo $Settings->site_name == 'Risk Talk ' ? 'Risk <b> Talk</b>' : $Settings->site_name; 	 

			 }

			 ?>


            </span>

 				<!--<img src="'.base_url('assets/uplaods/'.$Settings->logo).'" alt="'.$Settings->site_name.'" />-->

        </a>



        <nav class="navbar navbar-static-top" role="navigation">



            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">



                <span class="sr-only">Toggle navigation</span>



                <span class="icon-bar"></span>



                <span class="icon-bar"></span>



                <span class="icon-bar"></span>



            </a>

            <div class="navbar-custom-menu">



                <ul class="nav navbar-nav">



                    <li class="hidden-xs hidden-sm"><a href="#" class="clock"></a></li>



                    <li class="hidden-xs"><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i></a></li>



                    <?php if($Admin || $Company) { ?>



                    <li class="hidden-xs"><a href="<?= site_url('admin/settings'); ?>"><i class="fa fa-cogs"></i></a></li>



                    <?php } ?>



                    <li><a href="<?= site_url('admin/company'); ?>" target="_blank"><i class="fa fa-file-text-o"></i></a></li>



                    <li><a href="<?= site_url('admin/assessment'); ?>"><i class="fa fa-th"></i></a></li>


                    <li class="dropdown user user-menu" style="padding-right:5px;">



                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">



                            <img src="<?= base_url('uploads/avatars/thumbs/'.($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender').'.png')) ?>" class="user-image" alt="Avatar" />



                            <span class="hidden-xs"><?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></span>



                        </a>



                        <ul class="dropdown-menu" style="padding-right:3px;">



                            <li class="user-header">



                                <img src="<?= base_url('uploads/avatars/'.($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender').'.png')) ?>" class="img-circle" alt="Avatar" />



                                <p>



                                    <?= $this->session->userdata('email'); ?>



                                    <small><?= lang('member_since').' '.$this->session->userdata('created_on'); ?></small>



                                </p>



                            </li>



                            <li class="user-footer">



                                <div class="pull-left">



                                    <a href="<?= site_url('users/profile/'.$this->session->userdata('user_id')); ?>" class="btn btn-default btn-flat">Profile</a>



                                </div>



                                <div class="pull-right">



                                    <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>



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


           <li class="mm_welcome"><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i> <span><?= lang('dashboard'); ?></span></a></li>     
                
           <li class="treeview mm_categories">



                    <a href="<?php if(($UserType == 'admin') || ($UserType == 'admin_user')) { echo '#' ; }else{ echo site_url('admin/company') ;} ;?>">

                        <i class="fa fa-folder"></i>

                        <?php if(($UserType == 'admin') || ($UserType == 'admin_user')) { echo '<span>Companies</span><i class="fa fa-angle-left pull-right"></i>' ; }else{ echo 'My Company' ; } ; ?>


                    </a>

					<?php if(($UserType == 'admin') || ($UserType == 'admin_user')) { ?>
                    <ul class="treeview-menu">

                        <li id="categories_index"><a href="<?= site_url('admin/company'); ?>"><i class="fa fa-circle-o"></i> List Company</a></li>

                        <?php if($UserType == 'admin'){ ?>

                        <li id="categories_add"><a href="<?= site_url('admin/company/add'); ?>"><i class="fa fa-circle-o"></i> Add Company</a></li>  <?php } ?>

                    </ul>

					<?php  } ?>

                </li>

           <li class="treeview mm_categories">

                    <a href="#">

                        <i class="fa fa-folder"></i>

                        <span>Questions</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="Question_index"><a href="<?= site_url('admin/question'); ?>"><i class="fa fa-circle-o"></i> List Questions</a></li>

                        <?php if($UserType == 'admin'){ ?>



                        <li id="Question_add"><a href="<?= site_url('admin/question/add'); ?>"><i class="fa fa-circle-o"></i> Add Question</a></li>  <?php } ?>

                    </ul>



                </li>

           <li class="treeview mm_categories">



                    <a href="#">



                        <i class="fa fa-folder"></i>



                        <span>Likelihood</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="categories_index"><a href="<?= site_url('admin/likelihood'); ?>"><i class="fa fa-circle-o"></i> List Likelihood</a></li>

                      <?php if($UserType == 'admin' ){ ?>




                        <li id="categories_add"><a href="<?= site_url('admin/likelihood/add'); ?>"><i class="fa fa-circle-o"></i> Add Likelihood</a></li>  <?php } ?>

                    </ul>



                </li>
                
           <li class="treeview mm_categories">



                    <a href="#">



                        <i class="fa fa-folder"></i>



                        <span>Consequence</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="categories_index"><a href="<?= site_url('admin/consequence'); ?>"><i class="fa fa-circle-o"></i> List Consequence</a></li>

                        <?php if($UserType == 'admin'){ ?>

                        <li id="categories_add"><a href="<?= site_url('admin/consequence/add'); ?>"><i class="fa fa-circle-o"></i> Add Consequence</a></li>  <?php }  ?>

					  </ul>

                      </li>
                  	
           <li class="treeview mm_categories">



                    <a href="#">



                        <i class="fa fa-folder"></i>



                        <span>Risk Assessment</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="categories_index"><a href="<?= site_url('admin/assessment'); ?>"><i class="fa fa-circle-o"></i> List Assessment</a></li>

                       

                    </ul>



                </li>

           <li class="treeview mm_categories">



                <a href="#">



                    <i class="fa fa-folder"></i>



                    <span>Employees</span>



                    <i class="fa fa-angle-left pull-right"></i>



                </a>



                <ul class="treeview-menu">



                    <li id="categories_index"><a href="<?= site_url('admin/employee'); ?>"><i class="fa fa-circle-o"></i> List Employees</a></li>

                    <?php if( $UserType == 'company_admin' ){ ?>

                    <li id="categories_add"><a href="<?= site_url('admin/employee/add'); ?>"><i class="fa fa-circle-o"></i> Add Employee</a></li>  <?php } ?>

                </ul>



            </li>
            
           <li class="treeview mm_categories">



                <a href="#">



                    <i class="fa fa-folder"></i>



                    <span>Groups</span>



                    <i class="fa fa-angle-left pull-right"></i>



                </a>

                <ul class="treeview-menu">

                    <li id="categories_index"><a href="<?= site_url('admin/groups'); ?>"><i class="fa fa-circle-o"></i> List groups</a></li>

                    <?php if($UserType == 'company_admin' ){ ?>

                    <li id="categories_add"><a href="<?= site_url('admin/groups/add'); ?>"><i class="fa fa-circle-o"></i> Add group</a></li>  <?php } ?>

                </ul>



            </li> 
            
           <li class="treeview mm_categories">



                <a href="#">



                    <i class="fa fa-folder"></i>



                    <span>Management</span>



                    <i class="fa fa-angle-left pull-right"></i>



                </a>



                <ul class="treeview-menu">



                    <li id="categories_index"><a href="<?= site_url('admin/management'); ?>"><i class="fa fa-circle-o"></i> Management list</a></li>

                    <?php if($UserType == 'admin' || $UserType == 'company_admin' ){ ?>



                    <li id="categories_add"><a href="<?= site_url('management/add'); ?>"><i class="fa fa-circle-o"></i> Add management</a></li>  <?php } ?>

                </ul>



            </li>
           
           <li class="treeview mm_categories">



                    <a href="#">



                        <i class="fa fa-folder"></i>



                        <span>Reports</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="categories_index"><a href="<?= site_url('admin/reports'); ?>"><i class="fa fa-circle-o"></i> List reports</a></li>

                       

                    </ul>



                </li>    
                
		 <?php if($UserType == 'admin'){ ?>

          <li class="treeview mm_categories">



                    <a href="#">



                        <i class="fa fa-folder"></i>



                        <span>Settings</span>



                        <i class="fa fa-angle-left pull-right"></i>



                    </a>



                    <ul class="treeview-menu">



                        <li id="Question_index"><a href="<?= site_url('admin/settings'); ?>"><i class="fa fa-circle-o"></i> Settings </a></li>

                        

                    </ul>



                </li>

          <?php  } ?>

       </ul>

        </section>



    </aside>



   



    <div class="content-wrapper">



        <section class="content-header">



            <h1><?= $page_title; ?></h1>



            <ol class="breadcrumb">



                <li><a href="<?= site_url('admin'); ?>"><i class="fa fa-dashboard"></i> <?= lang('home'); ?></a></li>



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



            <?php if($error)  { ?>



            <div class="alert alert-danger alert-dismissable">



                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>



                <h4><i class="icon fa fa-ban"></i> <?= lang('error'); ?></h4>



                <?= $error; ?>



            </div>



            <?php } if($warning) { ?>



            <div class="alert alert-warning alert-dismissable">



                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>



                <h4><i class="icon fa fa-warning"></i> <?= lang('warning'); ?></h4>



                <?= $warning; ?>



            </div>



            <?php } if($message) { ?>



            <div class="alert alert-success alert-dismissable">



                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>



                <h4>	<i class="icon fa fa-check"></i> <?= lang('Success'); ?></h4>



                <?= $message; ?>



            </div>



            <?php } ?>



        </div>


<!-- Hero Section  -->
<section class="imgNavTop">
    <div class="position-relative">
        <img src="<?php echo base_url(); ?>/themes/front/assets/images/newImg/breadcump.png" alt="hero-bg-another"
            class="img-fluid imgHeightMobile w-100">
        <div class="text-over-navbarImg">
            <h3>Account</h3>
        </div>
    </div>
</section>

<!-- Member Start -->
<section class="member-area mt-30">
    <div class="container">
        <div class="mb-30 breadcrumbList text-white">
            <div class="d-flex justify-content-between">
                <div>
                    <ul class="list-unstyled d-flex">
                        <li><a href="<?php echo base_url('/'); ?>">Home <span class="justMoveIcon"><i
                                        class="fas fa-long-arrow-alt-right"></i></span></a></li>
                        <li><a class="active" href="<?php echo base_url('member/dashboard'); ?>">Dashboard <span
                                    class="justMoveIcon"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-30">
            <div>
                <div class="member-list-grid">
                    <div class="bg-white siteContentMemberList">
                        <div class="profile-menu-items">
                            <ul class="list-unstyled nav nav-tabs" id="pills-tab" role="tablist">
                                <li>
                                    <a class="nav-link <?= (current_url() == base_url('member/dashboard')) ? 'active' : '' ?>"
                                        href="<?php echo base_url('member/dashboard'); ?>" role="tab"
                                        aria-controls="pills-profile" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="position-relative text" onclick="myFunction()">
                                    <a class="nav-link profileLink" role="tab" aria-controls="pills-profile"
                                        aria-selected="true">My Profile</a>
                                    <ul id="hideSec" style="display: none;" class="nav nav-pills">
                                        <li class=""><a class="" href="<?php echo base_url('member/profile'); ?>">View
                                                Profile</a></li>
                                        <li><a href="<?php echo base_url('member/update_member'); ?>">Edit Profile</a>
                                        </li>
                                        <li><a href="<?php echo base_url('member/download_profile'); ?>">Download
                                                Profile</a></li>
                                        <li><a href="<?php echo base_url('member/download_tax_income'); ?>">Download
                                                Income Tax Statement</a></li>
                                    </ul>
                                    <div class="iconMove text" onclick="myFunction()">
                                        <i class="fas fa-angle-right rotate" id="arrowTopIcon"></i>
                                    </div>
                                </li>

                                <li>
                                    <a class="nav-link <?= (current_url() == base_url('member/payment')) ? 'active' : '' ?>"
                                        href="<?php echo base_url('member/payment'); ?>" role="tab"
                                        aria-controls="pills-booking" aria-selected="false">Payment</a>
                                </li>
                                <li class="position-relative text-two" onclick="report()">
                                    <a class="nav-link" role="tab" aria-controls="pills-profile"
                                        aria-selected="true">Reports</a>
                                    <ul id="report" style="display: none;" class="nav nav-pills">
                                        <li class=""><a class=""
                                                href="<?php echo base_url('member/month_wise_ledger'); ?>">Month wise
                                                Ledger</a></li>
                                        <li><a href="<?php echo base_url('member/transaction_ledger'); ?>">Transaction
                                                Ledger</a></li>
                                    </ul>
                                    <div class="iconMove  text-two" onclick="report()">
                                        <i class="fas fa-angle-right rotate" id="reportToggole"></i>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link <?= (current_url() == base_url('member/change_password')) ? 'active' : '' ?>"
                                        href="<?php echo base_url('member/change_password'); ?>" role="tab"
                                        aria-controls="pills-reward" aria-selected="false">Change Password</a>
                                </li>
                                <li>
                                    <!-- <button type="button" class="btn btn-primary btn-sm"><a href="<?php echo base_url('logout-home'); ?>"><?= lang("Logout"); ?></a></button> -->
                                    <a class="nav-link" href="<?php echo base_url('logout-home'); ?>" role="tab"
                                        aria-controls="pills-reward" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="overViewLineHight">
                                <h2>Overview</h2>
                                <p>Hello <?= !empty($info->first_name) ? $info->first_name : 'Mr'; ?>, here is your
                                    overview.</p>
                            </div>
                            <div class="overview-grid number mt-40">
                                <div class="overview-content fadinoutDefault">
                                    <p class="heading">Member Since</p>
                                    <div>
                                        <p><?= !empty($info->created_at) ? date('d M Y', strtotime($info->created_at)) : ''; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="overview-content fadinoutDefault">
                                    <p class="heading">Paid to FDF33 Fund</p>
                                    <div>
                                        <p><?= !empty($total_amount->total_amount) ? $total_amount->total_amount : 0 ?>
                                            TK</p>
                                        <a href="<?php echo base_url('member/payment'); ?>">
                                            <p class="textColor">Transaction List</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="overview-content fadinoutDefault">
                                    <p class="heading">Total Due</p>
                                    <div>
                                        <p><?php echo $duePayment;?> TK</p>
                                        <a href="<?php echo base_url('member/addPayment');?>">
                                            <p class="textColor">Pay Now</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="overview-content fadinoutDefault">
                                    <p class="heading">FDF33 Total Balance</p>
                                    <div>
                                        <p><?= !empty($amount_shows->fake_total_amount) ? $amount_shows->fake_total_amount : 0 ?>
                                            TK</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Member End -->

<script type="text/javascript">
var valueg = "<?= current_url() ?>";
</script>
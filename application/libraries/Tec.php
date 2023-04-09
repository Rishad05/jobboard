<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
 *  ==============================================================================
 *  Author	: Mian Saleem
 *  Email	: saleem@tecdiary.com
 *  Web		: http://tecdiary.com
 *  ==============================================================================
 */

class Tec
{

    public function __construct()
    {
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    function timeago($date)
    {
        $timestamp = strtotime($date);
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");

        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff     = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
        }
    }

    public function clear_tags($str)
    {
        return htmlentities(
            strip_tags(
                $str,
                '<span><div><a><br><p><b><i><u><img><blockquote><small><ul><ol><li><hr><big><pre><code><strong><em><table><tr><td><th><tbody><thead><tfoot><h3><h4><h5><h6>'
            ),
            ENT_QUOTES | ENT_XHTML | ENT_HTML5,
            'UTF-8'
        );
    }

    public function decode_html($str)
    {
        return html_entity_decode($str, ENT_QUOTES | ENT_XHTML | ENT_HTML5, 'UTF-8');
    }

    public function formatMoney($number, $currency = '')
    {
        $decimal = 2;
        $ts = ',';
        $ds = '.';
        return $currency . number_format($number, $decimal, $ds, $ts);
    }

    public function formatNumber($number, $decimals = 2)
    {
        $ts = ',';
        $ds = '.';
        return number_format($number, $decimals, $ds, $ts);
    }

    public function formatDecimal($number, $decimals = 2)
    {
        return round($number, $decimals);
    }

    public function roundNumber($number, $toref = NULL)
    {
        switch ($toref) {
            case 1:
                $rn = round($number * 20) / 20;
                break;
            case 2:
                $rn = round($number * 2) / 2;
                break;
            case 3:
                $rn = round($number);
                break;
            case 4:
                $rn = ceil($number);
                break;
            default:
                $rn = $number;
        }
        return $rn;
    }

    public function unset_data($ud)
    {
        if ($this->session->userdata($ud)) {
            $this->session->unset_userdata($ud);
            return true;
        }
        return FALSE;
    }

    public function hrsd($sdate)
    {
        if ($sdate) {
            return date($this->Settings->dateformat, strtotime($sdate));
        }
        return FASLE;
    }

    public function hrld($ldate)
    {
        if ($ldate) {
            return date($this->Settings->dateformat . ' ' . $this->Settings->timeformat, strtotime($ldate));
        }
        return FALSE;
    }

    public function send_email($to, $subject, $message, $from = NULL, $from_name = NULL, $attachment = NULL, $cc = NULL, $bcc = NULL)
    {
        $this->load->library('email');
        $config['protocol'] = $this->Settings->protocol;
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        if ($this->Settings->protocol == 'smtp') {
            $config['smtp_host'] = $this->Settings->smtp_host;
            $config['smtp_user'] = $this->Settings->smtp_user;
            $config['smtp_pass'] = $this->encrypt->decode($this->Settings->smtp_pass);
            $config['smtp_port'] = $this->Settings->smtp_port;
        } elseif ($this->Settings->protocol == 'sendmail') {
            $config['mailpath'] = $this->Settings->mailpath;
        }
        $this->email->initialize($config);

        if ($from && $from_name) {
            $this->email->from($from, $from_name);
        } elseif ($from) {
            $this->email->from($from, $this->Settings->site_name);
        } else {
            $this->email->from($this->Settings->default_email, $this->Settings->site_name);
        }

        $this->email->to($to);
        if ($cc) {
            $this->email->cc($cc);
        }
        if ($bcc) {
            $this->email->bcc($bcc);
        }
        $this->email->subject($subject);
        $this->email->message($message);
        if ($attachment) {
            if (is_array($attachment)) {
                $this->email->attach($attachment['file'], '', $attachment['name'], $attachment['mine']);
            } else {
                $this->email->attach($attachment);
            }
        }

        if ($this->email->send()) {
            //echo $this->email->print_debugger(); die();
            return TRUE;
        } else {
            //echo $this->email->print_debugger(); die();
            return FALSE;
        }
    }

    public function print_arrays()
    {
        $args = func_get_args();
        echo "<pre>";
        foreach ($args as $arg) {
            print_r($arg);
        }
        echo "</pre>";
        die();
    }

    public function getUsers()
    {
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }




    public function getUser($user_id = NULL)
    {
        if (!$user_id) {
            $user_id = $this->session->userdata('user_id');
        }
        $q = $this->db->get_where('users', array('id' => $user_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getCompany($company_id)
    {

        $q = $this->db->get_where('company', array('company_id' => $company_id));
        if ($q->num_rows() > 0) {
            //foreach (($q->result()) as $row) {
            //  $data[] = $row;
            // }
            return $q->row();
        }
        return FALSE;
    }

    public function logged_in()
    {
        return (bool) $this->session->userdata('identity');
    }
    public function applicant_logged_in()
    {
        return (bool) $this->session->userdata('applicant_id');
    }
    public function member_logged_in()
    {
        return (bool) $this->session->userdata('member_id');
    }
    public function in_group($check_group, $id = false)
    {
        $id || $id = $this->session->userdata('user_id');
        $group = $this->site->getUserGroup($id);
        if ($group && $group->name === $check_group) {
            return TRUE;
        }
        return FALSE;
    }
    public function in_UserType($id = false)
    {
        $id || $id = $this->session->userdata('user_id');
        $group = $this->site->getUserGroup($id);
        if ($group) {
            return $group->name;
        }
        return FALSE;
    }


    public function in_employee($id = false)
    {
        $emp_is_login = $this->session->userdata('emp_is_login');
        if ($emp_is_login == true) {
            return true;
        }
        return FALSE;
    }

    private function _rglobRead($source, &$array = array())
    {
        if (!$source || trim($source) == "") {
            $source = ".";
        }
        foreach ((array)glob($source . "/*/") as $key => $value) {
            $this->_rglobRead(str_replace("//", "/", $value), $array);
        }
        $hidden_files = glob($source . ".*") and $htaccess = preg_grep('/\.htaccess$/', $hidden_files);
        $files = array_merge(glob($source . "*.*"), $htaccess);
        foreach ($files as $key => $value) {
            $array[] = str_replace("//", "/", $value);
        }
    }

    private function _zip($array, $part, $destination, $output_name = 'sma')
    {
        $zip = new ZipArchive;
        @mkdir($destination, 0777, true);

        if ($zip->open(str_replace("//", "/", "{$destination}/{$output_name}" . ($part ? '_p' . $part : '') . ".zip"), ZipArchive::CREATE)) {
            foreach ((array)$array as $key => $value) {
                $zip->addFile($value, str_replace(array("../", "./"), NULL, $value));
            }
            $zip->close();
        }
    }

    public function zip($source = NULL, $destination = "./", $output_name = 'sma', $limit = 5000)
    {
        if (!$destination || trim($destination) == "") {
            $destination = "./";
        }

        $this->_rglobRead($source, $input);
        $maxinput = count($input);
        $splitinto = (($maxinput / $limit) > round($maxinput / $limit, 0)) ? round($maxinput / $limit, 0) + 1 : round($maxinput / $limit, 0);

        for ($i = 0; $i < $splitinto; $i++) {
            $this->_zip(array_slice($input, ($i * $limit), $limit, true), $i, $destination, $output_name);
        }

        unset($input);
        return;
    }

    public function unzip($source, $destination = './')
    {

        // @chmod($destination, 0777);
        $zip = new ZipArchive;
        if ($zip->open(str_replace("//", "/", $source)) === true) {
            $zip->extractTo($destination);
            $zip->close();
        }
        // @chmod($destination,0755);

        return TRUE;
    }

    public function view_rights($check_id, $js = NULL)
    {
        if (!$this->Admin) {
            if ($check_id != $this->session->userdata('user_id')) {
                $this->session->set_flashdata('error', $this->data['access_denied']);
                if ($js) {
                    die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                } else {
                    redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
                }
            }
        }
        return TRUE;
    }

    public function dd()
    {
        die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('pos')) . "'; }, 10);</script>");
    }


    function right_bar()
    {

        $settings = $this->site->getSettings();

?>

        <div class="sidebar_section">

            <?php if ($this->uri->segment(1) == 'publication') { ?>
                <!-- Journal widget -->
                <div class="widget_area journal_widget">
                    <div class="widget_title">
                        <h3>Journals</h3>
                    </div>
                    <div class="journal_content">
                        <div class="msg_text">
                            <p><a href=""><i class="fas fa-download"></i> Download PDF file here</a></p>
                            <p><a href=""><i class="fas fa-download"></i> Download PDF file here</a></p>
                            <p><a href=""><i class="fas fa-download"></i> Download PDF file here</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') && ($this->uri->segment(2) != 'gallery' && $this->session->userdata('member_id') == '' && $this->session->userdata('user_id') == '')) { ?>

                <!-- LOGIN WIDGET STARTS -->

                <div class="widget_area login_widget">
                    <div class="widget_title">
                        <h3>Member Login</h3>
                    </div>
                    <div class="widget_content">
                        <div class="alert_msg">

                        </div>
                        <?php echo form_open("auth/member_login", 'class="validation form_singel"'); ?>

                        <div class="form-row mb-3">

                            <div class="col">

                                <?= form_input('identity', set_value('identity'), 'class="form-control" placeholder="Email" autocomplete="off"'); ?>

                            </div>

                        </div>
                        <div class="form-row mb-3">

                            <div class="col">

                                <?= form_password('password', set_value('password'), 'class="form-control" placeholder="Password" autocomplete="new-password"'); ?>

                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <div class="forget_pass_login">
                                    <p></p>
                                </div>
                                <div class="btn_links">
                                    <a href="<?php echo base_url('registration'); ?>" class="btn btn-primary btn-small"><i class="fas fa-user"></i> Apply For Your Membership</a>
                                    <a href="<?php echo base_url('registration'); ?>" class="btn btn-primary btn-small"><i class="fas fa-calendar-alt"></i> Renew Your Membership</a>
                                </div>

                            </div>

                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            <?php } ?>
            <!-- LOGIN WIDGET END -->

            <!-- MESSAGE WIDGET -->
            <div class="widget_area msg_widget">
                <div class="widget_title">
                    <h3>The Father of the Nation Bangabondhu Sheikh Mujibur Rahman</h3>
                </div>
                <div class="widget_content">
                    <ul class="msg_list list-inline">
                        <li class="msg_item clearfix">
                            <div class="msg_content">
                                <div class="msg_auth_img">
                                    <img src="<?php echo base_url() . 'themes/frontend/' . $settings->frontend_theme . '/assets/'; ?>images/bangabandhu01_big.jpg" alt="AUTH IMAGE">
                                </div>
                            </div>
                            <div class="msg_meta">
                                <!-- <p class="auth_info">Dr. Md. Abdul Gani Mollah | President</p>
                                <p class="auth_contact">Mob - 01711660673</p> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget_area msg_widget">
                <div class="widget_title">
                    <h3>Honorable Prime Minister</h3>
                </div>
                <div class="widget_content">
                    <ul class="msg_list list-inline">
                        <li class="msg_item clearfix">
                            <div class="msg_content">
                                <div class="msg_auth_img">
                                    <img src="<?php echo base_url() . 'themes/frontend/' . $settings->frontend_theme . '/assets/'; ?>images/sheikh-hasina.jpg" alt="AUTH IMAGE">
                                </div>
                            </div>
                            <div class="msg_meta">
                                <!-- <p class="auth_info">Dr. Md. Wahidur Rahman | Secretary General</p>
                                <p class="auth_contact">Mob - 01712069654</p> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- MESSAGE WIDGET END -->

            <?php if ($this->uri->segment(1) == 'training' && $this->uri->segment(2) == 'details') {

                $trainingId = $this->uri->segment(3);
                $trainingSidebarInfo = $this->site->wheres_row('training_program', array('id' => $trainingId));

            ?>
                <!-- Tentative Class Start SECTION -->

                <div class="widget_area find_doc_widget">
                    <div class="widget_title">
                        <h3>Training Start</h3>
                    </div>
                    <div class="widget_content">

                        <div class="event_content Tentative_contant">
                            <h1 class="event_title"><?= date('dS F, Y', strtotime($trainingSidebarInfo->start_date)); ?></h1>
                        </div>

                    </div>
                </div>
                <!-- Tentative Class Start SECTION END -->

                <!-- Training venue Start SECTION -->
                <div class="widget_area find_doc_widget">
                    <div class="widget_title">
                        <h3>Training venue</h3>
                    </div>
                    <div class="widget_content">

                        <div class="event_content text-center">
                            <h3 class="event_title">
                                <?= $trainingSidebarInfo->venue; ?>
                            </h3>
                        </div>

                    </div>
                </div>
                <!--Training venue Class Start SECTION END -->
            <?php }  ?>
            <!-- EVENTS WIDGET -->
            <div class="widget_area event_widget">
                <div class="widget_title">
                    <?php if ($this->uri->segment(1) != 'events' && $this->uri->segment(2) != 'event_details') {
                        echo "<h3>Events</h3>";
                    } else if ($this->uri->segment(1) == 'events') {
                        echo "<h3>Previous Events</h3>";
                    } else {
                        echo "<h3>Event Information</h3>";
                    }
                    ?>
                    <?php $einfo = $this->site->rightbar_event(); ?>
                </div>
                <?php if ($this->uri->segment(1) != 'events' && $this->uri->segment(2) != 'event_details') { ?>
                    <div class="widget_content">
                        <ul class="event_lists list-inline">
                            <li class="event_item">
                                <div class="event_img">
                                    <a href="<?php echo base_url('event/event_details/' . $einfo->event_id); ?>">
                                        <img src=" <?php echo base_url('uploads/event/' . $einfo->event_img); ?>" alt="EVENT" class="w-100">
                                    </a>
                                    <div class="event_date_holder">
                                        <span class="event_date"><?php echo date('d', strtotime($einfo->start_date)); ?></span>
                                        <span><?php echo date('F Y', strtotime($einfo->start_date)); ?></span>
                                    </div>
                                </div>
                                <div class="event_content">
                                    <h3 class="event_title"><?php echo $einfo->title; ?></h3>
                                    <ul class="event_meta list-inline">
                                        <li class="event_time">
                                            <i class="far fa-clock"></i> From :
                                            <?php echo  date('d F Y', strtotime($einfo->start_date)) . ' - ' . date('g a', strtotime($einfo->start_time)); ?>
                                        </li>
                                        <li class="event_time">
                                            <i class="far fa-clock"></i> To :
                                            <?php echo date('d F Y', strtotime($einfo->end_date)) . ' - ' . date('g a', strtotime($einfo->end_time)); ?>
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> Address - <?php echo $einfo->address; ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="widget_link">
                            <a href="<?php echo base_url('events'); ?>">View All Events Here</a>
                        </div>
                    </div>

                <?php } else if ($this->uri->segment(1) == 'events') {  ?>
                    <?php
                    $previous = $this->site->rightbar_previous_event();
                    if (!$previous) {
                        echo "<p style='color:red;'> Previous event not found </p>";
                    }
                    foreach ($previous as $key => $value) {

                    ?>
                        <a href="<?= base_url('event/event_details/' . $value->event_id); ?>">
                            <li class="Previous_event_li"> <?= $value->title; ?></li>
                        </a>

                    <?php } ?>
                <?php } else if ($this->uri->segment(2) == 'event_details') {
                    $eventId = $this->uri->segment(3);
                    $detailsInfo =  $this->site->wheres_row('event', array('event_id' => $eventId));
                ?>

                    <div class="widget_content">
                        <div class="event_timeline">
                            <ul class="event_meta list-inline">
                                <li class="event_time">

                                    <i class="far fa-clock"></i> Start :
                                    <?php echo  date('d F Y', strtotime($detailsInfo->start_date)) . ' - ' . date('g a', strtotime($detailsInfo->start_time)); ?><br>

                                    <i class="far fa-clock"></i> End :
                                    <?php echo date('d F Y', strtotime($detailsInfo->end_date)) . ' - ' . date('g a', strtotime($detailsInfo->end_time)); ?>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> Location - <?php echo $detailsInfo->address; ?>
                                </li>
                            </ul>
                            <div class="book_event">
                                <button type="button" class="btn btn-primary btn_small">
                                    <a href="<?= base_url('home/event_booking/' . $detailsInfo->event_id); ?>">Register this Event</a>
                                </button>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <!-- EVENTS WIDGET END -->

            <!-- FIND DOCTOR SECTION -->
            <div class="widget_area find_doc_widget">
                <div class="widget_title">
                    <h3>Find a Member</h3>
                </div>
                <div class="widget_content">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmailsearch" onkeyup="findmembers()" aria-describedby="emailHelp" placeholder="Search Here . . .">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Find</button> -->
                    </form>
                    <div class="drop_dpwn_dr_list">
                        <span id="member_searching_result"></span>
                    </div>
                </div>
            </div>
            <!-- FIND DOCTOR SECTION END -->





            <!-- Home Section -->
            <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' && $this->uri->segment(2) != 'gallery') { ?>
                <!-- VIDEO WIDGET -->
                <div class="widget_area event_widget">
                    <div class="widget_title">
                        <h3>Videos</h3>
                    </div>
                    <div class="widget_content">

                        <?php
                        $fvideo = $this->site->featured_video();
                        $cid = explode("?v=", $fvideo->embed_video)[1]; // Video unique id from youtube
                        ?>
                        <ul class="event_lists list-inline">
                            <li class="event_item">
                                <div class="event_img">
                                    <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/<?php echo $cid; ?>?start=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="event_content">
                                    <h3 class="event_title"><?= $fvideo->title; ?></h3>
                                    <!-- <p><?= $fvideo->description; ?></p> -->
                                </div>
                            </li>
                        </ul>
                        <div class="widget_link">
                            <a href="<?php echo base_url('viewvideo'); ?>">View All Videos Here</a>
                        </div>
                    </div>
                </div>
                <!-- VIDEO WIDGET END -->

                <!-- QUICK LINKS WIDGET -->
                <div class="widget_area quick_links_widget">
                    <div class="widget_content">
                        <ul class="links_list list-inline m-0">
                            <li class="link_item">
                                <a href="<?php echo base_url('publication'); ?>" class="d-block">Publications and Journals</a>
                            </li>
                            <li class="link_item">
                                <a href="<?php echo base_url('home/gallery/'); ?>" class="d-block">Gallery</a>
                            </li>
                            <li class="link_item">
                                <a href="<?= base_url('training'); ?>" class="d-block">Programs and Training</a>
                            </li>
                            <li class="link_item">
                                <a href="<?php echo base_url('notice') ?>" class="d-block">Circular and Notice</a>
                            </li>
                            <li class="link_item">
                                <a href="<?php echo base_url('viewvideo'); ?>" class="d-block">Videos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- QUICK LINKS WIDGET END -->
                <!-- Home Section End-->

            <?php } ?>

        </div>

<?php

    }
}

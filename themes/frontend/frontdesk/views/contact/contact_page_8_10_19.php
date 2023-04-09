<!-- page_titlebar Section Start --> 
<div class="page_titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center">
                <h2 class="page_titlebar_heading"><?= $page_title; ?></h2> 
                <ul class="breadcumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i> <?= lang('home'); ?></a></li>
                    <?php
                    foreach ($bc as $b) {
                        if ($b['link'] === '#') {
                            echo '<li class="active">' . $b['page'] . '</li>';
                        } else {
                            echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                        }
                    }
                    ?> 
                </ul>
            </div>
        </div>
    </div>
</div>
<!--page_titlebar Section End-->

<div class="content_area">
    <!--Like What you see section Start-->
    <div class="contact_info_boxes">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-4">
                    <div class="contact_info_box">
                        <span><i class="fas fa-envelope"></i></span>
                        <h4>Email</h4>
                         <p><?= $this->Settings->default_email; ?></p> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_info_box">
                        <span><i class="fas fa-phone"></i></span>
                        <h4>Phone</h4>
                         <p><?= $this->Settings->tel; ?></p> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_info_box">
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <h4>Address</h4>
                        <p><?= $this->Settings->address; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="like_what_you_see_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="like_what_you_see_content">
                        <h2>Send Us Message</h2>
                        <!-- <form class="form_singel">
                          <div class="form-row mb-3">
                            <div class="col">
                              <input type="text" class="form-control bg-transparent border-dark" placeholder="First name" v-model="newMessage.first_name">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control bg-transparent border-dark" placeholder="Last name" v-model="newMessage.last_name">
                            </div>
                          </div>
                          <div class="form-row mb-3">
                            <div class="col">
                              <input type="email" class="form-control bg-transparent border-dark" placeholder="Email" v-model="newMessage.email">
                            </div>
                            <div class="col">
                              <input type="tel" class="form-control bg-transparent border-dark" placeholder="Phone" v-model="newMessage.phone">
                            </div>
                          </div>
                          <div class="form-row mb-5">
                            <div class="col-md-12">
                              <textarea class="form-control bg-transparent border-dark" id="" rows="1" placeholder="Your message" v-model="newMessage.message"></textarea>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-12">
                              <button type="button" class="btn btn-primary btn_style " @click="sendMessage();">Send Message<i class="fas fa-long-arrow-alt-right btn_icon"></i></button>
                            </div>
                          </div>
                        </form> -->
                         
                        <?php if($warning) { ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-warning"></i> <?= lang('warning'); ?></h4>
                            <?= $warning; ?>
                        </div>
                        <?php } if($message) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-check"></i> <?= lang('Success'); ?></h4>
                            <?= $message; ?>
                        </div>
                        <?php } ?>
                        <?php echo form_open_multipart("contacts",'class="form_singel"');?> 
                          <div class="form-row mb-3">
                            <div class="col">
                              <input type="text" class="form-control bg-transparent border-dark" placeholder="First name" name="first_name" id="first_name">
                              <?php echo form_error('first_name'); ?>
                            </div>
                            <div class="col">
                              <input type="text" class="form-control bg-transparent border-dark" placeholder="Last name" name="last_name" id="last_name">
                              <?php echo form_error('last_name'); ?>
                            </div>
                          </div>
                          <div class="form-row mb-3">
                            <div class="col">
                              <input type="email" class="form-control bg-transparent border-dark" placeholder="Email" name="email" id="email">
                              <?php echo form_error('email'); ?>
                            </div>
                            <div class="col">
                              <input type="tel" class="form-control bg-transparent border-dark" placeholder="Phone" name="phone" id="phone">
                              <?php echo form_error('phone'); ?>
                            </div>
                          </div>
                          <div class="form-row mb-5">
                            <div class="col-md-12">
                              <textarea class="form-control bg-transparent border-dark" id="message" rows="1" placeholder="Your message" name="message"></textarea>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn_style ">Send Message<i class="fas fa-long-arrow-alt-right btn_icon"></i></button>
                            </div>
                          </div>
                        </form>
                         <?php echo form_close();?> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Content_right">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4388.785223391679!2d91.82998052200634!3d22.33422184266398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2757e707007d%3A0xc2d4d2974e565234!2sNew+Market+Bus+Stand!5e0!3m2!1sen!2sbd!4v1556020777404!5m2!1sen!2sbd" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Like What you see section End-->
</div>

<!--        Info Icon Section Start-->
<div class="info_icon_area content_info">
    <div class="info_icon_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-truck-moving"></i>
                    <h2>Quick Services</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-hourglass-half"></i>
                    <h2>24/7 Support</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-user-alt"></i>
                    <h2>User Friendly</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_icon text-center">
                    <i class="fas fa-handshake"></i>
                    <h2>Easy Solution </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Icon Section End
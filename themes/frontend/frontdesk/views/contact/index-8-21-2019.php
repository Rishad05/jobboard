 
<div class="content_area">
    <!--Like What you see section Start-->
    <div class="contact_info_boxes">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="page_title">Contact Us</h2>
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
                              <button type="submit" class="btn btn-primary btn_style ">Send Message <i class="fas fa-long-arrow-alt-right btn_icon"></i></button>
                            </div>
                          </div>
                        </form>
                         <?php echo form_close();?> 
                    </div>
                </div>
                <div class="col-md-6">


                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="contact_info_box">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <h4>ROMO Fashion Today Ltd.</h4>
                                
                                <p><?= $this->Settings->address; ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact_info_box">
                                <span><i class="fas fa-envelope"></i></span>
                                <!-- <h4>Email</h4> -->
                                 <p><a href="mailto:<?= $this->Settings->default_email; ?>"><?= $this->Settings->default_email; ?></a></p> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact_info_box">
                                <span><i class="fas fa-phone"></i></span>
                                <!-- <h4>Phone</h4> -->
                                 <p><a href="tel:<?= $this->Settings->tel; ?>"><?= $this->Settings->tel; ?></a></p> 
                            </div>
                        </div>
                    </div>

                    <div class="Content_right">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.2775091523583!2d90.40172088134246!3d23.869930031747376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43aaca0b7bf%3A0xaf023fc07721eaaa!2s62+Road-15%2C+Dhaka+1230!5e0!3m2!1sen!2sbd!4v1566190474522!5m2!1sen!2sbd" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Like What you see section End-->
</div> 
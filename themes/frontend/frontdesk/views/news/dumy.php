 <!--page_titlebar Section Start-->
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
    <div class="like_what_you_see_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="faq_s">Frequently Asked Questions</h3>
                </div>
            </div>
            <!-- FAQS -->

                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne1">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1">
                        <h5 class="mb-0">
                         What do I need to hire a car? <i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                      data-parent="#accordionEx">
                      <div class="card-body">
                          To book your car, all you need is a credit or debit card. When you pick the car up, you’ll need:<ul>
                          <li>Your voucher / eVoucher, to show that you’ve paid for the car.</li>
                          <li>The main driver’s credit / debit card, with enough available funds for the car’s deposit.</li>
                          <li>Each driver’s full, valid driving licence, which they’ve held for at least 12 months (often 24).</li>
                          <li>Your passport and any other ID the car hire company needs to see.</li>
                          </ul>
                          Different car hire companies have different requirements, so please make sure you check the car’s terms and conditions as well
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingTwo2">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                        aria-expanded="false" aria-controls="collapseTwo2">
                        <h5 class="mb-0">
                          How old do I have to be to rent a car?<i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                      data-parent="#accordionEx">
                      <div class="card-body">
                       
                          For most car hire companies, the age requirement is between 21 and 70 years old. If you’re under 25 or over 70, you might have to pay an additional fee.
                     
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree3">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                        aria-expanded="false" aria-controls="collapseThree3">
                        <h5 class="mb-0">
                          Can I book a hire car for someone else?<i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                      data-parent="#accordionEx">
                      <div class="card-body">
                        Yes, as long as they meet these requirements. Just fill in their details while you’re making the reservation.
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree4">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree4"
                        aria-expanded="false" aria-controls="collapseThree3">
                        <h5 class="mb-0">
                          How do I find the cheapest car hire deal?<i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree4" class="collapse" role="tabpanel" aria-labelledby="headingThree4"
                      data-parent="#accordionEx">
                      <div class="card-body">
                        We work with all the major international car hire brands (and lots of smaller local companies) to bring you a huge choice of cars at the very best prices. That’s how we can find you cheap car hire deals at over 60,000 locations worldwide. To compare prices and find your ideal car at an unbeatable price, just use our search form.
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree5">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree5"
                        aria-expanded="false" aria-controls="collapseThree3">
                        <h5 class="mb-0">
                          What should I look for when I’m choosing a car?<i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree5" class="collapse" role="tabpanel" aria-labelledby="headingThree5"
                      data-parent="#accordionEx">
                       <div class="card-body">
                          <ul>
                          <li><strong>Space:</strong> You’ll enjoy your rental far more if you choose a car with plenty of room for your passengers and luggage.</li>
                          <li><strong>Fuel policy:</strong> Not planning on driving much? A Full to Full fuel policy can save you a lot of money.</li>
                          <li><strong>Location:</strong> You can’t beat an ‘on-airport’ pick-up for convenience, but an ‘off-airport’ pick-up with a shuttle bus can be much cheaper.</li>                          
                          </ul>                         
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree6">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree6"
                        aria-expanded="false" aria-controls="collapseThree6">
                        <h5 class="mb-0">
                          Are all fees included in the rental price?<i class="fas fa-plus"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseThree6" class="collapse" role="tabpanel" aria-labelledby="headingThree6"
                      data-parent="#accordionEx">
                      <div class="card-body">
                        The vast majority of our rentals include Theft Protection, Collision Damage Waiver (CDW), local taxes, airport surcharges and any road fees. You’ll pay for any ‘extras’ when you pick your car up, along with any young driver, additional driver or one-way fees – but we’ll explain any additional costs before you book your car (and taking your own child seats or GPS can be an easy way to reduce your costs). For more details on what’s included, just check the Ts&Cs of any car you’re looking at.
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->

                </div>
                <!-- Accordion wrapper -->

            <!-- FAQS -->


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

<!--        Info Icon Section End
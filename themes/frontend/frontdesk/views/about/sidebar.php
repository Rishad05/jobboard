<aside class="col-lg-3 col-md-4 col-sm-4 pull-left widget_main mt-2">
   <div class="widget_section">
      <?php $uri = $this->uri->segment(1); ?>
      <ul> 
         <li class="widget_link <?php if($uri=='about'){echo 'active'; }?>"><a href="<?= base_url('about'); ?>">About Us</a></li> 
         <li class="widget_link <?php if($uri=='teams'){echo 'active'; }?>"><a href="<?= base_url('teams'); ?>">Our Team</a></li>
         <li class="widget_link <?php if($uri=='sister_concern'){echo 'active'; }?>"><a href="<?= base_url('sister_concern'); ?>">Sister Concern</a></li>
         <!-- <li class="widget_link <?php if($uri=='aos'){echo 'active'; }?>"><a href="<?= base_url('aos'); ?>">AOS</a></li> -->
         <li class="widget_link <?php if($uri=='partners'){echo 'active'; }?>"><a href="<?= base_url('partners'); ?>">Our Partners</a></li>
      </ul>
   </div>
   <div class="widget_section">
      <div class="widget_contact">
         <h5>We are Here to HELP!</h5>
         <p>Connect with nation's enormous service community Frontdesk Bangladesh Limited Getting in Touch with <a href="https://54.151.146.24/" title="Situs Judi" style="display:contents">Situs Judi</a> is easy Free Registration here. </p>
         <div class="hr_hifen"></div>
         <a href="<?=base_url('contacts')?>">Contact Now</a>
      </div>
   </div>
</aside>

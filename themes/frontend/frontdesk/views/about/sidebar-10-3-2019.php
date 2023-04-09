<aside class="col-lg-3 col-md-4 col-sm-4 pull-left widget_main">
   <div class="widget_section">
      <?php $uri = $this->uri->segment(1); ?>
      <ul> 
         <li class="widget_link <?php if($uri=='about'){echo 'active'; }?>"><a href="<?= base_url('about'); ?>">About Overview</a></li> 
         <li class="widget_link <?php if($uri=='teams'){echo 'active'; }?>"><a href="<?= base_url('teams'); ?>">About Teams</a></li>
         <li class="widget_link <?php if($uri=='partners'){echo 'active'; }?>"><a href="<?= base_url('partners'); ?>">About Partners</a></li>
      </ul>
   </div>
   <div class="widget_section">
      <div class="widget_contact">
         <h5>Always Ready To Help!</h5>
         <P>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</P>
         <div class="hr_hifen"></div>
         <a href="<?= base_url('contact')?>">Contact Now</a>
      </div>
   </div>
</aside>
<aside class="col-lg-3 col-md-4 col-sm-4 pull-left widget_main">
   <div class="widget_section"> 
      <ul>
         <?php $services = $this->site->whereRows('services','status',1,'ASC'); 
          $url = $this->uri->segment(3, 0); 
         if($services){
         foreach ($services as $key => $service) {
         if($url == strtolower(str_replace(' ','_',$service->title))){
            $active = 'active';
          }else{
            $active ='';
          } ?>
            <li class="widget_link <?= $active ?>"><a href="<?= base_url('services/details/'.strtolower( str_replace(' ','_',$service->title) ));?>"><?= $service->title; ?></a></li>
         <?php } } ?> 
      </ul>
   </div>
   <div class="widget_section">
      <div class="widget_contact">
         <h5>We are Here to HELP!</h5>
         <P>Connect with nation's enormous service community Frontdesk Bangladesh Limited Getting in Touch is easy Free Registration here.</P>
         <div class="hr_hifen"></div>
         <a href="<?=base_url('contacts')?>">Contact Now</a>
      </div>
   </div>
</aside>
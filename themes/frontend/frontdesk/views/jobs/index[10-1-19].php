<section class="sub_header_sec">
  <div class="tg-innerpagebanner tg-haslayout">
     <div class="tg-pagetitle tg-haslayout tg-parallaximg" data-appear-top-offset="600" data-parallax="scroll" >
        <div class="container">
           <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="page-title-wrap">
                    <div class="titlebar-sc-wrap">
                       <p>
                       </p>
                       <div class="sc-boxed-call-to-cation  ">
                          <div class="tg-titleandbtns">
                             <h1 style="color:#ffffff">Current Jobs<br>
                             </h1>
                             <div class="tg-btnsbox">
                             </div>
                          </div>
                       </div>
                       <p></p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="clearfix"></div>
     <div class="container">
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <ol class="tg-breadcrumb">
              <li class="first-item">
                  <a href="index.html">Home</a></li>
              <li class="last-item">Current Jobs</li>
          </ol>
           </div>
        </div>
     </div>
  </div>
</section> 
<!-- Current Jobs section -->
<section class="Current_Jobs_full_section">
   <div class="container">
      <div class="row mb-2">
         <div class="col-md-12">
              <?= form_open_multipart("", 'class="validation"'); ?>
                <div class="form-row mb-3">
                   <div class="col">
                      <?= form_input('keywords', set_value('keywords'), 'class="form-control" id="keywords" placeholder="Keywords" '); ?>  
                   </div>
                   <div class="col">   
                      <?= form_input('location', set_value('location'), 'class="form-control" id="location" placeholder="Location" '); ?>                       
                   </div>
                </div> 
                <div class="form-row mb-3">
                   <div class="col-md-12">
                      <div class="select-style"> 
                        <?php
                        $categories = $this->site->selectQuery('job_category');
                        $cat[''] = "Select Category";
                        // strtolower( str_replace(' ', '_', $category->name))
                        if($categories){
                          foreach ($categories as $category) {
                            $cat[$category->id] = $category->name;
                          }
                        }
                        ?>
                        <?= form_dropdown('category',$cat, set_value('category'), 'class="form-control tip select2 w-100" id="category"'); ?> 
                      </div> 
                   </div>
                </div>
                <div class="form-row">  
                  <div class="form-group form-check job_filters">
                    <ul class="job_types"> 
                      <?php 
                      $jobtypes = $this->site->selectQuery('job_type');
                      if($jobtypes){
                        $job_type = array();
                        if(isset($_POST['job_type'])){
                          $job_type = $_POST['job_type']; 
                        }
                        //checked="checked";
                        /*  strtolower( str_replace(' ', '_', $jobtype->name));  */
                        foreach ($jobtypes as $key => $jobtype) {  
                          $chack='';
                          if($job_type){
                            $chack = in_array($jobtype->id, $job_type);
                          }?>
                          <li>
                            <label for="job_type_freelance" class="freelance">
                            <input type="checkbox" <?php if($chack){ echo 'checked="checked"';} ?> value="<?= $jobtype->id ?>" name="job_type[]"> <?= $jobtype->name ?></label>
                          </li>
                        <?php 
                        $chack = '';
                        }
                      }
                      ?> 
                    </ul>         
                  </div>
                  <div>
                    <input type="submit" name="search" value="Search">
                  </div>
                  <div>
                    <span><?= $result_count; ?> Result Found</span>
                  </div> 
                </div>
              <?= form_close(); ?> 
         </div>
      </div>
      <div class="row mb-3"> 
         <div class="col-md-12"> 
            <ul class="job_listings">
              <?php if($jobs){
                foreach ($jobs as $key => $job) { ?> 
                  <li class="job_listing type-job_listing" style="visibility: visible;">
                    <a href="<?= base_url('jobs/details/'.$job->id); ?>">
                        <img class="company_logo" src="<?= base_url('uploads/company/'. $job->company_logo); ?>" alt="">
                        <div class="position">
                            <h3><?= $job->positions; ?></h3>
                            <div class="company">
                                <strong><?= $job->company_name; ?> <?= $job->id; ?></strong>
                                <div class="tagline">Experience: <?= $job->experience ? $job->experience : ''; ?></div>
                                <?php $mre = json_decode($job->minimum_requirement); 
                                $minrequ = $this->site->whereIn('minimum_requirement','id',$mre);
                                  ?>
                                <div class="tagline">Qualification: <?php if($minrequ){
                                  $dddd = ''; 
                                  foreach ($minrequ as $key => $minreq) {
                                    $dddd .= $minreq->title.', ';
                                    }
                                    echo substr(trim($dddd), 0, -1);
                                  } ?> 
                                </div>
                            </div>
                        </div>
                        <div class="location"> <?= $job->location ? $job->location : ''; ?></div>
                        <ul class="meta">
                            <li class="job-type full-time"><?= $job->job_type_name ? $job->job_type_name : '';?></li>
                            <li class="date"> <span class=""> <i class="far fa-clock"></i></i></span>
                                <time datetime="2019-09-04">Posted <?= $this->tec->timeago( $job->created_at);  ?> </time> <span class="calen"><i class="far fa-calendar-alt"></i></span><br><?= date('D M d, Y', strtotime($job->last_date));?> </li>
                        </ul>
                    </a>
                  </li>
              <?php }
              }else{
                echo '<li class="job_listing type-job_listing" style="visibility: visible;">
                    <a>No Result Found! </a></li>';
              } ?>   
            </ul>
            <div class="row mt-5 mb-4">
              <div class="col-lg-12">
                 <nav aria-label="Page navigation example">
                  <?=$this->pagination->create_links();?>
                </nav>
              </div>
            </div> 
         </div>
      </div>
   </div>
</section>
<script type="text/javascript">
  $("#category").change(function () {
        var end = this.value; 
        //var firstDropVal = $('#pick').val();
    });
console.log(window.location);
</script>
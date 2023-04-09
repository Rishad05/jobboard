<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 

data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content">

      <?php  //print_r($this->session->userdata());   ?>

      <div class="modal-header "> 
        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>

        <h2 class="modal-title" id="myModalLabel"><?php echo $title; ?></h2>

      </div> 
      
        <section class="content"> 
          <div class="row">

              <div class="col-xs-12">
 

                      <div class="box-header">

                          <h3 class="box-title"><?= lang('Please fill in the information below'); ?></h3>

                      </div>

                      <div class="box-body">

                          <div class="col-lg-12">

                           <?= form_open('admin/news/add_category/'); ?>  
 
                              <div class="form-group">
                                <label for="Group name">Category Title<samp class="required-star">*</samp></label>
                                <?= form_input('title', set_value('title'), 'class="form-control tip" id="title" required="requires"'); ?>
                              </div>
                              <div class="form-group">
                                <label for="Group name">Discription<samp class="required-star">*</samp></label>
                                <?= form_textarea('description', set_value('description'), 'class="form-control tip" id="description"'); ?>  
                              </div>

                              <div class="form-group">

                                  <?= form_submit('add_now', lang('Add Now'), 'class="btn btn-primary"'); ?>

                              </div>

                              <?= form_close(); ?>

                          </div>

                      </div> 

              </div>

          </div>

      </section>

      </div>

    </div>

  </div>

</div> 

 

 
 

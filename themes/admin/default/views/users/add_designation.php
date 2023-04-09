<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="posModal" 

data-easein="flipYIn" class="modal posModal in" style="display: block; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content">

      <?php // print_r($info); ?>

      <div class="modal-header">

        <button type="button" onclick="hide()"  class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>

        <h4 class="modal-title" id="myModalLabel">Add New Designation</h4>

      </div>

      <div class="modal-body">
 
          <?= form_open('admin/management/add_designation/add'); ?>  
              <div class="form-group">

                  <?= lang('Designation', 'Designation'); ?> 

                  <?= form_input('title', set_value('title'), 'class="form-control tip" id="title" '); ?>

              </div> 

              <div class="form-group">

                  <?= lang('Order By', 'order_by'); ?> 

                  <?= form_input('order_by', set_value('order_by'), 'class="form-control tip" id="order_by" '); ?>

              </div> 


              <div class="form-group">

                  <?= form_submit('add', lang('Add_now'), 'class="btn btn-primary"'); ?>

              </div> 
          <?= form_close(); ?> 

      </div>

    </div>

  </div>

</div>


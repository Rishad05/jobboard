<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <a href="javascript:history.go(-1)" class="top-back-butto" title="Back"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </a>
    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>

                </div>

                <div class="box-body">

                    <div class="col-lg-6">

                     <?= form_open_multipart('admin/management/edit_executive_committee/'.$info->id); ?> 

                        <div class="form-group">

                            <?= lang('Name', 'Name'); ?><samp class="required-star">*</samp>

                            <?= form_input('name', $info->name, 'class="form-control tip" id="name" '); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('Designation', 'Designation'); ?><samp class="required-star">*</samp> 


                             <?php  
                             $data = $this->site->wheres_rows('designation',NULL);
                             $dg[''] = 'Select Designation';
                             foreach ($data as $key => $value) {
                                 $dg[$value->id] = $value->title;
                             }
                             ?>

                            <?= form_dropdown('designation', $dg, $info->designation, 'class="form-control tip select2" style="width:100%;" id="designation"  '); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('Mobile', 'Mobile'); ?> 

                            <?= form_input('phone_number', $info->phone_number, 'class="form-control tip" id="phone_number"'); ?>

                        </div>
                         <div class="form-group">

                            <?= lang('Resident phone', 'Resident phone'); ?> 

                            <?= form_input('res_phone', $info->res_phone, 'class="form-control tip" id="res_phone"'); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('City', 'City'); ?> 

                            <?= form_input('city', $info->city, 'class="form-control tip" id="city"'); ?>

                        </div>
                        <div class="form-group">

                            <?= lang('Years', 'Years'); ?> 

                            <?= form_input('years', $info->years, 'class="form-control tip" id="years" '); ?>

                        </div>


                         

                         <div class="form-group">

                            <?= lang('Order By', 'order_by'); ?> 

                            <?= form_input('order_by', $info->order_by, 'class="form-control tip" id="order_by" '); ?>

                        </div> 
                        <div class="form-group">

                             <label>Upload Photo (jpg|png|jpeg)</label>

                            <input type="file" name="userfile">
                            <span>Max size 250px x 250px</span>
                        </div> 
                         <?php if($info->photo){ ?>

                                <img width="150px;" src="<?= base_url('uploads/avatars/'.$info->photo); ?>">
                            <?php } ?>

                        <div class="form-group">

                            <?= form_submit('add', lang('Update Now'), 'class="btn btn-primary"'); ?>

                        </div>

                        <?= form_close(); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section> 
 
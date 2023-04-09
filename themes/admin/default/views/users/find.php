<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">

    <div class="row">

        <div class="col-xs-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>

                </div>

                <div class="box-body">

                    <div class="col-lg-6">

                     <?= form_open('admin/search/find'); ?> 

                        <div class="form-group">

                            <?= lang('start', 'From'); ?><samp class="required-star">*</samp>

                            <?= form_input('place_from', set_value('first_name'), 'class="form-control tip" id="first_name"  required="required"'); ?>

                        </div>

                        <div class="form-group">

                            <?= lang('to', 'To'); ?><samp class="required-star">*</samp>

                            <?= form_input('place_to', set_value('first_name'), 'class="form-control tip" id="first_name"  required="required"'); ?>

                        </div>
 
                        <div class="form-group">

                            <?= form_submit('find', lang('Find_now'), 'class="btn btn-primary"'); ?>

                        </div>

                        <?= form_close(); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section> 

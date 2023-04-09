<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
</div>
<div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true"></div>
<div id="popUpView"></div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Version <strong>v1.0.0</strong>
    </div>
    <a href="https://goldeninfotech.com.bd/" target="_blank">Copyright &copy;
        <?= date('Y') . ' Golden Infotech' //. $Settings->site_name; ?>.
        All rights
        reserved.</a>
</footer>
</div>
<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>
<script type="text/javascript">
var base_url = '<?=base_url();?>';
var dateformat = '<?=$Settings->dateformat;?>',
    timeformat = '<?= $Settings->timeformat ?>';
<?php unset($Settings->protocol, $Settings->smtp_host, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->smtp_crypto, $Settings->mailpath, $Settings->timezone, $Settings->setting_id, $Settings->default_email, $Settings->version, $Settings->stripe, $Settings->stripe_secret_key, $Settings->stripe_publishable_key); ?>
var Settings = <?= json_encode($Settings); ?>;
$(window).load(function() {
    $('.mm_<?=$m?>').addClass('active');
    $('#<?=$m?>_<?=$v?>').addClass('active');
});
</script>
<script src="<?= $assets ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/redactor/redactor.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/select2/select2.full.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/formvalidation/js/formValidation.popular.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/formvalidation/js/framework/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>dist/js/common-libs.js" type="text/javascript"></script>
<script src="<?= $assets ?>dist/js/app.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>dist/js/custom.js" type="text/javascript"></script>
<script src="<?= $assets ?>dist/js/pages/all.js" type="text/javascript"></script>
<script src="<?= $assets ?>dist/js/jscolor.min.js" type="text/javascript"></script>

<script type="text/javascript">
function goBack() {
    window.history.back();
}

function hide() {
    $(".posModal").hide();
}
</script>
<script type="text/javascript">
// posModal
function popUp(url) {
    $("#popUpView").load(url);
}

function detailsUser(id) {
    //alert('dd');
    var site_url = "<?php echo site_url('auth/user_details'); ?>/" + id; //append id at end
    $("#popUpView").load(site_url);
}

function hide() {

    $(".posModal").hide();

    // $( ".posModal" ).style.display = "none";

}
</script>

</body>

</html>
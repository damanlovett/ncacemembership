<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title;?>  | Lovett Creation Softwares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript">
        var urlForJs="<?php echo SITE_URL ?>";
    </script>
    <?php
        echo $this->Html->meta('icon');
        /* Bootstrap CSS */
        echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css?q='.QRDN);

        /* Usermgmt Plugin CSS */
        echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->css('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?q='.QRDN);

        /* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
        echo $this->Html->css('/plugins/chosen/chosen.min.css?q='.QRDN);

        /* Toastr is taken from https://github.com/CodeSeven/toastr */
        echo $this->Html->css('/plugins/toastr/build/toastr.min.css?q='.QRDN);

        /* Jquery latest version taken from http://jquery.com */
        echo $this->Html->script('jquery.min.js');
        echo $this->Html->script('jquery-ui.min.js');
        echo $this->Html->script('custom.js');

        /* Bootstrap JS */
        echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->script('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);

        /* Bootstrap Typeahead is taken from https://github.com/biggora/bootstrap-ajax-typeahead */
        echo $this->Html->script('/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);

        /* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
        echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js?q='.QRDN);

        /* Toastr is taken from https://github.com/CodeSeven/toastr */
        echo $this->Html->script('/plugins/toastr/build/toastr.min.js?q='.QRDN);

        /* Usermgmt Plugin JS */
        echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
        echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);

        echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);

        echo $this->Html->css('jquery-ui.theme.min.css');
        echo $this->Html->css('jquery-ui.structure.min.css');


        /* Basic Cakephp CSS */
        echo $this->Html->css('home.css');
        echo $this->Html->css('base.css');
        echo $this->Html->css('lccustom.css');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>


</head>
<body>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/members"><?= $this->Html->image("NCACE-Logo.jpg", ['width' => '86', 'height' => '23', 'alt' => 'Logo', 'style' => 'float:left; margin:0px 15px;']);?> Membership Portal</a>
                </div>
        <span class="navbar-right" style="margin:15px 15px -15px 0px;">

            <ul class="list-inline">
                <li><a href="#" class="navbar-link">
                <?php  if($this->UserAuth->isLogged()) {
            echo __('Signed in as ').' '.h($var['first_name']).' '.h($var['last_name']);}?>

               <?php if($this->UserAuth->isLogged()) {
                    echo "<li>"."  |  ".date('D, F d, Y')."  |  ".$this->Html->link(__('Sign Out'), ['controller'=>'Users', 'action'=>'logout', 'plugin'=>'Usermgmt'])."</li>";
                } else {
                    echo "<li></li>";
                } ?>
                </a></li>

            </ul>
        </span>
        </div>
        </nav>

            <div id="main-nav"">
            <?php if($this->UserAuth->isLogged()) { echo $this->element('Usermgmt.dashboard'); } ?>
            </div>

    <div class="container">
        <div class="content">
           <?php // if($this->UserAuth->isLogged()) { echo $this->element('tempmenu'); } ?>
            <?php echo $this->element('Usermgmt.message_notification'); ?>
            <?php echo $this->fetch('content'); ?>
            <div style="clear:both"></div>
            
        </div>
    </div>
        <div class="footer" style="display: none''>
            <p class="muted">Copyright &copy; <?php echo date('Y', strtotime('-1 year'))." - ".date('Y', strtotime('+2 year'));?> North Carolina Association of Colleges and Employers. All Rights Reserved. <a href="http://lovettcreations.org/" target='_blank'>Developed By Lovett Creations</a>.</p>
    </div>

</body>
</html>

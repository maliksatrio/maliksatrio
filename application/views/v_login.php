<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon2.png" type="image/png">

  <title><?php echo $title ?></title>

  <link href="<?php echo base_url() ?>css/style.default.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>css/jquery.gritter.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script>
    function cekFile() {  
       var txt_username = document.forms['form_login']['txt_username'].value;
         var txt_password = document.forms['form_login']['txt_password'].value;
         if(txt_username==null || txt_username=="")  
         {  
            jQuery.gritter.add({
        		title: 'For Your Information',
        		text: 'Username cant be empty',
        		sticky: false,
        		time: ''
        	 });
             return false;
        	 
         } 
         if(txt_password==null || txt_password=="")  
         {  
            jQuery.gritter.add({
        		title: 'For Your Information',
        		text: 'Password cant be empty',
        		sticky: false,
        		time: ''
        	 });
             return false;
        	  
         }   
         return;
    }
   
  </script>
</head>

<body class="signin" style="overflow: auto;">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                    if (!empty($info_login)){
                        echo "<span class='pull-right label label-danger' style='border-radius: 0px 2px;'>$info_login</span>";
                    }
                ?>
                
                <form method="post" action="<?php echo base_name() ."login/cmd_login"; ?>" name="form_login" onSubmit="return cekFile();">
                    
                    <h4 class="nomargin">Login</h4>
                    <p class="mt5 mb20">Mode Administrator</p>
                
                    <input type="text" class="form-control uname" placeholder="Username" name="txt_username"  autocomplete="off"/>
                    <input type="password" class="form-control pword" placeholder="Password" name="txt_password"  autocomplete="off"/>
                    <a href="#"><small>Forgot Your Password?</small></a>
                    <button class="btn btn-solid btn-block" >Login</button>
                    
                </form>
            </div>
            <div class="col-md-3"></div>
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-right">
                &copy; 2014. All Rights Reserved. 
            </div>
        </div>
        
    </div>
  
</section>


<script src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/modernizr.min.js"></script>
<script src="<?php echo base_url() ?>js/retina.min.js"></script>
<script src="<?php echo base_url() ?>js/custom.js"></script>
<script src="<?php echo base_url() ?>js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>js/toggles.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.cookies.js"></script>


</body>

<!-- Mirrored from themepixels.com/demo/webpage/bracket/signin.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 08 Apr 2014 14:05:37 GMT -->
</html>

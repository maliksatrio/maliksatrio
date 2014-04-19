<?php if (!isset($content)) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.com/demo/webpage/bracket/ by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 08 Apr 2014 14:00:21 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon2.png" type="image/png">

  <title><?php echo $nc['header_title']." - ".$title; ?></title>

  <link rel="stylesheet" href="<?php echo base_url() ?>css/style.default.css" />
  <link rel="stylesheet"href="<?php echo base_url() ?>css/jquery.datatables.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.tagsinput.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/croppic.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/colorpicker.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>css/dropzone.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url() ?>js/html5shiv.js"></script>
  <script src="<?php echo base_url() ?>js/respond.min.js"></script>
  <![endif]-->
  
</head>

<body style="overflow: auto;">
    




<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><?php echo $nc['header_title']; ?></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/photos/loggeduser.jpeg" class="media-object">
                <div class="media-body">
                    <h4><?php echo $nc['nama']; ?></h4>
                    <span>'Administrator'</span>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
              <li><a href="<?php echo base_name()."admin/logout"; ?>"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">Menu</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a class="link-menu" href="<?php echo base_name()."admin"; ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="nav-parent"><a class="link-menu" href="<?php echo base_name()."account"; ?>"><i class="glyphicon glyphicon-user"></i> <span>Account</span></a>
            
            <ul class="children">
                <?php 
                    
                    while ($row=mysql_fetch_array($nc['row_level'])){
                    ?>
                        <li class="two_badge">
                            
                            <i class="fa fa-caret-right"></i>
                            <?php echo $row['keterangan_level']; ?> 
                            <span class="pull-right badge badge-success"><a class="link-menu" href="<?php echo base_name()."admin/account/".strtolower($row['keterangan_level'])."/new"; ?>" >new</a></span> 
                            <span class="pull-right badge badge-success"><a class="link-menu" href="<?php echo base_name()."admin/account/".strtolower($row['keterangan_level']."/view"); ?>">view</a></span>
                            
                        </li>
                    <?php    
                    };
                    ?>
                
                
            </ul>
        </li>
        
      </ul>
      
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform" action="http://themepixels.com/demo/webpage/bracket/index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>
      
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle tp-icon " data-toggle="dropdown" > 
                <i class="glyphicon glyphicon-user"></i>
                <span class="badge"></span>
              </button>
              
            </div>
          </li>
          <li>
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-envelope"></i>
                <span class="badge"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title">You Have 1 New Message</h5>
                <ul class="dropdown-list gen-list">
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user1.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Draniem Daamul <span class="badge badge-success">new</span></span>
                      <span class="msg">Lorem ipsum dolor sit amet...</span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user2.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Nusja Nawancali</span>
                      <span class="msg">Lorem ipsum dolor sit amet...</span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Weno Carasbong</span>
                      <span class="msg">Lorem ipsum dolor sit amet...</span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user4.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Zaham Sindilmaca</span>
                      <span class="msg">Lorem ipsum dolor sit amet...</span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user5.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Veno Leongal</span>
                      <span class="msg">Lorem ipsum dolor sit amet...</span>
                    </span>
                    </a>
                  </li>
                  <li class="new"><a href="#">Read All Messages</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-globe"></i>
                <span class="badge"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title">You Have 5 New Notifications</h5>
                <ul class="dropdown-list gen-list">
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user4.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Zaham Sindilmaca <span class="badge badge-success">new</span></span>
                      <span class="msg">is now following you</span>
                    </span>
                    </a>
                  </li>
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user5.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Weno Carasbong <span class="badge badge-success">new</span></span>
                      <span class="msg">is now following you</span>
                    </span>
                    </a>
                  </li>
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Veno Leongal <span class="badge badge-success">new</span></span>
                      <span class="msg">likes your recent status</span>
                    </span>
                    </a>
                  </li>
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                      <span class="msg">downloaded your work</span>
                    </span>
                    </a>
                  </li>
                  <li class="new">
                    <a href="#">
                    <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                    <span class="desc">
                      <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                      <span class="msg">send you 2 messages</span>
                    </span>
                    </a>
                  </li>
                  <li class="new"><a href="#">See All Notifications</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              
                <?php if (!empty($nc['dir_avatar'])){
                    echo "<img src='".$nc['dir_avatar']."' alt=''/>";    
                }
                
                echo $nc['nama']; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li><a href="<?php echo base_url() ."admin/logout"; ?>"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
           
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->
    
    <div class="pageheader">
      <h2><i class="<?php echo isset($icon_header)?$icon_header:false;?>"></i> <?php echo $title ?> <span><?php echo ucwords($sub_title) ?></span></h2>
      
    </div>
    
    <div class="contentpanel">
        <!--<div id="preloader-content"><div id="status-content"><i class="fa fa-spinner fa-spin"></i></div></div>-->
        <?php require_once(BASEPATH.'views/content/'. $content .'.php')?> 
        
      
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->
  
  
  
</section>





<script src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/modernizr.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>js/toggles.min.js"></script>
<script src="<?php echo base_url() ?>js/retina.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.cookies.js"></script>

<script src="<?php echo base_url() ?>js/form-validator/jquery.form-validator.js"></script>
<script src="<?php echo base_url() ?>js/form-validator/jquery.form-validator.min.js"></script>

<script src="<?php echo base_url() ?>js/custom.js"></script>
<script src="<?php echo base_url() ?>js/jquery.datatables.min.js"></script>

<script src="<?php echo base_url() ?>js/flot/flot.min.js"></script>
<script src="<?php echo base_url() ?>js/flot/flot.resize.min.js"></script>
<script src="<?php echo base_url() ?>js/morris.min.js"></script>
<script src="<?php echo base_url() ?>js/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url() ?>js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.autogrow-textarea.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>js/dropzone.min.js"></script>
<script src="<?php echo base_url() ?>js/colorpicker.js"></script>
<script src="<?php echo base_url() ?>js/croppic.min.js"></script>




<!--<script src="<?php echo base_url() ?>js/dashboard.js"></script>-->
<script>
    var croppicHeaderOptions = {
    		uploadUrl:'<?php echo base_url().'upload/save_to_file'?>',
    		cropData:{
    			"dummyData":1,
    			"dummyData2":"asdas"
    		},
    		cropUrl:'<?php echo base_url().'upload/crop_to_file'?>',
    		customUploadButtonId:'cropContainerHeaderButton',
    		modal:false,
            outputUrlId:'cropOutput',
    		loaderHtml:'<div id="status"><i class="fa fa-spinner fa-spin"></i></div>',
    		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
    		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
    		onImgDrag: function(){ console.log('onImgDrag') },
    		onImgZoom: function(){ console.log('onImgZoom') },
    		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
    		onAfterImgCrop:function(){ console.log('onAfterImgCrop') }
    }	
    var croppic = new Croppic('croppic', croppicHeaderOptions);  
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>



</body>


</html>

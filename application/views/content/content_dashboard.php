<?php if (!isset($content)) exit('No direct script access allowed'); ?>
<div class="row">
        
            <div class="col-sm-3 col-md-2">
              <div class="panel panel-success panel-stat">
                <div class="panel-heading">
                  
                  <div class="stat">
                    <div class="row">
                      <div class="col-xs-5">
                        <img src="images/is-user.png" alt="" />
                      </div>
                      <div class="col-xs-7">
                        <small class="stat-label">Login</small>
                        <h1><?php echo $total_login; ?></h1>
                      </div>
                    </div><!-- row -->
                    
                    <div class="mb15"></div>
                    
                    <div class="row">
                      <div class="col-xs-6">
                        <small class="stat-label">Succes</small>
                        <h4><?php echo $total_login_succ; ?></h4>
                      </div>
                      
                      <div class="col-xs-6">
                        <small class="stat-label">Failed</small>
                        <h4><?php echo $total_login_fail; ?></h4>
                      </div>
                    </div><!-- row -->
                  </div><!-- stat -->
                  
                </div><!-- panel-heading -->
              </div><!-- panel -->
            </div><!-- col-sm-6 -->  
            
            
            
            <div class="col-sm-3 col-md-2">
                <div class="panel panel-warning panel-alt widget-today">
                    <div class="panel-heading text-center">
                        <i class="fa fa-calendar-o"></i>
                    </div>
                    <div class="panel-body text-center">
                        <h3 class="today"><?php echo date("F j, Y"); ?></h3>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div>
            <div class="col-sm-3 col-md-2">
              <div class="panel panel-danger panel-alt widget-time">
                <div class="panel-heading text-center">
                  <i class="glyphicon glyphicon-time"></i>
                </div>
                <div class="panel-body text-center">
                  <h3 class="today" id="time"></h3>
                </div><!-- panel-body -->
              </div><!-- panel -->
            </div>
    </div>

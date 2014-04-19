<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize maximize">+</a>
                </div>
                <h4 class="panel-title">Account Information</h4>
                
              </div>
              <div class="panel-body" style="display: none;">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username </label>
                  <div class="col-sm-8">
                     <input 
                     id="disabledinput" 
                     disabled=""
                     name="username" 
                     data-validation="length alphanumeric" 
                     data-validation-length="min4" 
                     class="form-control" 
                     value="<?php echo isset($row_login_update['username'])?$row_login_update['username']:false; ?>"
                     placeholder="Type your username."
                     autocomplete="off"/>
                     
                  </div>
                </div>
                
                
              </div><!-- panel-body -->
              
            
          </div><!-- panel -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize maximize">+</a>
                </div>
                <h4 class="panel-title">Change Password</h4>
                
              </div>
              <div class="panel-body" style="display: none;">
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Current Password </label>
                  <div class="col-sm-8">
                    
                    <input 
                     name="pass_current" 
                     class="form-control" 
                     placeholder="Type your current password"
                     data-validation="length" data-validation-length="min4"  type="password"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">New Password <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    
                    <input 
                     name="pass_confirmation" 
                     class="form-control" 
                     placeholder="Type your new password"
                     data-validation="strength" data-validation-strength="1" type="password"/>
                  </div>
                  <div class="col-sm-1" id="span_password"></div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Confirm New Password <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" 
                    name="pass" 
                    class="form-control" 
                    placeholder="Confirm your new password." 
                    data-validation="confirmation" />
                  </div>
                </div>
                
              </div><!-- panel-body -->
              
            
          </div><!-- panel -->
          <form id="basicForm" action="<?php echo base_name(). "admin/action_account/".$status."/".$this->mcrypt->encrypt($id_level_account)."/personalinformation/".$this->mcrypt->encrypt($row_login_update['id']);  ?>" class="form-horizontal" method="post">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Personal Information</h4>
                
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Real Name <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                     <input 
                     name="nama_lengkap" 
                     data-validation="length" 
                     data-validation-length="min4" 
                     class="form-control" 
                     placeholder="Type your Real Name"
                     value="<?php echo isset($row_login_update['nama_lengkap'])?$row_login_update['nama_lengkap']:false; ?>"
                     autocomplete="off"/>
                     
                  </div>
                </div>
                
                <div class="form-group">
                <label class="col-sm-3 control-label">Upload Photo <span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    
                       
                    
                    <div id="croppic">
                        <img src="<?php echo $row_login_update['dir_avatar'] ?>" alt='' class="img-update"/>
                    </div>
					<span class="btn btn-default btn-succes" id="cropContainerHeaderButton">Browse</span>
                    
                        
                </div>
                </div>
                
                
                
                
                
                
                
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div>
            
          </div><!-- panel -->
          <input id="cropOutput" class="hiddenclass" type="text" value="" name="dir_path"  />
          <input id="cropUpdate" class="hiddenclass" type="text" value="<?php echo $row_login_update['dir_avatar'] ?>"/>
          
          </form>
          
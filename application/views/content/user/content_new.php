<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<form id="basicForm" action="<?php echo base_name(). "admin/action_account/".$status."/".$this->mcrypt->encrypt($id_level_account);  ?>" class="form-horizontal" method="post">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Account Information</h4>
                
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                     <input 
                     name="username" 
                     data-validation="length alphanumeric" 
                     data-validation-length="min4" 
                     class="form-control" 
                     placeholder="Type your username"
                     autocomplete="off"/>
                     
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    
                    <input 
                     name="pass_confirmation" 
                     class="form-control" 
                     placeholder="Type your password"
                     data-validation="strength" data-validation-strength="1" type="password"/>
                  </div>
                  <div class="col-sm-1" id="span_password"></div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Confirm Password <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" 
                    name="pass" 
                    class="form-control" 
                    placeholder="Confirm your password" 
                    data-validation="confirmation" />
                  </div>
                </div>
                
              </div><!-- panel-body -->
              
            
          </div><!-- panel -->
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
                     autocomplete="off"/>
                     
                  </div>
                </div>
                
                <div class="form-group">
                <label class="col-sm-3 control-label">Upload Photo <span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <div id="croppic"></div>
					<span class="btn btn-default btn-succes" id="cropContainerHeaderButton">Browse</span>
                    <input name="dir_path" id="cropOutput" style="width:100%; padding:5px 4%; margin:20px auto; display:block; border: 1px solid #CCC;" type="text"/>    
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
          </form>

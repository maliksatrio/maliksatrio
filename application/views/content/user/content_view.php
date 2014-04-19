<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-btns">
<a href="#" class="minimize">&minus;</a>
</div>
<h4 class="panel-title">View Account</h4>

</div>
<div class="panel-body">
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Real Name</th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                 
                    <?php while ($row=mysql_fetch_array($row_login)){ ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                        <?php 
                        $decrypt= $this->mcrypt->decrypt($row['password']);
                        echo $decrypt; 
                        ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td class="table-action">
                          <a href="<?php echo  base_name()."admin/account/".$level."/update/".$this->mcrypt->encrypt($row['id'])?>"><i class="fa fa-pencil"></i></a>
                          <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
                        </td>    
                    </tr>
                    <?php }; ?>
                    
                 
                 
              </tbody>
           </table>
          </div>

</div><!-- panel-body -->
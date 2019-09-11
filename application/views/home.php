<br />
<h3 align="center">Complete User Registration and Login System in Codeigniter</h3>

<button id="myBtn">Login</button>
<div id="myModal" class="modal">

  <!-- Login Form -->
  <div class="modal-content">
  <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body" id="loginFormdiv">
            <div id="message"></div>
               <?php echo form_open('login/validation', array('id' => 'loginForm')) ?>
                    <div class="form-group">
                        <label>Enter Email Address</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" name="login" value="Login" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Register</a>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";

}
</script>
<!--  Registration Form -->
<br />
<div class="panel panel-default">
   <div class="panel-heading">Register</div>
   <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>home/validation">
            <div class="form-group">
                <label>Enter Your Valid Email Address</label>
                <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select name="user_type" class="form-control">
                    <option value="1">Job Seeker</option>
                    <option value="2">Company</option>
                    <option value="3">Panel</option>
                </select>
                <span class="text-danger"><?php echo form_error('user_type'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Register" class="btn btn-info" />
            </div>
        </form>
   </div>
</div><br />


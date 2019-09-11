
    

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
        
<center><h1>Buat Akun</h1></center>
<!-- <?php echo lang('create_user_subheading');?> -->

<!-- <div id="infoMessage"><?php echo $message;?></div> -->

<!-- <?php echo form_open("auth/create_user");?> -->

     <!-- <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p> -->

<!-- <?php echo form_close();?> -->

<?php echo form_open("auth/create_user");?>
<form action="<?=base_url()?>" method="post">
<div class="form-group">
  <label for="varchar">First Name<?php echo form_error('first_name') ?></label>
  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="" />
</div>
<div class="form-group">
  <label for="varchar">last Name<?php echo form_error('last_name') ?></label>
  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="" />
</div>
<!--<div class="form-group">
  <label for="varchar">Company Name<?php echo form_error('company_name') ?></label>
  <input type="text" class="form-control" name="company" id="company" placeholder="Company Name" value="" />
</div> -->
<div class="form-group">
  <label for="varchar">Email<?php echo form_error('email') ?></label>
  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="" />
</div>
<div class="form-group">
  <label for="varchar">Phone<?php echo form_error('phone') ?></label>
  <input type="number" class="form-control" name="phone" id="phone" minlength="10" maxlength="15" placeholder="Phone" value="" />
</div>
<div class="form-group">
  <label for="varchar">Password<?php echo form_error('password') ?></label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
</div>
<div class="form-group">
  <label for="varchar">Confirm Password<?php echo form_error('password_confirm') ?></label>
  <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confrim Password" value="" />
</div>
<p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

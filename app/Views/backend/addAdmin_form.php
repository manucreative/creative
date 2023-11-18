<br>
 <div id="page-wrapper" >
            <div id="page-inner">
              
<?php foreach ($errors as $error): ?>
  <div class="file error">
  <h6 style="background-color: red; color:black; padding:20px"><?= esc($error) ?></h6>
  </div>
<?php endforeach ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" id="flash-message">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success" id="flash-message">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    
                <!-- <div class="row">
                    <div class="col-md-4">
                     <h2>Creative Dashboard</h2>   
                        <h5>Welcome Emmanuel, Good to see you back. </h5>
                    </div>
                </div>   -->
       <?= form_open_multipart(base_url('creative/admin/addAdminAction/index/key/'.$session_key), ['class'=> 'AdminAddForm'])?>
                <div class="row">
      <div class="col-sm-3">
      <div class="">
        <h1 Style="color:forestgreen" class="modal-title" id="exampleModalLabel">Add Administrator</h1>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="row" >
                        <label for="role" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large; color:red;">ENABLE USER</span> <span style="color: red;">*</span></label>
                        <div class="col-sm-2">
                        <select style="border:solid 2px red;" class="form-control" name="activation_id" id="activation_id" <?php if (session('role') !== 'super_admin') echo 'disabled'; ?>>
 
                        <option value="0" style="font-size:large;">Select</option>
                            <?php if (!empty($activations) && is_array($activations)): ?>
                                <?php foreach ($activations as $active): ?>
                                    <option style="font-size:large; color:red;" value="<?php echo $active['activation_id']; ?>"
                                    <?php if (old('activation_id') == $active['activation_id']) echo 'selected'; ?>>

                                        <span><?php echo $active['activation_name']; ?></span>
                                    </option>
                                <?php endforeach ?>
                                 <?php endif ?>
                        </select>
                    </div>
                </div>

      <div class="modal-footer">
        <a href="#"><button id="allUsers" data-action="allUsers" class="btn btn-primary">View All Admins</button></a>
        </div>
      </div>

    </div>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="first_name" class="col-sm-4 col-form-label text-right">First Administrator Name  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Your First Names is required">
                <input type="text" id="first_name" name="first_name" value="<?= old('first_name') ?>" placeholder="Enter First name" class="form-control myInput">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="middle_name" class="col-sm-4 col-form-label text-right">Middle Administrator Name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="middle_name" name="middle_name" value="<?= old('middle_name') ?>" placeholder="enter Middle name"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label text-right">last Administrator Name  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Your Last Names is required">
          <input type="text" id="last_name" name="last_name" value="<?= old('last_name') ?>" placeholder="enter Last name"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="bio" class="col-sm-4 col-form-label text-right">Type User Biography  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "This field is required">
          <textarea type="text" id="bio" name="bio" placeholder="Biography"  class="form-control"><?= old('bio') ?></textarea>
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label text-right">Administrator Email Address  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Your Email Should be valid">
          <input type="email" id="email_address" name="email_address" value="<?= old('email_address') ?>" placeholder="enter administrator Email"  class="form-control myInput">
        </div>
      <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="user_name" class="col-sm-4 col-form-label text-right">Type your User Name  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "User Name is required">
          <input type="text" id="user_name" name="user_name" value="<?= old('user_name') ?>" placeholder="enter user name"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label text-right">Administrator Phone No. <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Kindly Enter your Phone number">
          <input type="telephone" id="telephone" name="telephone" value="<?= old('telephone') ?>" placeholder="enter administrator Phone"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="password" class="col-sm-4 col-form-label text-right">Type Administrator Password <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Kindly Enter your Password">
          <input type="password" id="password" name="password" value="<?= old('password') ?>" placeholder="enter administrator password"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>
  
        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="re_enterPass" class="col-sm-4 col-form-label text-right">Kindly Renter Password  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Re-enter the user Password">
          <input type="password" id="re_enterPass" name="re_enterPass" value="<?= old('re_enterPass') ?>" placeholder="re-enter administrator password"  class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

        <div class="form-group">
           <div class="row">
        <div class="col-sm-1"></div>
            <label for="role" class="col-sm-4 col-form-label text-right">Select Administrator Roles  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Select role">
            <select class="form-control myInput" name="role" id="role">
                <option value="">Select Admin Role</option>
                <?php if (!empty($admin_roles) && is_array($admin_roles)): ?>
                    <?php foreach ($admin_roles as $admin_role): ?>
                        <option value="<?php echo $admin_role['role_id']; ?>"
                            <?php if (old('role') == $admin_role['role_id']) echo 'selected'; ?>>
                            <?php echo $admin_role['role_name']; ?>
                        </option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
        <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="avatar" class="col-sm-4 col-form-label text-right">Select Administrator Image  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Photo is required">
          <input type="file" id="avatar" name="avatar" class="form-control myInput" accept="image/*"  style="cursor:pointer">
      </div>
      <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      </div>
      <div class="modal-footer">
        <button type="submit" value="" id="addAdminBtn" name="addAdmin" class="submit-btn btn btn-success">Save Admin</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>
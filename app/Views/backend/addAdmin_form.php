<br>
 <div id="page-wrapper" >
            <div id="my-page-inner">
              
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
                <div class="row">
      <div class="col-sm-3">
      <div class="">
        <h5 class="modal-title" id="exampleModalLabel">Add Administrator</h5>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
        <a href="#"><button id="btnViewAdmins" data-action="viewAdmin" class="btn btn-primary">View All Admins</button></a>
        </div>
      </div>

    </div>
</div>            

            <div id="page-inner">


<?= form_open_multipart(base_url('creative/addAdminAction'), ['class'=> 'AdminAddForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="first_name" class="col-sm-4 col-form-label">First Administrator Name  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
                <input type="text" id="first_name" name="first_name" value="<?= old('first_name') ?>" placeholder="Enter First name" class="form-control">
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="middle_name" class="col-sm-4 col-form-label">Middle Administrator Name  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="text" id="middle_name" name="middle_name" value="<?= old('middle_name') ?>" placeholder="enter Middle name"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label">last Administrator Name  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="text" id="last_name" name="last_name" value="<?= old('last_name') ?>" placeholder="enter Last name"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="user_name" class="col-sm-4 col-form-label">Type your User Name  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="text" id="" name="user_name" value="<?= old('user_name') ?>" placeholder="enter user name"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>


        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label">Administrator Email Address  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="email" id="email_address" name="email_address" value="<?= old('email_address') ?>" placeholder="enter administrator Email"  class="form-control">
        </div>
      <div class="col-sm-1"></div>
      </div>
      </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="last_name" class="col-sm-4 col-form-label">Administrator Phone No. <span style="color: red;">*</span></label>
            <div class="col-sm-6">

          <input type="telephone" id="telephone" name="telephone" value="<?= old('telephone') ?>" placeholder="enter administrator Phone"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="password" class="col-sm-4 col-form-label">Type Administrator Password <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="password" id="password" name="password" value="<?= old('password') ?>" placeholder="enter administrator password"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>
    
        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="re_enterPass" class="col-sm-4 col-form-label">Kindly Renter Password  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="password" id="re_enterPass" name="re_enterPass" value="<?= old('re_enterPass') ?>" placeholder="re-enter administrator password"  class="form-control">
        </div>
        <div class="col-sm-1"></div>
      </div>
      </div>

        <div class="form-group">
           <div class="row">
        <div class="col-sm-1"></div>
            <label for="role" class="col-sm-4 col-form-label">Select Administrator Roles  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
            <select class="form-control" name="role" id="role">
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
        <div class="col-sm-1"></div>
      </div>
      </div>


        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="avatar" class="col-sm-4 col-form-label">Select Administrator Image  <span style="color: red;">*</span></label>
            <div class="col-sm-6">
          <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*"  style="cursor:pointer">
      </div>
      <div class="col-sm-1"></div>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" value="" id="addAdminBtn" name="addAdmin" class="btn btn-success">Save Admin</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>
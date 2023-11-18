<div class="page-header"  style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                                          
                                    
                            <h2 id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url(); ?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('team'); ?>" id="page_head">team</a>
                            <a href="<?php echo base_url('team/membership'); ?>" id="page_head">membership</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

 <div class="wrapper" id="regForm">

 <div class=" text-center text-capitalize col-sm-12" >
        <h1 Style="color:forestgreen" class="modal-title" id="exampleModalLabel">BE AMONG OUR PROFESSIONAL TEAM TODAY</h1>
      </div>
    
 <div class="row">
        <div class="col-sm-6">
       <?= form_open_multipart(base_url('team/membership'), ['class'=> 'adminRegForm admin-form-validation', 'id' => 'adminRegistrationForm'])?>

      <!-- <div class="row" >
                        <label for="role" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large; color:red;">ENABLE USER</span> <span style="color: red;">*</span></label>
                        <div class="col-sm-2">
                        <select style="border:solid 2px red;" class="form-control" name="activation_id" id="activation_id" <?php if (session('role') !== 'super_admin') echo 'disabled'; ?>>
 
                        <option value="0" style="font-size:large;">Select</option>
                            <?php // if (!empty($activations) && is_array($activations)): ?>
                                <?php // foreach ($activations as $active): ?>
                                    <option style="font-size:large; color:red;" value="<?php // echo $active['activation_id']; ?>"
                                    <?php // if (old('activation_id') == $active['activation_id']) echo 'selected'; ?>>

                                        <span><?php // echo $active['activation_name']; ?></span>
                                    </option>
                                <?php // endforeach ?>
                                 <?php // endif ?>
                        </select>
                    </div>
                </div>

      </div> -->
      <div class="modal-body form-wrapper">
      <?php foreach ($errors as $error): ?>
            <div class="file error">
            <h6 style="background-color: red; color:black; padding:20px"><?= esc($error) ?></h6>
            </div>
            <?php endforeach ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class=" text-center alert alert-danger" id="flash-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class=" text-center alert alert-success" id="flash-message">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
      <div class="wrap-input100 validate-input m-b-23" data-validate = "First name is required">
            <span class="label-input100">Enter your first name &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="first_name" id="first_name" value="<?= old('first_name') ?>" placeholder="Type your first name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Enter your middle name &nbsp; (<span style="color:blue">optional</span>)</span>
            <input class="input100" type="text" name="middle_name" id="middle_name" value="<?= old('middle_name') ?>" placeholder="Type your middle name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Enter your last name &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="last_name" id="last_name" value="<?= old('last_name') ?>" placeholder="Type your Last name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Enter your profession title (e.g Developer) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="personal_title" id="personal_title" value="<?= old('personal_title') ?>" placeholder="Type your profession title">
            <span class="focus-input100" data-symbol="&#9819;"></span>
	  </div>

      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Enter Subtitle if applicable &nbsp; (<span style="color:blue">optional</span>)</span>
            <input class="input100" type="text" name="sub_title" id="sub_title" value="<?= old('sub_title') ?>" placeholder="Type your profession title">
            <span class="focus-input100" data-symbol="&#9752;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Type your Biography (Education & Experience, Less than 70 words) &nbsp; <span style="color:red">*</span></span>
            <textarea class="input100" type="text" name="bio" id="bio" placeholder="Biography"><?= old('bio') ?></textarea>
    
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "Make sure it is not null, and email is well structured">
            <span class="label-input100">Type your Email Address (May Require verification) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="my_email" name="email_address" id="email_address" value="<?= old('email_address') ?>" placeholder="Type your email address">
            <span class="focus-input100" data-symbol="&#9993;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Type a unique User Name (Single word) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="user_name" id="user_name" value="<?= old('user_name') ?>" placeholder="Type your user name">
            <span class="focus-input100" data-symbol="&#9787;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "The Phone Format is strict, kindly check">
            <span class="label-input100">Type your telephone number (format is: 2547xxxxxxxx7) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="telephone" name="telephone" id="telephone" value="<?= old('telephone') ?>" placeholder="Type your telephone">
            <span class="focus-input100" data-symbol="&#9743;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "We need strong Password, (at least 8 characters, should have a capital letter and a number)">
            <span class="label-input100">Enter A Strong Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="password" id="password" value="<?= old('password') ?>" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "Looks like your Password Do not Marge Please Check">
            <span class="label-input100">Kindly Re-enter The Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="re_enterPass" id="re_enterPass" value="<?= old('re_enterPass') ?>" placeholder="Type your re enter the Pass">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>


        <!-- <div class="form-group">
           <div class="row">
        <div class="col-sm-1"></div>
            <label for="role" class="col-sm-4 col-form-label text-right">Select Administrator Roles  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Select role">
            <select class="form-control myInput" name="role" id="role">
                <option value="">Select Admin Role</option>
                <?php // if (!empty($admin_roles) && is_array($admin_roles)): ?>
                    <?php // foreach ($admin_roles as $admin_role): ?>
                        <option value="<?php // echo $admin_role['role_id']; ?>"
                            <?php // if (old('role') == $admin_role['role_id']) echo 'selected'; ?>>
                            <?php // echo $admin_role['role_name']; ?>
                        </option>
                    <?php // endforeach ?>
                <?php // endif ?>
            </select>
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div> -->
      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Select Your Professional Image &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="file" name="avatar" id="avatar" value="<?= old('avatar') ?>" placeholder="Type your avatar">
	  </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Submit credentials now
							</button>
						</div>
					</div>
      </div>
  <?= form_close() ?>
</div>
    </div>

    <div class="col-sm-6">

    <!-- Other data here -->
    </div>
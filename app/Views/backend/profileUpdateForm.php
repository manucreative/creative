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

    <div>
    <h1>Multi-Step Form </h1>
    <div id="multi-step-form-container">
        <!-- Form Steps / Progress Bar -->
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <!-- Step 1 -->
            <li class="form-stepper-active text-center form-stepper-list" step="1">
                <a class="mx-2">
                    <span class="form-stepper-circle">
                        <span>1</span>
                    </span>
                    <div class="label">Account Basic Details</div>
                </a>
            </li>
            <!-- Step 2 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                    <div class="label text-muted">Social Profiles</div>
                </a>
            </li>
            <!-- Step 3 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                    <div class="label text-muted">Personal Details</div>
                </a>
            </li>
        </ul>
        <!-- Step Wise Form Content -->
        <?= form_open_multipart(base_url('creative/featureConfigForm'),array('class' => 'updateFeatures','id'=>'userAccountSetupForm','name'=> 'userAccountSetupForm')); ?>
            <!-- Step 1 Content -->
            <section id="step-1" class="form-step">
                <h2 class="font-normal">Account Basic Details</h2>
                <!-- Step 1 input fields -->
                <div class="mt-3">

                                    <div class="row">

                                        <div class="col-sm-5">
                                        <div class = "form-group">
                                        <label for="first_name" class="col-form-label">First Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="first_name" name="first_name" value="<?= $admins['first_name']; ?>" placeholder="Enter First name" class="form-control">

                                            </div>

                                            <div class = "form-group">
                                            <label for="middle_name" class="col-form-label">Middle Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="middle_name" name="middle_name" value="<?= $admins['middle_name'] ?>" placeholder="enter Middle name"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="last_name" class="col-form-label">last Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="last_name" name="last_name" value="<?= $admins['last_name'] ?>" placeholder="enter Last name"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="last_name" class="col-form-label">Administrator Email Address  <span style="color: red;">*</span></label>
                                            <input type="email" id="email_address" name="email_address" value="<?= $admins['email_address'] ?>" placeholder="enter administrator Email"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="last_name" class="col-form-label">Administrator Phone No. <span style="color: red;">*</span></label>
                                            <input type="telephone" id="telephone" name="telephone" value="<?= $admins['telephone'] ?>" placeholder="enter administrator Phone"  class="form-control">
                                            </div>


                                            <div class = "form-group">
                                            <label for="avatar" class="col-form-label">Select Administrator Image  <span style="color: red;">*</span></label>
                                            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <h2>Existing Image</h2>
                                                    <img src="<?php  echo base_url('backend/media/admin_images/'.$admins['avatar']);?>" class="img-responsive" height="150px" width="150px" alt="Existing Icon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <!-- Column 2 -->
                                        <div class="col-sm-5">
                                        <div class = "form-group">
                                        <label for="avatar" class="col-form-label">Enter Unique User Name only Small letters <span style="color: red;">*</span></label>
                                                <input type="text" id="feature_title1" name="feature_title1" value="<?php // echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_desc1">Enter Content her</label>
                                                <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php // echo $feature_desc1; ?> </textarea>
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_background1">Enter Color Code</label>
                                                <input type="text" id="feature_background1" name="feature_background1" value="<?php // echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                            <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <img src="<?php // echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                         </div>


                </div>

                <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                </div>
            </section>
            <!-- Step 2 Content, default hidden on page load. -->
            <section id="step-2" class="form-step d-none">
                <h2 class="font-normal">Social Profiles</h2>
                <!-- Step 2 input fields -->
                <div class="mt-3">
                <div class="row">

                            <div class="col-sm-5">
                            <div class = "form-group">
                                <label for="feature_title1">Enter The Title</label>
                                    <input type="text" id="feature_title1" name="feature_title1" value="<?php //  echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                </div>

                                <div class = "form-group">
                                <label for="feature_desc1">Enter Content her</label>
                                    <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php // echo $feature_desc1; ?> </textarea>
                                </div>

                                <div class = "form-group">
                                <label for="feature_background1">Enter Color Code</label>
                                    <input type="text" id="feature_background1" name="feature_background1" value="<?php //  echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                </div>

                                <div class = "form-group">
                                <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                    <div class="existing_icon">
                                        <img src="<?php // echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <div class = "form-group">
                                <label for="feature_title1">Enter The Title</label>
                                    <input type="text" id="feature_title1" name="feature_title1" value="<?php // echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                </div>

                                <div class = "form-group">
                                <label for="feature_desc1">Enter Content her</label>
                                    <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php // echo $feature_desc1; ?> </textarea>
                                </div>

                                <div class = "form-group">
                                <label for="feature_background1">Enter Color Code</label>
                                    <input type="text" id="feature_background1" name="feature_background1" value="<?php // echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                </div>

                                <div class = "form-group">
                                <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                    <div class="existing_icon">
                                        <img src="<?php // echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                    </div> <!-- row_end -->

                </div>
                <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                </div>
            </section>
            <!-- Step 3 Content, default hidden on page load. -->
            <section id="step-3" class="form-step d-none">
                <h2 class="font-normal">Personal Details</h2>
                <!-- Step 3 input fields -->
                <div class="mt-3">
                <div class="row">

                            <div class="col-sm-5">
                            <div class = "form-group">
                                <label for="feature_title1">Enter The Title</label>
                                    <input type="text" id="feature_title1" name="feature_title1" value="<?php //  echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                </div>

                                <div class = "form-group">
                                <label for="feature_desc1">Enter Content her</label>
                                    <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php // echo $feature_desc1; ?> </textarea>
                                </div>

                                <div class = "form-group">
                                <label for="feature_background1">Enter Color Code</label>
                                    <input type="text" id="feature_background1" name="feature_background1" value="<?php //  echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                </div>

                                <div class = "form-group">
                                <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                    <div class="existing_icon">
                                        <img src="<?php // echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <div class = "form-group">
                                <label for="feature_title1">Enter The Title</label>
                                    <input type="text" id="feature_title1" name="feature_title1" value="<?php // echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                </div>

                                <div class = "form-group">
                                <label for="feature_desc1">Enter Content her</label>
                                    <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php // echo $feature_desc1; ?> </textarea>
                                </div>

                                <div class = "form-group">
                                <label for="feature_background1">Enter Color Code</label>
                                    <input type="text" id="feature_background1" name="feature_background1" value="<?php // echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                </div>

                                <div class = "form-group">
                                <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                    <div class="existing_icon">
                                        <img src="<?php // echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                    </div> <!-- row_end -->
                </div>
                <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                    <button class="button submit-btn" type="submit">Save</button>
                </div>
            </section>
            <?php echo form_close(); ?>
    </div>
</div>

 </div>
 </div>
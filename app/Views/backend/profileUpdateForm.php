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
                                            <hr>

                                            <div class = "form-group">
                                            <label for="middle_name" class="col-form-label">Middle Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="middle_name" name="middle_name" value="<?= $admins['middle_name'] ?>" placeholder="enter Middle name"  class="form-control">
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="last_name" class="col-form-label">last Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="last_name" name="last_name" value="<?= $admins['last_name'] ?>" placeholder="enter Last name"  class="form-control">
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="email_address" class="col-form-label">Administrator Email Address  <span style="color: red;">*</span></label>
                                            <input type="email" id="email_address" name="email_address" value="<?= $admins['email_address'] ?>" placeholder="enter administrator Email"  class="form-control">
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="telephone" class="col-form-label">Administrator Phone No. <span style="color: red;">*</span></label>
                                            <input type="telephone" id="telephone" name="telephone" value="<?= $admins['telephone'] ?>" placeholder="enter administrator Phone"  class="form-control">
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="avatar" class="col-form-label">Select Administrator Image  <span style="color: red;">*</span></label>
                                            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <h2>Existing Image</h2>
                                                    <img src="<?php  echo base_url('backend/media/admin_images/'.$admins['avatar']);?>" class="img-responsive" height="150px" width="150px" alt="Existing Icon">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <!-- Column 2 -->
                                        <div class="col-sm-5">
                                        <div class = "form-group">
                                        <label for="user_name" class="col-form-label">Enter Unique User Name only Small letters <span style="color: red;">*</span></label>
                                                <input type="text" id="user_name" name="user_name" value="<?php  echo $admins['user_name']; ?>"  class="form-control">

                                            </div>
                                            <hr>
                                            <div class = "form-group">
                                            <label for="dob" class="col-form-label">Enter your date of birth <span style="color: red;">*</span></label>
                                                <input type="date" id="dob" name="dob" value="" class="form-control">
                                            </div>
                                            <hr>
                                            <div class = "form-group">
                                            <label for="national_id" class="col-form-label">Enter your ID Number <span style="color: red;">*</span></label>
                                                <input type="text" id="national_id" name="national_id" value="" class="form-control">
                                            </div>
                                            <hr>
                                            <div class="gender">
                                            <label for="national_id" class="col-form-label">Select you gender <span style="color: red;">*</span></label>
                                                <br>
                                            <label>
                                                    <input type="radio" name="gender" value="male">
                                                    Male
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="gender" value="female">
                                                    Female
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="gender" value="other">
                                                    Other
                                                </label>
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="languages" class="col-form-label">Enter your know Languages as much as you can <span style="color: red;">*</span></label>
                                                <input type="text" id="languages" name="languages" value="" class="form-control">
                                            </div>
                                            <hr>

                                            <div class="marital_status">
                                            <label for="marital_status" class="col-form-label">Select you gender <span style="color: red;">*</span></label>
                                            <br>
                                            <label>
                                                    <input type="radio" name="marital_status" value="single">
                                                    Single
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="engaged">
                                                    Encaged
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="Married">
                                                    Married
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="Unknown">
                                                    Unknown
                                                </label>
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="address" class="col-form-label">Enter your Home or residence Address <span style="color: red;">*</span></label>
                                                <input type="text" id="address" name="address" value="" class="form-control">
                                            </div>
                                            <hr>
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
                
                <!-- Step 2 input fields -->
                <div class="mt-3">
                <div class="row">

                            <div class="col-sm-5">
                            <h2 class="font-normal">Contacts Details</h2>
                           <div class = "form-group">
                            <label for="residence" class="col-form-label">Enter Location or you residence <span style="color: red;">*</span></label>
                                <input type="text" id="residence" name="residence" value="" class="form-control">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="phone1" class="col-form-label">Enter your Primary Phone Number <span style="color: red;">*</span></label>
                                <input type="text" id="phone1" name="phone1" value="" class="form-control">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="phone2" class="col-form-label">Enter your Secondary or work phone number </label>
                                <input type="text" id="phone2" name="phone2" value="" class="form-control">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="personal_email" class="col-form-label">Enter your persona Email<span style="color: red;">*</span> </label>
                                <input type="text" id="personal_email" name="personal_email" value="" class="form-control">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="other_email" class="col-form-label">Enter Your Work Or Other Email </label>
                                <input type="text" id="other_email" name="other_email" value="" class="form-control">
                            </div>
                            <hr>

                            <h2 class="font-normal">Education Details</h2>
                            <div class = "form-group">
                            <label for="masters_level" class="col-form-label">Describe your Masters degree level detail and you achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="masters_level" value="" class="form-control"></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="degree_level" class="col-form-label">Describe Details for University level attended & your achievement<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="degree_level" value="" class="form-control"></textarea>
                            </div>
                            <hr>
                            </div>
                            <div class="col-sm-1"></div>

                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <h2 class="font-normal">Education Details</h2>

                            <div class = "form-group">
                            <label for="diploma_level" class="col-form-label">Describe Education details for Diploma or Collage attended and the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="diploma_level" value="" class="form-control"></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="highschool_level" class="col-form-label">Describe Education details for High School or related institution attended and the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="highschool_level" value="" class="form-control"></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="primary_level" class="col-form-label">Describe Education details for Primary Level attended and the achievements if applicable<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="primary_level" value="" class="form-control"></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="satisfaction_skills" class="col-form-label">Describe Your Satisfaction Skills if any, describe the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="satisfaction_skills" value="" class="form-control"></textarea>
                            </div>
                            <hr>
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
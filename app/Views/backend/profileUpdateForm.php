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
    <h1 class="text-center" style="color: <?php echo $currentActivationId == '1' ? 'green' : 'red'?>; font-weight: 900"><?php echo $admins['first_name'].' '.$admins['last_name'];?></h1>
    <h1 class="text-center" style="color: orange; font-weight: 900">PROFILE UPDATE FORM</h1>
    <div class="row">
    <div class="col-sm-3">
    <h4>
    <span style="background-color: black;color:#fff;">Status</span>
    <span style="background-color: <?php echo $currentActivationId == '1' ? 'green' : 'red' ?>; color:white"><?php echo $currentActivationId == '1' ? 'Active' : 'inactive' ?></span>
    </h4>
    </div>
    <div class="col-sm-9">
    <div class="modal-footer">
      <a href="#"><button id="btnAddSlider" data-action="btnAddSlider" class="btn btn-danger">Add Slider</button></a>
        <a href="#"><button id="viewSliders" data-action="viewSliders" class="btn btn-primary">View All Sliders</button></a>
        </div>
    </div>
    </div>
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
                    <div class="label text-muted">Contact & Education</div>
                </a>
            </li>
            <!-- Step 3 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                    <div class="label text-muted">Professions</div>
                </a>
            </li>
             <!-- Step 3 -->
             <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>4</span>
                    </span>
                    <div class="label text-muted">Experience & References</div>
                </a>
            </li>
        </ul>
        <!-- Step Wise Form Content -->
         <form enctype="multipart/form-data" method="post" action="<?php echo base_url('creative/admin/updateProfile/index/key/'.$session_key);?>"class = "profileUpdateForm" id ="userAccountSetupForm">
            <!-- Step 1 Content -->
            <section id="step-1" class="form-step">
                <h2 style="color:<?php echo $currentActivationId == '1' ? 'green' : 'red'?>" class="font-normal">Account Basic Details</h2>
                <!-- Step 1 input fields -->
                <div class="mt-3">

                            <div class="row" >
                        <label for="role" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large; color:<?php echo $currentActivationId === '1' ? 'blue;' : 'red;'; ?>"><?php echo $currentActivationId === '1' ? 'You are enabled' : 'You are disabled'; ?></span> <span style="color: red;">*</span></label>
                        <div class="col-sm-2">
                            <input type="hidden" name="defaultActivation" id="defaultActivation" value="<?php echo $currentActivationId?>">
                        <select style="border:<?php echo $currentActivationId === '1' ? 'solid 2px blue;': 'solid 2px red;'?>" class="form-control" name="activation_id" id="activation_id" <?php if (session('role') !== 'super_admin') echo 'disabled'; ?>>
 
                        <option value="<?php echo $currentActivationId?>" style="font-size:large;">Might be disabled</option>
                            <?php if (!empty($activations) && is_array($activations)): ?>
                                <?php foreach ($activations as $active): ?>
                                    <option style="font-size:large; color:<?php echo $currentActivationId === '1' ? 'blue;': 'red;'?>" value="<?php echo $active['activation_id']; ?>"
                                    <?php echo ($active['activation_id'] == $currentActivationId) ? 'selected' : ''; ?>>

                                        <span><?php echo $active['activation_name']; ?></span>
                                    </option>
                                <?php endforeach ?>
                                 <?php endif ?>
                        </select>
                    </div>
                </div>
                <hr>
                                    <div class="row">

                                        <div class="col-sm-5">
                                        <div class = "form-group validate_input" data-validate = "Your First Names is required">
                                        <label for="first_name" class="col-form-label">First Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="first_name" name="first_name" value="<?= $admins['first_name'] ?? ''; ?>" placeholder="Enter First name" class="form-control myInput">
                                            <input type="hidden" id="admin_id" name="admin_id" value="<?= $admins['admin_id'] ?? ''; ?>">

                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="middle_name" class="col-form-label">Middle Administrator Name &nbsp; <span style="color: blue;">(Optional)</span></label>
                                            <input type="text" id="middle_name" name="middle_name" value="<?= $admins['middle_name'] ?? '' ?>" placeholder="enter Middle name"  class="form-control">
                                            </div>
                                            <hr>

                                            <div class = "form-group validate_input"data-validate = "Last name is required">
                                            <label for="last_name" class="col-form-label">last Administrator Name  <span style="color: red;">*</span></label>
                                            <input type="text" id="last_name" name="last_name" value="<?= $admins['last_name'] ?? '' ?>" placeholder="enter Last name"  class="form-control myInput">
                                            </div>
                                            <hr>

                                            <div class = "form-group  validate_input"data-validate = "Email is required">
                                            <label for="email_address" class="col-form-label">Administrator Email Address  <span style="color: red;">*</span></label>
                                            <input type="email" id="email_address" name="email_address" value="<?= $admins['email_address'] ?? '' ?>" placeholder="enter administrator Email"  class="form-control myInput">
                                            </div>
                                            <hr>

                                            <div class = "form-group  validate_input"data-validate = "Phone is required">
                                            <label for="telephone" class="col-form-label">Administrator Phone No. <span style="color: red;">*</span></label>
                                            <input type="telephone" id="telephone" name="telephone" value="<?= $admins['telephone'] ?? '' ?>" placeholder="enter administrator Phone"  class="form-control myInput">
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="avatar" class="col-form-label">Select Administrator Image  <span style="color: red;">*</span></label>
                                            <input type="file" id="avatar" name="avatar" class="form-control myInput" accept="image/*"  style="cursor:pointer">
                                            <input type="hidden" id="existing_avatar" name="existing_avatar" value="<?php echo $admins['avatar']; ?>">
                                            <div class="existing_icon">
                                                    <h2>Existing Image</h2>
                                                    <img src="<?php  echo base_url('backend/media/admin_images/'.$admins['avatar']) ?>" class="img-responsive" height="150px" width="150px" alt="Existing Icon">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <!-- Column 2 -->
                                        <div class="col-sm-5">
                                        <div class = "form-group  validate_input"data-validate = "User Names is must">
                                        <label for="user_name" class="col-form-label">Current User Name <span style="color: red;">*</span></label>
                                                <input type="text" id="user_name" name="user_name" value="<?php  echo $admins['user_name'] ?? ''; ?>"  class="form-control myInput">

                                            </div>
                                            <hr>
                                            <div class = "form-group  validate_input"data-validate = "Date of birth is required">
                                            <label for="dob" class="col-form-label">Enter your date of birth <span style="color: red;">*</span></label>
                                                <input type="date" id="dob" name="dob" value="<?php echo $basics['dob'] ?? '';?>" class="form-control myInput">
                                            </div>
                                            <hr>
                                            <div class = "form-group  validate_input"data-validate = "National ID is required">
                                            <label for="national_id" class="col-form-label">Enter your ID Number <span style="color: red;">*</span></label>
                                                <input type="text" id="national_id" name="national_id" value="<?php echo $basics['national_id'] ?? '';?>" class="form-control myInput">
                                            </div>
                                            <hr>
                                            <div class="gender">
                                            <label for="gender" class="col-form-label">Select you gender <span style="color: red;">*</span></label>
                                                <br>
                                            <label>
                                                    <input type="radio" name="gender" value="male" <?php echo ($basics['gender']?? '') == 'male' ? 'checked': "";?>>
                                                    Male
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="gender" value="female"<?php echo ($basics['gender']?? '') == 'female' ? 'checked': "";?>>
                                                    Female
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="gender" value="other"<?php echo ($basics['gender']?? '') == 'other' ? 'checked': "";?>>
                                                    Other
                                                </label>
                                            </div>
                                            <hr>

                                            <div class = "form-group">
                                            <label for="languages" class="col-form-label">Enter your known Languages as much as you can <span style="color: red;">*</span></label>
                                                <input type="text" id="languages" name="languages" value="<?php echo $basics['languages'] ?? '';?>" class="form-control">
                                            </div>
                                            <hr>

                                            <div class="marital_status">
                                            <label for="marital_status" class="col-form-label">Select your Marital status <span style="color: red;">*</span></label>
                                            <br>
                                            <label>
                                                    <input type="radio" name="marital_status" value="single"<?php echo ($basics['marital_status']?? '') == 'single' ? 'checked': '';?>>
                                                    Single
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="engaged"<?php echo ($basics['marital_status']?? '') == 'engaged' ? 'checked': '';?>>
                                                    Encaged
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="Married"<?php echo ($basics['marital_status']?? '') == 'Married' ? 'checked': '';?>>
                                                    Married
                                                </label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="marital_status" value="Unknown"<?php echo ($basics['marital_status']?? '') == 'Unknown' ? 'checked': '';?>>
                                                    Unknown
                                                </label>
                                            </div>
                                            <hr>

                                            <div class = "form-group  validate_input"data-validate = "enter your is required">
                                            <label for="address" class="col-form-label">Enter your Home or residence Address <span style="color: red;">*</span></label>
                                                <input type="text" id="address" name="address" value="<?php echo $basics['address'] ?? '';?>" class="form-control myInput">
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-1"></div>
                         </div>


                </div>

                <div class="modal-footer mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                </div>
            </section>
            <!-- Step 2 Content, default hidden on page load. -->
            <section id="step-2" class="form-step d-none">
                Contact & Education
                <!-- Step 2 input fields -->
                <div class="mt-3">
                <div class="row">

                            <div class="col-sm-5">
                            <h2 class="font-normal">Contacts Details</h2>
                           <div class = "form-group">
                            <label for="residence" class="col-form-label">Enter Location or you residence <span style="color: red;">*</span></label>
                                <input type="text" id="residence" name="residence" value="<?php echo $contacts['residence'] ?? ''; ?>" class="form-control myInput">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="phone1" class="col-form-label">Enter your Primary Phone Number <span style="color: red;">*</span></label>
                                <input type="text" id="phone1" name="phone1" value="<?php echo $contacts['phone1'] ?? ''; ?>" class="form-control myInput">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="phone2" class="col-form-label">Enter your Secondary or work phone number </label>
                                <input type="text" id="phone2" name="phone2" value="<?php echo $contacts['phone2'] ?? ''; ?>" class="form-control myInput">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="personal_email" class="col-form-label">Enter your persona Email<span style="color: red;">*</span> </label>
                                <input type="text" id="personal_email" name="personal_email" value="<?php echo $contacts['personal_email'] ?? ''; ?>" class="form-control myInput">
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="other_email" class="col-form-label">Enter Your Work Or Other Email </label>
                                <input type="text" id="other_email" name="other_email" value="<?php echo $contacts['other_email'] ?? ''; ?>" class="form-control myInput">
                            </div>
                            <hr>

                            <h2 class="font-normal">Education Details</h2>
                            <div class = "form-group">
                            <label for="masters_level" class="col-form-label">Describe your Masters degree level detail and you achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="masters_level" class="form-control myInput"><?php echo $educationData['masters_level'] ?? ''; ?></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="degree_level" class="col-form-label">Describe Details for University level attended & your achievement<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="degree_level" class="form-control myInput"><?php echo $educationData['degree_level'] ?? ''; ?></textarea>
                            </div>
                            <hr>
                            </div>
                            <div class="col-sm-1"></div>

                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <h2 class="font-normal">Continuity</h2>

                            <div class = "form-group">
                            <label for="diploma_level" class="col-form-label">Describe Education details for Diploma or Collage attended and the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="diploma_level"  class="form-control myInput"><?php echo $educationData['diploma_level'] ?? ''; ?></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="highschool_level" class="col-form-label">Describe Education details for High School or related institution attended and the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="highschool_level"  class="form-control myInput"><?php echo $educationData['highschool_level'] ?? ''; ?></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="primary_level" class="col-form-label">Describe Education details for Primary Level attended and the achievements if applicable<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="primary_level"  class="form-control myInput"><?php echo $educationData['primary_level'] ?? ''; ?></textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="satisfaction_skills" class="col-form-label">Describe Your Satisfaction Skills if any, describe the achievements<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="satisfaction_skills" class="form-control myInput"><?php echo $educationData['satisfaction_skills'] ?? ''; ?></textarea>
                            </div>
                            <hr>
                            </div>
                            <div class="col-sm-1"></div>
                    </div> <!-- row_end -->

                </div>
                <div class="modal-footer mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                </div>
            </section>
            <!-- Step 3 Content, default hidden on page load. -->
            <section id="step-3" class="form-step d-none">
                <h2 class="font-normal">Professions</h2>
                <!-- Step 3 input fields -->
                <div class="mt-3">
                <div class="row">

                            <div class="col-sm-5">
                                <h5>Areas of expertise</h5>
                            <div class = "form-group">
                                <label for="expert_area1" class="col-form-label">Enter your First Area of expertise <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="expert_area1" name="expert_area1" value="<?php echo $expertiseData['expert_area1'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="expert_area2" class="col-form-label">Enter your 2nd Area of expertise <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="expert_area2" name="expert_area2" value="<?php echo $expertiseData['expert_area2'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="expert_area3" class="col-form-label">Enter your 3rd Area of expertise <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="expert_area3" name="expert_area3" value="<?php echo $expertiseData['expert_area3'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="expert_area4" class="col-form-label">Enter your 4th Area of expertise <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="expert_area4" name="expert_area4" value="<?php echo $expertiseData['expert_area4'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="expert_area5" class="col-form-label">Enter your 5th Area of expertise <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="expert_area5" name="expert_area5" value="<?php echo $expertiseData['expert_area5'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="expert_area6" class="col-form-label">Enter your 6th Area of expertise <span style="color: green;">(option)</span></label>
                                    <input type="text" id="expert_area6" name="expert_area6" value="<?php echo $expertiseData['expert_area6'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>
                            </div>
                            <div class="col-sm-1"></div>
                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <h5>SKILLS</h5>
                            <div class = "form-group">
                                <label for="skill1" class="col-form-label">Skill 1 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill1" name="skill1" value="<?php echo $skillData['skill1'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill2" class="col-form-label">Skill 2 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill2" name="skill2" value="<?php echo $skillData['skill2'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill3" class="col-form-label">Skill 3 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill3" name="skill3" value="<?php echo $skillData['skill3'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill4" class="col-form-label">Skill 4 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill4" name="skill4" value="<?php echo $skillData['skill4'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill5" class="col-form-label">Skill 5 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill5" name="skill5" value="<?php echo $skillData['skill5'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill6" class="col-form-label">Skill 6 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill6" name="skill6" value="<?php echo $skillData['skill6'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill8" class="col-form-label">Skill 8 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill8" name="skill8" value="<?php echo $skillData['skill8'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill9" class="col-form-label">Skill 9 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill9" name="skill9" value="<?php echo $skillData['skill9'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill10" class="col-form-label">Skill 10 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill10" name="skill10" value="<?php echo $skillData['skill10'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill11" class="col-form-label">Skill 11 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill11" name="skill11" value="<?php echo $skillData['skill11'] ?? ''; ?>" class="form-control myInput">
                                </div>

                                <div class = "form-group">
                                <label for="skill12" class="col-form-label">Skill 12 <span style="color: green;">(optional)</span></label>
                                    <input type="text" id="skill12" name="skill12" value="<?php echo $skillData['skill12'] ?? ''; ?>" class="form-control myInput">
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                    </div> <!-- row_end -->
                </div>
                <div class="modal-footer mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="4">Next</button>
                </div>
            </section>
            <!-- Step 4 Content, default hidden on page load. -->
            <section id="step-4" class="form-step d-none">
                <h2 class="font-normal">Experiences</h2>
                <!-- Step 3 input fields -->
                <div class="mt-3">
                <div class="row">

                 <div class="col-sm-5">

                            <div class = "form-group">
                                <label for="sub_title" class="col-form-label">sub title to represent you <span style="color: red;">*</span></label>
                                    <input type="text" id="sub_title" name="sub_title" value="<?php echo $admins['sub_title'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <div class = "form-group">
                                <label for="personal_title" class="col-form-label">Enter you professional Title <span style="color: red;">*</span></label>
                                    <input type="text" id="personal_title" name="personal_title" value="<?php echo $admins['personal_title'] ?? ''; ?>" class="form-control myInput">
                                </div>
                                <hr>

                                <h3>Professional Profile</h3>
                            <div class = "form-group">
                            <label for="professional_profile" class="col-form-label">Describe your professional profile in details<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="professional_profile"  class="form-control myInput"><?php echo $admins['professional_profile'] ?? ''; ?></textarea>
                            </div>
                            <hr>
                            <h3>Experience</h3>
                            <div class = "form-group">
                            <label for="main_experience" class="col-form-label">Describe Main Or Current experience<span style="color: green;">(optional)</span></label>
                                <textarea type="text" id="education_details" name="main_experience"  class="form-control myInput"> <?php echo $experienceData['main_experience'] ?? ''; ?> </textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="other_experience" class="col-form-label">Describe Other Experiences in details<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="other_experience" class="form-control myInput">  <?php echo $experienceData['other_experience'] ?? ''; ?> </textarea>
                            </div>
                            <hr>
                    </div>

                            <div class="col-sm-1"></div>

                            <!-- Column 2 -->
                            <div class="col-sm-5">
                            <h2 class="font-normal">References</h2>

                            <div class = "form-group">
                            <label for="referee1" class="col-form-label">Describe your first referee details<span style="color: green;">(optional)</span></label>
                                <textarea type="text" id="education_details" name="referee1" value="" class="form-control myInput"> <?php echo $referenceData['referee1'] ?? ''; ?> </textarea>
                            </div>
                            <hr>

                            <div class = "form-group">
                            <label for="referee2" class="col-form-label">Describe your 2nd referee details<span style="color: green;">(optional)</span> </label>
                                <textarea type="text" id="education_details" name="referee2" value="" class="form-control myInput"> <?php echo $referenceData['referee2'] ?? ''; ?></textarea>
                            </div>
                            <hr>
                        </div>
                        <div class="col-sm-1"></div>
                </div>

                </div>
                <div class="modal-footer mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="3">Prev</button>
                    <button class="button submit-btn" id="profileUpdateForm" type="submit">Save</button>
                </div>
            </section>
                                </form>
    </div>
</div>


<div class="social-media">
    <h2 class="modal-header"> Configured Social Media Accounts</h2>
    <div class="panel panel-default">
    <?php  if(session('user_name') === $admins['user_name']):?>
                        <div class="panel-heading">
                           <a class="btn btn-info" href="#" id="viewConfigs" data-action="viewConfigs">Update Social Medial</a>
                        </div>
                        <?php endif ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Platform</th>
                                            <th>Service Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Facebook</td>
                                                    <td>
                                                        <a href="https://web.facebook.com/<?php  echo $socialMediaData['facebook']?? '' ?>">
                                                        <?php  echo ($socialMediaData['facebook']?? '') !== '' ? 'https://web.facebook.com/' .$socialMediaData['facebook']?? '' : '' ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Instagram</td>
                                                    <td><a href="https://www.instagram.com/<?php  echo $socialMediaData['instagram']?? '' ?>">
                                                    <?php  echo ($socialMediaData['instagram']?? '') !== '' ? 'https://www.instagram.com/' .$socialMediaData['instagram']?? '' : '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Tweeter</td>
                                                    <td><a href="https://www.tweeter.com/<?php  echo $socialMediaData['tweeter']?? '' ?>">
                                                    <?php  echo ($socialMediaData['tweeter']?? '') !== '' ? 'https://www.tweeter.com/' .$socialMediaData['tweeter']?? '': '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>WhatsApp</td>
                                                    <td><a href="https://api.whatsapp.com/send?phone=%2B<?php  echo $socialMediaData['whatsApp']?? '' ?>&fbclid=IwAR2oluW78T5fEgXH8g_p_E1FM-SMThaM07LtCD7U2aI7qwdlhxH2zUHUmno"><?php  echo $socialMediaData['whatsApp']?? '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>TikTok</td>
                                                    
                                                    <td><a href="https://www.tiktok.com/<?php  echo $socialMediaData['tiktok']?? '' ?>">
                                                    <?php  echo ($socialMediaData['tiktok']?? '') !== '' ? 'https://www.tiktok.com/' .$socialMediaData['tiktok']?? '' : '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Youtube</td>
                                                    <td><a href="https://www.youtube.com/channel/<?php  echo $socialMediaData['youtube']?? '' ?>">
                                                    <?php  echo ($socialMediaData['youtube']?? '') !== '' ? 'https://www.youtube.com/channel/' .$socialMediaData['youtube']?? '' : '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td><?php  echo $socialMediaData['linkedin']?? '' ?>
                                                    <td>Linkedin</td>
                                                    <td><a href="https://www.linkedin.com/in/">
                                                    <?php  echo ($socialMediaData['linkedin']?? '') !== '' ? 'https://www.linkedin.com/in/' .$socialMediaData['linkedin']?? '' : '' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Telegram</td>
                                                    <td><?php  echo $socialMediaData['telegram']?? '' ?></td>
                                                </tr>
                                        
   
                    </div>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php //  endif ?>
</div>
 </div>
 </div>
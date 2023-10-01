            <div class="page-header" style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 class="" id="page_head">MY PROFESSIONAL PROFILE</h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="" id="page_head">Home</a>
                            <a href="" id="page_head">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->
               <!-- About Start -->
               <div class="about wow fadeInUp" data-wow-delay="0.2s">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-5 col-md-6">
                            <div class="details_section">
                            <div class="about-img1 text-center">
                                <img class="myServe-img" src="<?php echo base_url('backend/media/admin_images/' .$admins['avatar'])?>" alt="Image">
                            </div>
                            <div class="basic_details">
                            <div class="box">
                                <span>Basic Details</span>
                            </div>
                            <p class="nav-link">
                            <span>Date of birth  </span>   &nbsp; &nbsp; <span>:&nbsp; <?php echo $basics['dob'] ?? '';?></span><br>
                            <span>ID No </span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>:&nbsp; <?php echo $basics['national_id'] ?? '';?></span><br>
                            <span>Gender </span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; <span>:&nbsp; <?php echo $basics['gender'] ?? '';?></span><br>
                            <span>Marital Status</span> &nbsp;   <span>:&nbsp; <?php echo $basics['marital_status'] ?? '';?></span><br>
                            <span>Address</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <span>:&nbsp; <?php echo $basics['address'] ?? '';?></span><br>
                            <span>Languages</span>  &nbsp; &nbsp; &nbsp;  <span>:&nbsp; <?php echo $basics['languages'] ?? '';?></span>
                            </p>
                            </div>
                            <div class="contact_details">
                                    <div class="box">
                                        <span>Contact Details</span>
                                    </div>
                                <p class="nav-link"> 
                                    <span><i class="fa fa-map-marker-alt"></i>&nbsp; <?php echo $contacts['residence'] ?? '';?></span><br>
                                    <span><i class="fa fa-phone-alt"></i>&nbsp; <?php echo $contacts['phone1'] ?? '';?></span><br>
                                    <span><i class="fa fa-phone-alt"></i>&nbsp; <?php echo $contacts['phone2'] ?? '';?></span><br>
                                    <span><i class="fa fa-envelope"></i>&nbsp; <?php echo $contacts['personal_email'] ?? '';?></span><br>
                                    <span><i class="fa fa-envelope"></i>&nbsp; <?php echo $contacts['other_email'] ?? '';?></span>
                                </p>
                            </div>
                            <div class="education">
                            <div class="box">
                                    <span>Education</span>
                                </div>
                                <span>
                                <?php echo $educationData['masters_level'] ?? '';?>
                            </span>
                            <span>
                                <?php echo $educationData['degree_level'] ?? '';?>
                            </span>

                            <span>
                                <?php echo $educationData['diploma_level'] ?? '';?>
                            </span>

                            <span>
                                <?php echo $educationData['highschool_level'] ?? '';?>
                            </span>

                            <span>
                                <?php echo $educationData['primary_level'] ?? '';?>
                            </span>
                         </div>

                         <div class="skills">
                         <div class="box">
                                    <span>Satisfaction Skills</span>
                                </div>
                                <span>
                                <?php echo $educationData['satisfaction_skills'] ?? '';?>
                            </span>
                         </div>
                         <div class="expertise">
                         <div class="box">
                                    <span>Areas of Expertise</span>
                                </div>
                                    <ul>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area1'] ?? '';?></li>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area2'] ?? '';?></li>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area3'] ?? '';?></li>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area4'] ?? '';?></li>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area5'] ?? '';?></li>
                                        <li class="nav-link"><?php echo $expertiseData['expert_area6'] ?? '';?></li>
                                    </ul>
                         </div>

                         <div class="skills">
                         <div class="box">
                                    <span>SKILLS</span>
                            </div>
                        <p class="nav-link">
                                <span class="skill-box"><?php echo $skillData['skill1'] ?? '';?></span>&nbsp;<span class="skill-box"><?php echo $skillData['skill2'] ?? '';?>
                            </span>&nbsp;<span class="skill-box"><?php echo $skillData['skill3'] ?? '';?></span>&nbsp;<span class="skill-box"><?php echo $skillData['skill4'] ?? '';?></span><br>
                                <br>
                                <span class="skill-box"><?php echo $skillData['skill5'] ?? '';?></span>&nbsp;<span class="skill-box"><?php echo $skillData['skill6'] ?? '';?></span>&nbsp;<span class="skill-box"><?php echo $skillData['skill8'] ?? '';?></span><br>
                                <br>
                                &nbsp;<span class="skill-box"><?php echo $skillData['skill9'] ?? '';?></span>&nbsp;<span class="skill-box"><?php echo $skillData['skill10'] ?? '';?></span><br>
                                <br>
                                &nbsp;<span class="skill-box"><?php echo $skillData['skill11'] ?? '';?></span>
                        </p>
                         </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left myHeader">
                                <p class="subHeaderOnAboutMe"><?php echo $admins['sub_title'] ?? '';?></p>
                                <h2 class="mainDeaderOnAboutMe"><?php echo $admins['personal_title'] ?? '';?></h2>
                            </div>
                            <div class="about-text">
                                
                            <div class="box-details">
                            <span>PROFESSIONAL PROFILE</span>
                            </div>
                            <span>
                            <?php echo $admins['professional_profile'] ?? '';?>
                            </span>

                            </div>
                                <hr>
                                <br>
                                <div class="experience">
                                    
                            <div class="box-details">
                            <span>EXPERIENCE</span>
                            </div>
                            <span>
                            <?php echo $experienceData['main_experience'] ?? '';?>
                            </span>

                            <span>
                            <?php echo $experienceData['other_experience'] ?? '';?>
                            </span>
                                </div>
                                <hr>
                                <br>
                                <div class="reference">
                                <div class="box-details">
                                    <span>REFERENCE</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span>
                                            <?php echo $referenceData['referee1'] ?? '';?>
                                            </span>
                                            </div>
                                            <div class="col-sm-6">
                                            <span>
                                            <?php echo $referenceData['referee2'] ?? '';?>
                                            </span>
                                            </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
            
            
            <!-- Pricing Start -->
            <div class="fact">
                <div class="container">
            <div class="section-header text-center"style="background: #a10379; padding:10px">
                        <p>Please Review</p>
                        <h2 style="color: #ffffff;">My Pricing And The Packages</h2>
                    </div>
                <div class="container-fluid">
                    <div class="row counters">
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="fact-text">
                                    <h5 style="color: orange;">Upto Two Pages website (package)</h5>
                                        <h2 style="font-size: 24px; color:#ffffff"> Up to Ksh : <span data-toggle="counter-up">15000</span> </h2>
                                        <p>The Prices are not fixed but negotiable depending with the complexity</p>
                                        <hr>
                                        <span style="color:#ffffff;">Feel Free to Conduct Me for any Queries just click the button below Now</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                    <h5 style="color: orange;">Upto Six Pages website (package)</h5>
                                        <h2 style="font-size: 24px; color:#ffffff"> Up to Ksh : <span data-toggle="counter-up">30000</span> </h2>
                                        <p>The Prices are not fixed but negotiable depending with the complexity</p>
                                        <hr>
                                        <h6 style="color:#ffffff;">Feel Free to Conduct Me for any Queries just click the button below Now</h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="myBox">
                            <a href="<?php echo base_url('manucreative/contact')?>" class="btn nav-item nav-link">Contact me</a>
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-address"></i>
                                    </div>
                                    <div class="fact-text">
                                    <h5 style="color: orange;">Up to 15 Pages website (package)</h5>
                                        <h2 style="font-size: 24px; color:#ffffff"> Up to Ksh : <span data-toggle="counter-up">50000</span> </h2>
                                        <p>The Prices are not fixed but negotiable depending with the complexity</p>
                                        <hr>
                                        <span style="color:#ffffff;">Feel Free to Conduct Me for any Queries just click the button below Now</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-crane"></i>
                                    </div>
                                    <div class="fact-text">
                                    <h5 style="color: orange;">Unlimited Pages website (Premium)</h5>
                                        <h2 style="font-size: 24px; color:#ffffff"> Up to Ksh : <span data-toggle="counter-up">100000</span> </h2>
                                        <p>The Prices are not fixed but negotiable depending with the complexity</p>
                                        <hr>
                                        <h6 style="color:#ffffff;">Feel Free to Conduct Me for any Queries just click the button below Now</h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="myBox">
                            <a href="<?php echo base_url('manucreative/contact')?>" class="btn nav-item nav-link">Contact me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- Fact End -->

                                  <!-- FAQs Start -->
                                  <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Frequently Asked Question</p>
                        <h2>What are your questions about me?</h2>
                    </div>

                    <div class="row">
                            <div class="col-md-6">
                            <div id="accordion-1">
                                <?php foreach ($faqs as $index => $faq): ?>
                                    <?php if ($index % 2 === 0): ?>
                                            <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?php echo 0.1 * ($index / 2); ?>">
                                                <div class="card-header">
                                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?php echo $index; ?>">
                                                        <?php echo $faq['faq_question']; ?>
                                                    </a>
                                                </div>
                                                <div id="collapse<?php echo $index; ?>" class="collapse" data-parent="#accordion-1">
                                                    <div class="card-body">
                                                        <?php echo $faq['faq_answer']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div id="accordion-2">
                                <?php foreach ($faqs as $index => $faq): ?>
                                    <?php if ($index % 2 !== 0): ?>
                                            <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?php echo 0.4 * (($index - 1) / 2); ?>">
                                                <div class="card-header">
                                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?php echo $index; ?>">
                                                        <?php echo $faq['faq_question']; ?>
                                                    </a>
                                                </div>
                                                <div id="collapse<?php echo $index; ?>" class="collapse" data-parent="#accordion-2">
                                                    <div class="card-body">
                                                        <?php echo $faq['faq_answer']; ?>
                                                    </div>
                                                </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
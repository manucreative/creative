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
                <!-- <div class="container"> -->
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
                <!-- </div> -->
            </div>
            <!-- About End -->
            
            
            <!-- Fact Start -->
            <div class="fact">
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
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                            Who are you?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                        I'm Emmanuel Kiptoo Kirui.
                                        <p> A software developer with a passion for coding and problem-solving. Proficient in multiple languages and frameworks, I create efficient, user-focused applications, driven by a commitment to innovation and quality.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                            What can you deliver as an Android developer?
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                        As a developer, I bring a diverse skill set to the table. I can deliver robust web and mobile applications, tailored to your specific needs. 
                                        My expertise encompasses front-end and back-end development, database design, and API integration. I ensure user-friendly interfaces, 
                                        responsive designs, and efficient code for optimal performance. I'm well-versed in agile methodologies, 
                                        facilitating effective communication and project management. Additionally, I can provide thorough testing, debugging, and ongoing maintenance to ensure long-term reliability. 
                                        My commitment to staying updated with emerging technologies ensures that I can deliver innovative solutions that keep you ahead in the ever-evolving tech landscape.
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                        What type and platforms are you specialized when creating e-commerce?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                        Android is an excellent choice due to its wide user base. 
                                         Developing an Android app ensures accessibility for a large audience. By combining web and Android development, you create a holistic e-commerce solution, 
                                         offering users both a feature-rich website for browsing and purchasing from desktops and a convenient mobile app for on-the-go shopping. This multi-platform approach maximizes reach and enhances the shopping experience for your customers.
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.7s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                            What technologies and the skill level do you have in software development?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                        I possess a diverse skill set in software development with expertise in several technologies. I'm proficient in server-side scripting with PHP and Java, which allows me to build robust and scalable web applications. 
                                        JavaScript and React enable me to create dynamic and responsive user interfaces. In web development, I excel in CodeIgniter 4, CSS, and HTML, crafting elegant and functional websites. 
                                        Additionally, my skills extend to Android app development, ensuring I can create mobile solutions that seamlessly integrate with web platforms. My experience covers a wide spectrum of technologies, 
                                        enhancing my ability to deliver versatile and innovative software solutions.
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                            Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="accordion-2">
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.9s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                            What can you deliver as System admin Expert?
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                        My other area of expertise is system administration, which includes a careful approach to managing servers and network infrastructure. 
                                        I start by conducting a thorough examination of your system's requirements before designing a stable environment. Security is of the utmost importance, 
                                        so I take strict precautions and keep a proactive eye out for risks. Regular maintenance guarantees peak performance and less downtime. 
                                        I excel at quickly troubleshooting and fixing problems. I'm also a pro at organizing and carrying out catastrophe recovery plans. 
                                        Smooth operations are ensured through routine backups, software updates, and tuning. My experience includes providing prompt assistance and direction to users. 
                                        Systems are reliable, secure, and effective because to my holistic approach.
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="1.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven">
                                            How Effectively can you deliver website?
                                        </a>
                                    </div>
                                    <div id="collapseSeven" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                        I always deliver website to my clients by following a structured process. After development and testing, I'll provide a preview link for the client to review. 
                                        Upon approval, I'll assist with domain registration and hosting setup. Finally, I'll transfer all website files to the client's hosting server, ensuring a seamless launch, 
                                        and provide necessary documentation and training if required.
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="1.3s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
                                            How can you support during web hosting?
                                        </a>
                                    </div>
                                    <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                            I can provide comprehensive web hosting support by first Identifying a convenient web hosting company for your application, then ensuring your website is fully operational and optimized. This includes server setup, regular maintenance, 
                                            and security monitoring. I'll promptly address technical issues, optimize server performance, and troubleshoot any downtime. Additionally, I'll assist with domain management, 
                                            SSL certificate installation, and backup solutions. My support aims to keep your website secure, load quickly, and deliver a seamless experience to users while minimizing disruptions and downtime.
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="1.4s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
                                            What Process do you use to create and deliver website to a client?
                                        </a>
                                    </div>
                                    <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                        Creating a web application according to me involves several key steps. First, I define the project's goals and requirements. Then, I plan the architecture, design the user interface, 
                                        and select the appropriate technologies like CodeIgniter 4. Next, I develop the application, implementing features and functionality. 
                                        Testing and debugging follow to ensure it works flawlessly. <br>
                                        Once validated, the application is deployed to a server. Ongoing maintenance, updates, and user support are crucial post-launch. The process demands collaboration among developers, designers, 
                                        and stakeholders to bring the vision to life while ensuring usability, security, and scalability.
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card wow fadeInRight" data-wow-delay="0.5s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                            Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->
<div class="page-header" style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 class="" id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url();?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('team');?>" id="page_head">Team</a>
                            <a href="" id="page_head"><?php echo $admins['first_name'];?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->
               <!-- About Start -->
               <div class="about wow fadeInUp" data-wow-delay="0.2s">
                <!-- <div class="container"> -->
                <div class="section-header text-center">
                        <p>Resume</p>
                        <h2>My Professional Resume</h2>
                    </div>
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

            <!-- Service Start -->

            <div class="service">
                    <div class="section-header text-center"style="background: #030f27;">
                        <p>Actual Services</p>
                        <h2 style="color: #ffffff;">I Can Deliver To You</h2>
                    </div>
                    <!-- <div class="container"> -->
                    <div class="row">
                        <?php if(!empty($services) && is_array($services)) :?>
                            <?php foreach($services as $service) :?>
                             <?php if($service['activation_name'] === 'active') : ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="<?php echo base_url('backend/media/service_images/'. $service['service_img'])?>" alt="Image">
                                    <div class="service-overlay">
                                        <p>
                                        <?php echo $service['service_short_content'];?>
                                        </p>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3> <?php echo $service['service_title'];?></h3>
                                    <a class="btn" href="<?php echo base_url('backend/media/service_images/'. $service['service_img'])?>" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                    </div>
                <!-- </div> -->
            </div>
            <!-- Service End -->

            <div class="blog-area pt_80 pb_80">
    <div class="wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2> Read My Articles<?php // echo $setting['home_title_news']; ?></h2>
                        <hr>
                    </div>
                    <p> Learn More from my Experience<?php // echo $setting['home_subtitle_news']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50">
                <div class="blog-carousel owl-carousel">
                    <?php
                    foreach ($articles as $article) {

                        $temp_arr = explode('.',$article['article_img']);
                        $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

                        $dt = explode('-',$article['updated_at']);

                        ?>
                        <?php if($article['activation_id'] == 1):?>
                        <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                            <a href="<?php echo base_url('team/'.$article['user_name'].'/'.$article['url_link']); ?>">
                                <div class="blog-image">
                                    <img src="<?php echo base_url('backend/media/article_images/'. $article['article_img']); ?>" alt="Article Image">
                                    <div class="date">
                                        <h3><?php echo $dt[2]; ?></h3>
                                        <h4>
                                            <?php
                                            if($dt[1] == '01') {echo 'Jan';}
                                            if($dt[1] == '02') {echo 'Feb';}
                                            if($dt[1] == '03') {echo 'Mar';}
                                            if($dt[1] == '04') {echo 'Apr';}
                                            if($dt[1] == '05') {echo 'May';}
                                            if($dt[1] == '06') {echo 'Jun';}
                                            if($dt[1] == '07') {echo 'Jul';}
                                            if($dt[1] == '08') {echo 'Aug';}
                                            if($dt[1] == '09') {echo 'Sep';}
                                            if($dt[1] == '10') {echo 'Oct';}
                                            if($dt[1] == '11') {echo 'Nov';}
                                            if($dt[1] == '12') {echo 'Dec';}
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-text">
                                <a class="b-head" href="<?php echo base_url('team/'.$article['user_name'].'/'.$article['url_link']); ?>"><?php echo $article['article_title']; ?></a>
                                <p>
                                    <?php echo $article['short_content']; ?>
                                </p>
                                <div class="button mt_15">
                                    <a href="<?php echo base_url('team/'.$article['user_name'].'/'.$article['url_link']); ?>">Read More <i class="fa fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        endif;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


          <!-- <div class="team-articles">
          <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>My blogs</p>
                        <h2>Explore My Latest blog post</h2>
                    </div>
                   
                    <div class="row blog-page">
                    <?php // if (!empty($articles)&& is_array($articles)):?>
                        <?php // foreach($articles as $article):?>
                            <?php // if($article['activation_id'] == 1):?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            
                            <div class="blog-item">
                            <a href="<?php // echo base_url('team/'.$slug .'/'.$article['url_link']);?>">
                                <div class="blog-img">
                                    <img src="<?php // echo base_url('backend/media/article_images/'. $article['article_img'])?>" alt="Article Image">
                                </div>
                            </a>
                                <div class="blog-title">
                                    <h3><?php // echo $article['article_title'];?></h3>
                                    <a class="btn" href="<?php // echo base_url('team/'.$slug .'/'.$article['url_link']);?>">+</a>
                                </div>
                            <a href="<?php // echo base_url('team/'.$slug .'/'.$article['url_link']);?>">
                                <div class="blog-meta">
                                    <p>By<a href=""><?php // echo $article['first_name'];?></a></p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        <?php //  echo $article['short_content'];?>
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
                        <?php // endif ?>
                        <?php // endforeach ?>
                        <?php // endif?>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
          </div> -->

          <div class="container">
            <div class="team-1">
            <div class="team-content">
            <div class="team-social text-center">
                    <a class="social-tw" href="https://www.tweeter.com/<?php  echo $socialMedia['tweeter']?? '' ?>"><i class="fab fa-twitter"></i></a>
                    <a class="social-fb" href="https://web.facebook.com/<?php  echo $socialMedia['facebook']?? '' ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-li" href="https://www.linkedin.com/in/<?php  echo ($socialMedia['linkedin']?? '')?>"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-in" href="https://www.instagram.com/<?php  echo $socialMedia['instagram']?? '' ?>"><i class="fab fa-instagram"></i></a>
                    <a class="social-yt" href="https://www.youtube.com/channel/<?php  echo $socialMedia['youtube']?? '' ?>"><i class="fab fa-youtube"></i></a>
                    <a style="background-color: green;" class="social-wh" href="https://api.whatsapp.com/send?phone=%2B<?php  echo $socialMedia['whatsApp']?? '' ?>&fbclid=IwAR2oluW78T5fEgXH8g_p_E1FM-SMThaM07LtCD7U2aI7qwdlhxH2zUHUmno"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            </div>
            </div>

                                  <!-- FAQs Start -->
                                  <div class="faqs">
                <!-- <div class="container"> -->
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
                        <!-- </div> -->
                </div>
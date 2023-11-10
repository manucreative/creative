 <!-- Carousel Start -->
 <?php if(!empty($sliders)&& is_array($sliders)): ?>
   
 <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                        <?php foreach ($sliders as $key => $slider): ?>
                                <li data-target="#carousel" data-slide-to="<?php echo $key; ?>" <?php echo ($key === 0) ? 'class="active"' : ''; ?>></li>
                            <?php endforeach; ?>
                </ol>

                <div class="carousel-inner">
                <?php foreach ($sliders as $key => $slider): ?>
                <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                    <img src="<?php echo base_url('backend/media/slider_images/' . $slider['slider_img']); ?>" alt="Carousel Image">
                    <div class="carousel-caption">
                        <p class="animated fadeInRight"><?php echo $slider['sub_header']; ?></p>
                        <h1 class="animated fadeInLeft"><?php echo $slider['main_header']; ?></h1>
                        <a class="btn animated fadeInUp" href="<?php echo base_url('manucreative/contact'); ?>"><?php echo $slider['btn_mssage']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php endif ?>
            <!-- Carousel End -->

            
              <!-- Feature Start-->
              <div class="feature" style="margin-top:0px">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.5s" style="background-color:<?php echo $feature_background1;?>">
                            <div class="feature-item">
                                <!-- <div class="feature-icon"> -->
                                <img src="<?php echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1)?>" alt="Image" width="70" height="70">
                                <!-- </div> -->
                                <div class="feature-text">
                                    <h3><?php echo $feature_title1; ?></h3>
                                    <p><?php echo $feature_desc1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.2s" style="background-color:<?php echo $feature_background2;?>">
                            <div class="feature-item">
                                <!-- <div class="feature-icon"> -->
                                <img src="<?php echo base_url('backend/media/feature_icons/icon2/'.$feature_icon2)?>" alt="Image" width="60" height="60">
                
                                <div class="feature-text">
                                    <h3><?php echo $feature_title2; ?></h3>
                                    <p><?php echo $feature_desc2; ?></p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-12 wow bounceInRight" data-wow-duration="2s" data-wow-delay="0.5s" style="background-color:<?php echo $feature_background3;?>">
                            <div class="feature-item">
                                <!-- <div class="feature-icon"> -->
                                <img src="<?php echo base_url('backend/media/feature_icons/icon3/'.$feature_icon3)?>" alt="Image" width="70" height="70">
                                <div class="feature-text">
                                    <h3><?php echo $feature_title3; ?></h3>
                                    <p><?php echo $feature_desc3; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature End-->
            <div class="wrapper"> <!-- wrapper start -->

                        <!-- About Start -->
                        <!-- <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="<?php // echo base_url('backend/media/admin_images/' .$admins['avatar'])?>" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <br>
                            <br>
                            <br>
                            <br>
                        <div class="section-header text-left myHeader">
                                <p class="subHeaderOnAboutMe"><?php // echo $admins['sub_title'] ?? '';?></p>
                                <h2 class="mainDeaderOnAboutMe"><?php //echo $admins['personal_title'] ?? '';?></h2>
                            </div>
                            <div class="about-text">
                                <span>
                                <?php // echo $admins['professional_profile'] ?? '';?>
                                </span>
                                <a class="btn" href="<?php // echo base_url('about')?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- About End -->

            
        <!-- Team #1 Start -->
        <div class="myTeam wow fadeInRight" data-wow-delay="0.2s">
        <div class="container">
            <div class="section-title text-center">
				<h2>Professional</h2>
                <h1>Team Members on Board</h1>
            </div>
            <div class="row team-slider">
            <?php if (!empty($admins) && is_array($admins)) : ?>
            <?php foreach ($admins as $admin) : ?>
                <?php
                    // Check the activation status
                    // $isActive = ($admin['activation_id'] == 1);
                    ?>
                      <?php if($admin['activation_name'] === 'active') : ?>
                <div class="column">
                    <div class="team-1 team-member">
                        <a href="<?php echo base_url('about/'.$admin['user_name']);?>">
                        <div class="team-img">
                            <img src="<?php echo base_url('backend/media/admin_images/' .$admin['avatar'])?>" alt="Team Image">
                        </div>
                        </a>
                <?php
                            $paragraph = $admin['professional_profile'] ?? '';
                            $words = explode(' ', $paragraph);
                            $totalWords = count($words);
                            $wordsToShow = 9;

                            if ($totalWords > $wordsToShow) {
                                $trimmedWords = array_slice($words, 0, $wordsToShow);
                                $trimmedParagraph = implode(' ', $trimmedWords) . '...';
                            } else {
                                $trimmedParagraph = $paragraph;
                            }
                 ?>
                        <div class="team-content text-center">
                            <a href="<?php echo base_url('about/'.$admin['user_name']);?>">
                            <h2><?php echo $admin['first_name']. ' ' .$admin['last_name']; ?></h2>
                            <h3><?php echo $admin['sub_title'] ?? '';?></h3>
                            <p><?php echo $trimmedParagraph; ?></p>
                            <h4><?php echo $admin['email_address'] ?? '';?></h4>
                            </a>
                            <div class="team-social text-center">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
                <?php endif ?>
               
            </div> 
        </div>
        </div>
        <!-- Team #1 End -->

            <!-- Service Start -->

            <div class="service">
                    <div class="section-header text-center"style="background: #030f27;">
                        <p>Actual Services</p>
                        <h2 style="color: #ffffff;">I Can Deliver To You</h2>
                    </div>
                    <div class="container">
                    <div class="row">
                        <?php
                        $serviceCounter = 0;

                        if (!empty($services) && is_array($services)) :
                            foreach (array_slice($services, 0, 3, true) as $service) : // Limit to the first three services
                                ?>
                                <?php if($service['activation_name'] === 'active') : ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-item">
                                        <div class="service-img">
                                            <img src="<?php echo base_url('backend/media/service_images/' . $service['service_img']) ?>" alt="Image">
                                            <div class="service-overlay">
                                                <p>
                                                    <?php echo $service['service_short_content']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="service-text">
                                            <h3> <?php echo $service['service_title']; ?></h3>
                                            <a class="btn" href="<?php echo base_url('backend/media/service_images/' . $service['service_img']) ?>" data-lightbox="service">+</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $serviceCounter++; // Increment the counter
                                endif;
                            endforeach;

                            if ($serviceCounter < count($services)) : // Check if there are more services to show
                                ?>
                               
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="myBox wow fadeInUp" style="text-align: center;" data-wow-delay="0.3s">
                                    <a href="<?php echo base_url('services') ?>" class="btn-md nav-item nav-link">Find out More</a>
                                </div>
                </div>
            </div>
            <!-- Service End -->
<hr>
             <!-- Testimonial Start -->
             <div class="container">
             <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
                
                <div class="section-header text-center">
                        <h2 style="color: #ffffff;">DAILY QUOTES FOR TECHNOLOGY</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider-nav">
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="<?php echo base_url('frontend/media/general_images/user1.jpg')?>" alt="Testimonial"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider">
                                <div class="slider-item">
                                    <h3>Bill Gates</h3>
                                    <h4>IT expert</h4>
                                    <p>The computer was born to solve problems that did not exist before.</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Steve Ballmer</h3>
                                    <h4>IT expert</h4>
                                    <p>"Technology empowers people to do what they want to do. It lets people be creative. It lets people be productive."</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Ted Nelson</h3>
                                    <h4>IT expert</h4>
                                    <p>"The good news about computers is that they do what you tell them to do. The bad news is that they do what you tell them to do."</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Bill Gates</h3>
                                    <h4>IT expert</h4>
                                    <p>"Information technology and business are becoming inextricably interwoven. I don't think anybody can talk meaningfully about one without talking about the other."</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Andrew Singer</h3>
                                    <h4>IT expert</h4>
                                    <p>"The art of debugging is figuring out what you really told your program to do rather than what you thought you told it to do."</p>
                                </div>
                                <div class="slider-item">
                                    <h3>David Ogilvy</h3>
                                    <h4>IT professional</h4>
                                    <p>"In the modern world of business, it is useless to be a creative, original thinker unless you can also sell what you create."</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Bill Gates</h3>
                                    <h4>IT professional</h4>
                                    <p>"We always overestimate the change that will occur in the next two years and underestimate the change that will occur in the next ten. Don't let yourself be lulled into inaction."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->

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
                       
            <!-- FAQs End -->

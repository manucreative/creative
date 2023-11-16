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
        <!-- <div class="container"> -->
        <div class="row">
                            <div class="col-md-12">
                                <div class="main-headline">
                                    <div class="headline">
                                        <h2> Meet the current professional team <?php // echo $setting['home_title_news']; ?></h2>
                                        <hr>
                                    </div>
                                    <p> We value professionalism, click to confirm<?php // echo $setting['home_subtitle_news']; ?></p>
                                </div>
                            </div>
                        </div>
                <div class="row">
    <div class="col-md-12 mt_50">
        <div class="blog-carousel owl-carousel">
            <?php if (!empty($admins) && is_array($admins)) : ?>
                <?php foreach ($admins as $admin) : ?>
                    <?php
                    // Check the activation status
                    if ($admin['activation_name'] === 'active') :
                        // Get social media data for the current admin
                        $adminSocialMedia = $socialMediaModel->getSocialMedia($admin['admin_id']);
                    ?>
                        <div class="blog-item">
                            <div class="team-1 team-member">
                                <a href="<?php echo base_url('team/' . $admin['user_name']); ?>">
                                    <div class="team-img">
                                        <img src="<?php echo base_url('backend/media/admin_images/' . $admin['avatar']) ?>" alt="Team Image">
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
                                    <a href="<?php echo base_url('team/' . $admin['user_name']); ?>">
                                        <h2><?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?></h2>
                                        <h3><?php echo $admin['sub_title'] ?? ''; ?></h3>
                                        <p><?php echo $trimmedParagraph; ?></p>
                                        <h4><?php echo $admin['email_address'] ?? ''; ?></h4>
                                    </a>
                                    <div class="team-social text-center">
                                    <a class="social-tw" href="https://www.tweeter.com/<?php  echo $adminSocialMedia['tweeter']?? '' ?>"><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href="https://web.facebook.com/<?php  echo $adminSocialMedia['facebook']?? '' ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href="https://www.linkedin.com/in/<?php  echo ($adminSocialMedia['linkedin']?? '')?>"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href="https://www.instagram.com/<?php  echo $adminSocialMedia['instagram']?? '' ?>"><i class="fab fa-instagram"></i></a>
                                    <a class="social-yt" href="https://www.youtube.com/channel/<?php  echo $adminSocialMedia['youtube']?? '' ?>"><i class="fab fa-youtube"></i></a>
                                    <a style="background-color: green;" class="social-fb" href="https://api.whatsapp.com/send?phone=%2B<?php  echo $adminSocialMedia['whatsApp']?? '' ?>&fbclid=IwAR2oluW78T5fEgXH8g_p_E1FM-SMThaM07LtCD7U2aI7qwdlhxH2zUHUmno"><i class="fab fa-whatsapp"></i></a>
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
        <div class="row">
                        <div class="col-12 load-more">
                            <a class="btn btn-success" href="<?php echo base_url('team') ?>">Load More</a>
                        </div>
                    </div>
        <!-- </div> -->
        </div>
        <!-- Team #1 End -->

            <!-- Service Start -->

            <div class="service">
                    <!-- <div class="container"> -->
                    <div class="row">
                            <div class="col-md-12">
                                <div class="main-headline">
                                    <div class="headline">
                                        <h2> All our Services<?php // echo $setting['home_title_news']; ?></h2>
                                        <hr>
                                    </div>
                                    <p> Our Experts have go a lot for you<?php // echo $setting['home_subtitle_news']; ?></p>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                    <div class="col-md-12 mt_50">
                        <div class="blog-carousel owl-carousel">
                        <?php

                        if (!empty($services) && is_array($services)) :
                            foreach($services as $service) :
                                ?>
                                <?php if($service['activation_name'] === 'active') : ?>
                                <div class="blog-item wow fadeInUp" data-wow-delay="0.1s">
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
                                endif;
                            endforeach;
                            endif;
                            ?>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12 load-more">
                            <a class="btn btn-success" href="<?php echo base_url('services') ?>">Load More</a>
                        </div>
                    </div>
            </div>
            <!-- Service End -->
<hr>

<div class="blog-area pt_80 pb_80">
    <div class=" wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2> All our Articles<?php // echo $setting['home_title_news']; ?></h2>
                        <hr>
                    </div>
                    <p> Learn More from the experts<?php // echo $setting['home_subtitle_news']; ?></p>
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
                            if($article['activation_name'] === 'active'){
                        ?>
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
                            }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

             <!-- Testimonial Start -->
             <!-- <div class="container">
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
            </div> -->
            <!-- Testimonial End -->

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
                       
            <!-- FAQs End -->

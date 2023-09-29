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
              <div class="feature ">
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
                        <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="<?php echo base_url('backend/media/admin_images/' .$admins['avatar'])?>" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <br>
                            <br>
                            <br>
                            <br>
                        <div class="section-header text-left myHeader">
                                <p class="subHeaderOnAboutMe"><?php echo $admins['sub_title'] ?? '';?></p>
                                <h2 class="mainDeaderOnAboutMe"><?php echo $admins['personal_title'] ?? '';?></h2>
                            </div>
                            <div class="about-text">
                                <span>
                                <?php echo $admins['professional_profile'] ?? '';?>
                                </span>
                                <a class="btn" href="<?php echo base_url('about')?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <?php endforeach ?>
                        <?php endif ?>
                    </div>
                <!-- </div> -->
            </div>
            <!-- Service End -->

             <!-- Testimonial Start -->
             <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
                <div class="container">
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
    <?php $delay = 0.1; // Initialize delay variable ?>
    <?php foreach ($faqs as $index => $faq): ?>
        <div class="col-md-6">
            <div id="accordion-<?php echo $index; ?>">
                <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?php echo $delay; ?>">
                    <div class="card-header">
                        <a class="card-link collapsed" data-toggle="collapse" href="#collapse<?php echo $index; ?>"
                           data-parent="#accordion-<?php echo $index; ?>">
                            <?php echo $faq['faq_question']; ?>
                        </a>
                    </div>
                    <div id="collapse<?php echo $index; ?>" class="collapse" data-parent="#accordion-<?php echo $index; ?>">
                        <div class="card-body">
                            <?php echo $faq['faq_answer']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $delay += 0.2; // Increment the delay for the next FAQ
        if (($index + 1) % 2 === 0 && $index < count($faqs) - 1): ?>
            <div class="clearfix visible-md-block"></div> <!-- Add this for spacing between rows -->
        <?php endif; ?>
    <?php endforeach; ?>
</div>
                </div>
                      </div>
                                <!-- <div class="card wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.3s">
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
                                </div> -->
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
                            <!-- </div>
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
                                </div> -->
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
                            <!-- </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- FAQs End -->

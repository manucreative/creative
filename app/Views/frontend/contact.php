<div class="page-header" style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head">Contact Me</h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="" id="page_head">Home</a>
                            <a href="" id="page_head">Contact Me</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->
            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Get In Touch Right Now</p>
                        <h2>For Any Question</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="flaticon-address"></i>
                                    <div class="contact-text">
                                        <h2>Location</h2>
                                        <p>Ruaraka - Lucky, Nairobi, Kenya</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-call"></i>
                                    <div class="contact-text">
                                        <h2>Phone</h2>
                                        <p>+254721827214</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-send-mail"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p>emmanuelkirui34@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
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
                                <?= form_open(base_url('sendMail'), ['id' => 'contactForm'])?>
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="name" value="<?php echo old('name');?>" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo old('user_email');?>" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo old('subject');?>" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" id="contact_message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"> <?php echo old('message');?> </textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                                    </div>
                                <?= form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->
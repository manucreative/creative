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
                                        <textarea class="form-control" id="contact_message" name="message" placeholder="Type Your Message" required="required" data-validation-required-message="Please enter your message"> <?php echo old('message');?> </textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="modal-footer">
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
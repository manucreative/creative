<!-- Page Header Start -->
        <div class="page-header" style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head">My Services</h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="" id="page_head">Home</a>
                            <a href="" id="page_head">My Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->

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
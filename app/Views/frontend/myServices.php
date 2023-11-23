<!-- Page Header Start -->
        <div class="page-header" style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url(); ?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('services'); ?>" id="page_head"><?php echo $title; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->

               <!-- Service Start -->

            <div class="service">
               <div class="row">
                            <div class="col-md-12">
                                <div class="main-headline">
                                    <div class="headline">
                                        <h2 class="section-heading centered white">Our Services<?php // echo $setting['home_title_news']; ?></h2>
                                        <hr>
                                    </div>
                                    <p class="white-text">Our Professions consist the following <?php // echo $setting['home_subtitle_news']; ?></p>
                                </div>
                            </div>
                        </div>
                    <div class="serviceContainer">
                        <?php if(!empty($services) && is_array($services)) :?>
                            <?php foreach($services as $index => $service) :?>
                                <?php if($service['activation_name'] === 'active') : ?>
                        <div class="<?php echo $index % 2 !== 0 ? 'shop-local-wrapper':'shop-local-wrapper-inverse'?>  wow <?php echo $index % 2 !== 0 ? 'zoomIn':'zoomIn'?>" data-wow-duration="1s" data-wow-delay="<?php echo 1 * ($index); ?>">
						<div class="<?php echo $index % 2 !== 0 ? 'shop-local-left':'shop-local-right-inverse'?>" style="background-image: url('<?php echo base_url('backend/media/service_images/'. $service['service_img'])?>')"></div>
                                <!-- <div class="gradient-bg up big-testimonial-component"> -->

                        <div class="<?php echo $index % 2 !== 0 ? 'shop-local-right':'shop-local-left-inverse'?>">
                        <div class="gradient-circle up"></div>
                                    <div class="gradient-line up"></div>
                                <div class="shop-local-content-wrapper">
                                <h2 class="shop-local-heading"><?php echo $service['service_title'];?></h2>
                                    <p>
                                    <?php echo $service['service_short_content'];?>
                                    </p>
                                    <p>
                                <?php // echo $service['service_content'];?>
                            </p>
						        <p>-------</p>
						    <div>Jane &amp; John Doe</div>
						<div><strong>Technology</strong>
						</div>
						</div>
                        </div>
                     <!-- </div> -->
                    </div>
                    <br><br>
                <?php endif ?>
                <?php endforeach ?>
                <?php endif ?>
                </div>
            </div>
            <!-- Service End -->
            
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
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
<!-- Team #1 Start -->
<div class="myTeam wow fadeInRight" data-wow-delay="0.2s">
        <!-- <div class="container"> -->
        <div class="row">
                            <div class="col-md-12">
                                <div class="main-headline">
                                    <div class="headline">
                                        <h2> Meet the All professional team On board<?php // echo $setting['home_title_news']; ?></h2>
                                        <hr>
                                    </div>
                                    <p> We value professionalism, click to confirm<?php // echo $setting['home_subtitle_news']; ?></p>
                                </div>
                            </div>
                        </div>
        <div class="row">
    
            <?php if (!empty($admins) && is_array($admins)) : ?>
                <?php foreach ($admins as $admin) : ?>
                    <?php
                    // Check the activation status
                    if ($admin['activation_name'] === 'active') :
                        // Get social media data for the current admin
                        $adminSocialMedia = $socialMediaModel->getSocialMedia($admin['admin_id']);
                    ?>

                                    <div class="myTeam-section">
                                            <div class="row myTeamPage">
                                                <div class="co-md-4 ">
                                                 <div class="memberImg">
                                                        <img src="<?php echo base_url('backend/media/admin_images/' . $admin['avatar']) ?>" alt="Team Image" 
                                                        loading="lazy" id="w-node-_6c0dd45b-3dd1-a1d3-d574-81af355c81af-7e8575ec" 
                                                        sizes="(max-width: 479px) 100vw, (max-width: 991px) 90vw, 39vw" alt="">
                                                </div>
                                                <div class="team-content text-center">
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
                                                            <a 
                                                            href="<?php echo base_url('team/' . $admin['user_name']); ?>">
                                                            <h2><?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?></h2>
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
                                                <div class="col-md-8">
                                                <div id="w-node-f96ae576-1c2b-fad3-12f3-1e635963dc36-7e8575ec" class="feature-text">
                                                    <h3><?php echo $admin['sub_title'] ?? ''; ?></h3>
                                                    <p><?php echo $trimmedParagraph; ?></p>
                                                    <h4><?php echo $admin['email_address'] ?? ''; ?></h4>
                                                </div>
                                                <a href="" class="myButton w-button">Explore My Profile</a>
                                            </div>

                                                </div>
                                            </div>
                                    </div>


                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <!-- </div> -->
        </div>
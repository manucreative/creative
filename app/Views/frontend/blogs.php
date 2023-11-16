            <div class="page-header"  style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url(); ?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('articles'); ?>" id="page_head"><?php echo $title; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->
            <!-- Blog Start -->
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
                    <?php
                    foreach ($articles as $article) {

                        $temp_arr = explode('.',$article['article_img']);
                        $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

                        $dt = explode('-',$article['updated_at']);
                        if($article['activation_name'] === 'active'){
                        ?>
                        
            <div class="col-sm-4 mt_50">
                <div class="blog-item">
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
                        </div>
                    </div>
                        <?php
                        }
                    }
                    ?>
                
        </div>
  
                    <!-- </div> -->
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
            </div>
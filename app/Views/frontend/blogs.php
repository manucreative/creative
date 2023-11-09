            <div class="page-header"  style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head">Our Blog</h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="" id="page_head">Home</a>
                            <a href="" id="page_head">Our Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <div class="wrapper"> <!-- wrapper start -->
            <!-- Blog Start -->
            <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Latest Blogs</p>
                        <h2><?php echo $title;?></h2>
                    </div>
                   
                    <div class="row blog-page">
                    <?php if (!empty($articles)&& is_array($articles)):?>
                        <?php foreach($articles as $article):?>
                            <?php if($article['activation_id'] == 1):?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="<?php echo base_url('backend/media/article_images/'. $article['article_img'])?>" alt="Article Image">
                                </div>
                                <div class="blog-title">
                                    <h3><?php echo $article['article_title'];?></h3>
                                    <a class="btn" href="<?php echo base_url('articles/'.$article['url_link']);?>">+</a>
                                </div>
                                <div class="blog-meta">
                                    <p>By<a href=""><?php echo $article['first_name'];?></a></p>
                                   
                                </div>
                                <div class="blog-text">
                                    <p>
                                        <?php echo $article['short_content'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif?>
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
            </div>
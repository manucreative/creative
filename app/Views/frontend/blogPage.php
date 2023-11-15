<!-- Page Header Start -->
<div class="page-header"  style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                            <h2 id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url(); ?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('articles'); ?>" id="page_head">Articles</a>
                            <a href="<?php echo base_url('articles/'.$slug); ?>" id="page_head"><?php echo $title; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Single Post Start-->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-content wow fadeInUp">
                                <img src="<?php echo base_url('backend/media/article_images/'.$article_img); ?>" />
                                <h2><?php echo $article_title; ?></h2>
                                <div class="main_content">
                                    <?php echo $article_content; ?>
                                </div>
                            </div>
                            <div class="single-bio wow fadeInUp">
                                <div class="single-bio-img">
                                    <img src="<?php echo base_url('backend/media/admin_images/'.$author['avatar']); ?>" />
                                </div>
                                <div class="single-bio-text">
                                <div class="author-head">
                                    <h3><span style="color:orangered;">Author</span>&nbsp;<?php echo $author['first_name'].' ' .$author['last_name']; ?></h3>
                                </div>
                                    <p>
                                       <?php echo $author['bio']; ?>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="single-tags wow fadeInUp">
                                <h2>More Articles From the Author</h2>
                            <?php if(!empty($allUserArticles) && is_array($allUserArticles)):?>
                                <?php foreach ($allUserArticles as $userArticle): ?>
                                <a style="background:<?php echo $userArticle['article_title'] == $article_title ? 'green': '' ?>;color:<?php echo $userArticle['article_title'] == $article_title ? '#ffffff': ''; ?>" href="<?php echo base_url('team/'.$user_name.'/'.$userArticle['url_link']);?>"><?php echo $userArticle['article_title']; ?></a>
                                <?php endforeach ?>
                            <?php endif ?>
                            </div>
                            

                            <div class="single-related wow fadeInUp">
                                <h2>Related Post</h2>
                               
                                <div class="owl-carousel related-slider">
                                <?php if(!empty($relatedCats) && is_array($relatedCats)):?>
                                    <?php foreach($relatedCats as $related):?>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="<?php echo base_url('backend/media/article_images/' .$related['article_img']); ?>" />
                                        </div>
                                        <div class="post-text">
                                            <a href=""><?php echo $related['article_title']; ?></a>
                                            <div class="post-meta">
                                                <p>By<a href=""><?php echo $related['first_name']; ?></a></p>
                                                <p>In<a href=""><?php echo $related['cat_name']; ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                <?php endif ?>
                                </div>
                            </div>

                            <div class="single-comment wow fadeInUp">
                                <h2>3 Comments</h2>
                                <ul class="comment-list">
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <span>01 Jan 2045 at 12:00pm</span>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="comment-child">
                                            <li class="comment-item">
                                                <div class="comment-body">
                                                    <div class="comment-img">
                                                        <img src="img/user.jpg" />
                                                    </div>
                                                    <div class="comment-text">
                                                        <h3><a href="">Josh Dunn</a></h3>
                                                        <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                        </p>
                                                        <a class="btn" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form wow fadeInUp">
                                <h2>Leave a comment</h2>
                                <form id="commentForm" action="/">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" id="comment-name">
                                        <div class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" class="form-control" id="comment-email">
                                        <div class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                        <div class="error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea type="text" id="comment-message" class="form-control comment_message" name="comment_message" placeholder="Type Your Message"></textarea>
                                        <div class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="sidebar">
                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="search-widget">
                                        <form>
                                            <input class="form-control" type="text" placeholder="Search Keyword">
                                            <button class="btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Recent Post</h2>
                                    <div class="recent-post">
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="img/post-1.jpg" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Admin</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="img/post-2.jpg" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Admin</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="img/post-3.jpg" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Admin</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="img/post-4.jpg" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Admin</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="img/post-5.jpg" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Admin</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-1.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="tab-post">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="featured" class="container tab-pane active">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="popular" class="container tab-pane fade">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="latest" class="container tab-pane fade">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-2.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Categories</h2>
                                    <div class="category-widget">
                                        <ul>
                                            <li><a href="">National</a><span>(98)</span></li>
                                            <li><a href="">International</a><span>(87)</span></li>
                                            <li><a href="">Economics</a><span>(76)</span></li>
                                            <li><a href="">Politics</a><span>(65)</span></li>
                                            <li><a href="">Lifestyle</a><span>(54)</span></li>
                                            <li><a href="">Technology</a><span>(43)</span></li>
                                            <li><a href="">Trades</a><span>(32)</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-3.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Tags Cloud</h2>
                                    <div class="tag-widget">
                                        <a href="">National</a>
                                        <a href="">International</a>
                                        <a href="">Economics</a>
                                        <a href="">Politics</a>
                                        <a href="">Lifestyle</a>
                                        <a href="">Technology</a>
                                        <a href="">Trades</a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Text Widget</h2>
                                    <div class="text-widget">
                                        <p>
                                            Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea nec eros. Nunc eu enim non turpis id augue.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Post End-->   
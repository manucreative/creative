<div class="page-header"  style="background-image: url(<?php echo base_url('frontend/media/general_images/banner_about.png'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow fadeInLeft">
                                          
                                    
                            <h2 id="page_head"><?php echo $title; ?></h2>
                        </div>
                        <div class="col-12 wow fadeInRight">
                            <a href="<?php echo base_url(); ?>" id="page_head">Home</a>
                            <a href="<?php echo base_url('team'); ?>" id="page_head">team</a>
                            <a href="<?php echo base_url('team/membership'); ?>" id="page_head">membership</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

 <div class="wrapper" id="regForm">

 <div class=" text-center text-capitalize col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
        <h1 Style="color:forestgreen" class="modal-title" id="exampleModalLabel">BE AMONG OUR PROFESSIONAL TEAM TODAY</h1>
      </div>
    
 <div class="row">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
       <?= form_open_multipart(base_url('team/membership'), ['class'=> 'adminRegForm admin-form-validation', 'id' => 'adminRegistrationForm'])?>
      <div class="modal-body form-wrapper">
      <?php foreach ($errors as $error): ?>
            <div class="file error">
            <h6 style="background-color: red; color:black; padding:20px"><?= esc($error) ?></h6>
            </div>
            <?php endforeach ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class=" text-center alert alert-danger" id="flash-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class=" text-center alert alert-success" id="flash-message">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
      <div class="wrap-input100 validate-input m-b-23" data-validate = "First name is required">
            <span class="label-input100">Enter your first name &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="first_name" id="first_name" value="<?= old('first_name') ?>" placeholder="Type your first name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Enter your middle name &nbsp; (<span style="color:blue">optional</span>)</span>
            <input class="input100" type="text" name="middle_name" id="middle_name" value="<?= old('middle_name') ?>" placeholder="Type your middle name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Enter your last name &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="last_name" id="last_name" value="<?= old('last_name') ?>" placeholder="Type your Last name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Enter your profession title (e.g Developer) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="personal_title" id="personal_title" value="<?= old('personal_title') ?>" placeholder="Type your profession title">
            <span class="focus-input100" data-symbol="&#9819;"></span>
	  </div>

      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Enter Subtitle if applicable &nbsp; (<span style="color:blue">optional</span>)</span>
            <input class="input100" type="text" name="sub_title" id="sub_title" value="<?= old('sub_title') ?>" placeholder="Type your profession title">
            <span class="focus-input100" data-symbol="&#9752;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Type your Biography (Education & Experience, Less than 70 words) &nbsp; <span style="color:red">*</span></span>
            <textarea class="input100" type="text" name="bio" id="bio" placeholder="Biography"><?= old('bio') ?></textarea>
    
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "Make sure it is not null, and email is well structured">
            <span class="label-input100">Type your Email Address (May Require verification) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="my_email" name="email_address" id="email_address" value="<?= old('email_address') ?>" placeholder="Type your email address">
            <span class="focus-input100" data-symbol="&#9993;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "This field is required">
            <span class="label-input100">Type a unique User Name (Single word) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="text" name="user_name" id="user_name" value="<?= old('user_name') ?>" placeholder="Type your user name">
            <span class="focus-input100" data-symbol="&#9787;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "The Phone Format is strict, kindly check">
            <span class="label-input100">Type your telephone number (format is: 2547xxxxxxxx7) &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="telephone" name="telephone" id="telephone" value="<?= old('telephone') ?>" placeholder="Type your telephone">
            <span class="focus-input100" data-symbol="&#9743;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "We need strong Password, (at least 8 characters, should have a capital letter and a number)">
            <span class="label-input100">Enter A Strong Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="password" id="password" value="<?= old('password') ?>" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "Looks like your Password Do not Marge Please Check">
            <span class="label-input100">Kindly Re-enter The Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="re_enterPass" id="re_enterPass" value="<?= old('re_enterPass') ?>" placeholder="Type your re enter the Pass">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>
      <div class="wrap-input100 m-b-23">
            <span class="label-input100">Select Your Professional Image &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="file" name="avatar" id="avatar" value="<?= old('avatar') ?>" placeholder="Type your avatar">
	  </div>
      <div class="terms text-center">
               <p> <input type="checkbox" id="tac" name="termsAndConditions" class="checkbox-lg"> &nbsp; 
               <a href="#" id="termsLink" class=" btn termsLink" >CLICK here to read & accept terms of use</a>
            </p>
            </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit"  class="login100-form-btn">
								Submit credentials now
							</button>
						</div>
					</div>

      </div>
  <?= form_close() ?>
</div>

<!-- Large modal -->

<div class="modal fade" id="tcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Our terms and Conditions</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="termsHeader">
            <h3>Read this terms and condition carefully</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ducimus nesciunt enim. Quia consequuntur tempora aliquam unde minus, incidunt dolores ab, veritatis asperiores eum doloremque, totam impedit at est nesciunt.
            </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="disAgreeBtn" class="btn btn-secondary">I don't Agree</button>
        <button id="okButton" type="button" class=" btn btn-primary">I Agree</button>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">

    <!-- Other data here -->
    <div style="padding: 10px;" class="form-col-2 wow fadeInUp" data-wow-delay="0.3s">
    <div class="col-header">
        <h2>Benefits of becoming a Member</h2>
    </div>

    <br>
    <ul class="wow fadeInUp">
                    <li class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="myService-head">
                            <h4><span>1)</span> Expose you Profession to clients</h4>
                            </div>
                            <div class="myService-body">
                                <p>After successful profile updates you will be able to have a full resume profile that will showcase 
                                    your professional details to the clients. you will have personal link to add to your CV
                                </p>
                            </div>
                            <!-- <div class="text-center">
                            <a class="btn btn-primary" href="">Learn More</a>
                            </div> -->
                    </li>
        <hr>

        <li class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="myService-head">
                            <h4><span>2)</span> Add your own services </h4>
                            </div>
                            <div class="myService-body">
                                <p>
                                    Services Means the service/work you can offer to the client, this package will build a trust to the client
                                    and it will strengthen your acceptance on the given project.
                                </p>
                            </div>
                    </li>
        <hr>

        <li class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="myService-head">
                            <h4><span>3)</span> Write Articles and Educate others </h4>
                            </div>
                            <div class="myService-body">
                                <p>
                                    Within your particular profession, you will be able to write blog post to educate other people around the world 
                                    over a particular topic or provide solution to the people world-wide
                                </p>
                            </div>
                    </li>
        <hr>

        <li class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="myService-head">
                            <h4><span>4)</span> Add your Portfolio </h4>
                            </div>
                            <div class="myService-body">
                                <p>
                                    You might have your own completed projects that was previously done and completed to other clients.
                                    This platform will provide you an account where you will upload the photos, add contents about you projects, and 
                                    extract links that will expose you work to the clients.
                                </p>
                            </div>
                    </li>
        <hr>
    </ul>

                <br>
                <div class="single mine sidebar-widget wow fadeInUp" data-wow-delay="0.3s">
                                    <h2 class="widget-title">List of current Professionals </h2>
                                    <?php
                                        foreach ($admins as $admin) {
                                            if($admin['activation_name'] === 'active'){
                                                $dt = explode('-',$admin['created_at']);
                                    ?>
                                    <div class="recent-post">
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="<?php echo base_url('backend/media/admin_images/'. $admin['avatar']); ?>" alt="Admin-image" />
                                            </div>
                                            <div class="post-text">
                                                <a href="<?php echo base_url('team/'.$admin['user_name']);?>"><?php echo $admin['first_name'].' '.$admin['last_name']; ?></a>
                                                <div class="post-meta">
                                                    <p>profession:<a href="<?php echo base_url('team/'.$admin['user_name']);?>"><?php echo $admin['personal_title']; ?></a></p>
                                                    <p>since:
                                                    <?php 
                                                     if($dt[1] == '01') {echo 'Jan'. ' - ' .$dt[0];}
                                                     if($dt[1] == '02') {echo 'Feb'. ' - ' .$dt[0];}
                                                     if($dt[1] == '03') {echo 'Mar'. ' - ' .$dt[0];}
                                                     if($dt[1] == '04') {echo 'Apr'. ' - ' .$dt[0];}
                                                     if($dt[1] == '05') {echo 'May'. ' - ' .$dt[0];}
                                                     if($dt[1] == '06') {echo 'Jun'. ' - ' .$dt[0];}
                                                     if($dt[1] == '07') {echo 'Jul'. ' - ' .$dt[0];}
                                                     if($dt[1] == '08') {echo 'Aug'. ' - ' .$dt[0];}
                                                     if($dt[1] == '09') {echo 'Sep'. ' - ' .$dt[0];}
                                                     if($dt[1] == '10') {echo 'Oct'. ' - ' .$dt[0];}
                                                     if($dt[1] == '11') {echo 'Nov'. ' - ' .$dt[0];}
                                                     if($dt[1] == '12') {echo 'Dec'. ' - ' .$dt[0];}
                                                     ?>
                                                    </p>
                                                </div>
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
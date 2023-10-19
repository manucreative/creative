<br>
 <div id="page-wrapper" >
 <div id="page-inner">
              
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
    

<div class="row">
		<div class="col-md-12">
							
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
                        <?php if(session('role')==='super_admin' || session('role')==='admin'):?>
                        <li class="active"><a href="#tab_1" data-toggle="tab">Social Media</a></li>
                        <?php endif ?>
                        <?php if(session('role')==='super_admin'):?>
						<li class="nave-link"><a href="#tab_2" data-toggle="tab">Features</a></li>
						<li class="nave-link"><a href="#tab_3" data-toggle="tab">Front Dp</a></li>
						<li class="nave-link"><a href="#tab_4" data-toggle="tab">App Logo</a></li>
						<li class="nave-link"><a href="#tab_5" data-toggle="tab">Email Settings</a></li>
						<li class="nave-link"><a href="#tab_6" data-toggle="tab">News and Tours</a></li>
						<li class="nave-link"><a href="#tab_7" data-toggle="tab">Home Page</a></li>
						<li class="nave-link"><a href="#tab_8" data-toggle="tab">Banner</a></li>
                        <?php endif ?>
                        <!--<li><a href="#tab_7" data-toggle="tab">Color</a></li>-->
                        <!-- <li><a href="#tab_8" data-toggle="tab">Payment</a></li> -->
					</ul>
					<div class="tab-content">
        <?php if(session('role')==='super_admin' || session('role')==='admin'):?>
                    <div class="tab-pane active" id="tab_1">

                    <?= form_open_multipart(base_url('creative/admin/socialMediaUpdates/index/key/'.$session_key), ['class'=> 'AdminAddForm'])?>
                <div class="row">
      <div class="col-sm-3">
      <div class="">
        <h3 Style="color:forestgreen" class="modal-title" id="exampleModalLabel">My Social Medial</h3>
      </div>
      </div>
      <div class="col-sm-9">

      <div class="modal-footer">
        <a href="#"><button id="allUsers" data-action="allUsers" class="btn btn-primary">My Profile</button></a>
        </div>
      </div>

    </div>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="facebook" class="col-sm-4 col-form-label text-right">Enter facebook user name &nbsp; <span style="color: blue;">(Optional)</span> <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <input type="text" id="facebook" name="facebook" value="<?php echo $socialMedia['facebook']?? '' ?>"  class="form-control myInput">
                <input type="hidden" id="owner" name="owner" value="<?php echo session('admin_id') ?>">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <hr>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="instagram" class="col-sm-4 col-form-label text-right">Enter Instagram User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="instagram" name="instagram" value="<?php echo $socialMedia['instagram']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="tweeter" class="col-sm-4 col-form-label text-right">Enter tweeter User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="tweeter" name="tweeter" value="<?php echo $socialMedia['tweeter']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="whatsApp" class="col-sm-4 col-form-label text-right">Enter whatsApp User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="whatsApp" name="whatsApp" value="<?php echo $socialMedia['whatsApp']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="tiktok" class="col-sm-4 col-form-label text-right">Enter tiktok User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="tiktok" name="tiktok" value="<?php echo $socialMedia['tiktok']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="youtube" class="col-sm-4 col-form-label text-right">Enter youtube User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="youtube" name="youtube" value="<?php echo $socialMedia['youtube']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="linkedin" class="col-sm-4 col-form-label text-right">Enter linkedin User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="linkedin" name="linkedin" value="<?php echo $socialMedia['linkedin']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>
    
      <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="telegram" class="col-sm-4 col-form-label text-right">Enter telegram User name &nbsp; <span style="color: blue;">(Optional)</span></label>
            <div class="col-sm-4">
          <input type="text" id="telegram" name="telegram" value="<?php echo $socialMedia['telegram']?? '' ?>" class="form-control myInput">
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>
      <hr>

      </div>
      <div class="modal-footer">
        <button type="submit" value="" id="addAdminBtn" name="addAdmin" class="submit-btn btn btn-success">Save Data</button>
      </div>
  <?= form_close() ?>
</div>
<?php endif ?>

<?php if(session('role')==='super_admin'):?>
                        <div class="tab-pane" id="tab_2">

          					<?php echo form_open_multipart(base_url('creative/admin/featureConfigForm/index/key'.$session_key),array('class' => 'updateFeatures')); ?>
          					<div class="box box-info">
								<div class="box-body">
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col-sm-3">
                                        <h2> Feature Column 1 </h2>
                                        <div class = "form-group">
                                            <label for="feature_title1">Enter The Title</label>
                                                <input type="text" id="feature_title1" name="feature_title1" value="<?php  echo $feature_title1; ?>" placeholder="Feature Title here"  class="form-control">

                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_desc1">Enter Content her</label>
                                                <textarea type="text" id="feature_desc1" name="feature_desc1"  placeholder="Enter Feature Content"  class="form-control"><?php  echo $feature_desc1; ?> </textarea>
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_background1">Enter Color Code</label>
                                                <input type="text" id="feature_background1" name="feature_background1" value="<?php  echo $feature_background1; ?>" placeholder="Enter background color code her" class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_icon1" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                            <input type="file" id="feature_icon1" name="feature_icon1" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <img src="<?php echo base_url('backend/media/feature_icons/icon1/'.$feature_icon1);?>" class="user-image img-responsive" alt="Existing Icon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-3">
                                        <h2> Feature Column 2 </h2>
                                        <div class = "form-group">
                                            <label for="feature_title2">Enter The Title</label>
                                                <input type="text" id="feature_title2" name="feature_title2" value="<?php  echo $feature_title2; ?>" placeholder="Feature Title here"  class="form-control">

                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_desc2">Enter Content her</label>
                                                <textarea type="text" id="feature_desc2" name="feature_desc2"  placeholder="Enter Feature Content"  class="form-control"><?php  echo $feature_desc2; ?> </textarea>
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_background2">Enter Color Code</label>
                                                <input type="text" id="feature_background2" name="feature_background2" value="<?php  echo $feature_background2; ?>" placeholder="Enter background color code her" class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_icon2" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                            <input type="file" id="feature_icon2" name="feature_icon2" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <img src="<?php echo base_url('backend/media/feature_icons/icon2/'.$feature_icon2);?>"class="user-image img-responsive" alt="Existing Icon">
                                                </div>
                                            </div>
                                            </div>
                                        <div class="col-sm-1"></div>

                                        <div class="col-sm-3">
                                        <h2> Feature Column 3 </h2>
                                        <div class = "form-group">
                                            <label for="feature_title3">Enter The Title</label>
                                                <input type="text" id="feature_title3" name="feature_title3" value="<?php  echo $feature_title3; ?>" placeholder="Feature Title here"  class="form-control">

                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_desc3">Enter Content her</label>
                                                <textarea type="text" id="feature_desc3" name="feature_desc3"  placeholder="Enter Feature Content"  class="form-control"><?php  echo $feature_desc3; ?> </textarea>
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_background3">Enter Color Code</label>
                                                <input type="text" id="feature_background3" name="feature_background3" value="<?php  echo $feature_background3; ?>" placeholder="Enter background color code her" class="form-control">
                                            </div>

                                            <div class = "form-group">
                                            <label for="feature_icon3" class="form-label">Select You Icon  <span style="color: red;">*</span></label>
                                            <input type="file" id="feature_icon3" name="feature_icon3" class="form-control" accept="image/*"  style="cursor:pointer">
                                                <div class="existing_icon">
                                                    <img src="<?php echo base_url('backend/media/feature_icons/icon3/'.$feature_icon3);?>" class="user-image img-responsive" alt="Existing Icon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>

                                    </div>
                                    
                                    <div class="modal-footer">
                                            <button type="submit" id="btnUpdateFeatures" name="btnUpdateFeatures" class="btn btn-success">Save Changes</button>
                                            </div>

								</div>
							</div>
                            </div>

							<?php echo form_close(); ?>
                        
                </div>
                <div class="tab-pane" id="tab_3">

                            <?php echo form_open_multipart(base_url('creative/admin/updateProfiler/index/key/'.$session_key),array('class' => 'updateProfiler')); ?>
          					<div class="box box-info">
								<div class="box-body">
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col-sm-5">
                                        <h2> Display Profile Setting </h2>

                                        <div class="form-group">
                                                <div class="row">
                                                    <label for="display_profile" class="col-form-label">Select user to display profile  <span style="color: red;">*</span></label>

                                                    <select class="form-control" name="display_profile" id="display_profile">
                                                    <option value="">Select user_name</option>
                                                    <?php if (!empty($users) && is_array($users)): ?>
                                                        <?php foreach ($users as $user): ?>
                                                            <option value="<?php echo $user['user_name']; ?>"
                                                                <?php // if ($user['user_name'] == $selectedUserName) echo 'selected'; ?>>
                                                                <?php echo $user['user_name']; ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" id="btnUpdateProfiler" name="btnUpdateProfiler" class="btn btn-success">Save Changes</button>
                                            </div>

								</div>
							</div>
                            </div>

							<?php echo form_close(); ?>
                    </div>
                    <?php endif ?>
                </div>
        </div>
</div>
 </div>
 </div>
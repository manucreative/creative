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
						<li class="active"><a href="#tab_1" data-toggle="tab">Features</a></li>
						<li class="nave-link"><a href="#tab_2" data-toggle="tab">Favicon</a></li>
						<li class="nave-link"><a href="#tab_3" data-toggle="tab">App Logo</a></li>
						<li class="nave-link"><a href="#tab_4" data-toggle="tab">Email Settings</a></li>
						<li class="nave-link"><a href="#tab_5" data-toggle="tab">News and Tours</a></li>
						<li class="nave-link"><a href="#tab_6" data-toggle="tab">Home Page</a></li>
						<li class="nave-link"><a href="#tab_9" data-toggle="tab">Banner</a></li>
                        <!--<li><a href="#tab_7" data-toggle="tab">Color</a></li>-->
                        <!-- <li><a href="#tab_8" data-toggle="tab">Payment</a></li> -->
					</ul>
					<div class="tab-content">
          				<div class="tab-pane active" id="tab_1">


          					<?php echo form_open_multipart(base_url('creative/featureConfigForm'),array('class' => 'updateFeatures')); ?>
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
                                        
                                        <div class="modal-footer">
                                            <button type="submit" id="btnUpdateFeatures" name="btnUpdateFeatures" class="btn btn-success">Save Changes</button>
                                            </div>
                                            
                                    </div>
								</div>
							</div>
							<?php echo form_close(); ?>
                        </div>

                        
                    </div>
                </div>
        </div>
</div>
 </div>
 </div>
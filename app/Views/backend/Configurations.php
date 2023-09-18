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
						<li><a href="#tab_2" data-toggle="tab">Favicon</a></li>
						<li><a href="#tab_3" data-toggle="tab">General Content</a></li>
						<li><a href="#tab_4" data-toggle="tab">Email Settings</a></li>
						<li><a href="#tab_5" data-toggle="tab">News and Tours</a></li>
						<li><a href="#tab_6" data-toggle="tab">Home Page</a></li>
						<li><a href="#tab_9" data-toggle="tab">Banner</a></li>
                        <!--<li><a href="#tab_7" data-toggle="tab">Color</a></li>-->
                        <li><a href="#tab_8" data-toggle="tab">Payment</a></li>
					</ul>
					<div class="tab-content">
          				<div class="tab-pane active" id="tab_1">


          					<?php echo form_open_multipart(base_url('creative/configuration'),array('class' => 'form-horizontal')); ?>
          					<div class="box box-info">
								<div class="box-body">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <div class = "form-group">
                                                <input type="text" id="top_up_name" name="top_up_name" value="<?php // echo $top_up_name; ?>" placeholder="create Top Ups"  class="form-control">
                                                
                                            </div>

                                            <div class = "form-group">
                                                <input type="text" id="top_up_price" name="top_up_price" value="<?php // echo $top_up_price; ?>"  placeholder="Enter the Price"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                                <input type="number" id="top_up_qty" name="top_up_qty" value="<?php // echo $top_up_qty; ?>" placeholder="Enter the Qty" class="form-control">
                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-4">
                                            <div class = "form-group">
                                                <input type="text" id="top_up_name" name="top_up_name" value="<?php // echo $top_up_name; ?>" placeholder="create Top Ups"  class="form-control">
                                                
                                            </div>

                                            <div class = "form-group">
                                                <input type="text" id="top_up_price" name="top_up_price" value="<?php // echo $top_up_price; ?>"  placeholder="Enter the Price"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                                <input type="number" id="top_up_qty" name="top_up_qty" value="<?php // echo $top_up_qty; ?>" placeholder="Enter the Qty" class="form-control">
                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-4">
                                        <div class = "form-group">
                                                <input type="text" id="top_up_name" name="top_up_name" value="<?php // echo $top_up_name; ?>" placeholder="create Top Ups"  class="form-control">
                                                
                                            </div>

                                            <div class = "form-group">
                                                <input type="text" id="top_up_price" name="top_up_price" value="<?php // echo $top_up_price; ?>"  placeholder="Enter the Price"  class="form-control">
                                            </div>

                                            <div class = "form-group">
                                                <input type="number" id="top_up_qty" name="top_up_qty" value="<?php // echo $top_up_qty; ?>" placeholder="Enter the Qty" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" id="editTopUpsBtn" name="editTopUpsBtn" class="btn btn-success">Save Changes</button>
                                            </div>
                                        </div>
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
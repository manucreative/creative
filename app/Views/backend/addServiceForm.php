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
      <div class="col-sm-3">
      <div class="">
        <h2 class="modal-title" id="exampleModalLabel">Service Addition</h2>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
      <?php if($role === 'super_admin'):?>
        <a href="#"><button id="viewService" data-action="viewService" class="btn btn-danger">View All Service</button></a>
        <?php endif;?>
        <?php if($role === 'super_admin' || $role === 'admin'):?>
          <a href="#"><button id="viewMyServices" data-action="viewMyServices" class="btn btn-primary">Go to My Service</button></a>
        <?php endif?>
        </div>
      </div>

    </div>        

           


<?= form_open_multipart(base_url('creative/admin/addService/index/key/'.$session_key), ['class'=> 'serviceAddForm'])?>

      <div class="modal-body">
      <?php if(session('role') === 'super_admin'):?>
                    <div class="row">
                      <label for="role" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large;">USER ACTIVE?</span> <span style="color: red;">*</span></label>
                      <div class="col-sm-2">
                      <select class="form-control" name="activation_id" id="activation_id">
                          <option value="0" style="font-size:large; color:red;">Select Here</option>
                          <?php if (!empty($activations) && is_array($activations)): ?>
                              <?php foreach ($activations as $active): ?>
                                  <option value="<?php echo $active['activation_id']; ?>" style="font-size:large; color:red;">
                                      <span><?php echo $active['activation_name']; ?></span>
                                  </option>
                              <?php endforeach ?>
                          <?php endif ?>
                      </select>
                  </div>
              </div>
          <?php endif ?>
      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_title" class="col-sm-3 col-form-label" style="text-align: end;">Service Title Entry  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="service_title" name="service_title" value="<?= old('service_title') ?>" placeholder="Enter Slider Content" class="form-control">
                <input type="hidden" id="service_key" name="service_key" value="<?= $service_key ?>"class="form-control">
                <input type="hidden" id="owner" name="owner" value="<?= $admin_id ?>" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_short_content" class="col-sm-3 col-form-label" style="text-align: end;">Enter Service Short Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="service_short_content" name="service_short_content"  placeholder="Enter Slider main Content" class="form-control"><?= old('service_short_content') ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_main_content" class="col-sm-3 col-form-label" style="text-align: end;"> Enter Your service Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="service_main_content" name="service_main_content"  placeholder="Enter Slider description Content" class="form-control"><?= old('service_main_content') ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_img" class="col-sm-3 col-form-label" style="text-align: end;">Select The Service Image  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
          <input type="file" id="service_img" name="service_img" class="form-control" accept="image/*"  style="cursor:pointer">
      </div>
      <div class="col-sm-3"></div>
      </div>
      </div>

      </div>
      <div>
        <button type="submit" value="" style="width: 100%; font-weight:700" id="addServiceBtn" name="addServiceBtn" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp; Save Service</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>
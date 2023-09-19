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
        <h2 class="modal-title" id="exampleModalLabel">Service Update form</h2>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
      <!-- <a href="#"><button id="btnDeleteService" data-action="btnDeleteService" class="btn btn-danger"><i class="fa fa-trash"></i>Delete Services</button></a> -->
        <a href="#"><button id="viewService" data-action="viewService" class="btn btn-primary">View All Service</button></a>
        </div>
      </div>

    </div>        

           


<?= form_open_multipart(base_url('creative/updateService'), ['class'=> 'serviceUpdateForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_title" class="col-sm-3 col-form-label" style="text-align: end;">Service Title Entry  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="service_title" name="service_title" value="<?= $service_title ?>" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_short_content" class="col-sm-3 col-form-label" style="text-align: end;">Enter or Update Short Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="service_short_content" name="service_short_content"  class="form-control"><?= $service_short_content ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="service_main_content" class="col-sm-3 col-form-label" style="text-align: end;"> Enter or update service Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="service_main_content" name="service_main_content"   class="form-control"><?= $service_main_content ?></textarea>
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
      <div class="col-sm-3">
        <div class="existing_img">
            <h2>Existing Service Image</h2>
            <img src="<?php echo base_url('backend/media/service_images/'.$service_img);?>" alt="service_image">
        </div>
      </div>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" value="" id="editServiceBtn" name="editServiceBtn" class="btn btn-success"><i class="btn btn-success btn-lg"></i>Update Service</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>
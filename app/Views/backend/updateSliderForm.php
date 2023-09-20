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
        <h5 class="modal-t" id="exampleModalLabel">Update The slider Content</h5>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
        <a href="#"><button id="btnViewSliders" data-action="btnViewSliders" class="btn btn-primary">View All Sliders</button></a>
        </div>
      </div>

    </div>



<?= form_open_multipart(base_url('creative/updateSlider'), ['class'=> 'sliderUpdateForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="sub_header" class="col-sm-3 col-form-label" style="text-align: end;">Top Slider sub heading Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="sub_header" name="sub_header" value="<?php echo $sub_header; ?>" placeholder="Enter Slider Content" class="form-control">
                <input type="hidden" id="slider_id" name="slider_id" value="<?php echo $slider_id; ?>">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="main_header" class="col-sm-3 col-form-label" style="text-align: end;">Top Slider main heading Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="main_header" name="main_header" value="<?php echo $main_header; ?>" placeholder="Enter Slider main Content" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="short_desc" class="col-sm-3 col-form-label" style="text-align: end;"> Slider description Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="short_desc_slider" name="short_desc" placeholder="Enter Slider short Content" class="form-control"><?php echo $short_desc; ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="btn_mssage" class="col-sm-3 col-form-label" style="text-align: end;"> Slider Button Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="btn_mssage" name="btn_mssage" value="<?php echo $btn_mssage;?>" placeholder="Enter Slider button Content" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>


        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="slider_img" class="col-sm-3 col-form-label" style="text-align: end;">Select Slider Banner Image  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
          <input type="file" id="slider_img" name="slider_img" class="form-control" accept="image/*"  style="cursor:pointer">
      </div>
      <div class="col-sm-3">
      <div class="existing_img">
            <h2>Existing Slider Image</h2>
            <img src="<?php echo base_url('backend/media/slider_images/'.$slider_img);?>" alt="slider_image" class ='img-fluid' height='150' width='150'>
        </div>
      </div>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" value="" id="updateSliderBtn" name="updateSliderBtn" class="btn btn-success">Save Slider</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>

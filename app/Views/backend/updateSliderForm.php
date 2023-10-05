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
        <h2><?php echo $title;?></h2>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
      <a href="#"><button id="btnAddSlider" data-action="btnAddSlider" class="btn btn-danger">Add Slider</button></a>
        <a href="#"><button id="viewSliders" data-action="viewSliders" class="btn btn-primary">View All Sliders</button></a>
        </div>
      </div>

    </div>



<?= form_open_multipart(base_url('creative/admin/updateSlider/index/key/'.$session_key), ['class'=> 'sliderUpdateForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="sub_header" class="col-sm-3 col-form-label" style="text-align: end;">Top Slider sub heading Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="sub_header" name="sub_header" value="<?php echo $sub_header; ?>" class="form-control">
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
                <input type="text" id="main_header" name="main_header" value="<?php echo $main_header; ?>" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="short_desc" class="col-sm-3 col-form-label" style="text-align: end;"> Slider description Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="short_desc_slider" name="short_desc" class="form-control"><?php echo $short_desc; ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="btn_mssage" class="col-sm-3 col-form-label" style="text-align: end;"> Slider Button Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="btn_mssage" name="btn_mssage" value="<?php echo $btn_mssage;?>" class="form-control">
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
        <button type="submit" value="" style="width: 100%; font-weight:700" id="sliderUpdateForm" name="updateSliderBtn" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp; YES RUN UPDATE NOW</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>

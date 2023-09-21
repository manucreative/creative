<br>
 <div id="page-wrapper" >
            <div id="my-page-inner">
              
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
    
                <!-- <div class="row">
                    <div class="col-md-4">
                     <h2>Creative Dashboard</h2>   
                        <h5>Welcome Emmanuel, Good to see you back. </h5>
                    </div>
                </div>   -->
                <div class="row">
      <div class="col-sm-3">
      <div class="">
        <h5 class="modal-t" id="exampleModalLabel">Add The slider Content</h5>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
        <a href="#"><button id="viewSliders" data-action="viewSliders" class="btn btn-primary">View All Sliders</button></a>
        </div>
      </div>

    </div>
</div>            

            <div id="page-inner">


<?= form_open_multipart(base_url('creative/addSliderAction'), ['class'=> 'sliderAddForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="sub_header" class="col-sm-3 col-form-label" style="text-align: end;">Top Slider sub heading Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="sub_header" name="sub_header" value="<?= old('sub_header') ?>" placeholder="Enter Slider Content" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="main_header" class="col-sm-3 col-form-label" style="text-align: end;">Top Slider main heading Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="main_header" name="main_header" value="<?= old('main_header') ?>" placeholder="Enter Slider main Content" class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="short_desc" class="col-sm-3 col-form-label" style="text-align: end;"> Slider description Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="short_desc_slider" name="short_desc" placeholder="Enter Slider description Content" class="form-control"><?= old('short_desc') ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="btn_mssage" class="col-sm-3 col-form-label" style="text-align: end;"> Slider Button Content  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="btn_mssage" name="btn_mssage" value="<?= old('btn_mssage') ?>" placeholder="Enter Slider button Content" class="form-control">
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
      <div class="col-sm-3"></div>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" value=""style="width: 100%; font-weight:700" id="addSliderBtn" name="addSliderBtn" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp; YES SAVE THE SLIDER</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>
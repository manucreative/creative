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
        <h2 class="modal-title" id="exampleModalLabel">Article/Blog Addition</h2>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
      <?php if($role === 'super_admin'):?>
        <a href="#"><button id="viewAllArticles" data-action="viewAllArticles" class="btn btn-danger">View All Articles</button></a>
        <?php endif;?>
        <?php if($role === 'super_admin' || $role === 'admin'):?>
          <a href="#"><button id="viewMyArticles" data-action="viewMyArticles" class="btn btn-primary">Go to My Articles</button></a>
        <?php endif?>
        </div>
      </div>

    </div>

<?= form_open_multipart(base_url('creative/admin/addArticle/index/key/'.$session_key), ['class'=> 'articleAddForm'])?>

      <div class="modal-body">
      <?php if(session('role') === 'super_admin'):?>
                    <div class="row">
                      <label for="activation_id" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large;">ARTICLE ACTIVE?</span> <span style="color: red;">*</span></label>
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
        <div class="row validate_input" data-validate="This field cannot be Empty">
        <div class="col-sm-1"></div>
            <label for="article_title" class="col-sm-3 col-form-label" style="text-align: end;">Article Title Entry <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="article_title" name="article_title" value="<?= old('article_title') ?>" placeholder="Enter Article Title" class="form-control myInput">
                <input type="hidden" id="article_key" name="article_key" value="<?php echo $article_key ?>"class="form-control">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
    <div class="row validate_input" data-validate="This field cannot be Empty">
        <div class="col-sm-1"></div>
            <label for="short_content" class="col-sm-3 col-form-label" style="text-align: end;">Enter Article Short Content <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="myArticles" name="short_content"  placeholder="Enter Article Short Content" class="form-control myInput"><?= old('short_content') ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
    <div class="row validate_input" data-validate="This field cannot be Empty">
        <div class="col-sm-1"></div>
            <label for="article_content" class="col-sm-3 col-form-label" style="text-align: end;">Enter Article main Content <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <textarea type="text" id="myArticles" name="article_content"  placeholder="Enter Article Content" class="form-control myInput"><?= old('article_content') ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
           <div class="row">
        <div class="col-sm-1"></div>
            <label for="cat_id" class="col-sm-3 col-form-label text-right">Select Article Categories  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Select role">
            <select class="form-control myInput" name="cat_id" id="category">
                <option value="">Select Category</option>
                <?php if (!empty($categories) && is_array($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['cat_id']; ?>"
                            <?php if (old('role') == $category['cat_id']) echo 'selected'; ?>>
                            <?php echo $category['cat_name']; ?>
                        </option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </div>
        <div class="col-sm-3"></div>
      </div>
      </div>

        <div class = "form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="article_img" class="col-sm-3 col-form-label" style="text-align: end;">Select The Service Image  <span style="color: red;">*</span></label>
            <div class="col-sm-5">
          <input type="file" id="article_img" name="article_img" class="form-control" accept="image/*"  style="cursor:pointer">
      </div>
      <div class="col-sm-3"></div>
      </div>
      </div>

      </div>
      <div>
        <button type="submit" value="" style="width: 100%; font-weight:700" id="addArticleBtn" name="addArticleBtn" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp; Save Others</button>
      </div>
  <?= form_close() ?>
</div>
</div>
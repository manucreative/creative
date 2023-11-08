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
        <h2 class="modal-title" id="exampleModalLabel">Article/Blog Update</h2>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
      <?php if($role === 'super_admin'):?>
        <a href="#"><button id="viewArticle" data-action="viewArticle" class="btn btn-danger">View All Articles</button></a>
        <?php endif;?>
        <?php if($role === 'super_admin' || $role === 'admin'):?>
          <a href="#"><button id="viewMyArticles" data-action="viewMyArticles" class="btn btn-primary">Go to My Articles</button></a>
          <a href="#" id="btnAddArticle" data-action="btnAddArticle" class='btn btn-info'><i class="fa fa-plus"></i>&nbsp; Add Article</a>
        <?php endif?>
        </div>
      </div>

    </div>

<?= form_open_multipart(base_url('creative/admin/updateArticle/index/key/'.$session_key), ['class'=> 'articleEditForm'])?>

      <div class="modal-body">
      <div class="row" >
                        <label for="role" class="col-sm-4 col-form-label text-right"><span style="font-size:x-large; color:<?php echo $currentActivationId === '1' ? 'blue;' : 'red;'; ?>"><?php echo $currentActivationId === '1' ? 'Article is enabled' : 'Article is disabled'; ?></span> <span style="color: red;">*</span></label>
                        <div class="col-sm-2">
                            <input type="hidden" name="defaultActivation" id="defaultActivation" value="<?php echo $currentActivationId?>">
                        <select style="border:<?php echo $currentActivationId === '1' ? 'solid 2px blue;': 'solid 2px red;'?>" class="form-control" name="activation_id" id="activation_id" <?php if (session('role') !== 'super_admin') echo 'disabled'; ?>>
 
                        <option value="<?php echo $currentActivationId?>" style="font-size:large;">Might be disabled</option>
                            <?php if (!empty($activations) && is_array($activations)): ?>
                                <?php foreach ($activations as $active): ?>
                                    <option style="font-size:large; color:<?php echo $currentActivationId === '1' ? 'blue;': 'red;'?>" value="<?php echo $active['activation_id']; ?>"
                                    <?php echo ($active['activation_id'] == $currentActivationId) ? 'selected' : ''; ?>>

                                        <span><?php echo $active['activation_name']; ?></span>
                                    </option>
                                <?php endforeach ?>
                                 <?php endif ?>
                        </select>
                    </div>
                </div>
                <hr>
      <div class="form-group">
        <div class="row validate_input" data-validate="This field cannot be Empty">
        <div class="col-sm-1"></div>
            <label for="article_title" class="col-sm-3 col-form-label" style="text-align: end;">Existing Title Entry <span style="color: red;">*</span></label>
            <div class="col-sm-5">
                <input type="text" id="article_title" name="article_title" value="<?php echo $article_title; ?>" class="form-control myInput">
                <input type="hidden" id="article_key" name="article_key" value="<?php echo $article_key ?>">
                <input type="hidden" id="article_id" name="article_id" value="<?php echo $article_id ?>">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
    <div class="validate_input" data-validate="This field cannot be Empty">
            <label for="short_content" class="col-form-label" style="text-align: end;">Existing Article Short Content <span style="color: red;">*</span></label>
                <textarea type="text" id="myArticles" name="short_content" class="form-control myInput"><?php echo $short_content; ?></textarea>
            </div>
        </div>

    <div class="form-group">
    <div class="validate_input" data-validate="This field cannot be Empty">
            <label for="article_content" class="col-form-label" style="text-align: end;">Existing Article main Content <span style="color: red;">*</span></label>
                <textarea type="text" id="mainUpdateArticle" name="article_content" class="form-control myInput"><?php echo $article_content; ?></textarea>

        </div>
    </div>

    <div class="form-group">
           <div class="row">
        <div class="col-sm-1"></div>
            <label for="role" class="col-sm-4 col-form-label text-right">Select Article Categories  <span style="color: red;">*</span></label>
            <div class="col-sm-4 validate_input" data-validate = "Select role">
            <select class="form-control myInput" name="cat_id" id="category">
                <option value="">Select Category</option>
                <?php if (!empty($categories) && is_array($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['cat_id']; ?>"
                        <?php echo ($category['cat_id'] == $currentCatId) ? 'selected' : ''; ?>>
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
            <label for="article_img" class="col-sm-4 col-form-label" style="text-align: end;">Select The Service Image  <span style="color: red;">*</span></label>
            <div class="col-sm-4">
          <input type="file" id="article_img" name="article_img" class="form-control" accept="image/*"  style="cursor:pointer">
          <input type="hidden" id="existing_articleImg" name="existing_articleImg" value="<?php echo $article_img; ?>">
      </div>
      <div class="col-sm-3">
      <div class="existing_img">
            <h2>Existing Article Image</h2>
            <img src="<?php echo base_url('backend/media/article_images/'.$article_img);?>" alt="article_img" class ='img-fluid' height='150' width='150'>
        </div>
      </div>
      </div>
      </div>

      </div>
      <div>
        <button type="submit" value="" style="width: 100%; font-weight:700" id="articleEditForm" name="addArticleBtn" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp; Save Article</button>
      </div>
  <?= form_close() ?>
</div>
</div>
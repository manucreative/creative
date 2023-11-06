<br>
 <div id="page-wrapper" >
 <div id="page-inner">
  <div id="successMessage" style="text-align: center;"></div>
            <div class="card-body">
            <?php if (session()->getFlashdata('insert_success')): ?>
                      <div class="alert alert-success" id="flash-message">
                          <?= session()->getFlashdata('insert_success') ?>
                      </div>
            <?php endif; ?>


              <div class="row">
              <div class="col-sm-4">
                <div class="">
                <h4 class="modal-title"><?= $title?></h4>
                </div>
                  </div>
                  <div class="col-sm-8">
                  <div class="modal-footer">
                    <button class="btn btn-danger article_delete_btn" id="delete_selected_article"> <i class="fa fa-trash"></i>&nbsp; Delete Article</button>
                    <a href="#" id="btnAddArticle" data-action="btnAddArticle" class='btn btn-primary'><i class="fa fa-plus"></i>&nbsp; Add Article</a>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="article-listing" class="table">
                      <thead>
                    <tr>
                      <th><input id="check_all_services" type="checkbox"></th>
                      <th style="color:orange; font-weight:800;">No.</th>
                      <th style="color:orange; font-weight:800;">Article Title</th>
                      <th style="color:orange; font-weight:800;">Article Author</th>
                      <th style="color:orange; font-weight:800;">Shot Content</th>
                      <th style="color:orange; font-weight:800;">Main Content</th>
                      <th style="color:orange; font-weight:800;">Image</th>
                      <th style="color:orange; font-weight:800;">Date</th>
                      <th style="color:orange; font-weight:800;">updated at</th>
                      <th style="color:orange; font-weight:800;">Modified by?</th>
                      <th style="color:orange; font-weight:800;">Status</th>
                      <th style="color:orange; font-weight:800;">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($articles) && is_array($articles)): ?>
                        <?php foreach($articles as $article): ?>

                <tr>
                    <td><input type='checkbox' name='articles' value= <?php echo $article['article_id'];?> class='delete-checkbox'></td>
                    <td><?php echo  $i++ ?></td> 
                    <td><?php echo $article['article title'];?></td>
                    <td><?php echo $article['Author'];?></td>
                    <td><?php echo $article['short_content']; ?></td>
                    <td class="height: 5px"><?php echo $article['article_content']; ?></td>
                    <td><img src="<?php echo base_url('backend/media/article_images/'.$article['article_img']);?>"  class ='img-fluid' height='150' width='150'></td>
                    <td><?php echo $service['created_at']; ?></td>
                    <td><?php echo $service['updated_at']; ?></td>
                    <td><?php echo $service['modifier']; ?></td>
                    <td >
                    <button style="color: #fff; font-size: 18px; background-color:<?php echo $article['activation_name'] === 'active'? 'blue' : 'red;'?>" class="btn" ><?php echo $article['activation_name'];?></button>
                    </td>
                    <td>
                                <a class="btn btn-primary dropdown-item" href="<?php  echo base_url('creative/admin/updateServiceForm/index/key/'.$session_key.'/'.$article['article_key'].'?token=' . $token); ?>"><i class="fa fa-edit"></i>&nbsp; Edit Article</a>
                    </td>
                </tr>

                <?php endforeach?>
                <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
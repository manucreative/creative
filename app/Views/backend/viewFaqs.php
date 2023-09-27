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
                    <button class="btn btn-danger faq_delete_btn" id="delete_selected_faq"><i class="fa fa-bin"></i>&nbsp; Delete Faqs</button>
                    <a href="#" id="addFaqs" data-action="addFaqs" class='btn btn-primary'><i class="fa fa-plus"></i>&nbsp; Add FAQ</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                    <tr>
                      <th><input id="check_all_faqs" type="checkbox"></th>
                      <th style="color:orange; font-weight:800;">No.</th>
                      <th style="color:orange; font-weight:800;">Faq Question</th>
                      <th style="color:orange; font-weight:800;">faq Answer</th>
                      <th style="color:orange; font-weight:800;">Date</th>
                      <th style="color:orange; font-weight:800;">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($faqs) && is_array($faqs)): ?>
                        <?php foreach($faqs as $faq): ?>

                <tr>
                    <td><input type='checkbox' name='faqs' value= <?php echo $faq['faq_id'];?> class='delete-checkbox'></td>
                    <td><?php echo  $i++ ?></td> 
                    <td><?php echo $faq['faq_question'];?></td>
                    <td><?php echo $faq['faq_answer']; ?></td>
                    <td><?php echo $faq['created_at']; ?></td>
                    <td> <a class="btn btn-primary dropdown-item" href="<?php  echo base_url('creative/updateSliderForm/'.$faq['faq_id']); ?>"><i class="fa fa-edit"></i>&nbsp; Edit Sliders</a></td>
                        <!-- <div class="btn-group">

                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">

                            </div>
                        </div> -->
                    <!-- </td> -->

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
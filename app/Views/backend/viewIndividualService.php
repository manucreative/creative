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
                    <button class="btn btn-danger service_delete_btn" id="delete_selected_services"> <i class="fa fa-trash"></i>&nbsp; Delete Service</button>
                    <a href="#" id="btnAddService" data-action="btnAddService" class='btn btn-primary'><i class="fa fa-plus"></i>&nbsp; Add Service</a>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                    <tr>
                      <th><input id="check_all_services" type="checkbox"></th>
                      <th style="color:orange; font-weight:800;">No.</th>
                      <th style="color:orange; font-weight:800;">Service Title</th>
                      <th style="color:orange; font-weight:800;">Service Owner</th>
                      <th style="color:orange; font-weight:800;">Shot Content</th>
                      <th style="color:orange; font-weight:800;">Main Content</th>
                      <th style="color:orange; font-weight:800;">Image</th>
                      <th style="color:orange; font-weight:800;">Date</th>
                      <th style="color:orange; font-weight:800;">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(!empty($services) && is_array($services)): ?>
                        <?php  foreach($services as $service): ?>

                <tr>
                    <td><input type='checkbox' name='services' value= <?php echo $service['service_id'];?> class='delete-checkbox'></td>
                    <td><?php echo  $i++ ?></td>
                    <td><?php echo $service['service_title'];?></td>
                    <td><?php echo $service['first_name'];?></td>
                    <td><?php echo $service['service_short_content']; ?></td>
                    <td class="height: 5px"><?php echo $service['service_main_content']; ?></td>
                    <td><img src="<?php echo base_url('backend/media/service_images/'.$service['service_img']);?>"  class ='img-fluid' height='150' width='150'></td>
                    <td><?php echo $service['created_at']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="btn btn-primary dropdown-item" href="<?php  echo base_url('creative/admin/updateServiceForm/index/key/'.$session_key.'/'.$service['service_key'].'?token=' . $token); ?>"><i class="fa fa-edit"></i>&nbsp; Edit Service</a>
                            </div>
                        </div>
                    </td>

                </tr>

                <?php  endforeach?>
                <?php  endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
 </div>
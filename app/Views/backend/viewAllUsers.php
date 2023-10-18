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
                    <button class="btn btn-danger admin_delete_btn" id="delete_selected_admins"><i class="fa fa-trash"></i>&nbsp; Delete Admins</button>
                    <a href="#" id="addAdmin" data-action="addAdmin" class='btn btn-primary'><i class="fa fa-plus"></i>&nbsp; Add admin</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                    <tr>
                      <th><input id="check_all_admins" type="checkbox"></th>
                      <th style="color:orange; font-weight:800;">No.</th>
                      <th style="color:orange; font-weight:800;">Names</th>
                      <th style="color:orange; font-weight:800;">user_name</th>
                      <th style="color:orange; font-weight:800;">Title</th>
                      <th style="color:orange; font-weight:800;">Email</th>
                      <th style="color:orange; font-weight:800;">Phone</th>
                      <th style="color:orange; font-weight:800;">Role</th>
                      <th style="color:orange; font-weight:800;">Image</th>
                      <th style="color:orange; font-weight:800;">date</th>
                      <th style="color:orange; font-weight:800;">Status</th>
                      <th style="color:orange; font-weight:800;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($admins) && is_array($admins)): ?>
                        <?php foreach($admins as $admin): ?>

                <tr>
                    <td><input type='checkbox' name='admins' value= <?php echo $admin['admin_id'];?> class='delete-checkbox'></td>
                    <td><?php echo $i++ ?></td> 
                    <td><?php echo $admin['first_name'].''.$admin['last_name'];?></td>
                    <td><?php echo $admin['user_name']; ?></td>
                    <td><?php echo $admin['personal_title']; ?></td>
                    <td><?php echo $admin['email_address']; ?></td>
                    <td><?php echo $admin['telephone']; ?></td>
                    <td><?php echo $admin['role_name']; ?></td>
                    <td><img src="<?php echo base_url('backend/media/admin_images/'.$admin['avatar']);?>"  class ='img-fluid' height='150' width='150'></td>
                    <td><?php echo $admin['created_at']; ?></td>
                    <td>
                    <button  class="btn btn-sm" style="color: #fff; font-size: 18px; background-color:<?php echo $admin['activation_name'] === 'active'? 'blue;': 'red;'?>" ><?php echo $admin['activation_name'];?></button>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="btn btn-primary dropdown-item" href="<?php  echo base_url('creative/admin/updateUserForm/index/key/'.$session_key.'/'.$admin['adminToken']);?>"><i class="fa fa-edit"></i>&nbsp; Edit Sliders</a>
                            </div>
                        </div>
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
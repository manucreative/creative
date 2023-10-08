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
                    <button class="btn btn-danger slider_delete_btn" id="delete_selected_sliders"><i class="fa fa-trash"></i>&nbsp; Delete Sliders</button>
                    <a href="#" id="btnAddSlider" data-action="btnAddSlider" class='btn btn-primary'><i class="fa fa-plus"></i>&nbsp; Add Slider</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                    <tr>
                      <th><input id="check_all_sliders" type="checkbox"></th>
                      <th style="color:orange; font-weight:800;">No.</th>
                      <th style="color:orange; font-weight:800;">Sub heading</th>
                      <th style="color:orange; font-weight:800;">Mani Heading</th>
                      <th style="color:orange; font-weight:800;">Slider Content</th>
                      <th style="color:orange; font-weight:800;">Slider Button</th>
                      <th style="color:orange; font-weight:800;">Date</th>
                      <th style="color:orange; font-weight:800;">Banner</th>
                      <th style="color:orange; font-weight:800;">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($sliders) && is_array($sliders)): ?>
                        <?php foreach($sliders as $slider): ?>

                <tr>
                    <td><input type='checkbox' name='sliders' value= <?php echo $slider['slider_id'];?> class='delete-checkbox'></td>
                    <td><?php echo  $i++ ?></td> 
                    <td><?php echo $slider['sub_header'];?></td>
                    <td><?php echo $slider['main_header']; ?></td>
                    <td class="height: 5px"><?php echo $slider['short_desc']; ?></td>
                    <td><?php echo $slider['btn_mssage']; ?></td>
                    <td><?php echo $slider['created_at']; ?></td>
                    <td><img src="<?php echo base_url('backend/media/slider_images/'.$slider['slider_img']);?>"  class ='img-fluid' height='150' width='150'></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="btn btn-primary dropdown-item" href="<?php  echo base_url('creative/admin/updateSliderForm/index/key/'.$session_key.'/'.$slider['slider_id'].'?token=' . $token); ?>"><i class="fa fa-edit"></i>&nbsp; Edit Sliders</a>
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

<div class="row">
                  <div class="panel panel-default panel-shadow" data-collapsed="0" style="width: 80%; margin-left: 19px;">
                      <div class="panel-heading">
                          <div class="panel-title"><?php echo get_phrase('Fee Category Details');?></div>
                      </div>
                      <div class="panel-body">
                        <?php echo form_open(base_url() . 'index.php?admin/fees_category/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

                        <div class="form-group">
                          <label class="col-sm-3 control-label"><?php echo get_phrase('Fees Category');?></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="fees_category_name" id="fees_category_name"
                                  data-validate="required" data-message-required="<?php echo get_phrase('Type name');?>"/>
                          </div>
                      </div>



                      <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

                        <div class="col-sm-5">
                          <select name="class_id" class="form-control" data-validate="required" id="class_id"
                            data-message-required="<?php echo get_phrase('value_required');?>"
                              onchange="return get_class_sections(this.value)">
                                          <option value=""><?php echo get_phrase('select');?></option>
                                          <?php
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row):
                              ?>
                                            <option value="<?php echo $row['class_id'];?>">
                                  <?php echo $row['name'];?>
                                                        </option>
                                            <?php
                            endforeach;
                            ?>
                                      </select>
                        </div>
                      </div>

                          <div class="form-group" style="clear:both;">
                              <label class="col-sm-3 control-label"><?php echo get_phrase('Amount');?></label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="fees_category_amount"
                                        data-validate="required" data-message-required="<?php echo get_phrase('fees_category_amount');?>"/>
                              </div>
                          </div>

                          <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                    <button type="submit" class="btn btn-info"><?php echo get_phrase('Add Fees Category');?></button>
                  </div>
                </div>
          <?php echo form_close();?>
                      </div>
                  </div>
              </div>

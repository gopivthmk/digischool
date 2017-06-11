<div class="row">
	<div class="col-md-8" style="width:100%">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('addmission_form');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('parent');?></label>

						<div class="col-sm-5">
							<span style="width:50%; float:left;">
							<select name="parent_id"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="<?php echo $row['parent_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
												</span>
												<span style="float: left; width: 50%; margin-left: -55px; margin-top: 10px;">
													<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_parent_add/');"
															class="btn btn-primary pull-right">
															<i class="entypo-plus-circled"></i>
															<?php echo get_phrase('add_new_parent');?>
															</a>
														</span>
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

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
		                    <div class="col-sm-5">
		                        <select name="section_id"
														data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
														class="form-control" id="section_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>

			                    </select>
			                </div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>

						<div class="col-sm-5">
							<select name="sex"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							class="form-control selectboxit">
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="male"><?php echo get_phrase('male');?></option>
															<option value="female"><?php echo get_phrase('female');?></option>
													</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Aadhar Number');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="aadhar_number" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="roll" value="" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							name="blood_group" value="" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							name="birthday" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationlaity');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="nationality"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							value="" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('caste / community');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="caste"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							value="" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Mode of transport');?></label>

						<div class="col-sm-5">
							<!--<input type="text" class="form-control" name="transport" value="" data-start-view="2">-->
							<select name="transport" class="form-control" id="transport">
								<option value=""><?php echo get_phrase('select');?></option>
								<?php
	$transport = $this->db->get('transport_type')->result_array();
	foreach($transport as $row):
		?>
									<option value="<?php echo $row['transport_type_id'];?>">
				<?php echo $row['transport_type'];?>
															</option>
									<?php
	endforeach;
	?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('concession');?></label>

						<div class="col-sm-5">
							<select name="concession_master_id" class="form-control" id="concession_master_id">

                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php
								$classes = $this->db->get('concession_master')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['concession_master_id'];?>">
											<?php echo $row['concession_name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Personal Identification Mark');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="PIM" value="" data-start-view="2"><br/>
							<input type="text" class="form-control" name="PIM1" value="" data-start-view="2">
							<!--< name="PIM" id="PIM" class="form-control"></textarea>-->
							<span id="validation-length" style="color:red;font-weight:bold;margin-left: 0px;margin-top: 10px;float: left;"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Medications');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="medications" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Admission No');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="admission_no" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Date of Admission');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="date_of_admission"
							value="<?php echo date('m/d/Y'); ?>" data-start-view="3">
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('Father / Guardian name');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="father_name" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('Mother name');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="mother_name" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('Father / Guardian Mobile');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="father_mobile" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('Mother Mobile');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="mother_mobile" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('Date of TC');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="tc_date" value="" data-start-view="2">
						</div>
					</div>-->

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Status');?></label>

						<div class="col-sm-5">
							<select name="status" class="form-control selectboxit">
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="male"><?php echo get_phrase('Active');?></option>
															<option value="female"><?php echo get_phrase('TC');?></option>
													</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('EMINS No');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="emins_no" value="" data-start-view="2">
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('address');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="" >
						</div>
					</div>-->

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('phone');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="" >
						</div>
					</div>-->

					<!--<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php //echo get_phrase('email');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email"
							 value="">
						</div>
					</div>-->

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('password');?></label>

						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" >
						</div>
					</div>-->

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('dormitory');?></label>

						<div class="col-sm-5">
							<select name="dormitory_id" class="form-control selectboxit">
                              <option value=""><?php //echo get_phrase('select');?></option>
	                              <?php
	                              	//$dormitories = $this->db->get('dormitory')->result_array();
	                              	//foreach($dormitories as $row):
	                              ?>
                              		<option value="<?php //echo $row['dormitory_id'];?>"><?php //echo $row['name'];?></option>
                          		<?php //endforeach;?>
                          </select>
						</div>
					</div>-->

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('transport_route');?></label>

						<div class="col-sm-5">
							<select name="transport_id" class="form-control selectboxit">
                              <option value=""><?php //echo get_phrase('select');?></option>
	                              <?php
	                              	//$transports = $this->db->get('transport')->result_array();
	                              	//	foreach($transports as $row):
	                              ?>
                              		<option value="<?php //echo $row['transport_id'];?>"><?php //echo $row['route_name'];?></option>
                          		<?php //endforeach;?>
                          </select>
						</div>
					</div>-->

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('add_student');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <!--<div class="col-md-4">
		<blockquote class="blockquote-blue">
			<p>
				<strong>Student Admission Notes</strong>
			</p>
			<p>
				Admitting new students will automatically create an enrollment to the selected class in the running session.
				Please check and recheck the informations you have inserted because once you admit new student, you won't be able
				to edit his/her class,roll,section without promoting to the next session.
			</p>
		</blockquote>
	</div>-->

</div>

<script type="text/javascript">

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }
		$(document).ready(function() {
			$('#PIM').on('keyup', function(e) {
				var tval = $(this).val(),
				tlength = tval.length,
				set = 200,
				remain = parseInt(set - tlength);
				$('#validation-length').css('style', 'color:green');
				$('#validation-length').text("You have total characters remains "+ remain);
				if (remain <= 0 ) {
				    $(this).val((tval).substring(0, tlength - 1))
						$('#validation-length').css('style', 'color:red');
						$('#validation-length').text("You have reached the character limit.");
				}
			})
		});

</script>

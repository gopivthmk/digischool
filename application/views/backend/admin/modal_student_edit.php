<?php
$edit_data		=	$this->db->get_where('enroll' , array(
	'student_id' => $param2 , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
))->result_array();

//print_r($edit_data);

$student_data = $this->db->get_where('student' , array(
	'student_id' => $param2
))->result_array();
//print_r($student_data);
foreach ($edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_student');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/student/do_update/'.$row['student_id'].'/'.$row['class_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
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
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
								value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('parent');?></label>

						<div class="col-sm-5">
							<span style="width:100%; float:left;">
							<select name="parent_id"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							class="form-control select2">
															<option value=""><?php echo get_phrase('select');?></option>
															<?php
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $rowinner):

									if($student_data[0]['parent_id'] == $rowinner['parent_id']){
									?>
																<option value="<?php echo $rowinner['parent_id'];?>" selected="selected">
										<?php echo $rowinner['name'];?>
																		</option>
																<?php
															} else{
															?>
															<option value="<?php echo $rowinner['parent_id'];?>" >
									<?php echo $rowinner['name'];?>
																	</option>
															<?php
														}
								endforeach;
								?>
													</select>
												</span>
												<span style="float: left; margin-top: 10px;">
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
								foreach($classes as $rowinner):
									if($rowinner['class_id'] == $row['class_id']){
									?>
																<option value="<?php echo $rowinner['class_id'];?>" selected="selected">
											<?php echo $rowinner['name'];?>
																						</option>
																<?php
															}else {
															?>
															<option value="<?php echo $rowinner['class_id'];?>" >
										<?php echo $rowinner['name'];?>
																					</option>
															<?php
														}
								endforeach;
								?>
													</select>
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('section');?></label>
		                    <div class="col-sm-5">
		                        <select name="section_id"
														data-validate="required" data-message-required="<?php //echo get_phrase('value_required');?>"
														class="form-control" id="section_selector_holder">
		                            <option value=""><?php //echo get_phrase('select_class_first');?></option>

			                    </select>
			                </div>
					</div>-->




					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>

						<div class="col-sm-5">
							<select name="sex" class="form-control selectboxit">
							<?php
								$gender = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->sex;

							?>
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="male" <?php if($gender == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
															<option value="female"<?php if($gender == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
													</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Aadhar Number');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="aadhar_number"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->aadhar_card_no; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="roll"
								value="<?php echo $row['roll'];?>">
						</div>
					</div>

										<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="birthday"
								value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday; ?>"
									data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationlaity');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="nationality"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->nationality; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('caste / community');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="caste"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->caste_community; ?>"
							data-start-view="2">
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
	foreach($transport as $rows):
		if($rows['transport_type_id'] == $student_data[0]['transport_id']){
		?>
									<option value="<?php echo $rows['transport_type_id'];?>" selected="selected">
				<?php echo $rows['transport_type'];?>
															</option>
<?php } else {?>
															<option value="<?php echo $rows['transport_type_id'];?>">
										<?php echo $rows['transport_type'];?>
																					</option>
									<?php
								}
	endforeach;
	?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('concession');?></label>

						<div class="col-sm-5">
							<select name="concession_master_id" class="form-control" data-validate="required" id="concession_master_id"
								data-message-required="<?php echo get_phrase('value_required');?>">
															<option value=""><?php echo get_phrase('select');?></option>
															<?php
								$classes = $this->db->get('concession_master')->result_array();
								$concession_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->concession_master_id;
								foreach($classes as $row):

									if($row['concession_master_id'] == $concession_id){
									?>
																<option value="<?php echo $row['concession_master_id'];?>" selected="selected">
											<?php echo $row['concession_name'];?>
																						</option>
																<?php
															}else{
															?>
															<option value="<?php echo $row['concession_master_id'];?>">
										<?php echo $row['concession_name'];?>
																					</option>
															<?php }
								endforeach;
								?>
													</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Personal Identification Mark');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="PIM"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->personal_identification_number; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Medications');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="medications"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->medications; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Admission No');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="admission_no"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->admission_no; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Date of Admission');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" disabled="disabled" name="admission_date"
							value="<?php echo date('m/d/Y H:i:s', strtotime($this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->admission_date)); ?>"
							data-start-view="2">
						</div>
					</div>


					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Status');?></label>

						<div class="col-sm-5">
							<?php
								$status = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->status;
							?>
							<select name="status" class="form-control selectboxit">
															<option value=""><?php echo get_phrase('select');?></option>
															<option value="<?php echo get_phrase('Active');?>" <?php if($status == 'Active') echo "selected"; ?>><?php echo get_phrase('Active');?></option>
															<option value="<?php echo get_phrase('TC');?>" <?php if($status == 'TC') echo "selected"; ?>><?php echo get_phrase('TC');?></option>
													</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('EMINS No');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="emins_no"
							value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->emins_no; ?>"
							data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="address"
								value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address; ?>" >
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('phone');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone"
								value="<?php //echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone; ?>" >
						</div>
					</div>-->

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email"
								value="<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email; ?>">
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('dormitory');?></label>

						<div class="col-sm-5">
							<select name="dormitory_id" class="form-control selectboxit">
                              <option value=""><?php //echo get_phrase('select');?></option>
	                              <?php
	                              	//$dorm_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->dormitory_id;
	                              	//$dormitories = $this->db->get('dormitory')->result_array();
	                              	//foreach($dormitories as $row2):
	                              ?>
                              		<option value="<?php //echo $row2['dormitory_id'];?>"
                              			<?php //if($dorm_id == $row2['dormitory_id']) echo 'selected';?>><?php //echo $row2['name'];?></option>
                          		<?php //endforeach;?>
                          </select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('transport_route');?></label>

						<div class="col-sm-5">
							<select name="transport_id" class="form-control selectboxit">
                              <option value=""><?php //echo get_phrase('select');?></option>
	                              <?php
	                              	//$trans_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->transport_id;
	                              	//$transports = $this->db->get('transport')->result_array();
	                              	//foreach($transports as $row2):
	                              ?>
                              		<option value="<?php //echo $row2['transport_id'];?>"
                              			<?php //if($trans_id == $row2['transport_id']) echo 'selected';?>><?php //echo $row2['route_name'];?></option>
                          		<?php// endforeach;?>
                          </select>
						</div>
					</div>-->

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_student');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?><script>
function get_class_sections(class_id) {

		$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
					success: function(response)
					{
							jQuery('#section_selector_holder').html(response);
					}
			});

	}
</script>

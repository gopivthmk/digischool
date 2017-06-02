<div class="row">
	<div class="col-md-8" style="width:100%">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Transfer Certificate');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Name of the School');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" disabled="disabled" name="name" value="<?php
							echo $this->db->get_where('settings' , array(
																							'type' => 'system_name'
																					))->row()->description;
							?>" autofocus>
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
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
						<div class="col-sm-5">
								<select name="student_id" class="form-control"
								style="width:100%;"
								data-validate="required"
								id="student_selection_holder"
								onchange="return get_parent_name(this.value)">
								>
										<option value=""><?php echo get_phrase('select_class_first');?></option>
								</select>
						</div>
				</div>

				<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Father / Mother name');?></label>

					<div class="col-sm-5">
						<input type="text" class="form-control" disabled="disabled" name="name" id="parent_name" autofocus>
					</div>
				</div>


				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Nationality, Religion and Caste');?></label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="nationality"
						data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
						value="" >
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Community');?></label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="community"
						data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
						value="" >
					</div>
				</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" disabled="disabled" name="sex" id="sex" autofocus>
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
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Personal Identification Mark');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="PIM" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('academic year');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="academic_year" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('standard studied');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="standard_studied" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('first language');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="first_lang" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('second language');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="second_lang" value="">
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
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('phone');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="" >
						</div>
					</div>-->

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether the pupil has paid all the fees due to the school');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="fees_paid"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether qualified for promotion to higher standard');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qualified_to_higher_standard"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether the pupil was in receipt of any scholarship (Specify name of the scholarship)');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="has_scholarship"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether the pupil
						has undergone medical inspection, during the academic year (first or repeat to be specified)');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="has_medical_inspection"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of pupil left from school');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="date_of_leave_from_school"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('The Pupil conduct and character');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="conduct_of_student"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of application for transfer certificate');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="date_of_application_of_tc"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of transfer certificate');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="date_of_tc"
							 value="">
						</div>
					</div>



                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('Generate TC');?></button>
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

				$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });

    }

		function get_parent_name(student_id){
			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_parent_name/' + student_id ,
					success: function(response)
					{
						alert(response);
							jQuery('#parent_name').val(response);
					}
			});
		}

</script>

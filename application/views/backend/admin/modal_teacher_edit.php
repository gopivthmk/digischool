<?php
$edit_data		=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_teacher');?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'index.php?admin/teacher/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>

                                <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

                                <div class="col-sm-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" alt="...">
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('sex');?></label>
                                <div class="col-sm-5">
                                    <select name="sex" class="form-control selectboxit">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('caste / community');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="caste_community" value="<?php echo $row['caste_community'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('martial status');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="martial_status" value="<?php echo $row['martial_status'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('spouse name');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="spouse_name" value="<?php echo $row['spouse_name'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="occupation" value="<?php echo $row['occupation'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('spouse mobile no');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="spouse_mobile_no" value="<?php echo $row['spouse_mobile_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('blood group');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="blood_group" value="<?php echo $row['blood_group'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('personal identification mark');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="personal_identification_mark" value="<?php echo $row['personal_identification_mark'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('medications');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="medications" value="<?php echo $row['medications'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('edu qualifications');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="edu_qualifications" value="<?php echo $row['edu_qualifications'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('tech qualifications');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="tech_qualifications" value="<?php echo $row['tech_qualifications'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('previous exp');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="previous_exp" value="<?php echo $row['previous_exp'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('ration card no');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="ration_card_no" value="<?php echo $row['ration_card_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('aadhar card no');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="aadhar_card_no" value="<?php echo $row['aadhar_card_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('voter id no');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="voter_id_no" value="<?php echo $row['voter_id_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('pan_bank_account_details');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="pan_bank_account_details" value="<?php echo $row['pan_bank_account_details'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('PF No');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="pf_no"  value="<?php echo $row['pf_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('ESI No');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="esi_no" value="<?php echo $row['esi_no'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('total family members');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="total_family_members" value="<?php echo $row['total_family_members'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('total no of childrens');?></label>

															<div class="col-sm-5">
																<input type="text" class="form-control" name="total_no_of_childrens" value="<?php echo $row['total_no_of_childrens'];?>">
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('details of childrens');?></label>

															<div class="col-sm-5">
																<textarea class="form-control" name="details_of_childrens" id="details_of_childrens" ></textarea>
															</div>
														</div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_teacher');?></button>
                            </div>
                        </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

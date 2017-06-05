
<div class="row form_tc_content" style="">
	<div class="col-md-8" style="width:100%">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Transfer Certificate');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/transfer_certificate/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'tc_form', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Name of the School');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="school_name"  name="school_name" value="<?php
							echo $this->db->get_where('settings' , array(
																							'type' => 'system_name'
																					))->row()->description;
							?>" autofocus>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('class');?>
							<span class="mandetory">*</span>
						</label>

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
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('section');?>
							<span class="mandetory">*</span>
						</label>
		                    <div class="col-sm-5">
		                        <select name="section_id"
														data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
														class="form-control" id="section_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>

			                    </select>
			                </div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('student');?>
							<span class="mandetory">*</span>
						</label>
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
					<label for="field-1" class="col-sm-3 control-label">
						<?php echo get_phrase('Father / Mother name');?>
						<span class="mandetory">*</span>
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="name" id="parent_name" autofocus>
					</div>
				</div>


				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						<?php echo get_phrase('Nationality, Religion and Caste');?>
						<span class="mandetory">*</span>
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="nationality" id="nationality"
						data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
						value="" >
					</div>
				</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('gender');?>
							<span class="mandetory">*</span>
						</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="sex" id="sex" autofocus>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('birthday');?>
							<span class="mandetory">*</span>
						</label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							name="birthday" id="birthday" value="" data-start-view="3">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('Personal Identification Mark');?>
							<span class="mandetory">*</span>
						</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="PIM" id="PIM" value="" data-start-view="2">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('academic year');?>
							<span class="mandetory">*</span>
						</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="academic_year" id="academic_year"  value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('standard studied');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="standard_studied" id="standard_studied"  value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('first language');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="first_lang" id="first_lang"  value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Medium of Instruction');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="second_lang" id="second_lang"  value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('Date of Admission');?>
							<span class="mandetory">*</span>
						</label>

						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="date_of_admission" id="date_of_admission"
							data-start-view="3">
						</div>
					</div>

					<!--<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php //echo get_phrase('phone');?></label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="" >
						</div>
					</div>-->

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase("Whether the Pupil has paid all the fees due to the school");?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="fees_paid" id="fees_paid"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether qualified for promotion to higher standard');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="qualified_to_higher_standard" id="qualified_to_higher_standard"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether the pupil was in receipt of any scholarship (Specify name of the scholarship)');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="has_scholarship" id="has_scholarship"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Whether the pupil
						has undergone medical inspection, during the academic year (first or repeat to be specified)');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="has_medical_inspection" id="has_medical_inspection"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of pupil left from school');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" data-start-view="2" name="date_of_leave_from_school" id="date_of_leave_from_school"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('The Pupil conduct and character');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="conduct_of_student" id="conduct_of_student"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of application for transfer certificate');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="date_of_application_of_tc" data-start-view="3" id="date_of_application_of_tc"
							 value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Date of transfer certificate');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="date_of_tc" data-start-view="3" id="date_of_tc"
							 value="">
						</div>
					</div>



                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info" id="tc_submit"><?php echo get_phrase('Generate TC');?></button>
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

<div class="row tc_format" style="display:none">
  <a type="button" class="btn btn-default btn-icon icon-left hidden-print pull-right" onclick="printDiv('main-print')">Print TC<i class="entypo-print"></i></a>

	<div class="main-print" id="main-print" style="clear: both; float: left;width: 75%; 	margin-left: 180px;">

		<div class="header_content" style="float: left; clear: both; width: 75%; margin-left: 85px;">
			<div class="left">
				<div class="school_logo">
					<img src="<?php echo base_url(); ?>assets/images/logo.PNG" alt="logo" />
				</div>
			</div>
			<div class="right">
				<div class="header_title">
					Venkateshwara Matriculation School
				</div>
				<div class="header_sub_title">
					(Recognised by the Govt. of Tamil Nadu) R.C. No.530866/E1/98 dt. 04.08.98
				</div>
				<div class="header_address">
					<span>Bharathi Nagar, Thirumullaivoyal,</span><br/>
					<span>Chennai - 600 062</span>
				</div>
			</div>
		</div>
		<div class="main_content" style="clear: both; float: left; margin-left: 20px;">
			<table class="main_content_header" style="margin-top: 15px; float: left; clear: both; width: 100%;">
				<tr>
					<td colspan="2" style="text-align:center">
						<span style="text-transform: uppercase;
													font-weight: bold;
													font-size: 18px;
													letter-spacing: 6px;
													font-family: monospace;">
						Transfer Certificate
					</span>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center">
						<span style="font-size: 12px;">
						Recognised by the Director of School Education
					</span>
					</td>
				</tr>
				<tr>
					<td style=" text-align:left; padding-top:10px; padding-left:20px;">
						<span style="font-size: 12px;">
						Serial No&nbsp;:
						</span>
					</td>
					<td style="text-align:right; padding-top:10px; padding-right:140px; ">
						<span style="font-size: 12px; ">
						Admission No&nbsp;:
						</span>
					</td>
				</tr>
				<tr>
					<td style=" text-align:left; padding-top:10px; padding-left:20px;">
						<span style="font-size: 12px;">
						EMINS No&nbsp;:
						</span>
					</td>
					<td style="text-align:right; padding-top:10px; padding-right:140px; ">

					</td>
				</tr>
			</table>

      <div class="body_content" style="float: left; clear: both; margin-top: 25px; font-size:13px;">
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          1.
          </div>
          <div class="content_heading" style="float:left">
          <ol>
            <li>Name of the School</li>
            <li>Name of the Educational District</li>
            <li>Name of the Revenue District</li>
          </ol>
          </div>
          <div class="content_data" style="float:left">
            <ul class="schoool_info">
              <li>
                <div id="name_of_school" ></div>
              </li>
              <li>
                <div id="name_of_educational_district" ></div>
              </li>
              <li>
                <div id="name_of_revenue_district" ></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; ">
          <div class="content_sno" style="float:left">
          2.
          </div>
          <div class="content_heading" style="float:left">
            Name of the pupil (in Block Letters)
          </div>
          <div class="content_data" style="float:left">
            <div id="name_of_student" class="header_values" style="margin-left:107px;"></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
            3.
          </div>
          <div class="content_heading" style="float:left">
          Name of the Father or Mother
          </div>
          <div class="content_data" style="float:left">
            <div id="name_of_parent" class="header_values" style="margin-left:138px"></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          4.
          </div>
          <div class="content_heading" style="float:left">
            Nationality, Religion and Caste
          </div>
          <div class="content_data" style="float:left">
            <div id="nationality_and_religions" class="header_values" style="margin-left:134px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          5.
          </div>
          <div class="content_heading" style="float:left">
            Community : Whether he/she belongs to
          <ol>
            <li>Adi Dravidar (S.C) or (S.T)</li>
            <li>Backward Class</li>
            <li>Most Backward Class</li>
            <li>Converted to Christainity from S.C</li>
            <li>Denotified Tribes</li>
          </ol>
          </div>

          <div class="content_data" style="float:left">
            <ul class="Community_info">
              <li style="height:40px !important"></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          6.
          </div>
          <div class="content_heading" style="float:left">
            Sex
          </div>
          <div class="content_data" style="float:left">
            <div id="sex_db_value" class="header_values" style="margin-left:292px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          7.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of Birth, </br><span style="font-size:10px">(as entered in the admission register in figures and words)</span>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_birth_value" class="header_values" style="margin-left:49px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          8.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Personal Mark of Identification
          </div>
          <div class="content_data" style="float:left">
            <div id="pim_value" class="header_values" style="margin-left:140px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          9.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of admission and standard in which admitted</br>
            <span style="font-size:10px">(the year to be entered in words)</span>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_admission_value" class="header_values" style="margin-left:26px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          10.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Standard in which the pupil was studying
            </br>at the time of leaving
            <span style="font-size:10px">(in words)</span>
          </div>
          <div class="content_data" style="float:left">
            <div id="std_studied_at_time_of_leave_value" class="header_values" style="margin-left:71px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          11.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil has paid all the fees due
          </br>to the school
            <span style="font-size:10px">(in words)</span>
          </div>
          <div class="content_data" style="float:left">
            <div id="pupil_paid_all_fees" class="header_values" style="margin-left:62px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          12.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether qualified for promotion to Higher standard
          </div>
          <div class="content_data" style="float:left">
            <div id="whether_qualified_higher" class="header_values" style="margin-left:23px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          13.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil was in receipt of the scholarship
            </br>(Nature of the scholarship to be specified)
          </div>
          <div class="content_data" style="float:left">
            <div id="whether_pupil_scholarship" class="header_values" style="margin-left:18px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          14.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil has undergone medical
          </br>inspection during the academic year, </br>(First or repeat to be specified)
          </div>
          <div class="content_data" style="float:left">
            <div id="repeat_medical" class="header_values" style="margin-left:70px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          15.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date on which the pupil actually left the school
          </div>
          <div class="content_data" style="float:left">
            <div id="repeat_medical" class="header_values" style="margin-left:45px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          16.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            The Pupil's conduct and character
          </div>
          <div class="content_data" style="float:left">
            <div id="conduct_value" class="header_values" style="margin-left:128px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          17.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date on which application for tranfer certificate <br/>was made
            on behalf of the pupil by his <br/>parent or Guardian
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_tc_application" class="header_values" style="margin-left:49px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          18.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of the Transfer Certificate
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_tc_application" class="header_values" style="margin-left:141px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <table border="1" class="summay_tc">
            <tr>
              <th>
                Name of the School
              </th>
              <th>
                Academic Year (s)
              </th>
              <th>
                Standard(s) studied
              </th>
              <th>
                First Langugage
              </th>
              <th>
                Medium of Instruction
              </th>
            </tr>
            <tr>
              <td>
                <span id="school_footer"></span>, Chennai - 62
              </td>
              <td>

              </td>
              <td>

              </td>
              <td>
								<div id="first_lang"></div>
              </td>
              <td>
                <div id="meduim"></div>
              </td>
            </tr>
          </table>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top:45px;">
          <div class="content_sno" style="float:left">
          19.
          </div>
          <div class="content_heading" style="float:left; text-align:left; ">
            Signature of the Headmaster with date and
            </br>school date
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="margin-left:58px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top:45px;">
          <div class="content_heading" style="float:left; text-align:left; ">
            Date : <?php echo date('d-m-Y'); ?>
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="padding-left:397px; width:600px; border:none;" >
              Signature of the Parent / Guardian
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top:45px;">
          <div class="content_heading" style="float:left; text-align:left; ">
            Date : <?php echo date('d-m-Y'); ?>
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="padding-left:397px; width:600px; border:none;" >
              Signature of the Pupil
            </div>
          </div>
        </div>
      <div>
      </div>
      </div>
		</div>
    <style>
    body{
      color: #333;
    }
    .main
    {
      width: 525px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      color: #333;
    }
		@media print {
    a {
        display:none;
    }
 }

 @media screen and projection {
    a {
        display:inline;
    }
  }
		.mandetory{
			font-weight: bold; color: red; font-size: 20px; float: right; padding: 0px 10px;
		}
    .header_title, .middle_title
    {
      font-family: Trebuchet MS;
      font-size: 18px;
      font-weight: bold;
    }
    .header_address span
    {
        /*float: left;*/
        font-size: 15px;
        clear: both;
        padding-top:5px;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }
    .header_sub_title{
      font-style: italic;
    }
    .header_content .left{
      float: left;
    }
    .header_content .right{
      float: left;
      text-align: center;
    }

    .school_logo
    {
      float: left;
    }
    .school_logo img
    {
      width: 98px;
    }
    .content_heading ol li{
      text-align: left;
      list-style: lower-alpha;
        margin-bottom:31px;
    }
    .content_data ul li, .header_values {
      border-bottom: 1px solid #333;
      list-style: none;
      height: 22px;
      margin-bottom:30px  ;
        width: 300px;
        margin-left: 44px;
    }
    body{
      /*font-size: 14px;*/
    }
    .row_content{
      clear: both; float: left; margin-bottom: 15px;
    }
    .row_content .content_sno{
      padding-right: 10px;
    }
    .Community_info li{
      height:17px !important;
      margin-left: 33px !important;
    }
    .row_content .summay_tc th
    {
      padding: 10px;
      font-weight: bold;
    }
    .row_content .summay_tc td
    {
      padding: 20px;
    }
		#name_of_school, #name_of_parent, #name_of_student, #nationality_and_religions,
		#sex_db_value, #date_of_birth_value, #pim_value, #std_studied_at_time_of_leave_value,
		#pupil_paid_all_fees, #whether_qualified_higher, #whether_pupil_scholarship,
		#repeat_medical, #conduct_value, #first_lang, #meduim
		{
			text-transform: capitalize;
		}
    </style>
</div>
</div>

<script type="text/javascript">

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

	/*$('input[type="text"]').live("focus", function() {
	    var rowId = $(this).attr('id');
	    $('tr').each(function(){
	        var inputId = $(this).find('input[type="text"]').attr('id');
	        if(inputId != null && typeof inputId != "undefined"){
	            if(rowId != inputId){
	                $(this).find('input[type="text"]').attr("disabled", "disabled");
	            }
	        }
	    });
	});*/

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

				$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students/' + class_id + '/true' ,
            success: function(response)
            {
							//alert(response);
                jQuery('#student_selection_holder').html(response);
            }
        });

    }

		function get_parent_name(student_id){
			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_parent_name/' + student_id ,
					success: function(response)
					{
							//alert(response);
							response = $.parseJSON(response);
							jQuery('#parent_name').val(response["parent_name"]);
							jQuery('#sex').val(response["sex"]);
							jQuery('#nationality').val(response["nationality_religion"]);
							jQuery('#birthday').val(response["birthday"]);
							jQuery('#PIM').val(response["personal_identification_number"]);
							if(response["date_of_admission"] == "0000-00-00"){
								response["date_of_admission"] = "";
							}
							jQuery('#date_of_admission').val(response["date_of_admission"]);
							jQuery('#academic_year').val(response["academic_year"]);
					}
			});
		}

		$(document).ready(function() {
			//if($('#class_id').val())

			$('#first_lang').val('Tamil');
			$('#meduim').val('English')
			$('#second_lang').val('English');
			$('#name_of_educational_district').html('Ponneri');
			$('#name_of_revenue_district').html('Thiruvallur');
			disable_input_elements('first_lang', 'Tamil','val');
			disable_input_elements('second_lang', 'English','val');
			disable_input_elements('school_name', 'Venkateshwara Matriculation School (JVMS)','val');
			//disable_input_elements('name_of_educational_district', 'Ponneri','html');
			//disable_input_elements('name_of_revenue_district', 'Thiruvallur','html');

			$('#tc_submit').click(function (e){

				//alert($('#class_id').val());
				if($('#class_id').val() == "" ||
					 $('#section_selector_holder').val() == "" ||
					 $('#student_selection_holder').val() == "" ||
					 $('#parent_name').val() == "" ||
					 $('#nationality').val() == "" ||
					 $('#sex').val() == "" ||
					 $('#birthday').val() == "" ||
					 $('#academic_year').val() == "" ||
					 $('#date_of_admission').val() == ""
					)
				{
					alert("Please enter value for mandetory fields!!!");
					return false;
				}

				$.ajax({
           type: "POST",
           url: '<?php echo base_url();?>index.php?admin/get_tc_form_submission',
           data: $("#tc_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
						 $('.form_tc_content').hide();
						 $('.tc_format').show();
						 $('.main-content h3').hide();
               //alert(data); // show response from the php script.
						data = $.parseJSON(data);
						$('#name_of_school').html(data['school_name']);
						$('#school_footer').html(data['school_name']);

						$('#name_of_parent').html(data['parent_name']);
						$('#name_of_student').html(data['student_name']);
						$('#nationality_and_religions').html(data['nationlity_religion']);
						$('#sex_db_value').html(data['sex']);
						$('#date_of_birth_value').html(data['dob']);
						$('#pim_value').html(data['pim']);
						$('#date_of_admission_value').html(data['date_of_admission']);
						$('#std_studied_at_time_of_leave_value').html(data['standard_studied_while_leaving']);
						$('#pupil_paid_all_fees').html(data['is_paid_all_fees']);
						$('#whether_qualified_higher').html(data['is_qualified_for_higher_standard']);
						$('#whether_pupil_scholarship').html(data['scholarship']);
						$('#repeat_medical').html(data['under_medical_inspection']);
						$('#conduct_value').html(data['conduct_remarks']);
						$('#date_of_tc_application').html(data['date_of_application_for_transfer_certificate']);
						//$('#name_of_parent').html(data['parent_name']);
						//$('#name_of_parent').html(data['parent_name']);
						//$('#first_lang').html(data['first_langugage']);
						//$('#meduim').html(data['second_language']);
           }
         });

    		e.preventDefault();
				return false;
			});
		});
		function disable_input_elements(id, content, element_type){
			$('#'+id).bind('keyup', function(e) {
			    e.stopPropagation();
					if(element_type == 'val'){
						$(this).val(content);
					}
					if(element_type == 'html'){
						$(this).html(content);
					}
			});
		}
</script>

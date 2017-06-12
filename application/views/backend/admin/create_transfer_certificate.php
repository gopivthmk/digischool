
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

					</label>

					<div class="col-sm-5">
						<input type="hidden" class="form-control" name="name" id="parent_name" autofocus>
						<div id="parent_name_view" class="auto-fill-fields"></div>
					</div>
				</div>


				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						<?php echo get_phrase('Nationality, Religion and Caste');?>

					</label>

					<div class="col-sm-5">
						<input type="hidden" class="form-control" name="nationality" id="nationality"
						data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
						value="" >
						<div id="nationality_view" class="auto-fill-fields"></div>
					</div>
				</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('gender');?>

						</label>

						<div class="col-sm-5">
							<input type="hidden" class="form-control" name="sex" id="sex" autofocus>
							<div id="sex_view" class="auto-fill-fields"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('birthday');?>

						</label>

						<div class="col-sm-5">
							<input type="hidden" class="form-control datepicker"
							data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
							name="birthday" id="birthday" value="" data-start-view="3">
							<div id="birthday_view" class="auto-fill-fields" ></div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('Personal Identification Mark');?>

						</label>

						<div class="col-sm-5">
							<input type="hidden" class="form-control" name="PIM" id="PIM" value="" data-start-view="2">
							<input type="hidden" class="form-control" name="PIM1" id="PIM1" value="" data-start-view="2">
							<div id="PIM_view" class="auto-fill-fields"></div>
							<div id="PIM1_view" class="auto-fill-fields"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">
							<?php echo get_phrase('academic year');?>

						</label>

						<div class="col-sm-5">
							<input type="hidden" class="form-control" name="academic_year" id="academic_year"  value="">
							<div id="academic_year_view" class="auto-fill-fields"></div>
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
							<input type="text" class="form-control" name="first_lang" id="first_lang_text"  value="">
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

						</label>

						<div class="col-sm-5">
							<input type="hidden" class="form-control datepicker" name="date_of_admission" id="date_of_admission"
							data-start-view="3">
							<div id="date_of_admission_view" class="auto-fill-fields"></div>
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
			<table class="main_content_header" style="margin-top: 5px; float: left; clear: both; width: 100%;">
				<tr>
					<td colspan="2" style="text-align:center">
						<span style="text-transform: uppercase;
													font-weight: bold;
													font-size: 18px;
													letter-spacing: 3px;
													font-family: monospace;">
						Transfer Certificate<br/>
            மாற்றுச் சான்றிதழ்
					</span>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center; padding-top:10px;">
						<span style="font-size: 12px; ">
						Recognised by the Director of School Education<br/>
            பள்ளிக் கல்வி இயக்குநரால் அங்கீகரிக்கப்பட்டது
					</span>
					</td>
				</tr>
				<tr>
					<td style=" text-align:left; padding-top:10px; padding-left:20px;">
						<span style="font-size: 12px;">
						Serial No&nbsp;:<br/>
            வரிசை எண்&nbsp;:
						</span>
					</td>
					<td style="text-align:right; padding-top:10px; padding-right:140px; ">
						<span style="font-size: 12px; ">
						Admission No&nbsp;:<br/>
            சேர்க்கை எண்&nbsp;:
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

      <div class="body_content" style="float: left; clear: both; margin-top: 25px; font-size: 13px; display: table;">
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          1.
          </div>
          <div class="content_heading" style="float:left">
          <ol>
            <li>Name of the School<br/>
              <div style="position:relative; left:-29px;">(அ)&nbsp;பள்ளியின் பெயர் </div>
            </li>
            <li>Name of the Educational District
<div style="position:relative; left:-29px;">(ஆ)&nbsp;கல்வி மாவட்டத்தின் பெயர்</div>
            </li>
            <li>Name of the Revenue District
<div style="position:relative; left:-29px;">(இ)&nbsp;வருவாய் மாவட்டத்தின் பெயர்</div>
            </li>
          </ol>
          </div>
          <div class="content_data" style="float:left">
            <ul class="schoool_info">
              <li style="border:none; font-weight:bold">
                <div id="name_of_school" >Venkateshwara Matriculation School</div>
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
        <div class="row_content" style="clear: both; float: left; display:table-row; ">
          <div class="content_sno" style="float:left">
          2.
          </div>
          <div class="content_heading" style="float:left; display:table-cell">
            Name of the pupil (in Block Letters)
            <div>மாணவர் பெயர் (தனித்தனி எழுத்துக்களில)</div>
          </div>
          <div class="content_data" style="float:left; display:table-cell">
            <div id="name_of_student" class="header_values" style="margin-left: 55px;">
              <?php
              //echo $this->db->get_where('student' , array('student_id' =>
              //$edit_data[0]['student_id']))->row()->name;
               ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
            3.
          </div>
          <div class="content_heading" style="float:left">
          Name of the Father or Mother
          <div>தந்தையின் பெயர்</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="name_of_parent" class="header_values" style="margin-left:190px">
              <?php
              //echo $edit_data[0]['parent_name'];
               ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          4.
          </div>
          <div class="content_heading" style="float:left">
            Nationality, Religion and Caste
            <div>தேசிய இனம், சமயம் மற்றும் சாதி</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="nationality_and_religions" class="header_values" style="margin-left:122px" >
              <?php
              //echo $edit_data[0]['nationlity_religion'];
               ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          5.
          </div>
          <div class="content_heading" style="float:left">
            Community : Whether he/she belongs to
            <div style="margin-bottom:10px">இனம்:அவன் /அவள் பின்வரும் ஐந்து பிரிவுகளில்
                    <br/>எவையேனும் ஒன்றைச் சார்ந்தவரா?</div>
          <ol>
            <li>Adi Dravidar (S.C) or (S.T)
<div style="position:relative; left:-29px;">(அ)&nbsp;ஆதி திராவிடர் அல்லது பழங்குடி</div>
            </li>
            <li>Backward Class
<div style="position:relative; left:-29px;">(ஆ)&nbsp;பின் தங்கிய வகுப்புி</div>
            </li>
            <li>Most Backward Class
<div style="position:relative; left:-29px;">(இ)&nbsp;மிகவும் பின்திங்கிய வகுப்பு</div>
            </li>
            <li>Converted to Christainity from S.C
<div style="position:relative; left:-29px;">(ஈ)&nbsp;ஆதி திராவிடர் இனத்திலிருந்து கிருஸ்துவ
<br/>மதத்திற்கு மாறியவர் அல்லதுு</div>
            </li>
            <li>Denotified Tribes
<div style="position:relative; left:-29px;">(உ)&nbsp;அட்டவணையிலிருந்து நீக்கப்பட்ட இனம்்ு</div>
            </li>
          </ol>
          </div>

          <div class="content_data" style="float:left">
            <div style="margin-bottom:46px"></div>
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
            <div>பாலினம்</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="sex_db_value" class="header_values" style="margin-left:301px" >
              <?php //echo $edit_data[0]['sex']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          7.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of Birth, </br><span style="font-size:10px">(as entered in the admission register in figures and words)</span>
            <div>பிறந்த தேதி....எண்ணிலும் எழுத்திலும் </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_birth_value" class="header_values" style="margin-left:90px" >
              <?php //echo ($edit_data[0]['dob'] == '0000-00-00') ? "" : date('d/m/Y', strtotime($edit_data[0]['dob'])); ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">
          8.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Personal Mark of Identification
            <div>உடலில் அமைந்த அடையாளம் குறிகள்</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="pim_value" class="header_values" style="margin-left:90px" >
              <?php //echo $edit_data[0]['pim']; ?><br/>
              <?php //echo $edit_data[0]['pim1']; ?>
            </div>
						<div id="pim1_value" class="header_values" style="margin-left:90px" >
						</div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          9.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of admission and standard in which admitted</br>
            <span style="font-size:10px">(the year to be entered in words)</span>
            <div>பள்ளியின் சேர்க்கப்பிட்ட தேதி மற்றும் <br/>சேர்க்கப்பிட்ட</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_admission_value" class="header_values" style="margin-left:75px" >
              <?php //echo ($edit_data[0]['date_of_admission'] == '0000-00-00') ? "" : date('d/m/Y', strtotime($edit_data[0]['date_of_admission'])); ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">
          10.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Standard in which the pupil was studying
            </br>at the time of leaving
            <span style="font-size:10px">(in words)</span>
            <div>
              மாணவர் பள்ளியைவிட்டுச்செல்லும் <br/>நேரத்தில் படித்து வந்த வகுப்பு (எழுத்தில்)
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="std_studied_at_time_of_leave_value" class="header_values" style="margin-left:75px" >
<?php //echo $edit_data[0]['standard_studied_while_leaving']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 5px;">
          <div class="content_sno" style="float:left">
          11.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil has paid all the fees due
          </br>to the school
            <span style="font-size:10px">(in words)</span>
            <div>
              மாணவர் பள்ளிக்கு செலுத்த <br/>வேண்டிய கட்டணங்களை <br/>முழுமையாக செலுத்திவிட்டாரா
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="pupil_paid_all_fees" class="header_values" style="margin-left: 110px;" >
              <?php //echo $edit_data[0]['is_paid_all_fees']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 15px;">
          <div class="content_sno" style="float:left">
          12.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether qualified for promotion to Higher standard
            <div>மேல்வகுப்பிற்கு உயர்வு பெறாத <br/>தகுதியுடையவரா என்பது</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="whether_qualified_higher" class="header_values" style="margin-left:70px" >
              <?php //echo $edit_data[0]['is_qualified_for_higher_standard']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 15px;">
          <div class="content_sno" style="float:left">
          13.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil was in receipt of the scholarship
            </br>(Nature of the scholarship to be specified)
            <div>
              மாணவர் படிப்புதவித் தொகை என்றும்
              <br/>பெற்றவரா (அதன் விவரத்தை குறிப்பிடுக)
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="whether_pupil_scholarship" class="header_values" style="margin-left:65px" >
              <?php //echo $edit_data[0]['scholarship']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 15px;">
          <div class="content_sno" style="float:left">
          14.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Whether the pupil has undergone medical
          </br>inspection during the academic year, </br>(First or repeat to be specified)
          <div>
            மாணவர் கடைசி பள்ளி வருடத்தில் மருத்துவ
            <br/>ஆய்வுக்குச்ச சென்றாரா (முதல் தடவை
            <br/>அல்லது அதற்குமேல் குறிப்பிட்டு எழுதவும்)
          </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="repeat_medical" class="header_values" style="margin-left:42px" >
              <?php //echo $edit_data[0]['under_medical_inspection']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 15px;">
          <div class="content_sno" style="float:left">
          15.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date on which the pupil actually left the school
            <div>
              மாணவர் பள்ளியைவிட்டு விலகிய தேதி
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_left_school" class="header_values" style="margin-left:83px" >

              <?php //echo ($edit_data[0]['date_of_left_school'] == '0000-00-00') ? "" : date('d/m/Y', strtotime($edit_data[0]['date_of_admission'])); ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          16.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            The Pupil's conduct and character
            <div>
              மாணவரின் ஒழுக்கமும் பண்பும்
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="conduct_value" class="header_values" style="margin-left:135px" >
              <?php //echo $edit_data[0]['conduct_remarks']; ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <div class="content_sno" style="float:left">
          17.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date on which application for tranfer certificate <br/>was made
            on behalf of the pupil by his <br/>parent or Guardian
            <div>
              பெற்றோர் அல்லது பாதுகாவலர்,
              <br/>மாணவரின் மாற்றுச் சான்றிதழ்
              <br/> கோரி விண்ணப்பித்த தேதி
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_tc_application" class="header_values" style="margin-left:89px" >
              <?php //echo ($edit_data[0]['date_of_application_for_transfer_certificate'] == '0000-00-00') ? "" : date('d/m/Y', strtotime($edit_data[0]['date_of_application_for_transfer_certificate'])); ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">
          18.
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            Date of the Transfer Certificate
            <div>
              மாற்றுச் சான்றிதழின் தேதி்
            </div>
          </div>
          <div class="content_data" style="float:left">
            <div id="date_of_tc_application" class="header_values" style="margin-left:169px" >
              <?php //echo ($edit_data[0]['date_of_tc'] == '0000-00-00') ? "" : date('d/m/Y', strtotime($edit_data[0]['date_of_tc'])); ?>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left;">
          <table border="1" class="summay_tc">
            <tr>
              <th>
                Name of the School
                <div>பள்ளியின் பெயர்</div>
              </th>
              <th>
                Academic Year (s)
                <div>கல்வி ஆண்டு</div>
              </th>
              <th>
                Standard(s) studied
                <div>படித்த வகுப்பு</div>
              </th>
              <th>
                First Langugage
                <div>முதல் மொழி</div>
              </th>
              <th>
                Medium of Instruction
                <div>பயிற்சி மொழி</div>
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
            <div>பள்ளி தலைமையாசிரியரின் கையொப்பம் ,<br/>தேதி பள்ளி முத்திரையுடன்</div>
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="margin-left:40px" ></div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 30px;">
          <div class="content_sno" style="float:left">
          Note / குறிப்பு :
          </div>
          <div class="content_heading" style="float:left; text-align:left;">
            1.&nbsp;&nbsp;Erasures and unauthenticateed or Fradulent alterations in the certificate will lead to its cancelations
            <div style="margin-left:18px; margin-top:6px">
              இச்சான்றிதழின் அழித்தல்கள் மற்றும் நம்பகமற்ற அல்லது மோசடியான <br/>திருத்தங்கள் செய்வது சான்றிதழை ரத்து செய்ய வழிவகுப்பதாகும்
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">

          </div>
          <div class="content_heading" style="float:left;text-align:left;margin-left: 114px;">
          2.&nbsp;&nbsp;Should be signed in ink by the Head of the institution who will be held responsible <div style="margin-left:20px">for the correctness of the entries</div>
            <div style="margin-left:18px; margin-top:6px">
              பள்ளி தலைமையாசிரியர் மையினால் கையொப்பம்மிட வேண்டும். <br/>பதிவு செய்யப்பட்ட விவரங்களை  சரியானவை என்பதற்கு அவரே பொறுப்பானவர்.
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">

          </div>
          <div class="content_heading" style="float:left; text-align:left;">
          Declare by Parent or Guardian / பெற்றோர் அல்லது பாதுகாவலர் அளிக்கும் உறுதி மொழி
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top: 10px;">
          <div class="content_sno" style="float:left">

          </div>
          <div class="content_heading" style="float:left; text-align:left;">
        I hereby declare that the particulars recorded against items 2 to 7 are correct and that no change will be demanded by me in future
            <div style="margin-top:6px">
மேலே 2  முதல் 7 வரையிலுள்ள இணைகளுக்கெதிரே பதிவு செய்யப்பட்டுள்ள விவரங்கள் செரியானவை என்றும்,
எதிர்காலத்தில் அவற்றில் மாற்றம் எதுவும் கேட்கமாட்டேன் என்றும் நான் உறுதியளிக்கிறேன்
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top:45px;">
          <div class="content_heading" style="float:left; text-align:left; ">
            Date / தேதி: <?php echo date('d-m-Y'); ?>
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="padding-left:397px; width:600px; border:none;" >
              Signature of the Parent / Guardian
              <div>பெற்றோர் அல்லது பாத்து காவலரின் கையொப்பம்</div>
            </div>
          </div>
        </div>
        <div class="row_content" style="clear: both; float: left; margin-top:45px;">
          <div class="content_heading" style="float:left; text-align:left; ">
            Date / தேதி : <?php echo date('d-m-Y'); ?>
          </div>
          <div class="content_data" style="float:left">
            <div id="signature_head_master_date" class="header_values" style="padding-left:397px; width:600px; border:none;" >
              Signature of the Pupil
              <div>மாணவரின் கையொப்பம்</div>
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
        margin-bottom:12px;
    }
    .content_data ul li, .header_values {
      border-bottom: 1px solid #333;
      list-style: none;
      height: 22px;
      margin-bottom:27px  ;
        width: 300px;
        margin-left: 44px;
    }
    body{
      /*font-size: 14px;*/
    }
    .row_content{
      clear: both; float: left; margin-bottom: 0px;
    }
    .row_content .content_sno{
      padding-right: 10px;
    }
    .Community_info li{
      height:25px !important;
      margin-left: -53px !important;
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
		#repeat_medical, #conduct_value, #first_lang, #meduim, #first_lang_text
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

			jQuery('#parent_name_view').html('');
			jQuery('#nationality_view').html('');
			jQuery('#sex_view').html('');
			jQuery('#birthday_view').html('');
			jQuery('#PIM_view').html('');
			jQuery('#PIM1_view').html('');
			jQuery('#academic_year_view').html('');
			jQuery('#academic_year_view').html('');
			jQuery('#standard_studied').val('');
			//jQuery('#first_lang_text').val('');
			//jQuery('#second_lang').val('');
			jQuery('#date_of_admission_view').val('');
			jQuery('#fees_paid').val('');
			jQuery('#qualified_to_higher_standard').val('');
			jQuery('#has_scholarship').val('');
			jQuery('#has_medical_inspection').val('');
			jQuery('#date_of_leave_from_school').val('');
			jQuery('#conduct_of_student').val('');
			jQuery('#date_of_application_of_tc').val('');
			jQuery('#date_of_tc').val('');

			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_parent_name/' + student_id ,
					success: function(response)
					{
							//alert(response);
							response = $.parseJSON(response);
							//jQuery('#parent_name').html(response["parent_name"]);
							jQuery('#parent_name_view').html(response["parent_name"]);
							jQuery('#sex_view').html(response["sex"]);
							jQuery('#nationality_view').html(response["nationality_religion"]);
							jQuery('#birthday_view').html(response["birthday"]);

							jQuery('#parent_name').val(response["parent_name"]);
							jQuery('#sex').val(response["sex"]);
							jQuery('#nationality').val(response["nationality_religion"]);
							jQuery('#birthday').val(response["birthday"]);

							//var pim_value = addNewlines(response["personal_identification_number"]);

							jQuery('#PIM_view').html(response["personal_identification_number"]);
							jQuery('#PIM1_view').html(response["personal_identification_number1"]);
							jQuery('#PIM').val(response["personal_identification_number"]);
							jQuery('#PIM1').val(response["personal_identification_number1"]);
							if(response["date_of_admission"] == "0000-00-00"){
								response["date_of_admission"] = "";
							}

							var admission_date    = new Date(response["date_of_admission"]);
							//var d = new Date();

							var curr_date = ("0" + admission_date.getDate()).slice(-2);

							var curr_month = ("0" + (admission_date.getMonth())).slice(-2);
							//alert(curr_month);

							var curr_year = admission_date.getFullYear();

							var dates = curr_date + "/" + curr_month + "/" + curr_year;

							jQuery('#date_of_admission_view').html(dates);
							jQuery('#academic_year_view').html(response["academic_year"]);

							jQuery('#date_of_admission').val(dates);
							jQuery('#academic_year').val(response["academic_year"]);
					}
			});
		}

		function addNewlines(str) {
		  var result = '';
		  while (str.length > 0) {
		    result += str.substring(0, 100) + '<div/><div class="header_values" >';
		    str = str.substring(200);
		  }
		  return result;
		}

		$(document).ready(function() {
			//if($('#class_id').val())

			$('#first_lang').html('Tamil');
			$('#first_lang_text').val('Tamil');
			$('#meduim').html('English')
			$('#second_lang').val('English');
			$('#name_of_educational_district').html('Ponneri');
			$('#name_of_revenue_district').html('Thiruvallur');
			disable_input_elements('first_lang_text', 'Tamil','val');
			disable_input_elements('second_lang', 'English','val');
			disable_input_elements('school_name', 'Venkateshwara Matriculation School (JVMS)','val');
			//disable_input_elements('name_of_educational_district', 'Ponneri','html');
			//disable_input_elements('name_of_revenue_district', 'Thiruvallur','html');

			$('#tc_submit').click(function (e){

				//alert($('#class_id').val());
				if($('#class_id').val() == "" ||
					 $('#section_selector_holder').val() == "" ||
					 $('#student_selection_holder').val() == "" //||
					 //$('#parent_name').val() == "" ||
					 //$('#nationality').val() == "" ||
					 //$('#sex').val() == "" ||
					 //$('#birthday').val() == "" ||
					 //$('#academic_year').val() == "" ||
					 //$('#date_of_admission').val() == ""
					)
				{
					alert("Please enter value for mandetory fields!!!");
					return false;
				}

				var admission_date    = new Date(jQuery('#date_of_admission').val());
				var tc_date    = new Date(jQuery('#date_of_tc').val());
				var newDate = admission_date.toString('dd/MM/yy');
				var newDate1 = tc_date.toString('dd/MM/yy');
				if(newDate1 > newDate)
				{
					//alert(newDate1);
					//alert(newDate);
				 alert('TC date must be greater than admission date!!!');
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

						//var pim_value = addNewlines(data["pim"]);

						$('#pim_value').html(data["pim"]);
						$('#pim1_value').html(data["pim1"]);
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

			//$('#date_of_tc').bind('click', function(){
			//	alert($(this).val());
			//});
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

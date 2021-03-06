<hr />
<div class="row">
	<div class="col-md-12">

			<ul class="nav nav-tabs bordered">
				<li class="active">
					<a href="#unpaid" data-toggle="tab">
						<span class="hidden-xs"><?php echo get_phrase('create_single_invoice');?></span>
					</a>
				</li>

			</ul>

			<div class="tab-content">
            <br>
				<div class="tab-pane active" id="unpaid">

				<!-- creation of single invoice -->
				<?php echo form_open(base_url() . 'index.php?admin/invoice/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
				<div class="row">
					<div class="col-md-6">
	                        <div class="panel panel-default panel-shadow" data-collapsed="0">
	                            <div class="panel-heading">
	                                <div class="panel-title"><?php echo get_phrase('invoice_informations');?></div>
	                            </div>
	                            <div class="panel-body">

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
	                                    <div class="col-sm-9">
	                                        <select name="class_id" class="form-control selectboxit" id="class_id"
																					data-validate="required"
	                                        	onchange="return get_class_students(this.value)">
	                                        	<option value=""><?php echo get_phrase('select_class');?></option>
	                                        	<?php
	                                        		$classes = $this->db->get('class')->result_array();
	                                        		foreach ($classes as $row):
	                                        	?>
	                                        	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
	                                        	<?php endforeach;?>

	                                        </select>
	                                    </div>
	                                </div>

	                                <div class="form-group">
		                                <label class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
		                                <div class="col-sm-9">
		                                    <select name="student_id" class="form-control"
																				style="width:100%;"
																				data-validate="required"
																				id="student_selection_holder"
																				onchange="return get_total_amount(this.value)">
		                                        <option value=""><?php echo get_phrase('select_class_first');?></option>
		                                    </select>
		                                </div>
		                            </div>

	                               <!-- <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php //echo get_phrase('title');?></label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" name="title"
                                                data-validate="required" data-message-required="<?php //echo get_phrase('value_required');?>"/>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php //echo get_phrase('description');?></label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" name="description"/>
	                                    </div>
	                                </div>-->

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="datepicker form-control" name="date"
                                                data-validate="required"
																								data-message-required="<?php echo get_phrase('value_required');?>"
																								value="<?php echo date('m/d/Y'); ?>"/>
	                                    </div>
	                                </div>

	                            </div>
	                        </div>
													<div id="generate_invoice_message" style="color:red; font-size:18px; "></div>
													<div id="show_previous_invoice"> </div>
	                    </div>

	                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo get_phrase('payment_informations');?></div>
                            </div>
                            <div class="panel-body">

															<!--<div class="form-group">
																	<label class="col-sm-3 control-label"><?php// echo get_phrase('Additional Fees');?></label>
																	<div class="col-sm-9">

																				<?php
																					//$classes = $this->db->get_where('student_fees_category' , array('isdefault' => '0'))->result_array();
																					//foreach ($classes as $row):
																				?>
																				<span style="clear:both; float:left;">
																					<input type="checkbox" class="fees_category"
																					id="fees_category<?php //echo $row['student_fees_category_id']; ?>"
																					style="padding:5px; float:left;"
																					name="fees_category[]"
																					value="<?php //echo $row['student_fees_category_id'];?>"
																					amount="<?php //echo $row['fees_category_amount'];?>"
																					/>
																					<span style="padding:5px; float:left;">
																						<?php
																						//1$classes = //$this->db->get_where('fees_category_master' , array('fees_category_master_id' => $row['fees_category_master_id']))->result_array();
																						//echo $classes[0]['category_name'];
																						?>
																					</span>
																				</span>
																				<?php //endforeach;?>


																	</div>
															</div>-->

															<!--<div class="form-group">
																	<label class="col-sm-3 control-label"><?php //echo get_phrase('Additional Fees');?></label>
																	<div class="col-sm-9">

																				<?php
																					//$classes = $this->db->get_where('student_fees_category' , array('isdefault' => '0'))->result_array();
																					//foreach ($classes as $row):
																				?>
																				<span style="clear:both; float:left;">
																					<input type="checkbox" class="fees_category"
																					id="fees_category<?php //echo $row['student_fees_category_id']; ?>"
																					style="padding:5px; float:left;"
																					name="fees_category[]"
																					value="<?php //echo $row['student_fees_category_id'];?>"
																					amount="<?php //echo $row['fees_category_amount'];?>"
																					/>
																					<span style="padding:5px; float:left;">
																						<?php
																						//$classes = $this->db->get_where('fees_category_master' , array('fees_category_master_id' => $row['fees_category_master_id']))->result_array();
																						//echo $classes[0]['category_name'];
																						?>
																					</span>
																				</span>
																				<?php //endforeach;?>


																	</div>
															</div>-->

															<div class="form-group">
																<label class="col-sm-3 control-label"><?php echo get_phrase('Additional Fees');?></label>
																<div class="col-sm-9 fees_category_holder" style="color: green; text-transform:capitalize;
																 font-size: 12px;">
																	Categories will be fill out, based on class
																</div>
														</div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('Payable amount');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount" id="amount"
                                            placeholder="<?php echo get_phrase('enter_total_amount');?>"
                                                data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                    </div>
                                </div>

																<div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('Due Amount');?></label>
                                    <div class="col-sm-9">
                                        <span id="due_amount">0</span>
																				<input type="hidden" class="form-control" name="due_amount_hidden" id="due_amount_hidden"/>
                                    </div>
                                </div>

																<div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('Concession Amount');?></label>
                                    <div class="col-sm-9">
																				<input type="text" class="form-control" disabled="disabled" name="concession_amount"
																				id="concession_amount"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount_paid"
																				data-validate="required"
                                            placeholder="<?php echo get_phrase('enter_payment_amount');?>"
                                                data-message-required="<?php echo get_phrase('value_required');?>"/>
                                    </div>
                                </div>

																<div class="form-group">
																		<label class="col-sm-3 control-label"><?php echo get_phrase('payment_mode');?></label>
																		<div class="col-sm-9">
																				<select name="payment_mode" class="form-control selectboxit"
																				data-validate="required"
																				data-message-required="<?php echo get_phrase('value_required');?>"
																				>
																					<option value=""><?php echo get_phrase('select_payment_mode');?></option>
																					<?php
																						$classes = $this->db->get('payment_master')->result_array();
																						foreach ($classes as $row):
																					?>
																					<option value="<?php echo $row['payment_master_id'];?>"><?php echo $row['payment_name'];?></option>
																					<?php endforeach;?>

																				</select>
																		</div>
																</div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control selectboxit">
																					<option value=""><?php echo get_phrase('payment_status');?></option>
																					<?php
																						$classes = $this->db->get('payment_type')->result_array();
																						foreach ($classes as $row):
																					?>
																					<option value="<?php echo $row['payment_type_id'];?>"><?php echo $row['payment_type'];?></option>
																					<?php endforeach;?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment_details');?></label>
                                    <div class="col-sm-9">
                                        <textarea name="payment_details" rows="5" cols="60"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info" id="generate_invoice"><?php echo get_phrase('generate_invoice');?></button>
                            </div>
                        </div>
                    </div>

										<input type="hidden" id="category_name" />

	                </div>
	              	<?php echo form_close();?>

				<!-- creation of single invoice -->

				</div>


			</div>


	</div>
</div>

<script type="text/javascript">
	// function check() {
 //    	$("#selectall").click(function () {
 //    		$("input:checkbox").prop('checked', $(this).prop("checked"));
	// 	});
	// }

	function select() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = true ;
			}

		//alert('asasas');
	}
	function unselect() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = false ;
			}
	}
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
	/*jQuery('.fees_category').on('change', function(){
		var selectedCategoryAmount = jQuery(this).attr('amount');
	alert(selectedCategoryAmount);
		var amount = jQuery('#amount').val();
		alert(amount);
		var totalAmount = 0;
		if(jQuery(this).prop('checked')){
			totalAmount = parseInt(selectedCategoryAmount) + parseInt(amount);
			jQuery('#due_amount').text(parseInt(jQuery('#due_amount_hidden').val()) + parseInt(selectedCategoryAmount));
			jQuery('#due_amount_hidden').val(parseInt(jQuery('#due_amount_hidden').val()) + parseInt(selectedCategoryAmount));
		}
		else{
			totalAmount =  parseInt(amount) - parseInt(selectedCategoryAmount);
			jQuery('#due_amount').text(parseInt(jQuery('#due_amount_hidden').val()) - parseInt(selectedCategoryAmount));
			jQuery('#due_amount_hidden').val(parseInt(jQuery('#due_amount_hidden').val()) - parseInt(selectedCategoryAmount));
		}
		jQuery('#amount').val(totalAmount);
		//jQuery('#due_amount').text(totalAmount);

	});*/
});

    function get_class_students(class_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });

				$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_fees_category/' + class_id ,
            success: function(response)
            {
							//alert(response);
                jQuery('.fees_category_holder').html(response);
								jQuery('.fees_category').attr('disabled', true);
								jQuery('.fees_category').on('change', function(){
									var selectedCategoryAmount = jQuery(this).attr('amount');
								//alert(selectedCategoryAmount);
									var amount = jQuery('#amount').val();
									//alert(amount);
									var totalAmount = 0;
									if(jQuery(this).prop('checked')){
										totalAmount = parseInt(selectedCategoryAmount) + parseInt(amount);
										jQuery('#due_amount').text(parseInt(jQuery('#due_amount_hidden').val()) + parseInt(selectedCategoryAmount));
										jQuery('#due_amount_hidden').val(parseInt(jQuery('#due_amount_hidden').val()) + parseInt(selectedCategoryAmount));
									}
									else{
										totalAmount =  parseInt(amount) - parseInt(selectedCategoryAmount);
										jQuery('#due_amount').text(parseInt(jQuery('#due_amount_hidden').val()) - parseInt(selectedCategoryAmount));
										jQuery('#due_amount_hidden').val(parseInt(jQuery('#due_amount_hidden').val()) - parseInt(selectedCategoryAmount));
									}
									jQuery('#amount').val(totalAmount);
									//jQuery('#due_amount').text(totalAmount);

								});
            }
        });
    }
		function get_total_amount(student_id){
			//Updaing the total amount
			var class_id = $('#class_id').find(":selected").val();
			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_total_amount/' + student_id,
					success: function(response)
					{
							jQuery('#amount').val(response);
							jQuery('.fees_category').attr('disabled', false);
					}
			});

			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_concession_amount/' + student_id,
					success: function(response)
					{
							jQuery('#concession_amount').val(response);
							//Query('.fees_category').attr('disabled', false);
					}
			});

			//Updating the additional fees checkbox
			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_fees_categories/' + student_id  + '/' + class_id,
					success: function(response)
					{
						//alert(response);
						//return false;
							response = $.parseJSON(response);
							var response_count = response.length;
							//alert(response_count);
							if(response_count > 0){
								//alert("Hello if");
							jQuery.each( response, function( i, val ) {
								//alert(val);
								jQuery('#fees_category' + val).attr('checked', 'checked');
								jQuery('#fees_category' + val).attr('disabled', true);
							});
						}
						else{
							//alert("Hello else");
							jQuery('.fees_category').prop('checked', false);
							jQuery('.fees_category').prop('disabled', false);
						}
					}
			});

			//Updaing the total amount
			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_due_amount/' + student_id ,
					success: function(response)
					{
							jQuery('#due_amount').text(response);
							jQuery('#due_amount_hidden').val(response);
							var due_amount = jQuery('#due_amount_hidden').val();
							if(due_amount == 0){
								jQuery('#generate_invoice').attr('disabled', true);
								jQuery('#generate_invoice_message').html('The student is cleared all the fees.');
							}
							else{
								jQuery('#generate_invoice').attr('disabled', false);
								jQuery('#generate_invoice_message').html('');
							}
					}
			});

			//alert(student_id);

			$.ajax({
					url: '<?php echo base_url();?>index.php?admin/get_invoice_details/' + student_id,
					success: function(response)
					{
						//alert(response);
						//return false;
						response = $.parseJSON(response);

						var response_count = response.length;

if(response_count > 0)
{						var invoice_details = new Array();
						var sno = 1;
						var total = 0;
						invoice_details.push(['Id', 'Particular', 'Total Fees', 'Due Amount', 'Paid Amount'])
						jQuery.each( response, function( i, val ) {

						var category_name = "";

						/*$.ajax({
								url: '<?php echo base_url();?>index.php?admin/get_particulars_name/' + val['fees_master_category_mapping_id'],
								async: false,
								success: function(categoryresponse)
								{
									$('#category_name').val(categoryresponse);
									//alert(category_name);
								}
							});*/
							///alert($('#category_name').val());
							invoice_details.push([sno, val['category_name'], val['fees_category_amount'], val['due_amount'], val['paid_amount']])
							sno = sno+1;
							if(val['paid_amount'] != null){
								total = parseInt(total) + parseInt(val['paid_amount']);
							}
							//alert(total);
						});
						//alert(total);
						var table = jQuery("<table />");
						//Create a HTML Table element.
						//var table = jQuery("<table />");
						//table[0].border = "1";

						//Get the count of columns.
						var columnCount = invoice_details[0].length;

						//Add the header row.
						var row = jQuery(table[0].insertRow(-1));
						for (var i = 0; i < columnCount; i++) {
						    var headerCell = jQuery("<th />");
						    headerCell.html(invoice_details[0][i]);
						    row.append(headerCell);
						}

						//Add the data rows.
						for (var i = 1; i < invoice_details.length; i++) {
						    row = jQuery(table[0].insertRow(-1));
						    for (var j = 0; j < columnCount; j++) {
						        var cell = jQuery("<td />");
						        cell.html(invoice_details[i][j]);
						        row.append(cell);
						    }
						}

 						//row = jQuery(table[0].insertRow(-1));
						//var footercell = jQuery("<tfoot colspan='5' />");
						//footercell.html(total);
						//row.append(footercell);

						var dvTable = jQuery("#show_previous_invoice");
						dvTable.html("");
						dvTable.append(table);
						$("#show_previous_invoice").append("<div style='clear:both; float:left; width:100%; font-weight:bold;  padding:10px 75px 10px 10px; text-align:right; color:#fff; background-color:#5b5b5b;'>&#8377;" + total + "</div>");

						$('#show_previous_invoice table').css({
							'border-collapse': 'separate',
						  'border-spacing': 0,
						  'clear': 'both',
						  'float': 'left',
							'width' : '500px',
						  'margin-top': '10px',
						  'min-width': '100% !important',
							'border': '1px soild #ccc'
						});

						$('#show_previous_invoice table td').css({
							'padding': '10px 15px',
							'border-bottom': '1px solid #cecfd5'
						});

						$('#show_previous_invoice table th').css({
							'background': '#395870',
							'color': '#fff',
							'padding':'10px',
							'font-weight': 'bold'
						});

						$('#show_previous_invoice table tr tfoot').css({
							'background': '#575757',
							'color': '#fff',
							'padding':'10px',
							'float':'left',
							'font-weight': 'bold',
							'text-align':'right'
						});
					}
					}
			});
		}
		function get_fees_category_amount(fees_category_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_fees_category_amount/' + fees_category_id ,
            success: function(response)
            {
                jQuery('#amount').val(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_class_students_mass(class_id) {

        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_students_mass/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder_mass').html(response);
            }
        });


    }
</script>

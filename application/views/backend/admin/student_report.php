<hr />

<?php echo form_open(base_url() . 'index.php?admin/attendance_report_selector/'); ?>
<div class="row">

    <?php
    $query = $this->db->get('class');
    if ($query->num_rows() > 0):
        $class = $query->result_array();

        ?>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('class'); ?></label>
                <select class="form-control selectboxit" name="class_id" onchange="select_section(this.value)">
                    <option value=""><?php echo get_phrase('select_class'); ?></option>
                    <?php foreach ($class as $row): ?>
                    <option value="<?php echo $row['class_id']; ?>" ><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    <?php endif; ?>



    <input type="hidden" name="operation" value="selection">
    <input type="hidden" name="year" value="<?php echo $running_year;?>">

	<div class="col-md-2" style="margin-top: 20px;">
		<button type="submit" class="btn btn-info"><?php echo get_phrase('show_report');?></button>
	</div>
</div>

<?php echo form_close(); ?>







<script type="text/javascript">
    function select_section(class_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_section/' + class_id,
            success: function (response)
            {

                jQuery('#section_holder').html(response);
            }
        });
    }

    $(document).ready(function() {

			$('#tc_submit').click(function (e){

				$.ajax({
           type: "POST",
           url: '<?php echo base_url();?>index.php?admin/get_tc_form_submission',
           data: $("#tc_form").serialize(), // serializes the form's elements.
           success: function(data)
           {

           }
         });

    		e.preventDefault();
				return false;
			});

			//$('#date_of_tc').bind('click', function(){
			//	alert($(this).val());
			//});
		});
</script>

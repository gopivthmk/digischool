
            <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/create_fees_category/');"
            	class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
            	<?php echo get_phrase('add_new_fees_category');?>
                </a>
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div><?php echo get_phrase('Fees Category');?></div></th>
                            <th><div><?php echo get_phrase('Class');?></div></th>
                            <th><div><?php echo get_phrase('Amount');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $fees_category	=	$this->db->get('fees_master_category')->result_array();
                                //print_r($fees_category);
                                foreach($fees_category as $row):?>
                        <tr>
                            <td><?php echo $row['fees_category_name']; ?></td>
                            <td><?php
                            $classdetails = $this->db->get_where('class', array(
                                  'class_id' => $row['class_id']
                               ))->result_array();
                               //print_r($classdetails);
                            echo $classdetails[0]['name']; ?></td>
                            <td><?php echo $row['fees_category_amount']; ?></td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- teacher EDITING LINK
                                        <li>
                                        	<a href="#" onclick="showAjaxModal('<?php //echo base_url();?>index.php?modal/popup/edit_fees_category/<?php //echo $row['fees_category_id'];?>');">
                                            	<i class="entypo-pencil"></i>
													<?php //echo get_phrase('edit');?>
                                               	</a>
                                        				</li>
                                        <li class="divider"></li>-->

                                        <!-- teacher DELETION LINK -->
                                        <li>
                                        	<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/fees_category/delete/<?php echo $row['fees_category_id'];?>');">
                                            	<i class="entypo-trash"></i>
													<?php echo get_phrase('delete');?>
                                               	</a>
                                        				</li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->

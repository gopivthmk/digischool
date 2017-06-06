<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th><div><?php echo get_phrase('student name');?></div></th>
            <th><div><?php echo get_phrase('class');?></div></th>
            <th><div><?php echo get_phrase('parent name');?></div></th>
            <th><div><?php echo get_phrase('action');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('tc_details_id', 'desc');
        $tc_details   =   $this->db->get('tc_details')->result_array();
        foreach($tc_details as $row): ?>
            <tr>
                <td><?php echo $count++;?></td>
                <td><?php
                  echo $this->db->get_where('student' , array('student_id' =>$row['student_id']))->row()->name;
                  ?></td>
                <td><?php
                  $enroll = $this->db->get_where('enroll' , array('student_id' =>$row['student_id']))->result_array();
                  echo $this->db->get_where('class' , array('class_id' =>$enroll[0]['class_id']))->row()->name;
                  ?></td>
                  <td><?php

                    echo $row['parent_name'];
                    ?></td>
                <td>

                    <div class="btn-group">
                      <a type="button" style="background-color:dodgerblue; color:#fff; font-weight:bold"
                      class="btn btn-default btn-sm generate_tc"
                      id="generate_tc_<?php echo $row['student_id'];?>"
                      student-id="<?php echo $row['student_id'];?>"
                      href="<?php echo base_url(); ?>index.php?admin/view_transfer_certificate/<?php echo base64_encode(base64_encode($row['tc_details_id'])); ?>"
                      >
                            View TC
                        </a>

                    </div>

                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [0,1,2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [0,1,2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint( true, oConfig );

                            window.print();

                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(3, true);
                                  }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>

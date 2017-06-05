<?php
$edit_data = $this->db->get_where('receipt', array('receipt_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>


<center>
    <a type="button" class="btn btn-default btn-icon icon-left hidden-print pull-right" onclick="printDiv('main-print')">Print Invoice<i class="entypo-print"></i></a>
</center>

    <br><br>

    <div id="invoice_print">
    <style>
    .main
    {
      width: 525px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      color: #333;
    }
    .header_title, .middle_title
    {
      font-size: 24px;
      font-weight: bold;
    }
    .header_address span
    {
        /*float: left;*/
        clear: both;
        padding-top:5px;
        text-align: center;
    }
    .middle_row
    {
      clear: both;
    }
    .tbl_receipt
    {
      width: 100%;
      margin: 0;
      padding: 0;
    }
    .tbl_receipt td{
      border:1px solid #333;
    }

    table {
      border-collapse: separate;
      border-spacing: 0;
      clear: both;
      float: left;
      margin-top: 10px;
      min-width: 100% !important;
    }
    th,
    td {
      padding: 10px 15px;
    }
    thead {
      background: #395870;
      color: #fff;
    }
    th {
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      color: #fff;
    }
    tbody tr:nth-child(even) {
      background: #f0f0f2;
    }
    td {
      border-bottom: 1px solid #cecfd5;
      border-right: 1px solid #cecfd5;
      text-align: right;
    }
    td:first-child {
      border-left: 1px solid #cecfd5;
    }
    .tbl_receipt_content
    {
    clear: both;
    float: left;
    border: 1px solid #cecfd5;
    margin-top: 10px;
    padding: 10px;
    text-align: justify;
    }

    </style>
      <div class="main">
        <div class="header_content">
            <div class="header_title">
              Venkateshwaraa Matriculation School (JVMS)
            </div>
            <div class="header_sub_title">
              (A Unit of M.P. Soman Educational Trust)
            </div>
            <div class="header_address">
              <span>No 7, Bharathi Nagar(Opp TNHB), Thirumullaivoyal, Chennai - 600 062</span><br/>
              <span>Phone: 26372527, 9444389775 Email : vms_mpsoman@yahoo.com</span>
            </div>
        </div>
        <div class="middle_content">
          <div class="middle_title">
            Fees Receipt
          </div>
          <div class="middle_inner_content">
            <div class="middle_row">
              <span style="float:left">No&nbsp;:&nbsp;</span><span style="float:left"><?php echo $row['receipt_id'] ?></span>
              <span style="float:right"><?php echo date('d/m/Y', strtotime($row['receipt_date'])); ?></span><span style="float:right">Date&nbsp;:&nbsp;</span>
            </div>
            <div class="middle_row">
              <span style="float:left">Name&nbsp;:&nbsp;</span><span style="float:left">
                <?php
                echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;
                $enroll = $this->db->get_where('enroll' , array('student_id' => $row['student_id']))->result_array();
                //print_r($enroll);
                 ?>
              </span>
            </div>
            <div class="middle_row">
              <span style="float:left">Std&nbsp;:&nbsp;</span><span style="float:left"><?php
              echo $this->db->get_where('class' , array('class_id' => $enroll[0]['class_id']))->row()->name;
               ?></span>
              <span style="float:right">
                <?php echo date("F"); ?>
              </span>
              <span style="float:right">Month / Term&nbsp;:&nbsp;</span>
            </div>
          </div>
        </div>
        <div class="body_content">
<?php
$category_mapping = $this->db->get_where('receipt_category_mapping' , array(
    'student_id' => $row['student_id'],
    'receipt_id' => $row['receipt_id']
))->result_array();
//print_r($category_mapping);
 ?>
    <table>
      <thead>
        <tr>
          <th style="" scope="col">Particulars</th>

          <th style="color:#fff" scope="col">Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //$total_paid = $row['amount_paid'];
        $isnegative = false;
        $current_total = 0;
        foreach ($category_mapping as $items):
          if($items['paid_amount'] > 0){
                $master_category_mapping = $this->db->get_where('fees_master_category_mapping' , array(
                   'fees_master_category_mapping_id' => $items['fees_master_category_mapping_id']
                ))->result_array();

                $fees_details =  $this->db->get_where('student_fees_category' ,
                array('student_fees_category_id' => $master_category_mapping[0]['student_fees_category_id']
                ))->result_array();

                //print_r($master_category_mapping);
                //$total_paid = $total_paid - $fees_details[0]['fees_category_amount'];
                  //echo $total_paid."<br/>";
                //if(preg_match('/^\d+$/D',$total_paid) && ($total_paid>0)){
          ?>
        <tr>
          <td><?php echo $this->db->get_where('fees_category_master' , array('fees_category_master_id' => $fees_details[0]['fees_category_master_id']))->row()->category_name; ?></td>
          <td><?php
          //$current_total += $master_category_mapping[0]['fees_category_amount'];
          echo "&#8377;".$items['paid_amount'];
          ?></td>
        </tr>
      <?php
    //}else if(($total_paid < 0) && ($isnegative == false)){


    //$isnegative = true;
    $current_total = $current_total + $items['paid_amount'];
  }
      endforeach ?>
      </tbody>
      <tfoot style="background-color:#ccc; font-weight:bold">
          <td >Total</td>
          <td><?php echo "&#8377;".$current_total; ?></td>
        </tr>
      </tfoot>
    </table>


          <div class="tbl_receipt_content">
            Special fees includes SMS, Web Access, Stationary, Notes, Accessories, ECA, Clud fees,  Health & Amentities, Karate, Counselling,
            External Assessment, Handwork and Skill Development, Training, Workshops, Books & Note Books & Other Activities
          </div>
        </div>
      </div>
      <script type="text/javascript">

          // print invoice function

          function printDiv(divName)
          {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }

      </script>

    </div>
<?php endforeach; ?>

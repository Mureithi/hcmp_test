<?php
$month = $this->session->userdata('Month');
if ($month == '') {
    $month = date('mY', time());
}
$year = substr($month, -4);
$month = substr_replace($month, "", -4);
$monthyear = $year . '-' . $month . '-1';
$englishdate = date('F, Y', strtotime($monthyear));
?>
<script src="<?php echo base_url() . 'Scripts/accordion.js' ?>" type="text/javascript"></script>
<SCRIPT LANGUAGE="Javascript" SRC="<?php echo base_url(); ?>Scripts/FusionCharts/FusionCharts.js"></SCRIPT> 
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>Scripts/jquery.dataTables.js"></script>
<style type="text/css" title="currentStyle">

@import "<?php echo base_url(); ?>DataTables-1.9.3 /media/css/jquery.dataTables.css";


</style>
<script type="text/javascript">

$(document).ready(function() {

    $('#example_main').dataTable({
        "bPaginate": false,
        "aaSorting": [[3, "asc"]]
    });
    $.fn.slideFadeToggle = function(speed, easing, callback) {
        return this.animate({
            opacity: 'toggle',
            height: 'toggle'
        }, speed, easing, callback);
    };


        //       $(".alert").fadeIn(400);
        $(".notif").delay(20000).slideUp(1000);
        $("#tablediv").delay(15000).css( "height", '450px');
        $(".dataTables_filter").delay(15000).css( "color", '#ccc');



$("#dpp_stats").click(function(event)
        {
            $("dash_main").load("<?php echo base_url(); ?>rtk_management/summary_tab_display/" + <?php echo $countyid; ?> + "/<?php echo $year; ?>/<?php echo $month; ?>/");

        });
    });

function loadcountysummary(county) {
//            $(".dash_main").load("http://localhost/HCMP/rtk_management/rtk_reporting_by_county/" + county);
}

</script>
<style>
.leftpanel{
    width: 17%;
    height:auto;
    float: left;
}

.alerts{
    width:95%;
    height:auto;
    background: #E3E4FA;  
    padding-bottom: 2px;
    padding-left: 2px;
    margin-left:0.5em;
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;

}
.notify{
    width:95%;
    height:auto;
    background: #E3E4FA;  
    padding-bottom: 2px;
    padding-left: 2px;
    margin-left:0.5em;
    -webkit-box-shadow: 0 8px 6px -6px black;
    -moz-box-shadow: 0 8px 6px -6px black;
    box-shadow: 0 8px 6px -6px black;

}

.dash_menu{
    width: 100%;
    float: left;
    height:auto; 
    -webkit-box-shadow: 2px 3px 5px#888;
    box-shadow: 2px 3px 5px #888; 
    margin-bottom:3.2em; 
}

.dash_main{
    width: 82%;       
    height:500px;
    float: left;
    margin-left:0.75em;
    margin-bottom:0em;
    font-size: 14px;
}
.dash_notify{
    width: 15.85%;
    float: left;
    padding-left: 2px;
    height:450px;
    margin-left:8px;
    -webkit-box-shadow: 2px 2px 6px #888;
    box-shadow: 2px 2px 6px #888;

}

div.container {
    width:auto;
    height:auto;
    padding:0;
    margin:0; }
    div.content {
        background:#f0f0f0;
        margin: 0;
        padding:10px;
        font-size:.9em;
        line-height:1.5em;
        font-family:"Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
        div.content ul, div.content p {
            padding:0;
            margin:0;
            padding:3px; }
            div.content ul li {
                list-style-position:inside;
                line-height:25px; }
                div.content ul li a {
                    color:#555555; }
                    code {
                        overflow:auto; }

                        </style>

                        <script type="text/javascript">

                        $(function() {

                            $('#switch_district').change(function() {
                                var value = $('#switch_district').val();
                                var path = "<?php echo base_url() . 'rtk_management/switch_district/'; ?>" + value + "/dpp";
//              alert (path);
window.location.href = path;
});
                        });
                        </script>
    <?php 
    if ($this->session->userdata('switched_as') == 'dpp') {
      ?>
      <div id="fixed-topbar" style="position: fixed; top: 104px;background: #708BA5; width: 100%;padding: 7px 1px 0px 13px;border-bottom: 1px solid #ccc;border-bottom: 1px solid #ccc;border-radius: 4px 0px 0px 4px;">
        <span class="lead" style="color: #ccc;">Switch back to RTK Manager</span>&nbsp;&nbsp;
        <a href="<?php echo base_url(); ?>rtk_management/switch_district/0/rtk_manager/0/home_controller/0//" class="btn btn-primary" id="switch_idenity" style="margin-top: -10px;">Go</a>
      </div>
      <?php }?>
     
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
      <div class="leftpanel">
    <div class="sidebar">
        <?php
        $option = '';
        $id = $this->session->userdata('user_id');
        $q = 'SELECT * from dmlt_districts,districts 
                                where dmlt_districts.district=districts.id
                                and dmlt_districts.dmlt=' . $id;
        $res = $this->db->query($q);
        foreach ($res->result_array() as $key => $value) {
            $option .= '<option value = "' . $value['id'] . '">' . $value['district'] . '</option>';
        }
        ?>
        <span style="" class="label label-info">Switch districts</span>
        <br />
        <br />
        <select id="switch_district">
            <option>-- Select District --</option>
            <?php echo $option; ?>
        </select>
        <br />
        <div class="panel-group " id="accordion" style="padding: 0;">
            <div class="panel panel-default active-panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?php echo site_url('rtk_management/rtk_allocation'); ?>" href="#collapseOne" id="notifications"><span class="glyphicon glyphicon-bullhorn">
                            </span>Home</a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default active-panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?php echo site_url('rtk_management/rtk_allocation'); ?>" href="#collapseOne" id="notifications"><span class="glyphicon glyphicon-stats">
                            </span>Statistics</a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?php echo site_url('rtk_management/rtk_orders'); ?>" href="#collapseTwo" id="stocking_levels"><span class="glyphicon glyphicon-sort-by-attributes">
                            </span>Orders</a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?php echo site_url('rtk_management/rtk_allocation'); ?>" href="#collapseThree" id="expiries"><span class="glyphicon glyphicon-trash">
                            </span>Allocation</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div> 
      <?php
      $district = $this->session->userdata('district1');
      $district_name = Districts::get_district_name($district)->toArray();
      $d_name = $district_name[0]['district'];
      ?>

      <div class="dash_main" id = "dash_main">
        <div id="notification">View all orders for <?php echo $d_name; ?> district below</div>
        <div id="tablediv" style="height:350px; overflow:scroll;">
        <?php if (count($lab_order_list) > 0) : ?>
        <table width="100%" id="example">
          <thead>
            <tr>
              <th>Reports for</th>
              <th>MFL&nbsp;Code</th>
              <th>Facility Name</th>
              <th>Compiled By</th>
              <th>Order Type</th>
              <th>Order&nbsp;Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($lab_order_list as $order) {
              $english_date = date('D dS M Y',strtotime($order['order_date']));
              $reportmonth = date('F',strtotime('-1 month',strtotime($order['order_date'])));

              ?>
              <tr>
                <td><?php echo $reportmonth; ?></td>        
                <td><?php echo $order['facility_code']; ?></td>
                <td><?php echo $order['facility_name']; ?></td>
                <td><?php echo $order['compiled_by']; ?></td>
                <td><?php echo "Lab Commodities"; ?></td>
                <td><?php echo $english_date; ?></td>
                <td><a href="<?php echo site_url('rtk_management/lab_order_details/' . $order['id']); ?>"class="link">View</a><!--|<a href="<?php echo site_url('rtk_management/edit_lab_order_details/' . $order['id']); ?>"class="link">Edit</a>--></td>
              </tr> 
              <?php
            }
            ?>
          </tbody>
        </table>
        <?php
        else :
          echo '<p id="notification">No Records Found</p>';
        endif;
        ?>
      </div>
      </div>

      <link rel="stylesheet" type="text/css" href="http://tableclothjs.com/assets/css/tablecloth.css">


                <script src="http://tableclothjs.com/assets/js/jquery.tablesorter.js"></script>
                <script src="http://tableclothjs.com/assets/js/jquery.metadata.js"></script>
                <script src="http://tableclothjs.com/assets/js/jquery.tablecloth.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    $("table").tablecloth({theme: "paper"});
                });


                </script>
    </div>
  </div>
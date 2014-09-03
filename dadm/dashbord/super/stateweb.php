<script src="../assets/js/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="../assets/js/highcharts.js" type="text/javascript"></script>


<script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'chart2',
                type: 'column'
            },
            title: {
                text: ' '
            },
            xAxis: {
                categories: ['Hak Akses']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Pengunjung'
                }
            },
            series:
                    [
                    <?php
                    include('konek.php');

                    $sql   = "Select hak, count(hak) as count from konter,info_form group by hak";
                    $query = mysql_query( $sql )  or die(mysql_error());
                    while( $ret = mysql_fetch_array( $query ) ){
                        $hak=$ret['hak'];
                        $sql_jumlah   = "Select hak, count (hak) as total from konter where hak='$hak' ";
                        $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                        while( $data = mysql_fetch_array( $query_jumlah ) ){
                            $hk= ($data['hak']);
                        }
                        ?>
                        {
                            name: '<?php echo $hk; ?> Rata-rata',
                            data: [<?php echo $data['total']; ?>]
                        },
                        <?php } ?>
                    ]
        });
    });
</script>



<div class="box-inner">
    <div class="row-fluid">
        <div class="widget-main">
            <div id="chart2"></div>dfg
        </div>
    </div>
</div>
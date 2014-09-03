    <script src="../js/highcharts.js" type="text/javascript"></script>
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
                    categories: ['Kelas']
                },
                yAxis: {
                    title: {
                        text: 'Penilaian'
                    }
                },
                series:
                        [
                        <?php
                        include('../konek.php');
                        $id=($_SESSION['id']);
                        $sql   = "Select idkelas, count(idkelas) as count from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai!='' and info_form.iduser='$id' group by idkelas";
                        $query = mysql_query( $sql )  or die(mysql_error());
                        while( $ret = mysql_fetch_array( $query ) ){
                            $kelas=$ret['idkelas'];
                            $sql_jumlah   = "Select sum(nilai) as total from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai!='' and info_form.iduser='$id' and info_nilai.idkelas='$kelas'";
                            $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                            while( $data = mysql_fetch_array( $query_jumlah ) ){
                                $rata = ($data['total']/$ret['count']);
                            }
                            ?>
                            {
                                name: '<?php echo $kelas; ?> Rata-rata',
                                data: [<?php echo $rata; ?>]
                            },
                            <?php } ?>
                        ]
            });
        });
    </script>



    <div class="box-inner">
        <div class="row-fluid">
            <div class="widget-main">
                <div id="chart2"></div>
             </div>
        </div>
    </div>
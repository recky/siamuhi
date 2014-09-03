<?include "../konek.php";
$id=($_SESSION['id']);
$query="Select count(status)as total from info_bayar,info_form where info_bayar.nis=info_form.nis and info_form.iduser='$id'";
$total=mysql_fetch_array(mysql_query($query));

$qblm="Select count(status)as belum from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status=0 and info_form.iduser='$id'";
$belum=mysql_fetch_array(mysql_query($qblm));

$qlns="Select count(status)as lunas from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status=1 and info_form.iduser='$id'";
$lunas=mysql_fetch_array(mysql_query($qlns));

$hblm=($belum['belum']/$total['total'])*100;
$hlns=($lunas['lunas']/$total['total'])*100;
?>

    <script type="text/javascript">
        $(function() {
            var data = [
                { label: "Belum",  data:<?php echo round($hblm,1);?>, color: "#bd362f"},
                { label: "Lunas",  data:<?php echo round($hlns,1);?>, color: "#363dfa"}

            ];

            var placeholder = $('#piechart-placeholder').css({'width':'70%' , 'min-height':'150px'});
            $.plot(placeholder, data, {

                series: {
                    pie: {
                        show: true,
                        tilt:0.8,
                        highlight: {
                            opacity: 0.25
                        },
                        stroke: {
                            color: '#fff',
                            width: 2
                        },
                        startAngle: 2

                    }
                },
                legend: {
                    show: true,
                    position: "ne",
                    labelBoxBorderColor: null,
                    margin:[-30,15]
                }
                ,
                grid: {
                    hoverable: true,
                    clickable: true
                },
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.1",
                    shifts: {
                        x: -30,
                        y: -50
                    }
                }

            });

            var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
            placeholder.data('tooltip', $tooltip);
            var previousPoint = null;

            placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $(this).data('tooltip').show().children(0).text(tip);
                    }
                    $(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $(this).data('tooltip').hide();
                    previousPoint = null;
                }

            });



        })
    </script>


    <div class="box-inner">
        <div class="row-fluid">
            <div class="widget-main">
                <div id="piechart-placeholder"></div>

            </div>
        </div>
    </div>
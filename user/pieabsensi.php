<?include "../konek.php";
$id=($_SESSION['id']);
$query="Select sum(pertemuan) as total from info_absensi,info_form,ta where info_absensi.nis=info_form.nis and info_form.iduser='$id' and ta.ta=info_absensi.ta and ta.status=1";
$total=mysql_fetch_array(mysql_query($query));

$qabs="Select count(status)as absen from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status=0 and info_form.iduser='$id'";
$belum=mysql_fetch_array(mysql_query($qblm));

$qhdr="Select sum(kehadiran) as hadir from info_absensi,info_form,ta where info_absensi.nis=info_form.nis and info_form.iduser='$id' and ta.ta=info_absensi.ta and ta.status=1";
$hadir=mysql_fetch_array(mysql_query($qhdr));

$habs=(($total['total']-$hadir['hadir'])/$total['total'])*100;
$hhdr=($hadir['hadir']/$total['total'])*100;
?>


<script type="text/javascript">
    $(function() {
        var data = [
            { label: "Absen",  data: <?php echo round($habs,1);?>, color: "#bd362f"},
            { label: "Hadir",  data: <?php echo round($hhdr,1);?>, color: "#363dfa"}

        ];

        var placeholder = $('#piechart-placeholder2').css({'width':'70%' , 'min-height':'150px'});
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
            <div id="piechart-placeholder2"></div>
        </div>
            </div>
</div>
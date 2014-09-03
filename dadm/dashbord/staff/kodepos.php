<?php
include('konek.php');
include('func.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chained Select Boxes using PHP, MySQL and jQuery</title>
    <!--<script type="text/javascript" src="../js/jquery.js"></script>-->

    <script type="text/javascript">

        $(document).ready(function() {
            $('#result_1').hide();
            $.get("func.php", {
                func: "drop_1",
                drop_var: $('#kab').val()
            }, function(response){
                $('#result_1').fadeOut();
                setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
                $('#kec').show();
            });

            $('#kec').show();
            $('#wait_1').hide();
            $('#kab').change(function(){
                $('#result_1').hide();
                $.get("func.php", {
                    func: "drop_1",
                    drop_var: $('#kab').val()
                }, function(response){
                    $('#result_1').fadeOut();
                    setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
                    $('#kec').show();
                });
            });
        });

        function finishAjax(id, response) {
            $('#wait_1').hide();
            $('#'+id).html(unescape(response));
            $('#'+id).fadeIn();
        }
    </script>
</head>

<body>
<p>
    <select name="kab" id="kab" class="input-xlarge">

        <option value="">Pilih Kabupaten</option>

        <?php getTierOne(); ?>

    </select>
    
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="../img/ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>

</p>

</body>
</html>



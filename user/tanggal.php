<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan Datepicker di Modal Bootstrap</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/datepicker.css">
    <script src="../js/bootstrap.js"></script>

    <style>
        .datepicker{z-index:1151;}
    </style>
    <script>
        $(function(){
            $("#tanggal").datepicker({
                format:'yyyy-mm-dd'
            });
        });
    </script>
</head>
<body>
<div class="modal-body">
    <!--   <input type="text" id="tanggal">-->
</div>

<!--javascript here-->
<script src="../js/bootstrap-datepicker.js"></script>
</body>
</html>
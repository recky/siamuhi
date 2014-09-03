<script type="text/javascript">
    var d=new Date()
    bulan=d.getMonth()
    hari=d.getDay();
    switch(hari){
        case 0:
            var hri="Minggu"
            break
        case 1:
            var hri="Senin"
            break
        case 2:
            var hri="Selasa"
            break
        case 3:
            var hri="Rabu"
            break
        case 4:
            var hri="Kamis"
            break
        case 5:
            var hri="Jumat"
            break
        case 6:
            var hri="Sabtu"
            break

    }

    switch(bulan+1)
    {
        case 1:
            var bln="Januari"
            break
        case 2:
            var bln="Februari"
            break
        case 3:
            var bln="Maret"
            break
        case 4:
            var bln="April"
            break
        case 5:
            var bln="Mei"
            break
        case 6:
            var bln="Juni"
            break
        case 7:
            var bln="Juli"
            break
        case 8:
            var bln="Agust"
            break
        case 9:
            var bln="Sept"
            break
        case 10:
            var bln="Okto"
            break
        case 11:
            var bln="Nov"
            break
        case 12:
            var bln="Des"
            break
    }
    var now=hri+", "+d.getDate()+" "+bln+" "+d.getFullYear()
    var time=d.getHours()+":"+d.getMinutes()+ "WIB"
    </script>
    <body>
    <center>
    <b><i class="icon-calendar"></i> : <script type="text/javascript"> document.write(now)</script></b>
    </center>
    </body>
<html>
<head>
    <script type="text/javascript">
        window.onload = function() {
            var eSelect = document.getElementById('transfer_reason');
            var optOtherReason = document.getElementById('otherdetail');
            eSelect.onchange = function() {
                if(eSelect.selectedIndex === 2) {
                    optOtherReason.style.display = 'block';
                } else {
                    optOtherReason.style.display = 'none';
                }
            }
        }
    </script>
</head>
<body>
<select id="transfer_reason" name="transfer_reason">
    <option value="x">Reason 1</option>
    <option value="y">Reason 2</option>
    <option value="other">Other Reason</option>
</select>
<div id="otherdetail" style="display: none;">More Detail Here Please</div>
</body>
</html>
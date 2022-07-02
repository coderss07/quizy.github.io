<html>
<head>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
</body>
<script type="text/javascript">
    var emp1={};
    emp1.id=1;
    emp1.name='Aman';
    emp1.addr='UK';
    console.log(emp1);
    $.ajax({
        url:"xyz.php",
        method:"post",
        data:emp1,
        success:function(res)
        {
            console.log(result);
        }
    })
</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <script src="<?= LINK ?>assets/jquery.js"></script>
</head>
<body>
<h1 style="text-align: center; text-decoration:underline">All saved data. ==> <a href="<?= LINK ?>">Goto to Home Page</a></h1>
<div id="tableList" align="center">
    <input type="search" placeholder="search..." id="search">
    <table border="2">
        <thead>
            <th>ID</th>
            <th>Email</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
</div>
<script>
    $.ajax({
        type:'POST',
        url:"<?= LINK ?>ajax/list.php",
        data:{
            element : $("#search").val()
        },
        success:function(data){
            $("#tbody").html(data);
        }
        })

    $("#search").keyup(function(){
        $.ajax({
        type:'POST',
        url:"<?= LINK ?>ajax/list.php",
        data:{
            element : $("#search").val()
        },
        success:function(data){
            $("#tbody").html(data);
        }
        })
    })
    
</script>
    
</body>
</html>
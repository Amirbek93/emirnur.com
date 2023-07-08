<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYITEDU DATA GRID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php
require_once "database.php";
$obj = new database("myitedu");
$sql = "SELECT * FROM airports;";
$airports = $obj->sql($sql);
?>
<div class="container">

    <h1>The World Airports</h1>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($airports as $airport):?>
            <tr>
                <td><?=$airport['id'];?></td>
                <td><?=$airport['name'];?></td>
                <td><?=$airport['city'];?></td>
                <td><?=$airport['country'];?></td>
            </tr>
        <?php endforeach;?>

        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
        </tr>
        </tfoot>



</div>

<style>
    .container{
        text-align: center;
    }
    h1{
        text-align: center;
    }
    th{
        background-color: black !important;
        color: gold;
        height: 40px;
    }
</style>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>



</body>
</html>
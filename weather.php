<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jon Toshmatov</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.0.min.js"></script>
</head>
<body>
<?php
$location = $_GET['location']??'Brooklyn, USA';
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/$location?unitGroup=us&key=2WJJB9FTM2X8EQW8NU4H4SX39",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: openai80.p.rapidapi.com",
        "X-RapidAPI-Key: a5342dd99cmshe215e8d8cee92c9p1f16d5jsn97c35fc32a97"
    ],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$response = json_decode($response, true);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo "<pre>";
    //print_r($response);
}
$days = $response['days']??[];
?>
<div class="container">
    <h1>Weather for <?=$response['address'];?></h1>
    <hr>
    <div>
        <form>
            <p><label for="location">Search:</label>
                <input value="<?=$location;?>" type="text" name="location" placeholder="Your City">
                <button class="btn btn-success">GO</button>
            </p>
        </form>
    </div>
    <hr>
    <table class="table table-bordered">
        <tr>
            <td>queryCost</td>
            <td><?=$response['queryCost'];?></td>
        </tr>
        <tr>
            <td>latitude</td>
            <td><?=$response['latitude'];?></td>
        </tr>
        <tr>
            <td>longitude</td>
            <td><?=$response['longitude'];?></td>
        </tr>
        <tr>
            <td>resolvedAddress</td>
            <td><?=$response['resolvedAddress'];?></td>
        </tr>
        <tr>
            <td>address</td>
            <td><?=$response['address'];?></td>
        </tr>
        <tr>
            <td>timezone</td>
            <td><?=$response['timezone'];?></td>
        </tr>
        <tr>
            <td>description</td>
            <td><?=$response['description'];?></td>
        </tr>
    </table>
    <hr>

    <?php foreach ($days as $num=>$day):

        $fields = array_flip($day);

        ?>
        <div class="daily">

            <div class="daynum">Day #<?=++$num;?></div>

            <table class="detailtable table table-bordered">

                <?php foreach ($fields as $field=>$value):?>
                    <tr>
                        <td><?=$value;?></td>
                        <td><?=$field;?></td>
                    </tr>
                <?php endforeach;?>
            </table>


        </div>
    <?php endforeach;?>



</div>
<style>
    .detailtable td{
        font-size: 11px;
    }

    .detailtable{
        width: 90%;
        margin: auto;
    }
    .daynum{
        float: right;
        width: 50px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-botom: 1px solid black;
        background-color: yellow;
        color: darkblue;
        text-align: center;
        padding: 2px;
        position: sticky;
        z-index: 100;
        top: 10px;
        left: 3px;
        font-size: 12px;

    }
    .daily{
        width: 200px;
        height: 200px;
        margin: 10px;
        display: inline-block;
        border-radius: 20px;
        border: 1px solid black;
        padding: 3px;
        overflow: auto;
        box-shadow: 3px 3px 3px 3px black;
    }
    form{
        text-align: center;
    }
    h1{
        text-align: center;
    }
</style>
</body>
</html>
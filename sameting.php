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
    <h1 style="color: blue;">Weather for <?=$response['address'];?></h1>
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
            <div class="sun-icon"></div>
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
        border-bottom: 1px solid black;
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
    .sun-icon {
        width: 100px;
        height: 100px;
        background-image: url("data:image/png;base64,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"); /* Replace "sun.png" with the path to your sun image */
        background-size: cover;
        background-position: center;
        margin: 0 auto;
        margin-top: 20px;
    }
    form{
        text-align: center;
    }
    h1{
        text-align: center;
    }
    body{
        background-color: lightblue;
    }
</style>
</body>
</html>

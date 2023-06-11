<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>June 11, 2023</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div id="jon"></div>

<style>
    .box{
        width: 100px;
        height: 100px;
        border: 1px solid black;
        margin: 10px;
        display: inline-block;
        text-align: center;
        float: left;
        padding-top: 10px;
    }
    .box > img{
        width: 30px;
        float: right;
        position: relative;
        z-index: 10;
    }
</style>
<script>
    $(function () {
        let fruits = [
            'apple','banana','strawberry','kiwi','peach','pear','pineapple','watermelon',
            'melon','blackberry','berry','cherry','orange','lemon','pomegranate','mongo','lime',
            'quince','raspberry','grapes','gooseberry','plum','dragon fruit','coconut',
            'avocado','cantaloupe','apricot','papayas','mandarin',''
        ];


        function displayFruits(fruits){
            let rn = 0;
            let all_fruits = [];
            let meva = '';
            let html = '';
            let n = 0;
            for(let i = 0; i<fruits.length; i++){
                rn = Math.floor(Math.random() * fruits.length) + 1;
                meva = fruits[rn];
                all_fruits[meva] = n++;
                html+="<div class=\"box\"><p>"+meva+" <br>(<span>"+rn+"</span>)</p><img src='https://cdn-icons-png.flaticon.com/256/3082/3082025.png'></div>";
            }
            $("#jon").html(html);
        }
        displayFruits(fruits);
    });
</script>
</body>
</html>

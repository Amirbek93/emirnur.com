<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div class="container">
    <button class="btn">𝒸𝓁𝒾𝒸𝓀!</button>
</div>
<style>
    .container{
        text-align: center;
        margin: 300px auto;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn{
        width: 9em;
        height: 3em;
        border-radius: 30em;
        font-size: 15px;
        color: #bf15e5;
        font-family: inherit;
        border: none;
        position: relative;
        cursor: pointer;
        overflow: hidden;
        z-index: 1;
        box-shadow: 6px 6px 12px #5aefe3,
        -6px -6px 12px #4df6f0;
    }
    .btn::before{
       content: '';
        width: 0;
        height: 3em;
        border-radius: 30em;
        position: absolute;
        top: 0;
        left: 0;
        background-image: linear-gradient(to right, #67ef34 0%, #ecf602 100%);
        transition: .5s ease-in;
        display: block;
        z-index: -1;
    }
    .btn:hover::before{
        width: 9em;
    }
</style>
</body>
</html>
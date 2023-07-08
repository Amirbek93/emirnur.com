<!DOCTYPE html>
<html>
<head>
    <title>Ping Pong Game</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        canvas {
            background: #f16363;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<canvas id="gameCanvas" width="800" height="400"></canvas>
<script>
    // Game setup
    var canvas = document.getElementById("gameCanvas");
    var context = canvas.getContext("2d");
    var x = canvas.width / 2;
    var y = canvas.height - 30;
    var dx = 2;
    var dy = -2;
    var paddleHeight = 10;
    var paddleWidth = 75;
    var paddleX = (canvas.width - paddleWidth) / 2;
    var rightPressed = false;
    var leftPressed = false;

    // Event listeners for paddle movement
    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);

    function keyDownHandler(e) {
        if (e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = true;
        } else if (e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = true;
        }
    }

    function keyUpHandler(e) {
        if (e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = false;
        } else if (e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = false;
        }
    }

    // Draw the ball
    function drawBall() {
        context.beginPath();
        context.arc(x, y, 10, 0, Math.PI * 2);
        context.fillStyle = "#57fc1e";
        context.fill();
        context.closePath();
    }

    // Draw the paddle
    function drawPaddle() {
        context.beginPath();
        context.rect(paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
        context.fillStyle = "#09efdf";
        context.fill();
        context.closePath();
    }

    // Update game state and redraw
    function draw() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        drawBall();
        drawPaddle();

        // Ball movement
        x += dx;
        y += dy;

        // Collisions with walls
        if (x + dx > canvas.width - 10 || x + dx < 10) {
            dx = -dx;
        }
        if (y + dy < 10) {
            dy = -dy;
        } else if (y + dy > canvas.height - 10) {
            if (x > paddleX && x < paddleX + paddleWidth) {
                dy = -dy;
            } else {
                // Game over condition
                alert("O'yin Tugadi");
                document.location.reload();
            }
        }

        // Paddle movement
        if (rightPressed && paddleX < canvas.width - paddleWidth) {
            paddleX += 7;
        } else if (leftPressed && paddleX > 0) {
            paddleX -= 7;
        }

        requestAnimationFrame(draw);
    }

    // Start the game
    draw();
</script>

</body>
</html>
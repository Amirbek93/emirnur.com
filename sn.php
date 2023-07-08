<?php
function checkWin(){
    //check rows
    for (let i = 0; i < 3; i++){
        if (board[i][0] === board[i][1] &&
        board[i][1] === board[i][2] &&
        board[i][0] !== '') {
            return true;
        }
    }

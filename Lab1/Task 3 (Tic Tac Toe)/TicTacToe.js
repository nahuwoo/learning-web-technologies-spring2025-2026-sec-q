let cells = document.getElementsByClassName("cell");
let statusText = document.getElementById("status");
let resetBtn = document.getElementById("reset");

let currentPlayer = "X";
let gameActive = true;

let board = ["","","","","","","","",""];

let winPatterns = [
    [0,1,2],
    [3,4,5],
    [6,7,8],
    [0,3,6],
    [1,4,7],
    [2,5,8],
    [0,4,8],
    [2,4,6]
];

for(let i=0; i<cells.length; i++){

    cells[i].addEventListener("click", function(){
        cellClicked(i);
    });

}

function cellClicked(index){

    if(board[index] != "" || gameActive == false){
        return;
    }

    board[index] = currentPlayer;
    cells[index].innerText = currentPlayer;

    checkWinner();
}

function checkWinner(){

    for(let i=0; i<winPatterns.length; i++){

        let a = winPatterns[i][0];
        let b = winPatterns[i][1];
        let c = winPatterns[i][2];

        if(board[a] == "" || board[b] == "" || board[c] == ""){
            continue;
        }

        if(board[a] == board[b] && board[b] == board[c]){

            gameActive = false;

            cells[a].classList.add("winner");
            cells[b].classList.add("winner");
            cells[c].classList.add("winner");

            statusText.innerText = "Player " + currentPlayer + " Wins!";
            return;
        }
    }

    if(!board.includes("")){
        statusText.innerText = "It's a Draw!";
        gameActive = false;
        return;
    }

    changePlayer();
}

function changePlayer(){

    if(currentPlayer == "X"){
        currentPlayer = "O";
    }
    else{
        currentPlayer = "X";
    }

    statusText.innerText = "Player " + currentPlayer + " Turn";
}

resetBtn.addEventListener("click", resetGame);

function resetGame(){

    board = ["","","","","","","","",""];
    currentPlayer = "X";
    gameActive = true;

    statusText.innerText = "Player X Turn";

    for(let i=0;i<cells.length;i++){
        cells[i].innerText = "";
        cells[i].classList.remove("winner");
    }

}
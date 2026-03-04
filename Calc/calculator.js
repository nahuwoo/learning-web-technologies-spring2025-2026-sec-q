let display = document.getElementById("display");

function createButton(divId, text) {
    let div = document.getElementById(divId);

    let button = document.createElement("button");
    button.innerText = text;
    button.className = "btn";

    button.addEventListener("click", function () {

        if (text === "C") {
            display.value = "";
        }
        else if (text === "DEL") {
            display.value = display.value.slice(0, -1);
        }
        else if (text === "=") {
                display.value = eval(display.value.replace("X", "*"));
    
        }
        else {
            display.value += text;
        }

    });

    div.appendChild(button);
}

createButton("first", "+/-");
createButton("first", "%");
createButton("first", "/");
createButton("first", "C");

createButton("second", "7");
createButton("second", "8");
createButton("second", "9");
createButton("second", "X");

createButton("third", "4");
createButton("third", "5");
createButton("third", "6");
createButton("third", "-");

createButton("fourth", "1");
createButton("fourth", "2");
createButton("fourth", "3");
createButton("fourth", "+");

createButton("fifth", "0");
createButton("fifth", ".");
createButton("fifth", "DEL");
createButton("fifth", "=");
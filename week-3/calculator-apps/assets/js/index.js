const display = document.querySelector(".display");
const buttons = document.querySelectorAll("button");
const specialChars = ["%", "*", "/", "-", "+", "="];
let output = "";

//Define function to calculate based on button clicked
const calculate = (btnValue) => {
    if(btnValue === "=" && output !== "") {
        // If output has '%', then replace with '/100' before evaluating.
        // This is use eval() function which is the function can execute any command from string.
        // output = eval(output.replace("%", "/100")); //this function for create percentage calculate, just change '%' with '/100'
        output = eval(output); //this function for create modulus calculate
        
        if(output % 2 == 0){
            alert("Output adalah bilangan genap");
        } else {
            alert("Output adalah bilangan ganjil");
        }
    } else if(btnValue === "AC") {
        output = "";
    } else if(btnValue === "DEL") {
        //If DEL btn is clicked, then remove the last character from the output.
        output = output.toString().slice(0, -1);
    } else {
        // If output is empty and button is specialChars then return.
        if(output === "" && specialChars.includes(btnValue)) return;
        output += btnValue;
    }
    display.value = output;
};

// Add event listener to buttons, and then call calculate() on click
buttons.forEach((button) => {
    // Button clickc listener calls, calculate() with dasaet value as argument 
    button.addEventListener("click", (e) => calculate(e.target.dataset.value));
});
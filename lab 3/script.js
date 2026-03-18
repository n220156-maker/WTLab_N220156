// VARIABLES
const name = "Shalini";
let count = 0;

document.getElementById("varText").innerText =
    name + " Count: " + count;

function increase() {
    count++;
    document.getElementById("varText").innerText =
        name + " Count: " + count;
}

// FUNCTIONS
function changeText() {
    document.querySelector("h1").innerText = "Hello 👋";
}

// OBJECT + METHOD
const user = {
    name: "Shalini",
    role: "Student",

    changeRole: function() {
        this.role = "Developer";
    }
};

document.getElementById("objText").innerText =
    user.name + " - " + user.role;

function updateRole() {
    user.changeRole();
    document.getElementById("objText").innerText =
        user.name + " - " + user.role;
}

// POPUPS
function showAlert() {
    alert("Hello 😊");
}

function showConfirm() {
    let res = confirm("Do you like this?");
    document.getElementById("popup").innerText = res;
}

function showPrompt() {
    let userName = prompt("Enter your name");
    document.getElementById("popup").innerText = userName;
}

// EVENTS
document.getElementById("inputBox").addEventListener("input", function(e) {
    document.getElementById("live").innerText = e.target.value;
});

document.getElementById("box").addEventListener("mouseover", function() {
    this.style.background = "orange";
});

document.getElementById("box").addEventListener("mouseout", function() {
    this.style.background = "lightblue";
});
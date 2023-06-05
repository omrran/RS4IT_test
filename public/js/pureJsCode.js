document.addEventListener("DOMContentLoaded", function (event) {
    function OTPInput() {
        const inputs = document.querySelectorAll("#otp > *[id]");
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener("keydown", function (event) {
                if (event.key === "Backspace") {
                    inputs[i].value = "";
                    if (i !== 0) inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== "") {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
    OTPInput();
});


console.log("dddddddddddddddddddddddddddddddddd");

function checkOnlyEnglish(e, id) {
    let pattern = /^[a-zA-Z ]+$/;
    if (!pattern.test(e.value)) {
        e.value = "";
        document.getElementById(id).classList.remove("d-none");
    } else {
        document.getElementById(id).classList.add("d-none");
    }
}
function mustSixDigitOrMoreEnglishOrNumber(e, id) {
    let pattern = /^[a-zA-Z0-9 ]+$/;
    if (!pattern.test(e.value) || e.value.length < 6) {
        e.value = "";
        document.getElementById(id).classList.remove("d-none");
    } else {
        document.getElementById(id).classList.add("d-none");
    }
}

function checkDateIfLessThanCurrentDate(e, id) {
    // console.log(e.value);
    let selectedDate = new Date(e.value);
    let currentDate = new Date();
    console.log("selected Date :", selectedDate);
    console.log("current Date  :", currentDate);
    if (selectedDate > currentDate) {
        e.value = "";
        document.getElementById(id).classList.remove("d-none");
    } else {
        document.getElementById(id).classList.add("d-none");
    }
}

function checkDateIfmoreThanCurrentDate(e, id) {
    // console.log(e.value);
    let selectedDate = new Date(e.value);
    let currentDate = new Date();
    console.log("selected Date :", selectedDate);
    console.log("current Date  :", currentDate);
    if (selectedDate < currentDate) {
        e.value = "";
        document.getElementById(id).classList.remove("d-none");
    } else {
        document.getElementById(id).classList.add("d-none");
    }
}
function checkDateIfmoreThanCurrentDateAndequalOrless5Night(e ,id, checkInId){
    let selectedDate = new Date(e.value);
    let currentDate = new Date();
    let checkInDate = new Date(document.getElementById(checkInId).value);

    console.log("checkIn Date :", checkInDate);
    console.log("selected Date :", selectedDate);
    console.log("current Date  :", currentDate);
    if (selectedDate < currentDate) {
        e.value = "";
        document.getElementById(id).classList.remove("d-none");
        document.getElementById(id).innerHTML= 'selected date must be more than current data' ;
    } else {
        let diffTime = Math.abs(selectedDate - checkInDate);
        if(Math.ceil(diffTime / (1000 * 60 * 60 * 24)) > 5){
            console.log('more than 555555555555');
            document.getElementById(id).classList.remove("d-none");
            document.getElementById(id).innerHTML= 'Differance must be 5 night or less';
            e.value = "";
        }
        else{
            document.getElementById(id).classList.add("d-none");
        }
    }
}
function showCompanionInfo(e){
    if(e.value == "yes"){
        document.getElementById('companionInfo').classList.remove("d-none");
    }
    else{
        document.getElementById('companionInfo').classList.add("d-none");
    }
    console.log(e.value);
}
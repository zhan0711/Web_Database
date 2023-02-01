/*
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the js page for sudent register of Assignment 02.
*/
// reference: https://blog.csdn.net/lihuiGG520/article/details/81458018//
function time(){
    var date=new Date();
    var year=date.getFullYear();
    var month=date.getMonth() + 1;
    var day=date.getDate();
    var currentTime=year+"-"+month+"-"+day;
    document.getElementById("time").innerHTML=currentTime;
}
/* role button link */
function studentRoleSelect(){
    window.location.href='2_1_studentLoginPage.php';
}
function teacherRoleSelect(){
    window.location.href='2_2_teacherLoginPage.php';
}
function exitButton(){
    window.location.href='index.php';
    // window.location.href='2_2_teacherLoginPage.html';
}

/* student registration page input validation*/
// let firstNameInput = document.querySelector("#firstName");
let firstNameInput = document.querySelector("#fn");
let lastNameInput = document.querySelector("#ln");
let phoneInput = document.querySelector("#pn");
let emailInput = document.querySelector("#em");
let addressInput = document.querySelector("#ad");
let postalZipInput = document.querySelector("#pz");
let countryInput = document.querySelector("#ct");
let passInput = document.querySelector("#pw");
let pass2Input = document.querySelector("#repw");

/*create the warning message*/
let firstNameError = document.createElement('p');
let lastNameError = document.createElement('p');
let phoneError = document.createElement('p');
let emailError = document.createElement('p');
let addressError=document.createElement('p');
let postalZipError=document.createElement('p');
let countryError=document.createElement('p');
let passwordError = document.createElement('p');
let password2Error = document.createElement('p');

/*set attribute for all the created new element*/
firstNameError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[0].appendChild(firstNameError);

lastNameError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[1].appendChild(lastNameError);

phoneError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[2].appendChild(phoneError);

emailError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[3].appendChild(emailError);

addressError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[4].appendChild(addressError);

postalZipError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[5].appendChild(postalZipError);

countryError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[6].appendChild(countryError);

passwordError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[7].appendChild(passwordError);

password2Error.setAttribute("class","warning");
document.querySelectorAll(".textfield")[8].appendChild(password2Error);

/*define the error message content*/
let defaultMsg = "";
let firstNameMsg = "X First Name should be non-empty, and within 20 characters long.";
let lastNameMsg = "X Last name should be non-empty, and within 20 characters long.";
let phoneMsg = "X Phone number should be non-empty.";
let emailMsg = "X Email address should be non-empty with the format xyx@xyz.xyz.";
let addressMsg = "X Address should be non-empty.";
let postalZipMsg = "X PostalZip should be non-empty.";
let countryMsg = "X Country should be non-empty.";
let passMsg = "X Password should be at least 6 characters: 1 uppercase, 1 lowercase.";
let pass2Msg = "X Please retype password.";

/*create the functions to validate each input*/
function firstNameValidate(){
    let firstName = firstNameInput.value;
    if (firstName.length <=0 || firstName.length>20) {
        error=firstNameMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function lastNameValidate(){
    let lastName = lastNameInput.value;
    if (lastName.length <=0 || lastName.length>20) {
        error=lastNameMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function phoneValidate(){
    let phone = phoneInput.value;
    if (phone.length<=0 || phone.length>20) {
        error=phoneMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function emailValidate(){
    let email = emailInput.value;
    let emailReg = /\S+@\S+\.\S+/;
    if (emailReg.test(email)) {
        error=defaultMsg;
    } else {
        error=emailMsg;
    }
    return error;
}
function addressValidate(){
    let address = addressInput.value;
    if (address.length<=0) {
        error=addressMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function postalZipValidate(){
    let postalZip = postalZipInput.value;
    if (postalZip.length<=0) {
        error=postalZipMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function countryValidate(){
    let country = countryInput.value;
    if (country.length<=0) {
        error=countryMsg;
    } else {
        error=defaultMsg;
    }
    return error;
}
function passValidate(){
    let pass=passInput.value;
    let passReg=/^(?=.*?[A-Z])(?=.*?[a-z]).{6,}$/;
    if (pass.length<=0) {
        error=passMsg;
    } else {
        if (passReg.test(pass)) {
            error=defaultMsg;
        } else {
            error=passMsg;
        }
    }
    return error;
}
function pass2Validate() {
    let pass2 = pass2Input.value;
    if (pass2.match(passInput)) {
        error = defaultMsg;
    } else {
        error = pass2Msg;
    }
    return error;
}

/*validate for all input when click the submit buttom*/
function validate() {
    let submit=true;
    let firstNameResult = firstNameValidate();
    let lastNameResult = lastNameValidate();
    let phoneResult = phoneValidate();
    let emailResult = emailValidate();
    let addressResult = addressValidate();
    let postalZipResult = postalZipValidate();
    let countryResult = countryValidate();
    let passResult = passValidate();
    let pass2Result = pass2Validate();

    if (firstNameResult !== defaultMsg) {
        firstNameError.textContent=firstNameMsg;
        firstNameInput.className = firstNameInput.className + " error";
        submit=false;
    }
    if (lastNameResult !== defaultMsg) {
        lastNameError.textContent=lastNameMsg;
        lastNameInput.className = lastNameInput.className + " error";
        submit=false;
    }
    if (phoneResult !== defaultMsg) {
        phoneError.textContent=phoneMsg;
        phoneInput.className = phoneInput.className + " error";
        submit=false;
    }
    if (emailResult !== defaultMsg) {
        emailError.textContent=emailResult;
        emailInput.className = emailInput.className + " error";
        submit=false;
    }
    if (addressResult !== defaultMsg) {
        addressError.textContent=addressMsg;
        addressInput.className = addressInput.className + " error";
        submit=false;
    }
    if (postalZipResult !== defaultMsg) {
        postalZipError.textContent=postalZipMsg;
        postalZipInput.className = postalZipInput.className + " error";
        submit=false;
    }
    if (countryResult !== defaultMsg) {
        countryError.textContent=countryMsg;
        countryInput.className = countryInput.className + " error";
        submit=false;
    }
    if (passResult !== defaultMsg) {
        passwordError.textContent=passMsg;
        passInput.className = passInput.className + " error";
        submit=false;
    }
    if (pass2Result !== defaultMsg) {
        password2Error.textContent=pass2Msg;
        pass2Input.className = pass2Input.className + " error";
        submit=false;
    }
    return submit;
}

/*reset to clean the error message*/
function resetFormError() {
    firstNameError.textContent=defaultMsg;
    firstNameInput.className = firstNameInput.className.replace(" error", "");

    lastNameError.textContent=defaultMsg;
    lastNameInput.className = lastNameInput.className.replace(" error", "");

    phoneError.textContent=defaultMsg;
    phoneInput.className = phoneInput.className.replace(" error", "");

    emailError.textContent=defaultMsg;
    emailInput.className = emailInput.className.replace(" error", "");

    addressError.textContent=defaultMsg;
    addressInput.className = addressInput.className.replace(" error", "");

    postalZipError.textContent=defaultMsg;
    postalZipInput.className = postalZipInput.className.replace(" error", "");

    countryError.textContent=defaultMsg;
    countryInput.className = countryInput.className.replace(" error", "");

    passwordError.textContent=defaultMsg;
    passInput.className = passInput.className.replace(" error", "");

    password2Error.textContent=defaultMsg;
    pass2Input.className = pass2Input.className.replace(" error", "");
}
/*document.form.addEventListener("reset",resetFormError);*/
document.getElementsByTagName("form")[0].addEventListener("reset",resetFormError);


/*when input the correct format, clean the error message*/
firstNameInput.addEventListener("blur",()=>{
    let x = firstNameValidate();
    if (x == defaultMsg) {
        firstNameError.textContent = defaultMsg;
        firstNameInput.className = firstNameInput.className.replace(" error", "");
    }
});
lastNameInput.addEventListener("blur",()=>{
    let x = lastNameValidate();
    if (x == defaultMsg) {
        lastNameError.textContent = defaultMsg;
        lastNameInput.className = lastNameInput.className.replace(" error", "");
    }
});
phoneInput.addEventListener("blur",()=>{
    let x = phoneValidate();
    if (x == defaultMsg) {
        phoneError.textContent = defaultMsg;
        phoneInput.className = phoneInput.className.replace(" error", "");
    }
});
emailInput.addEventListener("blur",()=>{
    let x = emailValidate();
    if (x == defaultMsg) {
        emailError.textContent = defaultMsg;
        emailInput.className = emailInput.className.replace("error", "");
    }
});
addressInput.addEventListener("blur",()=>{
    let x = addressValidate();
    if (x == defaultMsg) {
        addressError.textContent = defaultMsg;
        addressInput.className = addressInput.className.replace(" error", "");
    }
});
postalZipInput.addEventListener("blur",()=>{
    let x = postalZipValidate();
    if (x == defaultMsg) {
        postalZipError.textContent = defaultMsg;
        postalZipInput.className = postalZipInput.className.replace(" error", "");
    }
});
countryInput.addEventListener("blur",()=>{
    let x = countryValidate();
    if (x == defaultMsg) {
        countryError.textContent = defaultMsg;
        countryInput.className = countryInput.className.replace(" error", "");
    }
});
passInput.addEventListener("blur",()=>{
    let x = passValidate();
    if (x == defaultMsg) {
        passwordError.textContent = defaultMsg;
        passInput.className = passInput.className.replace(" error", "");
    }
});
pass2Input.addEventListener("blur",()=>{
    let x = pass2Validate();
    if (x == defaultMsg) {
        password2Error.textContent = defaultMsg;
        pass2Input.className = pass2Input.className.replace(" error", "");
    }
});

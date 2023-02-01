/*
    Group Number: 6
    Group Member: Yuan Zhang, Xiaoting Zheng, Xiangwu Dai
    Date:Dec 04, 2022
    Section: CST 8285 section 302 Assignment 02
    This is the teacher register js page of Assignment 02.
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
function exitButton(){
    window.location.href='index.php';
    // window.location.href='2_2_teacherLoginPage.html';
}
/* teacher registration page input validation*/
// let firstNameInput = document.querySelector("#firstName");
let fnInput = document.querySelector("#fn1");
let lnInput = document.querySelector("#ln1");
let pnInput = document.querySelector("#pn1");
let emInput = document.querySelector("#em1");
let pwInput = document.querySelector("#pw1");
let pw2Input = document.querySelector("#repw1");

/*create the warning message*/
let fnError = document.createElement('p');
let lnError = document.createElement('p');
let pnError = document.createElement('p');
let emError = document.createElement('p');
let pwError = document.createElement('p');
let pw2Error = document.createElement('p');

/*set attribute for all the created new element*/
fnError.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[0].appendChild(fnError);

lnError.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[1].appendChild(lnError);

pnError.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[2].appendChild(pnError);

emError.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[3].appendChild(emError);

pwError.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[4].appendChild(pwError);

pw2Error.setAttribute("class","warning");
document.querySelectorAll(".textfield1")[5].appendChild(pw2Error);

/*define the error message content*/
let dfMsg = "";
let fnMsg = "X First Name should be non-empty, and within 20 characters long.";
let lnMsg = "X Last name should be non-empty, and within 20 characters long.";
let pnMsg = "X Phone number should be non-empty.";
let emMsg = "X Email address should be non-empty with the format xyx@xyz.xyz.";
let pwMsg = "X Password should be at least 6 characters: 1 uppercase, 1 lowercase.";
let pw2Msg = "X Please retype password.";

/*create the functions to validate each input*/
function fnValidate(){
    let fn = fnInput.value;
    if (fn.length <=0 || fn.length>20) {
        error=fnMsg;
    } else {
        error=dfMsg;
    }
    return error;
}
function lnValidate(){
    let ln = lnInput.value;
    if (ln.length <=0 || ln.length>20) {
        error=lnMsg;
    } else {
        error=dfMsg;
    }
    return error;
}
function pnValidate(){
    let pn = pnInput.value;
    if (pn.length<=0 || pn.length>20) {
        error=pnMsg;
    } else {
        error=dfMsg;
    }
    return error;
}
function emValidate(){
    let em = emInput.value;
    let emReg = /\S+@\S+\.\S+/;
    if (emReg.test(em)) {
        error=dfMsg;
    } else {
        error=emMsg;
    }
    return error;
}
function pwValidate(){
    let pw=pwInput.value;
    let pwReg=/^(?=.*?[A-Z])(?=.*?[a-z]).{6,}$/;
    if (pw.length<=0) {
        error=pwMsg;
    } else {
        if (pwReg.test(pw)) {
            error=dfMsg;
        } else {
            error=pwMsg;
        }
    }
    return error;
}
function pw2Validate() {
    let pw2 = pw2Input.value;
    if (pw2.match(pwInput)) {
        error = dfMsg;
    } else {
        error = pw2Msg;
    }
    return error;
}

/*validate for all input when click the submit buttom*/
function validateTeacher() {
    let submit=true;
    let fnResult = fnValidate();
    let lnResult = lnValidate();
    let pnResult = pnValidate();
    let emResult = emValidate();
    let pwResult = pwValidate();
    let pw2Result = pw2Validate();

    if (fnResult !== dfMsg) {
        fnError.textContent=fnMsg;
        fnInput.className = fnInput.className + " error";
        submit=false;
    }
    if (lnResult !== dfMsg) {
        lnError.textContent=lnMsg;
        lnInput.className = lnInput.className + " error";
        submit=false;
    }
    if (pnResult !== dfMsg) {
        pnError.textContent=pnMsg;
        pnInput.className = pnInput.className + " error";
        submit=false;
    }
    if (emResult !== dfMsg) {
        emError.textContent=emResult;
        emInput.className = emInput.className + " error";
        submit=false;
    }
    if (pwResult !== dfMsg) {
        pwError.textContent=pwMsg;
        pwInput.className = pwInput.className + " error";
        submit=false;
    }
    if (pw2Result !== dfMsg) {
        pw2Error.textContent=pw2Msg;
        pw2Input.className = pw2Input.className + " error";
        submit=false;
    }
    return submit;
}

/*reset to clean the error message*/
function resetForm() {
    fnError.textContent=dfMsg;
    fnInput.className = fnInput.className.replace(" error", "");

    lnError.textContent=dfMsg;
    lnInput.className = lnInput.className.replace(" error", "");

    pnError.textContent=dfMsg;
    pnInput.className = pnInput.className.replace(" error", "");

    emError.textContent=dfMsg;
    emInput.className = emInput.className.replace(" error", "");

    pwError.textContent=dfMsg;
    pwInput.className = pwInput.className.replace(" error", "");

    pw2Error.textContent=dfMsg;
    pw2Input.className = pw2Input.className.replace(" error", "");
}
/*document.form.addEventListener("reset",resetFormError);*/
document.getElementsByTagName("form")[0].addEventListener("reset",resetForm);


/*when input the correct format, clean the error message*/
fnInput.addEventListener("blur",()=>{
    let x = fnValidate();
    if (x == dfMsg) {
        fnError.textContent = dfMsg;
        fnInput.className = fnInput.className.replace(" error", "");
    }
});
lnInput.addEventListener("blur",()=>{
    let x = lnValidate();
    if (x == dfMsg) {
        lnError.textContent = dfMsg;
        lnInput.className = lnInput.className.replace(" error", "");
    }
});
pnInput.addEventListener("blur",()=>{
    let x = pnValidate();
    if (x == dfMsg) {
        pnError.textContent = dfMsg;
        pnInput.className = pnInput.className.replace(" error", "");
    }
});
emInput.addEventListener("blur",()=>{
    let x = emValidate();
    if (x == dfMsg) {
        emError.textContent = dfMsg;
        emInput.className = emInput.className.replace("error", "");
    }
});
pwInput.addEventListener("blur",()=>{
    let x = pwValidate();
    if (x == dfMsg) {
        pwError.textContent = dfMsg;
        pwInput.className = pwInput.className.replace(" error", "");
    }
});
pw2Input.addEventListener("blur",()=>{
    let x = pw2Validate();
    if (x == dfMsg) {
        pw2Error.textContent = dfMsg;
        pw2Input.className = pw2Input.className.replace(" error", "");
    }
});







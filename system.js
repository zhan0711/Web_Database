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
/* login page input validation */
function checkForm(form){
    if(form.userName.value==""){
        alert("Login name should not be empty!")
        form.userName.focus();
        return false;
    }
    return true;
}
function SCselect(){
    alert("Course Selected.");
    window.location.href='3_3_course.php';
}
function enroll(courseID, studentID) {
    if (confirm("Enroll this course?") == true) {
        window.location.href = 'courseSelect.php?courseID=' + courseID + '&studentID=' + studentID;
    }
}
function drop(courseID, studentID) {
    if (confirm("Drop this course?") == true) {
        window.location.href = 'courseDrop.php?courseID=' + courseID + '&studentID=' + studentID;
    }
}

function toggleFilterByLevel() {
    document.getElementById("filterbylevel").classList.toggle("show");
}
function filterFunction(n) {
    var table, tr, td, i, txtValue;
    table = document.getElementById("coursestable");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue == n || n == 0) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    toggleFilterByLevel();
}


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
function toggleFilterByLevel() {
    document.getElementById("filterbylevel").classList.toggle("show");
}
function filterFunction(n) {
    var table, tr, td, i, txtValue;
    table = document.getElementById("coursestable");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
function sortByLevel() {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("coursestable");
    switching = true;
    dir = "Ascending";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[2];
            y = rows[i + 1].getElementsByTagName("TD")[2];
            if (dir == "Ascending") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
            }
            } else if (dir == "Descending") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
            }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount == 0 && dir == "Ascending") {
            dir = "Descending";
            switching = true;
            }
        }
    }
}
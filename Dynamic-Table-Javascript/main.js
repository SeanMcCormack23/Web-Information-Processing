//var rows = document.getElementById('table').rows.length;
//var table = document.getElementById('table');
var counter_rows= 0;
var counter_cells=0;
function start (show) {
    var  table = document.getElementById('table');
    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;

    for (var i = 1; i<rows; i++) {

        var sum = 0;
        for (var j = 2; j < cells-1; j++) {

            var assignment = document.getElementById('table').rows[i].cells[j].innerHTML; //takes it in

            if(assignment==="-"){  // if its unsubmitted
                assignment = Number(0);

                document.getElementById('table').rows[i].cells[j].style.backgroundColor="yellow";
            }
            else {
                document.getElementById('table').rows[i].cells[j].style.backgroundColor="white";
            }
            if (isNaN(assignment)) {
                document.getElementById('table').rows[i].cells[j].innerHTML="-";
                assignment = Number(0);
            }
            sum += Number(assignment);
        }
        sum/=(cells-3);

        if (sum<40){
            document.getElementById('table').rows[i].cells[cells-1].style.backgroundColor="red";
            document.getElementById('table').rows[i].cells[cells-1].style.color="white";
        }
        else {
            document.getElementById('table').rows[i].cells[cells-1].style.backgroundColor="white";
            document.getElementById('table').rows[i].cells[cells-1].style.color="black";
        }
        align();
        if (show){  //displays the average
       display(i,cells,sum);


         }

    }
}
start(false);

function display (i,cells,sum){

    document.getElementById('table').rows[i].cells[cells-1].innerHTML=Math.round(sum)+"%";
}

function addRow() {

    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;
    var row = table.insertRow();
    for (var i = 0; i<cells; i++){
        var extraCell = row.insertCell(i);
        extraCell.innerHTML = "-";
            if(i!=cells-1) {
                extraCell.setAttribute('contentEditable', 'true');
            }
    }
   start(true);
}

function avg () {
    start(true);
}

function addCol(){
    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;
    var cell;
    for (var i = 0; i<table.rows.length; i++){
        cell = table.rows[i].insertCell(table.rows[i].cells.length-1);
        cell.setAttribute('contentEditable','true');
        cell.innerHTML="-";

    }


    start(true);
}
function createCookie () {

    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;

    for (var i = 1; i<rows; i++){

        for (var j = 0; j<cells; j++){
            var assignment = document.getElementById('table').rows[i].cells[j].innerHTML;
            document.cookie = "row"+i+"col"+j+"="+assignment+"; expires=Thu, 08 Mar 2018 12:00:00 UTC;path=/;";
            this.counter_cells = j;
        }

        this.counter_rows=i;

    }

}
function deleteCookie() {
    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;

    for (var i = 1; i<rows; i++){

        for (var j = 0; j<cells; j++){
            var assignment = document.getElementById('table').rows[i].cells[j].innerHTML;
            document.cookie = "row"+i+"col"+j+"=; expires=Thu, 07 Mar 2007 00:00:00 UTC;path=/; #";
        }
    }
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            //console.log(c.substring(name.length, c.length));
            return c.substring(name.length, c.length);
        }
    }
    //console.log("not found");
    return "";
}

function retrieveCookie() {

    var rows = counter_rows;
    var cells = counter_cells;
    var x;
    var y;
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];

        x = c.charAt(4);
        y=c.charAt(8);


        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            (c.substring(name.length, c.length));

        }
    }
    var rows = x;
    var cells = y;

        var countX =1;

        while(countX<rows) {
            addRow();
            countX++;
        }

        var countY = 3;

        while (countY<cells){
            addCol();
            countY++;
        }

    for (var i= 1; i<=rows; i++){

        for (var j = 0; j<cells; j++){


            var finder = getCookie("row"+i+"col"+j);

            document.getElementById('table').rows[i].cells[j].innerHTML= finder;


        }
    }
    avg(true);

}
// try get this to make the table again
function align () {
    var rows = document.getElementById('table').rows.length;
    var cells = document.getElementById('table').rows[0].cells.length;

    for (var i = 1; i<rows; i++){

        for (var j = 0; j<cells; j++){

            if(j===0 || j===1){
                document.getElementById('table').rows[i].cells[j].style.textAlign="right";
            }
        }
    }
}

function showCookie ()
{
    console.log(document.cookie);
}
function deleteRow () {
var table = document.getElementById('table');
var r = table.rows.length-1;

table.deleteRow(r);

start(row);

}

function deleteCol{
var table = document.getElementById('table');
var r = table.rows.length;
var c = table.rows[0].cells.length-2;

for (var i = 0; i<r; i++){

    table.rows[i].deleteCell(c);
 
}
avg();




}

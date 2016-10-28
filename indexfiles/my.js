function enableAll(){
var gy=document.frm.Gregorian;
var py=document.frm.Persian;
var iy=document.frm.Islamic;
if((gy.value=="" && py.value=="") && iy.value==""){
document.frm.Gregorian.disabled=false;
document.frm.Islamic.disabled=false;
document.frm.Persian.disabled=false;
}//end if
}//end function

function enables(field){
var gy=document.frm.Gregorian;
var py=document.frm.Persian;
var iy=document.frm.Islamic;
if(field.value==""){
 switch(field){
case gy: py.disabled=false;iy.disabled=false;break;
case py: gy.disabled=false;iy.disabled=false;break;
case iy: gy.disabled=false;py.disabled=false;break;
default: window.alert("Error");
}//end switch
}//end if
else {
//var val = parseFloat(field.value);
//if((typeof field.value!="number") || (val-(parseInt(val))>0)) alert("Year must be Integer and greater than 0 ");//under construction
switch(field){
case gy: py.disabled=true;iy.disabled=true;break;
case py: gy.disabled=true;iy.disabled=true;break;
case iy: gy.disabled=true;py.disabled=true;break;
default: window.alert("Error");
}//end switch
//window.alert("Clear contents of current field to enable other fields");
}//end else
}//end function
//Functions for Month
function enmonth(month){
var g=document.frm.mmonth;
var gval=g.options[g.selectedIndex].value;
var i=document.frm.imonth;
var ival=i.options[i.selectedIndex].value;
var s=document.frm.smonth;
var sval=s.options[s.selectedIndex].value;
if((gval=="" && ival=="") && sval=="") {
g.disabled=false;i.disabled=false;s.disabled=false;
}//end if
else{
switch(month){
case g:i.disabled=true;s.disabled=true;break;
case i:g.disabled=true;s.disabled=true;break;
case s:i.disabled=true;g.disabled=true;break;
default:alert("error");
}//end switch
}//end else
}//end function


//Functions for Day
function enday(day){
var g=document.frm.mday;
var gval=g.options[g.selectedIndex].value;
var i=document.frm.iday;
var ival=i.options[i.selectedIndex].value;
var s=document.frm.sday;
var sval=s.options[s.selectedIndex].value;
if((gval=="" && ival=="") && sval=="") {
g.disabled=false;i.disabled=false;s.disabled=false;
}//end if
else{
switch(day){
case g:i.disabled=true;s.disabled=true;break;
case i:g.disabled=true;s.disabled=true;break;
case s:i.disabled=true;g.disabled=true;break;
default:alert("error");
}//end switch
}//end else
}//end function

function validateInput(){
var g=document.frm.mday;
var gval=g.options[g.selectedIndex].value;
var i=document.frm.iday;
var ival=i.options[i.selectedIndex].value;
var s=document.frm.sday;
var sval=s.options[s.selectedIndex].value;
var error=new Array(3);
if((gval=="" && ival=="") && sval=="")error[0]="Day column empty";
var g=document.frm.mmonth;
var gval=g.options[g.selectedIndex].value;
var i=document.frm.imonth;
var ival=i.options[i.selectedIndex].value;
var s=document.frm.smonth;
var sval=s.options[s.selectedIndex].value;
if((gval=="" && ival=="") && sval=="")error[1]="Month column empty";
var gy=document.frm.Gregorian;
var py=document.frm.Persian;
var iy=document.frm.Islamic;
if((gy.value=="" && py.value=="") && iy.value=="")error[2]="Year column empty";
for(var i=0;i<3;i++)
if(typeof error[i]=="undefined")continue;
else alert(error[i]);
}
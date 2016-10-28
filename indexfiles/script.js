
var xhr = false;
 
function calculate() {


        
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) { }
        }
    }
    
    
 
    if (xhr) {
    
    
        //Add data here      
        var data  = "Gregorian="+document.getElementById('Gregorian').value;  
            data += "&mmonth="+document.getElementById('mmonth').value;
            data += "&mday="+document.getElementById('mday').value;
            data += "&Islamic="+document.getElementById('Islamic').value;
            data += "&imonth="+document.getElementById('imonth').value;
            data += "&iday="+document.getElementById('iday').value;
            data += "&Persian="+document.getElementById('Persian').value;
            data += "&smonth="+document.getElementById('smonth').value;
            data += "&sday="+document.getElementById('sday').value;
            
        //xhr.onreadystatechange = showState;
        xhr.open("POST", "calen/index.php", true);               
        //xhr.open("GET", "calen/index.php?"+data, true);               
        
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("Content-length", data.length);
        xhr.setRequestHeader("Connection", "close");
         
            xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
            }
            }
       xhr.send(data);
       //xhr.send(null);
    }
    else {
        document.getElementById("result").innerHTML = "Sorry, but JavaScript couldn't create an XMLHttpRequest";
    }
    
}
/*
function showState() {
    document.getElementById("msg").innerHTML = xhr.responseText;
} 
*/       
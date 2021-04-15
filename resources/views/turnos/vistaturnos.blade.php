<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('recursos/img/itsco.jpg')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Vista turnos</title>
</head>
<body onload="startTime()">


<script>
     function consulta() {
       var datos= $.ajax({
            
            url: "vistaturnos2",
            dataType: "text",
            async:false
          
        }).responseText;

        var contenido=document.getElementById('contenido');
        contenido.innerHTML=datos;
        
    }
   
    setInterval(consulta,100);

    function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 100);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
   
    </script>
<style>
body{
  background-color: #2d4838;
}
table {
  border-collapse: collapse;
  width: 200%;
  margin-left: 10px;

}

th, td {
  text-align: left;
  padding: 8px;
  font-size: 35px;
}

tr:nth-child(even){background-color: #2d4838}

th {
  background-color: #b29858;
  color: white;
}

.clockdate-wrapper {
    background-color: #2d4838;
    padding:25px;
    max-width:350px;
    width:100%;
    text-align:center;
    border-radius:5px;
    margin-left: 1000px;
    
}
#clock{
    
    font-family: sans-serif;
    font-size:60px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
  
    text-shadow:0px 0px 1px #333;
    font-size:30px;
    position:relative;
    top:-27px;
    left:-10px;
}
#date {
    letter-spacing:10px;
    font-size:20px;
    font-family:arial,sans-serif;
    color:#fff;
}
div.vista{
    margin-top: 50px;
}
#contenido {
    margin-left: 20px;
}
#info{
 color: #fff;

 text-align: center;
}
</style>

<div id="info">
  <h1>INFORMACIÓN</h1>
</div>

<div>
<div id="clockdate">
  <div class="clockdate-wrapper">
    <div id="clock" ></div>
    <div id="date" hidden="" ></div>
  </div>
</div>
</div>



<div class="container-fluid">
  <div class="row">
    <div class="col">
     
<div id="contenido">

</div>

    </div>
    <div class="col">
     
    <div class="video">

<video src="recursos/video/itsco.mp4" width="800" height="500"  autoplay muted loop  >
  Tu navegador no implementa el elemento <code>video</code>

</video>

</div>
    </div>
  </div>

  </div>






</body>
<script src="recursos/vendor/jquery/jquery.min.js"></script>
<script  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</html>
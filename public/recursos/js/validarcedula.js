function validar() {
    var cad = $('#txtcedula').val().trim();
   
  

         var total = 0;
var longitud = cad.length;
var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10) {
            for (i = 0; i < longcheck; i++) {
                if (i % 2 === 0) {
                    var aux = cad.charAt(i) * 2;
                    if (aux > 9) aux -= 9;
                    total += aux;
                } else {
                    total += parseInt(cad.charAt(i));
                }
            }

            total = total % 10 ? 10 - total % 10 : 0;

            if (cad.charAt(longitud - 1) == total) {

                alert("Cedula correcta");
                $('#txtcedula').css({"background":"white"});
            }
            else {
                alert("Cedula incorrecta");
               $('#txtcedula').css({"background":"red"});
               $('#txtapellidos').focus();
            }
        } else {
            alert("La cédula debe tener 10  dígitos");
            $('#txtcedula').css({"background":"red"});
         
        }
    



}
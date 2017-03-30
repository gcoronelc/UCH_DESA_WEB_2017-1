//Capturo los datos del boton enviar con la funcion factorial aunque tambien se puede hacer directamente
document.getElementById("enviar").onclick = function() {total()};

 //esta funcion captura  el factorial del numero introducido  en el campo
function total() {
    //este es el total que usare despues
    
   var cuotaMensual = 0;
    //estoy capturando el numero que introduje por el campo delformulario
    var capital = document.getElementById("cap").value;
    var interes = document.getElementById("inte").value;
    var meses = document.getElementById("mes").value;
    var capiPendiente = capital; 
    //aqui estoy calculando el factorial

    document.write( "<table border="+1+">"+
                        "<thead>"+
                        "<tr>"+
                            "<th>MES</th>"+
                            "<th>CAPITAL</th>"+
                            "<th>INTERES</th>"+
                            "<th>TOTAL</th>"+

                        "</tr>"+
                        "</thead>"+
                        "<tbody>");

     for(var i = 1; i <= meses; i++){
        cuotaMensual = Math.round((capital*interes*Math.pow((1+interes),meses)+1)/Math.pow((1+interes),meses));
        intereses = Math.round(capiPendiente*interes*100)/100;
        amortizacion = Math.round((cuotaMensual-intereses)*100)/100;
        capiPendiente = Math.round((capiPendiente-amortizacion)*100)/100;

        document.write(                       
                        "<tr>"+
                            "<td>"+ i +"</td>"+
                            "<td>"+ capital +"</td>"+
                            "<td>"+ intereses +"</td>"+
                            "<td>"+ capiPendiente +"</td>"+
                       "</tr>");
     }   

      document.write(  "</tbody>"+
                       "</table>");

      document.write( '<input type="button" onclick="location='+"'index.html'"+'" value="Regresar" />');

    /*escribe el mensaje en la pagina
    document.getElementById("res1").innerHTML = mensual; 
    document.getElementById("res2").innerHTML = capital;
    document.getElementById("res3").innerHTML = interes;
    document.getElementById("res4").innerHTML = total;
    total=0; 
    }
    //esto manda el alerta
    alert("Factorial del numero es: "+ total);*/
}    
 
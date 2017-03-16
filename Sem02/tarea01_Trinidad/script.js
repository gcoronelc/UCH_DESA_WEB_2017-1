//Capturo los datos del boton enviar con la funcion factorial aunque tambien se puede hacer directamente
document.getElementById("enviar").onclick = function() {factorial()};

 //esta funcion captura  el factorial del numero introducido  en el campo
function factorial() {
    //este es el total que usare despues
    var total = 1; 
    //estoy capturando el numero que introduje por el campo delformulario
    var numero = document.getElementById("input").value;
    //aqui estoy calculando el factorial
    for (i=1; i<=numero; i++) {
        total = total * i; 
    }
    //esto escribe el mensaje en la pagina
    document.getElementById("res1").innerHTML = "Numero:"+ numero;
    document.getElementById("res2").innerHTML = "Factorial del Numero: "+ total;
	//esto lanza el alerta
    alert("Factorial del numero es: "+ total);
}    

// si no entienden bueno :v
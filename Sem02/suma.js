function fnProcesar(){
	// Datos
	var n1 = parseInt(document.getElementById("n1").value);
	var n2 = parseInt(document.getElementById("n2").value);
	// Proceso
	var suma = sumar(n1,n2);
	// Reporte
	document.getElementById("rn1").textContent = n1;
	document.getElementById("rn2").textContent = n2;
	document.getElementById("suma").textContent = suma;
	showDiv(document.getElementById("divRepo"));
	hideDiv(document.getElementById("divForm"));
}
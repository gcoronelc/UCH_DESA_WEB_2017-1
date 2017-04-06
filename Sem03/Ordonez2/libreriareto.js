
function procesarCuotas(capital, interes, meses)
{
	var repo = calcularCuotas(capital,interes,meses);
	var cuerpoTabla = document.getElementById("cuerpoTabla");
	
	// Limpiar cuerpo de tabla
	while (cuerpoTabla.hasChildNodes()){
		cuerpoTabla.removeChild(cuerpoTabla.firstChild);
	}
	
	// Cargar datos a tabla
	for (var i = 0; i < meses; i++)
	{
		// Construir fila de tabla
		var rowTabla = cuerpoTabla.insertRow(cuerpoTabla.rows.length);
  		var cellMes = rowTabla.insertCell(0);
  		var cellCapital = rowTabla.insertCell(1);
  		var cellInteres = rowTabla.insertCell(2);
		var cellTotal = rowTabla.insertCell(3);
		// Datos
		var rowData = repo[i];
		cellMes.innerHTML = (i + 1);
		cellCapital.innerHTML = rowData[0];
		cellInteres.innerHTML = rowData[1];
		cellTotal.innerHTML = rowData[2];

	}
	
}
	
function calcularCuotas(capital, interes, meses)
{	
	var cuotaFija = to2Dec(parseFloat(capital / meses));
	var interesCuota;
	var total;
	var repo = [];
	for (var i = 0; i < meses; i++)
	{
		if(i == (meses-1)){
			cuotaFija = to2Dec(capital);
		}
		interesCuota = to2Dec( parseFloat(capital * interes / 100) );
		total = to2Dec( cuotaFija + interesCuota );
		var fila = [cuotaFija,interesCuota,total];
		repo[i] = fila;
		capital -= cuotaFija;
	}
	return repo;
}	
	
function resetView()
{
	document.getElementById("form").style.display = "block";
	document.getElementById("resultado").style.display = "none";
	document.getElementById("capital").value = "";
	document.getElementById("interes").value = "";
	document.getElementById("meses").value = "";
	document.getElementById("capital").focus();
}

function to2Dec(num){
	return Math.round(num * 100) / 100;
}
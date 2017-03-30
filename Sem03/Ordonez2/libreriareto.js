
function procesarCuotas(capital, interes, meses)
{
	var repo = calcularCuotas(capital,interes,meses);
	var cuerpoTabla = document.getElementById("cuerpoTabla");
	
	//cuerpoTabla.empty();
	
	for (var i = 0; i < meses; i++)
	{
		var rowData = repo[i];
		var rowHtml = "<tr><td>" + (i+1) + "</td>";
		for(var j = 0; j < 3; j++)
		{
		  rowHtml = rowHtml + "<td>" + rowData[j] + "</td>";
		}
		rowHtml = rowHtml + "</tr>"
		cuerpoTabla.appendChild(rowHtml);
	}
}
	
function calcularCuotas(capital, interes, meses)
{	
	var cuotaFija = parseFloat(capital / meses);
	var interesCuota;
	var total;
	var repo = [];
	for (var i = 0; i < meses; i++)
	{
		interesCuota = parseFloat(capital * interes / 100);
		total = cuotaFija + interesCuota;
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

function procesarCuotas(capital, interes, meses)
{
	var repo = calcularCuotas(capital,interes,meses);
	var html = '<table border="1" cellspacing="0">';	
	html = html + '<tr><td><b>Mes</b></td><td><b>Capital</b></td><td><b>Interes</b></td><td><b>Total</b></td></tr>';
	for (var i = 0; i < meses; i++)
	{
		var rowData = repo[i];
		var rowHtml = "<tr><td>" + (i+1) + "</td>";
		for(var j = 0; j < 3; j++)
		{
		  rowHtml = rowHtml + "<td>" + rowData[j] + "</td>";
		}
		rowHtml = rowHtml + "</tr>"
		html = html + rowHtml;
	}
	html += '</table><p><button onclick="resetView()">Retornar</button></p>';
	document.getElementById("resultado").style.display = "block";
	document.getElementById("resultado").innerHTML = html;
	document.getElementById("form").style.display = "none";
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
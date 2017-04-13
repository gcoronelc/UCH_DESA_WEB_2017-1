function unSerialize(data)
{
	var flatData = [];

	for (var i = data.length - 1; i >= 0; i--)
	{
		var row = data[i];
		flatData[row.name] = row.value;
	}

	return flatData;
}

function procesarData(data)
{
	var retorno				= {};
	retorno.pago_por_hora	= parseFloat(data.pago_por_hora);
	retorno.asignacion		= data.hijos_menores_edad * 60;
	retorno.total_horas		= data.horas_diarias * data.cantidad_dias;
	retorno.sueldo_total	= retorno.total_horas * retorno.pago_por_hora;
	retorno.bono			= retorno.total_horas >= 150 ? retorno.sueldo_total * 0.15 : 0;
	retorno.ingresos		= retorno.sueldo_total + retorno.asignacion + retorno.bono;
	retorno.renta			= retorno.ingresos > 1500 ? retorno.ingresos * 0.08 : 0;
	retorno.neto			= retorno.ingresos - retorno.renta;

	return retorno;
}
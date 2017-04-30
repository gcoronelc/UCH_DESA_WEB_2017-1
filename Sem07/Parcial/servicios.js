// Este servicio recibe como datos la categoria, el curso
// y la cantidad de participantes, retorna todos los datos
// de la venta como un objeto.
function fnProcesar(categoria, curso, cantidad){
	// Proceso
	var precio = fnPrecio(categoria); 
	var ganancia = fnGanancia(categoria, cantidad);
	var total = precio * cantidad;
	var importe = total / 1.18;
	var impuesto = total - importe;
	var comision = importe * ganancia;
	// Reporte
	var venta = {
		categoria	: categoria,
		curso		  : curso,
		cantidad	: cantidad,
		precio    : precio,
		ganancia	: ganancia,
		total     : total,
		importe   : importe,
		impuesto  : impuesto,
		comision  : comision
	};
	return venta;
}

// Este servicio, en base a la categoria retorna el precio
function fnPrecio(categoria){
	var precio = 0.0;
	if(categoria=='Programacion'){
		precio = 800.0;
	} else if(categoria=='Ofimatica'){
		precio = 500.00;
	} else if(categoria=='Administracion'){
		precio = 1800.00;
	} else if(categoria=='Otros'){
		precio = 1000.00;
	}
	return precio;
}

// Este servicio, en base a la categoria y la cantidad
// de participantes retorna la ganancia que se debe aplicar.
function fnGanancia(categoria, cantidad){
	var ganancia = 0.0;
	if(categoria=='Programacion'){
		ganancia = (cantidad>12)?0.07:0.05;
	} else if(categoria=='Ofimatica'){
		ganancia = (cantidad>12)?0.05:0.03;
	} else if(categoria=='Administracion'){
		ganancia = (cantidad>12)?0.10:0.08;
	} else if(categoria=='Otros'){
		ganancia = (cantidad>12)?0.06:0.04;
	}
	return ganancia;
}


// Este servicio recibe todas las venta y las categorias,
// luego retorna un arreglo de objetos con el resumen
// por cada categoría.
function procResumen(ventas, categorias){
  var resumen = [];
  for (var i = 0; i < categorias.length; i++) {
  	var cateResumen = procResumenCat(ventas,categorias[i]);
  	if(cateResumen.cantidad > 0){
  		resumen.push(cateResumen);		
  	}
  }
  return resumen;
}

// Este servicio acepta dos parámetros, las ventas y una categoría.
// Este servicio retorna un objeto con el resumen de una categoria
function procResumenCat(ventas, categoria){
	var objResumen = {
		categoria  : categoria,
		cantidad   : 0,
		importe    : 0.0,
		impuesto   : 0.0,
		total      : 0.0,
		comision   : 0.0
	};
	for (var i = 0; i < ventas.length; i++) {
		if(ventas[i].categoria == categoria){
			objResumen.cantidad = objResumen.cantidad + ventas[i].cantidad;
			objResumen.importe  = objResumen.importe + ventas[i].importe;
			objResumen.impuesto = objResumen.impuesto + ventas[i].impuesto;
			objResumen.total    = objResumen.total + ventas[i].total;
			objResumen.comision = objResumen.comision + ventas[i].comision;
		}
	}
	return objResumen;
}
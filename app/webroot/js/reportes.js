// myDate = new Date();
// dia = myDate.getDate();
// mes = myDate.getMonth()+1;
// ano = myDate.getFullYear();
// hoy = dia + "/" + mes + "/" + ano;
// endDate = new Date();
// $('#rango-fecha').change(function () {
// 	switch(this.value){
// 		case "hoy":
// 			$('#startDate').val(hoy); 
// 			$('#endDate').val(hoy); 
// 		case "sem":
// 			$('#startDate').val(hoy); 
// 			$('#endDate').val(valueOf(endDate.setDate(endDate.getDate()+7))); 	

// 	}
// });

$('#primerafecha').change(function(){
	$('#firstDate').val(this.value);
});
$('#segundafecha').change(function(){
	$('#secondDate').val(this.value);
});
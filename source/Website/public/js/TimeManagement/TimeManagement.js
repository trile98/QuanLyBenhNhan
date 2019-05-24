 $(function () {
 	$('#starttimepicker').datetimepicker({
 		format: 'HH:mm'
 	});

 	$('#endtimepicker').datetimepicker({
 		format: 'HH:mm'
 	});

 	$("#datepicker").datepicker({         
			autoclose: true,         
			todayHighlight: true 
		}).datepicker('update', new Date());
 });
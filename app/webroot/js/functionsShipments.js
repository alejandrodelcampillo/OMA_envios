function showRequestReturnRate(formData, jqForm, options) {
	$('#formContent').slideUp();
	$('.loader').removeClass("hide-content");


	return true;
}

function showResponseReturnRate(responseText, statusText, xhr, $form) {
	$('.loader').addClass("hide-content");

	$("#responseContent").html(responseText);

	$("#responseContent").slideDown();

	$("#backBtn").unbind('click').click(function(){
		$("#responseContent").slideUp();
		$("#responseContent").empty();
		$("#taxForm").resetForm();
		$('#formContent').slideDown();

	});
}

$("#taxForm").ajaxForm({
		beforeSubmit:  showRequestReturnRate,  // pre-submit callback 
        success:       showResponseReturnRate  // post-submit callback 
});


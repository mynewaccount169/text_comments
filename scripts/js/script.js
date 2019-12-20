$(document).ready(function(){

	$('#contact_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:path_add + "/Add/validation",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			beforeSend:function(){
				$('#addToBase').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				if(data.error)
				{
					if(data.email_error != '')
					{
						$('#email_error').html(data.email_error);
					}
					else
					{
						$('#email_error').html('');
					}
					if(data.subject_error != '')
					{
						$('#fio_error').html(data.fio_error);
					}
					else
					{
						$('#fio_error').html('');
					}
					if(data.message_error != '')
					{
						$('#text_error').html(data.text_error);
					}
					else
					{
						$('#text_error').html('');
					}
				}
				if(data.success)
				{
					$('#success_message').html(data.success);


					setTimeout(function() {
						location.reload()
					}, 1500);

					$('#email_error').html('');
					$('#text_error').html('');
					$('#fio_error').html('');
					$('#contact_form')[0].reset();
				}
				$('#addToBase').attr('disabled', false);
			}
		})
	});

});
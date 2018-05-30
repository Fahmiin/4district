$(document).ready(function()
{
	$.ajaxSetup(
	{
	   	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$('.reply').on('click', function(e)
	{
		e.preventDefault();
		const ask_id = $(this).data('askid');
		
		if ($(ask_id).hasClass('hidden'))
		{
			$(ask_id).removeClass('hidden');
		}
		else
		{
			$(ask_id).addClass('hidden');
		}	
	});
});
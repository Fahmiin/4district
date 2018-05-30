$(document).ready(function()
{
	$('.reply').on('click', function(e)
	{
		e.preventDefault();
		const ask_id = $(this).data('askid');
		
		$(ask_id).toggle(500);
	});
});
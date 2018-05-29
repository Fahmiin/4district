$(document).ready(function()
{
	$('.bookmark').on('click', function(e)
	{
		e.preventDefault();
		const post_id = $(this).data('postid');

		$('#'+post_id).hide(500);
		setTimeout(function()
		{
			$('#'+post_id).remove();
			$('#comments'+post_id).remove();
		}, 500);
	});
});
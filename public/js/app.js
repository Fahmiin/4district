const drop = document.querySelector('.dropdown-trigger');
M.Dropdown.init(drop);

const modal = document.querySelectorAll('.modal');
M.Modal.init(modal);

const float = document.querySelector('.fixed-action-btn');
M.FloatingActionButton.init(float);

$(document).ready(function()
{
	$.ajaxSetup(
	{
	   	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$('#answerButton').on('click', function()
	{
		const value = $('#answerText').val();
		$('#answerInput').append(value);
		$('#answerTab').hide(500);
	});

	$('.bookmark').on('click', function(e)
	{
		const post_id = $(this).data('postid');
		e.preventDefault();

		$.ajax(
		{
			type: 'POST',
			url: '/bookmark',
			data: {post_id: post_id},
			success: function(data)
			{
				const bookmark = '#bookmark'+post_id;

				if(data == 1)
				{
					$(bookmark)
						.addClass('white-text');
				}
				else
				{
					$(bookmark)
						.removeClass('white-text')
						.addClass('black-text');
				}
			}
		});
	});

	$('.like').on('click', function(e)
	{
		const post_id = $(this).data('postid');
		e.preventDefault();

		$.ajax(
		{
			type: 'POST',
			url: '/like',
			data: {post_id: post_id},
			success: function(data)
			{
				const like = '#like'+post_id;

				if(data == 1)
				{
					$(like)
						.addClass('red-text');
				}
				else
				{
					$(like)
						.removeClass('red-text');
				}
			}
		});
	});
});
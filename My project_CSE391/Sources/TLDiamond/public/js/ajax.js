
$(document).on('click','a.add-cart-quick',function(e){
	e.preventDefault();
	var href = $(this).attr('href');
	var id = $(this).data('id');
	$.ajax({
		url:href,
		type:'GET',
		success:function(res){
			$('#cart-mini').load(location.href + ' #cart-mini>*','');

			$('#show-pro-'+id).modal('hide');
		}
	});
}) 
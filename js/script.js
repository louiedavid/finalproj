$(document).ready(function(){
	
	$('.chef').click(function(){
		$('#chef-con-form').fadeToggle(500);
	});
	$('.paotsin').click(function(){
		$('#paotsin-con-form').fadeToggle(500);
	});
	$('.all-round').click(function(){
		$('#allround-con-form').fadeToggle(500);
	});
	
	$('.mask').click(function(){
		$(this).parent().fadeToggle(500);	
	});
	
	$("#chef-con-form input[type='checkbox']").on('click', function(){
		if($(this).is(':checked')){
			$(this).parent().parent().find('td.tbl-qty').append("<input type='number' name='quantity[]' class='quantity'>");
		} else {
			$(this).parent().parent().find('td.tbl-qty input').remove();
			$(this).parent().parent().find('td.total').text(' ');
		}
	});
	
	$("#paotsin-con-form input[type='checkbox']").on('click', function(){
		if($(this).is(':checked')){
			$(this).parent().parent().find('td.tbl-qty').append("<input type='number' name='quantity[]' class='quantity'>");
		} else {
			$(this).parent().parent().find('td.tbl-qty input').remove();
			$(this).parent().parent().find('td.total').text(' ');
		}
	});
	
	$('.chef').hover(
		function(){
      	  $(this).append('<div class="title">Chef\'s Station</div>');
		}, function(){
      	  $(this).find('.title').remove();
		}
	);
	
	$('.paotsin').hover(
		function(){
      	  $(this).append('<div class="title">Paotsin</div>');
		}, function(){
      	  $(this).find('.title').remove();
		}
	);
	
	$('.all-round').hover(
		function(){
      	  $(this).append('<div class="title">All Round</div>');
		}, function(){
      	  $(this).find('.title').remove();
		}
	);
	
	
	
	$('body').on('keyup','.quantity',function(){
		
		var totalallchef = 0;
		var totalallpaotsin = 0;
		
		var qty = $(this).val();
		var price = parseFloat($(this).parent().prev().text());
		
		if(qty == null){
			qty = 0;	
		}
		
		
		var total = qty*price;
		$(this).parent().parent().find('td.total').text(total.toFixed(2));
		
		$('#chef-con-form .chef-add table td.total').each(function(){
			if($('#nav .user span').text() == 'Student'){
				var ctprice = $(this).text();
				if(ctprice == null || ctprice == ''){
					ctprice = 0;	
				}
				totalallchef += parseFloat(ctprice);
			} else if($('#nav .user span').text() == 'Professor'){
				var ctprice = $(this).text();
				if(ctprice == null || ctprice == ''){
					ctprice = 0;	
				}
				totalallchef += parseFloat(ctprice);
			}
			
			
		});
		
		if($('#nav .user span').text() == 'Student'){
				$('#chef-con-form .chef-add #totalall span').text(totalallchef.toFixed(2));
		} else if($('#nav .user span').text() == 'Professor'){
				$('#chef-con-form .chef-add #totalall span').text(totalallchef.toFixed(2) - (totalallchef*.10));
		}
		
		
		
		$('#paotsin-con-form .paotsin-add table td.total').each(function(){
			var ptprice = $(this).text();
			if(ptprice == null || ptprice == ''){
				ptprice = 0;	
			}
			totalallpaotsin += parseFloat(ptprice);
		});
		
		
		if($('#nav .user span').text() == 'Student'){
		$('#paotsin-con-form .paotsin-add #totalall span').text(totalallpaotsin.toFixed(2));
		} else if($('#nav .user span').text() == 'Professor'){
		$('#paotsin-con-form .paotsin-add #totalall span').text(totalallpaotsin.toFixed(2)- (totalallpaotsin*.10));
		}
		

		
	});
});
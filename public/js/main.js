$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$(".fancya").fancybox({
		type: "ajax"
	});

	$.get('/admin/fields', function(data){
	    $(".typeahead").typeahead({ source:data });
	},'json');

	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(5000).fadeOut(350);

	
    $('.datepicker').datetimepicker({
    	format: 'YYYY-MM-DD HH:mm:ss'
    });


    /*$('.countdown').countdown()
	.on('update.countdown', function(event) {
	  var format = '%H:%M:%S';
	  if(event.offset.totalDays > 0) {
	    format = '%-d day%!d ' + format;
	  }
	  if(event.offset.weeks > 0) {
	    format = '%-w week%!w ' + format;
	  }
	  $(this).html(event.strftime(format));
	})
	.on('finish.countdown', function(event) {
	  $(this).html('This offer has expired!')
	    .parent().addClass('disabled');

	});*/


	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
	    $this.html(event.strftime('%H:%M:%S'));
	  });
	});


	$("#ratings").starRating({
	    starSize: 25,
	    callback: function(currentRating, $el){
	    	var event_id = $("#event_id").val();
	        $( "#rank_number" ).load( "/events/"+event_id+"/vote/"+currentRating );
	    }
	});
});
$(document).ready(function() {

	function nl2br (str, is_xhtml) {
	    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
	}

	$(".findselect").select2();

	$(".tr_autodestroy").mouseup( function () {
		$(this).remove();
		var form = $(this).data('form');
		$("#"+form).submit();
	})

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

	$(".btn-vote").click( function () {
		var id = $(this).data('id');
	    $( "#votenumber-" + id  ).load( "/posts/" + id+"/vote/");
	    $(this).addClass('btn-danger');
	});

	$( "#avatar" ).change(function() {
		var filename = $(this).val().split('\\').pop();
		$('.file-text').text(" : " + filename);
		$('.file-lavel').removeClass("btn-default");
		$('.file-lavel').addClass("btn-info");
	});

	$(".next-btn").click( function(){
		window.location.replace("/next/" + moment().format('YYYY-MM-DD HH:mm:ss'));
	});

	if($("#chatbox").length > 0) {
		function actualizachat(todo) {
			var todo = todo || 0;
			var user_on = $("#user_on");
			if(todo == 1) {
				var url2get = "/chats/" + user_on.val() + "/edit";
			} else {
				var url2get = "/lastchats/" + user_on.val() + "/" + $("#last").val();
			}
			console.log(url2get);
			$.getJSON( url2get, function( data ) {
			var last = 0;
			  var items = [];
			  $.each( data, function( key, val ) {
			    items.push( "<div class='chat " + val.user.rol + "' id='" + key + "'>" + val.name + "</div>" );
			    last = val.id;
			  });

			 
			  if($("#last").val() < last || todo == 1) {
			  	console.log(last + " | " + $("#last").val());
			  	$("#last").val(last);
			  	$("#chatbox").append(items.join( "" ));
			  	$("#chatbox").scrollTop($("#chatbox").height() + 100);
			  }

			  
			});
		}
		var intervalo = setInterval(actualizachat, 3000);
	}
	function sendchat() {
		var name = $("#name");
		var user_on = $("#user_on");
		if(name.val().length < 1) {
			alert("Tu mensaje es demasiado corto.");
		} else {
			$.ajax({
	            type: "POST",
	            url: "/chats",
	            data: { user_on: user_on.val(), name: name.val(), _token: token },
	            success: function (data) {
	                name.val("");
	                name.focus();
	            }
	        });	
		}
	}
	// detectar enter
	$("#name").keypress(function(e) {
    	if(e.which == 13) {
          sendchat();
       }

    });

	$("#sendchat").click(function() {
		sendchat();
	});

	//setear usuario
	$( "#cambiarusuarios" ).change(function() {
		$('#user_on').val($(this).val());
		$('#chatbox').empty();
		actualizachat(1);
	});

	/*AGREGAR COMENTARIO*/
	$(".sendcomment").click(function() {
		var id = $(this).data('id');
		var name = $("#name-" + id).val();

		if(name.length < 2) {
			alert("Tu mensaje es demasiado corto.");
		} else {
			$.get({
	            type: "POST",
	            url: "/comments",
	            data: { post_id: id, name: name, _token: token },
	            success: function (data) {
	            	$("#name-" + id).val("");
	            	
	            		var obj = jQuery.parseJSON(data);
					    console.log(obj.name);
	            	$("#commentlist-" + id).append('<div class="comment"><strong>'+ obj.user.name +'</strong><p>' + obj.name + '</p></div>');
	            	$("#commentlist-" + id).addClass('autoh');
	            }
	        });	
		}

	});
	//verificador de altua
	$('.commentlist').each(function(indice, elemento) {
	  	if($(this).height() > 190) {
	  		$(this).parent('.comments').addClass("verbtn");
	  	}
	});
	//ver mas comentarios
	$(".btnesconde").click( function() {
		var id = $(this).data('id');
		$("#commentlist-" + id).addClass('autoh');
		$(this).hide();
	}); 


	$('.responsivetabs').tabCollapse();


});
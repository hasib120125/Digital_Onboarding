

$(document).ready(function(){
	$('.btn-trigger').click(function () {
		$(this).parents('.info-head').next(".info-dropdown").show();
	});
	$('.close').click(function () {
		$(this).parents('.info-dropdown').hide();
	});

	// Datepicker js
	$('.datepicker').datepicker();

	// Header main sidenav for moblie
	$('.sidenav').sidenav();

	// Nav dropdown for header right nav
	$('.dropdown-trigger').dropdown({
		closeOnClick: false
	});

	// Dashboard Tab
	$('.profile-tab').tabs();

	// We Are Tab
	$('.weare-tab').tabs(); 
	
	// guideLineAndOtherInfo Tab
	$('.guideLineAndOtherInfo-tab').tabs();



	$('#day1-form').on('submit',function(e){
	    $.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    e.preventDefault(e);

	        $.ajax({

	        type:"POST",
	        url:'cheklist-feedback',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	            // console.log(data);
							// $('#success-msg').html(data.responseText);
							$("#success-msg").html(data.responseText);
			        $("#success-msg").show();
			        setTimeout(function(){
			          $("#success-msg").hide();
			        }, 5000);
	        },
	        error: function(data){
						$("#success-msg").html(data.responseText);
						$("#success-msg").show();
						setTimeout(function(){
							$("#success-msg").hide();
						}, 5000);
	        }
	    })
  });


	$('#day14-form').on('submit',function(e){
	    $.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    e.preventDefault(e);

	        $.ajax({

	        type:"POST",
	        url:'cheklist-feedback',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	            // console.log(data);
							// $('#success-msg').html(data.responseText);
							$("#success-msg").html(data.responseText);
			        $("#success-msg").show();
			        setTimeout(function(){
			          $("#success-msg").hide();
			        }, 5000);
	        },
	        error: function(data){
						$("#success-msg").html(data.responseText);
						$("#success-msg").show();
						setTimeout(function(){
							$("#success-msg").hide();
						}, 5000);
	        }
	    })
  });

	$('#day30-form').on('submit',function(e){
	    $.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    e.preventDefault(e);

	        $.ajax({

	        type:"POST",
	        url:'cheklist-feedback',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	            // console.log(data);
							// $('#success-msg').html(data.responseText);
							$("#success-msg").html(data.responseText);
			        $("#success-msg").show();
			        setTimeout(function(){
			          $("#success-msg").hide();
			        }, 5000);
	        },
	        error: function(data){
						$("#success-msg").html(data.responseText);
						$("#success-msg").show();
						setTimeout(function(){
							$("#success-msg").hide();
						}, 5000);
	        }
	    })
  });

	$('#day90-form').on('submit',function(e){
	    $.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    e.preventDefault(e);

	        $.ajax({

	        type:"POST",
	        url:'cheklist-feedback',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	            // console.log(data);
							// $('#success-msg').html(data.responseText);
							$("#success-msg").html(data.responseText);
			        $("#success-msg").show();
			        setTimeout(function(){
			          $("#success-msg").hide();
			        }, 5000);
	        },
	        error: function(data){
						$("#success-msg").html(data.responseText);
						$("#success-msg").show();
						setTimeout(function(){
							$("#success-msg").hide();
						}, 5000);
	        }
	    })
  });

});

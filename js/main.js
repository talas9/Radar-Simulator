$(function(){
	/*############## VARS ################*/
	var Debug = true;
	var mainDiv = $('.container[role="main"]');
	var sensorDetails = ["model1","model2","model3"];
	sensorDetails.model1 = [30,30,100,130];
	sensorDetails.model2 = [45,45,75,100];
	sensorDetails.model3 = [60,60,60,85];
	window.sensorDetails = sensorDetails;
	/*############## FUNCTIONS ###########*/
	function getWizard(){
		window.location.hash = "#start";
		$('.div-welcome').hide();
		$('.div-wizard').show();

		// INITIALIZE WIZARD
		$('.wizard').on('change', function(e, data) {
			console.log('change');
			if(data.step===3 && data.direction==='next') {
				// return e.preventDefault();
			}
		});
		$('.wizard').on('changed', function(e, data) {
			console.log('changed');
		});
		$('.wizard').on('finished', function(e, data) {
			console.log('finished');
		});
		$('.btnWizardPrev').on('click', function() {
			$('.wizard').wizard('previous');
		});
		$('.btnWizardNext').on('click', function() {
			var step = $('.wizard').wizard('selectedItem').step;
			var errors = 0;
			switch(step){
				case 1:
					$("data.region").val($(".Region.active").attr("val"));
					$('.wizard').wizard('next','foo');
					break;
				case 2:
					errors = 0;
					if($(".input.CarHeight").val() == "" || $(".input.CarHeight").val() == 'undefined'){
						$(".input.CarHeight").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if($(".input.CarWidth").val() == "" || $(".input.CarWidth").val() == 'undefined'){
						$(".input.CarWidth").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if($(".input.CarLength").val() == "" || $(".input.CarLength").val() == 'undefined'){
						$(".input.CarLength").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if(errors == 0 || Debug == true){
						$(".data.carHeight").val($(".input.CarHeight").val());
						$(".data.carWidth").val($(".input.CarWidth").val());
						$(".data.carLength").val($(".input.CarLength").val());
						$('.wizard').wizard('next','foo');
					}
					break;
				case 3:
				errors = 0;
					if($(".input.BeamArcH").val() == "" || $(".input.BeamArcH").val() == 'undefined'){
						$(".input.BeamArcH").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if($(".input.BeamArcV").val() == "" || $(".input.BeamArcV").val() == 'undefined'){
						$(".input.BeamArcV").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if($(".input.BeamArcD").val() == "" || $(".input.BeamArcD").val() == 'undefined'){
						$(".input.BeamArcD").addClass('inputError').change(function(){$(this).removeClass('inputError')});
						errors++;
					}
					if(errors == 0 || Debug == true){
						$(".data.sensorsCountFront").val(parseInt($(".front-sensors .btn-group button.active").html()));
						$(".data.sensorsCountRear").val(parseInt($(".rear-sensors .btn-group button.active").html()));

						//$('.wizard').wizard('next','foo');
					}
					break;
				default:
					if(Debug == true) $('.wizard').wizard('next','foo');
					break;		
			}
		});
		$('.btnWizardStep').on('click', function() {
			var item = $('.wizard').wizard('selectedItem');
			console.log(item.step);
		});
		$('.wizard').on('stepclick', function(e, data) {
			console.log('step' + data.step + ' clicked');
			if(data.step===1) {
				// return e.preventDefault();
			}
		});

	}

	/*############## EVENTS & ACTIONS ####*/
	switch(window.location.hash.toLowerCase()){
		case '#start':
			getWizard();
			break;
	}
	//Agree button event listener
	$('body').on('click','.btn-proceed',function(){
		getWizard();
	});
	//region event listener
	$('body').on('click','.Region',function(){
		$(this).parent().children().removeClass('active');
		$(this).addClass('active');
		if($(this).attr('val') == 'eu') $('.length-measurement').html('cm');
		else $('.length-measurement').html('inches');
	});
	//sensors count event listener
	$('body').on('click','.front-sensors .btn-group button,.rear-sensors .btn-group button',function(){
		$(this).parent().children().removeClass('active');
		$(this).addClass('active');
	});
	//sensor model event listener
	$('body').on('click','.sensorModel',function(){
		v = $(this).html().toLowerCase();
		if(v == "custom"){
			$(".beamDetails input").prop("readonly",false);
		}else{
			$(".beamDetails input").removeClass('inputError');
			$(".beamDetails input").prop("readonly",true);
			$(".input.BeamArcH").val(sensorDetails[v][0]);
			$(".input.BeamArcV").val(sensorDetails[v][1]);
			if($(".data.region").attr('val') == 'eu')
				$(".input.BeamArcD").val(sensorDetails[v][3]);
			else
				$(".input.BeamArcD").val(sensorDetails[v][2]);
		}
	});
	//focus on input inside "<li>"
	$('body').on('click','.list-group-item',function(){
		$(this).children('input').focus();
	});

});
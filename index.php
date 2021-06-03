<?php include "header.php" ?>
<div class="container-fluid">
	
<div class="alert h4 text-center ">
	Assignment
</div>

<div class="row">
	<div class="col-xl-3 col-3 m-auto">
		<div class="form-group">
	<label>Select City Name</label>
	<select id="city_name" name="city_name" class="form-control">
			
	</select>
	<p id="city_name_error" class="text-danger my-2"></p>
	<span id="city_action"></span>	
</div>
<!-- form-group -->		
	</div>
	<!-- col xl-3 close -->

</div>
<!-- row -->

<div class="row my-2">
	<div class="col-xl-4 col-4">
			<p class="h5 text-center">Select Birth Rate</p>
			<div class="row">
				<div class="col-xl-6 col-6">
			<label>Min</label>
			<input type="text" list="birth_rates_min" name="birth_rate_min" id="birth_rate_min" placeholder="Birth Min" class="form-control">
			<datalist id="birth_rates_min" >
			
				
			</datalist>

			<span id="b_min_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->
		<div class="col-xl-6 col-6">
			<label>Max</label>
			<input type="text" list="birth_rates_max" name="birth_rate_min" id="birth_rate_max" placeholder="Birth Max" class="form-control">
			<datalist id="birth_rates_max" >
							
			</datalist>
			<span id="b_max_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->
				
			</div>
			<!-- rate row -->

		</div>
		<!-- col 4 -->	

		<div class="col-xl-4 col-4">
			<p class="h5 text-center">Select Population</p>
			<div class="row">
				<div class="col-xl-6 col-6">
			<label>Min</label>
			<input type="text" list="populations_min" name="population_min" id="population_min" placeholder="Population Min" class="form-control" >
			<datalist id="populations_min" >
				
				
			</datalist>
			<span id="p_min_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->
		<div class="col-xl-6 col-6">
			<label>Max</label>
			<input type="text" list="populations_max" name="population_max" id="population_max" placeholder="Population Max" class="form-control">
			<datalist id="populations_max" >
				
				
			</datalist>
			<span id="p_max_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->
				
			</div>
			<!-- population row -->

		</div>
		<!-- col 4 -->
		

		<!-- height start -->


		<div class="col-xl-2 col-2 my-4">
			<label>Height</label>
			<input type="text" list="heights" name="height" id="height" class="form-control" placeholder="height">
			<datalist id="heights" >
				
			</datalist>
			<span id="height_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->

		<!-- Area start -->

		<div class="col-xl-2 col-2 my-4">
			<label>Area</label>
			<input type="text" list="areas" name="area" id="area" class="form-control" placeholder="Area" onchange="get_filterData()">
			<datalist id="areas" >
				
			</datalist>
			<span id="area_error" class="text-danger"></span>

		</div>
		<!-- col 1 -->
	
</div>
<!-- row 2 close -->



<!-- table start -->

<div class="table-responsive" id="table_data">
	
</div>
<!-- table responsive -->

</div>
<!-- container -->


<script type="text/javascript">

	

	function get_filterData()
	{
		var birth_min = $('#birth_rate_min').val();
		var birth_max = $('#birth_rate_max').val();

		var popu_min = $('#population_min').val();
		var popu_max = $('#population_max').val();

		var height = $('#height').val();
		var area = $('#area').val(); 

		var b_min_e='';
		var b_max_e='';
		var p_min_e='';
		var p_max_e='';
		var h_e='';
		var a_e='';

		if(birth_min.length == 0 || birth_min== ""){
                $('#b_min_error').html('Please fill Min Value');
                $('#birth_rate_min').addClass('is-invalid');
                b_min_e='yes';

            }else{
                $('#b_min_error').html(' ');
                 $('#birth_rate_min').removeClass('is-invalid');

                $('#birth_rate_min').addClass('is-valid');
                b_min_e='';

            }// birth min end

            if(birth_max.length == 0 || birth_max== ""){
                $('#b_max_error').html('Please fill Max Value');
                $('#birth_rate_max').addClass('is-invalid');
                b_max_e='yes';

            }else{
                $('#b_max_error').html(' ');
                 $('#birth_rate_max').removeClass('is-invalid');

                $('#birth_rate_max').addClass('is-valid');
                b_max_e='';

            }// birth max end

            if(popu_min.length == 0 || popu_min== ""){
                $('#p_min_error').html('Please fill Min Value');
                $('#population_min').addClass('is-invalid');
                p_min_e='yes';

            }else{
                $('#p_min_error').html(' ');
                 $('#population_min').removeClass('is-invalid');

                $('#population_min').addClass('is-valid');
                p_min_e='';

            }// population min

             if(popu_max.length == 0 || popu_max== ""){
                $('#p_max_error').html('Please fill Max Value');
                $('#population_max').addClass('is-invalid');
                p_max_e='yes';

            }else{
                $('#p_max_error').html(' ');
                 $('#population_max').removeClass('is-invalid');

                $('#population_max').addClass('is-valid');
                p_max_e='';

            }// population max


            if(height.length == 0 || height== ""){
                $('#height_error').html('Please fill it');
                $('#height').addClass('is-invalid');
                h_e='yes';

            }else{
                $('#height_error').html(' ');
                 $('#height').removeClass('is-invalid');

                $('#height').addClass('is-valid');
                h_e='';

            }// height

            if(area.length == 0 || area== ""){
                $('#area_error').html('Please fill it');
                $('#area').addClass('is-invalid');
                a_e='yes';

            }else{
                $('#area_error').html(' ');
                 $('#area').removeClass('is-invalid');

                $('#area').addClass('is-valid');
                a_e='';

            }// area
           

            if(b_max_e=='' && b_min_e == '' && p_max_e=='' && p_min_e == '' && h_e=='' && a_e == '')
            {
            	$.ajax({
            		method:"POST",
            		url:"fetch-filter.php",
            		data:{
            			birth_min:birth_min,
            			birth_max:birth_max,
            			popu_min:popu_min,
            			popu_max:popu_max,
            			height:height,
            			area:area
            		},
            		beforeSend:function()
            		{

            		},
            		success:function(res)
            		{
            			//alert(res)
            			$('#table_data').html(res);


            		},
            	});
            	
            }else{
            	alert('Please Fill All Field Properly');
            	$('#area').val('');
            }





		
		
	}// filter function close

	
	$(document).ready(function(){


		// city get 
		
		load_table_data();

		function load_table_data()
		{
			$.ajax({
				method:'POST',
				url:'fetch-city.php',
				dataType:'JSON',
				success:function(tdata)
				{
					$('#city_name').html(tdata.city);
					$('#birth_rates_min').html(tdata.birth);
					$('#birth_rates_max').html(tdata.birth);

					$('#populations_min').html(tdata.population);
					$('#populations_max').html(tdata.population);

                    $('#heights').html(tdata.height);
					$('#areas').html(tdata.area);
					
				},

			});
		}// load city name



		$('#city_name').on('change',function(){
			
			var	city_name = $('#city_name').val();
			//alert(city_name)
			

			var n_error='';
			if(city_name.length == 0 || city_name.length == ""){
                $('#city_name_error').html('Please Select this field');
                $('#city_name').addClass('is-invalid');
                n_error='yes';

            }else{
                $('#city_name_error').html(' ');
                 $('#city_name').removeClass('is-invalid');

                $('#city_name').addClass('is-valid');
                n_error='';

            }
            // name validation
           

            if(n_error == '')
            {
            	//$('#form_action').attr('disabled',true);
            	$.ajax({
            		method:'POST',
            		url:'fetch.php',
            		data:{city_name:city_name},
            		beforeSend:function(){
            			$('#city_action').html('Please Wait..')

            		},
            		success:function(data){
            			$('#table_data').html(data);
            			$('#city_action').html(' ')

            			

            		}
            	});

            }else{
            	return false;
            }


		});// get city data 


	});// document ready

	
</script>

<?php include "header.php" ?>
<?php 
require('db.php');

$sql="SELECT * FROM cities_list ORDER BY city_name ASC, births_per_woman_per_year ASC,population ASC ";

$query=mysqli_query($con,$sql);
$cityData='<option value="">Select City Name</option>';
$populationData='<option value="">Select</option>';
$birthData='<option value="">Select</option>';
$heightData='<option value="">Select</option>';
$areaData='<option value="">Select</option>';

if(mysqli_num_rows($query)>0){

while($run=mysqli_fetch_array($query))
{
	
	$cityData .= '<option value="'.$run['city_name'].'">'.$run['city_name'].'</option>';
	$populationData .= '<option value="'.$run['population'].'">'.$run['population'].'</option>';

	$birthData .= '<option value="'.$run['births_per_woman_per_year'].'">'.$run['births_per_woman_per_year'].'</option>';
	$heightData .= '<option value="'.$run['height'].'">'.$run['births_per_woman_per_year'].'</option>';

	$areaData .= '<option value="'.$run['area'].'">'.$run['births_per_woman_per_year'].'</option>';


}// while loop

}else{
	$cityData.='<option value="">Sorry there are no City Name</option>';
		$populationData.='<option value="">No Data</option>';
	$birthData.='<option value="">No Data</option>';

}

$tdata['city']=$cityData;
$tdata['population']=$populationData;
$tdata['birth']=$birthData;
$tdata['height']=$heightData;
$tdata['area']=$areaData;
echo json_encode($tdata);

 ?>
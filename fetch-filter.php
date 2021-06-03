<?php 
if(isset($_POST['birth_min']) && isset($_POST['birth_max'])  && isset($_POST['popu_min'])  && isset($_POST['popu_max'])  && isset($_POST['height'])  && isset($_POST['area']) )
{
	require('db.php');

	$birth_min = trim($_POST['birth_min']);
	$birth_max = trim($_POST['birth_max']);
	$popu_min = trim($_POST['popu_min']);
	$popu_max = trim($_POST['popu_max']);
	$height = trim($_POST['height']);
	$area = trim($_POST['area']);

	if(empty($birth_min) || empty($birth_max) || empty($popu_min) || empty($popu_max) || empty($height) || empty($area))
	{
		echo "Please Fill All Field Properly";
		die();

	}else{


$sql="SELECT * FROM cities_list WHERE births_per_woman_per_year BETWEEN '$birth_min' AND '$birth_max' && population BETWEEN '$popu_min' AND '$popu_max' && height='$height' && area='$area'";

$query=mysqli_query($con,$sql);
$tableData='<table class="table table-strip table-dark table-hover table-bordered">
<thead class=""><tr>
  <th>#</th>
  <th>City Name</th>
  <th>Area</th>
  <th>Population</th>
  <th>Height</th>
  <th>Population Density</th>
  <th>Birth/Women/Year</th>
  <th>Growth Rate</th>   
</tr></thead>
<tbody >';
if(mysqli_num_rows($query)>0){
$n=0;
while($run=mysqli_fetch_array($query))
{
	$n++;
	$tableData .= '<tr>
            <td>'.$n.'</td>
	        <td>'.$run['city_name'].'</td>
	        <td>'.$run['area'].'</td>
	        <td>'.$run['population'].'</td>
	        <td>'.$run['height'].'</td>
	        <td>'.$run['population_density'].'</td>
	        <td>'.$run['births_per_woman_per_year'].'</td>
	        <td>'.$run['growth_rate'].'</td>   
	        
	        
	        </tr>';
}// while loop

}else{
	$tableData.='<tr><td colspan="5">No data found</td></tr>';
}

$tableData .='</tbody><table>';

echo $tableData;



	}// empty els close


}else{

}// isset close else








 ?>
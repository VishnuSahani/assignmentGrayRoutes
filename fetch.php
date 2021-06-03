<?php 
require('db.php');

if(isset($_POST['city_name']))
{
   $city_name=$_POST['city_name'];

$sql="SELECT * FROM cities_list WHERE city_name ='$city_name'";

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

}


 ?>
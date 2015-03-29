<?php 
//header('Content-Type: text/html; charset=UTF-8');
$file = fopen("Book1.csv","r");
while($file_array  = fgetcsv($file))
{
	$arr_file[] = $file_array;

}
fclose($file);


for($i=0;$i<count($arr_file);$i++){
	$arr_file[$i][1] = md5($arr_file[$i][1]);
}
//print_r($arr_file);
//$file = fopen("Book1.csv","w");
//fputcsv($file,$arr_file);
//print_r($arr_file);
convert_to_csv($arr_file,'report.csv',',');
function convert_to_csv($input_array,$output_file_name,$delimter){
	$temp_memory = fopen('report.csv','w');
	foreach ($input_array as $line) {
		fputcsv($temp_memory, $line,$delimter);
	}
	fseek($temp_memory,0);
	header('Content-Type: application/csv');
    header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
     fpassthru($temp_memory);

}
?>

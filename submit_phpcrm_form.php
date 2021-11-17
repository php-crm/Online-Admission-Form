<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $student_dob=$_POST['student_dob'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $father_name=$_POST['father_name'];
  $Public_school_name=$_POST['Public_school_name'];
  $student_enter=$_POST['student_enter'];
  $attend=$_POST['attend'];
	$enrolled=$_POST['enrolled'];
  $school_complete=$_POST['school_complete'];
  $last_school=$_POST['last_school'];
  $suspended=$_POST['suspended'];
  $infraction=$_POST['infraction'];

  $field1="<b>Student Date of Birth:</b> ".$student_dob."<br>"."<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Father Name:</b> ".$father_name."<br>"."<b>Public High School Of Residence:</b> ".$Public_school_name."<br>"."<b>Year student entered 9th grade for the first time:</b> ".$student_enter."<br>"."<b>Is student currently enrolled and attending the school above?:</b> ".$attend."<br>"."<b>Grade currently enrolled in:</b> ".$enrolled."<br>"."<b>Did/will your child complete the 2020-2021 school year?:</b> ".$school_complete."<br>"."<b>Last School Name:</b> ".$last_school."<br>"."<b>Was your child suspended?:</b> ".$suspended."<br>"."<b>If yes, please give date, name of school & infraction:</b> ".$infraction;
}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>
<html>
<head>
	<title>Paper</title>
	<style>
		body
		{
			text-align: center;
		}
		.imag
		{
			width:80%;
		}
	</style>
</head>
<body>
	<?php
		$con = mysqli_connect("localhost","root","yourRootPassword","img_db");
		if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	
	/*	for($i=1;$i<=20;$i++)
		{
			for($j=1;$j<=4;$j++)
			{
				for($k=1;$k<=10;$k++)
				{
				//	echo "ques_".$i."_".$j."_".$k."<br/>";
					$insquery=mysqli_query($con, "INSERT INTO images (Name, Link, Chapter, Mark, ID, Flag) VALUES ('ques_".$i."_".$j."_".$k.".png', 'uploads/ques_".$i."_".$j."_".$k.".png', ".$i.", ".$j.", ".$k.", 0)");
				}
			}
		}
	*/

		$chapters = explode("-",$_GET['allchapters']);
		$mainarray = [];
		foreach ($chapters as $key => $value) {
			$mainarray[$value][1] = 0;
			$mainarray[$value][2] = 0;
			$mainarray[$value][3] = 0;
			$mainarray[$value][4] = 0;
		}
		foreach($_GET as $chapmark=>$ques)
		{
			if($chapmark == "allchapters")
				continue;
			else
			{
				$temp = explode("_", substr($chapmark,5));
				$mainarray[$temp[0]][$temp[1]] = $ques;
			}	
		}
		$arrayofquestions = [];
			$q=mysqli_query($con,"SELECT Name FROM images");

	foreach ($mainarray as $chap => $markarray) {
		foreach ($markarray as $mark => $ques) {
					if($ques == 0)
						continue;
					$allpossibility = [];
					$query = mysqli_query($con, "SELECT * FROM images WHERE Flag=0 AND Chapter=$chap AND Mark=$mark");
					while($row = mysqli_fetch_array($query))
					{
						array_push($allpossibility,$row['Link']);
					}
					if($ques == 1)
					{
						$toappend = array_rand($allpossibility);
						echo $allpossibility[$toappend[0]];
						array_push($arrayofquestions, $allpossibility[array_rand($allpossibility)]);
					}
					else
					{	$toappend = array_rand($allpossibility,$ques);
						foreach ($toappend as $key => $value) {
							array_push($arrayofquestions,$allpossibility[$value]);
					}
					}
				}		
	}
	function cmp($a,$b)
	{
		$tmp1=substr($a, 7, 1);
		$tmp2=substr($b, 7, 1);
		if($tmp1>$tmp2)
			return 1;
		return 0;	
	}
	usort($arrayofquestions,"cmp");

	//echo "<img src='http://localhost/paper/uploads/ques_1_1_3.png' alt='hello'/>";
	$MarkQuestions_1 = [];
	$MarkQuestions_2 = [];
	$MarkQuestions_3 = [];
	$MarkQuestions_4 = [];
	foreach ($arrayofquestions as $key => $value) {
		//echo "<img src='".$value."' alt='".$value."'/><br/>";
		if(substr($value, 15, 1)=="1")
		{
			array_push($MarkQuestions_1, $value);
		}
		else if(substr($value, 15, 1)=="2")
		{
			array_push($MarkQuestions_2, $value);
		}
		else if(substr($value, 15, 1)=="3")
		{
			array_push($MarkQuestions_3, $value);
		}
		else if(substr($value, 15, 1)=="4")
		{
			array_push($MarkQuestions_4, $value);
		}
		
		//echo $value."<br/>";

	}
	/*foreach($arrayofquestions)
	{
	}*/
	echo "<h1>Section A</h1>";
	foreach ($MarkQuestions_1 as $key => $value) {
		echo $value."<br/>";
	}
	echo "<h1>Section B</h1>";
	foreach ($MarkQuestions_2 as $key => $value) {
		echo $value."<br/>";
	}
	echo "<h1>Section C</h1>";
	foreach ($MarkQuestions_3 as $key => $value) {
		echo $value."<br/>";
	}
	echo "<h1>Section D</h1>";
	foreach ($MarkQuestions_4 as $key => $value) {
		echo $value."<br/>";
	}
	?>
	
	<!--
	1.<img class="imag" src="uploads/ques_1_1_1.JPG"/><br/>
	2.<img class="imag" src="uploads/ques_1_1_2.JPG"/><br/>
	3.<img class="imag" src="uploads/ques_1_1_3.JPG"/><br/>
	4.<img class="imag" src="uploads/ques_1_1_10.png"/><br/>
	-->

</body>
</html>

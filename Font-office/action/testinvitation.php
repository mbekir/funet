<?php
session_start();
$sender=$_SESSION["email"];//badelha bil email session
$db = mysqli_connect("localhost", "root", "", "funet");
$rech="h";//fase5ha
$result = mysqli_query($db, "SELECT * FROM membre where nom LIKE '%$rech%'  ");

while ($ligne = mysqli_fetch_array($result)) {
	$result2=mysqli_query($db, "SELECT * FROM invitation where sender='$sender' and receiver='$ligne[1]'");
	$ligne2= mysqli_fetch_array($result2);
	if($ligne2){
		$var="$ligne2[3]";
	}else{
		$var="add freind";
	}
echo "<div id='myDiv'>".$ligne[1]." ".$ligne[3]." ".$ligne[4]."<button class='myBtn' value=".$ligne[1]." ><span>".$var."</span></button><br></div>";

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 $(document).ready(function() {
        $('.myBtn').click(function() {
				var email= this.value;
				var a = $("span", this).text();
				if(a == "add freind"){
											
						
									var xhttp = new XMLHttpRequest();
									xhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
											var res=this.responseText;
											
											}
											
											};
											$("span",this).text("sent");
											xhttp.open("GET", "sent.php?q1="+email, true);
											xhttp.send();
											
					
				}
				
        });
    });
	
</script>
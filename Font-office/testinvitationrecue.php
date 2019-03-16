<?php
session_start();
$receiver=$_SESSION["email"];

$db = mysqli_connect("localhost", "root","", "funet");
$res = mysqli_query($db,"SELECT * FROM invitation where stat='sent' and receiver='$receiver'");
$row=mysqli_num_rows($res);

$imgicon="img.jpg";
if($row>0){
	$imgicon="img2.jpg";
}
?>


<html>
<body>
<ul>

<?php
echo "<li><img id='btn' src='images/$imgicon' width='20' height='20'></li>";
?>
<li id="list" class="list">
<?php
if($row==0){
	echo "<div>no invitation</div>";
}
while($ligne= mysqli_fetch_array($result)) {
	echo "<div class='so_invitation' value=".$ligne[1].">invitation from ".$ligne[1]."</div>";
	}
?>
<div class="hiden_div"></div>
</div>

</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>



<style>
.list{
	background-color:#6d6e71;
	border: bold 1px;
    margin-right:80%;
	display:none;
   
}

</style>
<script>

$(document).ready(function(){
	var x = document.getElementById("list");
	
	
    $('#btn').click(function(){
		
		$('#btn').attr('src','images/img.jpg');
		if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }	
		
			
	});
	$('.so_invitation').click(function(){
		var x=$(this).attr('value');
		
		
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var msg = this.responseText;
					alert(msg);
				}
			};
		
			xhttp.open("GET", "action/change_stat_to_friend.php?q="+x, true);
			xhttp.send();
			$(this).remove();
	});
});
</script>

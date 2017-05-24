<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	$conn = new mysqli("127.0.0.1", "root", "", "chaochao");
	
	$result = $conn->query("SELECT s.src, m.username, r.timestamp, r.comment FROM review r, member m, star s WHERE r.productid=39 AND r.userid=m.userid AND r.star=s.level");
	
	$out = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC))
	{
		if ($out != "[")
		{
			$out .= ",";
		}
		$out .= '{"username":"'	. $rs["username"]	. '",';
		$out .= '"time":"'		. $rs["timestamp"]	. '",';
		$out .= '"star":"'		. $rs["src"]		. '",';
		$out .= '"comment":"'	. $rs["comment"]	. '"}';
	}
	$out .= "]";
	echo $out;
	mysqli_close($conn);
?>
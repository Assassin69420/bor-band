<?php
function get_user_details($username, $db)
{
	$data = null;
	//connect to database
	$sql = "SELECT U_id, Username, U_name, U_gender, U_address, U_phone FROM useraccount WHERE username = '${username}'";

	$res = mysqli_query($db, $sql);
	$data = $res->fetch_assoc();
	return $data;
}

function get_customer_details($U_id, $db)
{
	$data = null;
	//connect to database
	$sql = "SELECT S.SerPName as provider_name ,S.sta_amount as service_amount, S.C_id as service_id
								 Service.S_name as service_name, Service.S_city as service_city, Service.S_phone as service_phone, Service.Of_id as offer_id
	 				FROM customers C
						INNER JOIN serviceprovider S on S.SerPName = C.C_conn
						INNER JOIN service as Service on Service.S_id = C.S_id
				 	WHERE C.C_id = '${U_id}'";

	$res = mysqli_query($db, $sql);
	$data = $res->fetch_assoc();
	return $data;
}

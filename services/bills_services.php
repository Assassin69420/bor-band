<?php

function get_bill_userplanid(string|null $related_plan_id, string|null $related_service_id, mysqli $db)
{
	if ($related_plan_id !== "") {
		$sql = "SELECT bill_id, user_id, amount, due_date, paid_date, related_plan, cgst_percentage, sgst_percentage FROM bills
						WHERE related_plan='$related_plan_id'";
	} else if ($related_service_id !== "") {
		$sql = "SELECT bill_id, user_id, amount, due_date, paid_date, related_plan, cgst_percentage, sgst_percentage FROM bills
						WHERE related_service='$related_service_id'";
	} else {
		throw new Exception('related_plan and related_service not set');
	}

	$res = mysqli_query($db, $sql);
	return $res;
}

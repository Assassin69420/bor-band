<?php
function purchase_plan($plan_id, $customer_id, $db)
{
	$my_date = date("Y-m-d H:i:s");
	$cust_insert_sql = "INSERT IGNORE INTO customers (C_id,C_conn,S_id) VALUES ('$customer_id',null,null)";
	$plan_create_sql = "INSERT INTO customer_plan_tracker (customer_id,plan_id,date_of_purchase) VALUES ('$customer_id','$plan_id','$my_date')";
	$db->begin_transaction();
	try {
		mysqli_query($db, $cust_insert_sql);
		mysqli_query($db, $plan_create_sql);
		$db->commit();
	} catch (mysqli_sql_exception $exception) {
		$db->rollback();
		throw $exception;
	}
}


function get_active_plans($customer_id, $db)
{
	$sql = $db->prepare("SELECT P.Plan_Name, P.Plan_id, P.Plan_ending_Date, P.Plan_Amount FROM customer_plan_tracker CP
						INNER JOIN plans P on P.Plan_id = CP.plan_id
					WHERE CP.customer_id = ?");
	$sql->bind_param('s', $customer_id);
	$sql->execute();
	$res = $sql->get_result();
	return $res;
}

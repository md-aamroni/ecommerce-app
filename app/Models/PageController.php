<?php

class PathologyController
{
	protected $table = 'app_home_pathology';
	protected $id;
	protected $title;
	protected $logo;
	protected $unit;
	protected $price;
	protected $status;

	protected $orderTable = 'app_home_pathology_orders';
	protected $orderID;
	protected $orderNo;
	protected $userID;
	protected $contactName;
	protected $contactMobile;
	protected $contactAddress;
	protected $orderStatus;
	protected $confirmedDate;
	protected $cancelledDate;
	protected $cancelledReason;
	protected $completedDate;
	protected $netAmount;
	protected $vatAmount;
	protected $serviceCharge;
	protected $miscCostAmount;
	protected $miscCostDetails;
	protected $totalAmount;
	protected $rating;
	protected $review;
	protected $specificColumn;

	protected $orderItemsTable = 'app_home_pathology_order_items';
	protected $itemOrderID;
	protected $itemID;
	protected $itemUnit;
	protected $itemQuantity;
	protected $itemPrice;
	protected $itemSubtotal;

	public function isModelExist()
	{
		$sqlQuery1	= $this->connection->query('SELECT * FROM ' . $this->table);
		$columns1   = $sqlQuery1->columnCount();
		try {
			if ($columns1) {
				for ($i = 0; $i < $columns1; $i++) {
					$fields1		= $sqlQuery1->getColumnMeta($i);
					$title1[]	= $fields1['name'];
				}

				$sqlQuery2	= $this->connection->query('SELECT * FROM ' . $this->orderTable);
				$columns2	= $sqlQuery2->columnCount();
				if ($columns2) {
					for ($i = 0; $i < $columns2; $i++) {
						$fields2		= $sqlQuery2->getColumnMeta($i);
						$title2[]	= $fields2['name'];
					}
				}

				$sqlQuery3	= $this->connection->query('SELECT * FROM ' . $this->orderItemsTable);
				$columns3	= $sqlQuery3->columnCount();
				if ($columns3) {
					for ($i = 0; $i < $columns3; $i++) {
						$fields3		= $sqlQuery3->getColumnMeta($i);
						$title3[]	= $fields3['name'];
					}
				}

				return [$title1, $title2, $title3];
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function summary()
	{
		$sqlCode	= "SELECT MIN(price) as 'total' FROM $this->table 
						UNION ALL
						SELECT MAX(price) as 'total' FROM $this->table 
						UNION ALL
						SELECT COUNT(id) as 'total' FROM $this->table
						UNION ALL
						SELECT COUNT(id) as 'total' FROM $this->orderTable";

		$query	= $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return array(
				'min'		=> !empty($dataList[0]['total']) ? $dataList[0]['total'] : 0,
				'max'		=> !empty($dataList[1]['total']) ? $dataList[1]['total'] : 0,
				'total'	=> !empty($dataList[2]['total']) ? $dataList[2]['total'] : 0,
				'order'	=> !empty($dataList[3]['total']) ? $dataList[3]['total'] : 0
			);
		} else {
			return 0;
		}
	}

	public function create($title, $logo, $unit, $price, $status)
	{
		$this->title	= $this->encode($title);
		$this->logo		= $this->encode($logo);
		$this->unit		= $this->encode($unit);
		$this->price	= $this->encode($price);
		$this->status	= $this->encode($status);

		$sqlCode	= "INSERT INTO $this->table (`title`, `logo`, `unit`, `price`, `status`, `created_at`) VALUES (:P_TITLE, :P_LOGO, :P_UNIT, :P_PRICE, :P_STATUS, :CREATED_AT)";
		$query	= $this->connection->prepare($sqlCode);
		$values	= array(
			':P_TITLE'		=> $this->title,
			':P_LOGO'		=> $this->logo,
			':P_UNIT'		=> $this->unit,
			':P_PRICE'		=> $this->price,
			':P_STATUS'		=> $this->status,
			':CREATED_AT'	=> date("Y-m-d H:i:s")
		);

		try {
			if ($query->execute($values)) {
				$totalRowInserted	= $query->rowCount();
				$lastInsertId		= $this->connection->lastInsertId();

				return array(
					'totalRowInsert'  => $totalRowInserted,
					'lastInsertID'    => $lastInsertId,
				);
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function update($title, $logo, $unit, $price, $status, $id)
	{
		$this->title	= $this->encode($title);
		$this->logo		= $this->encode($logo);
		$this->unit		= $this->encode($unit);
		$this->price	= $this->encode($price);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		$sqlCode	= "UPDATE $this->table
						SET `title`	= :P_TITLE, `logo` = :P_LOGO, `unit` = :P_UNIT, `price` = :P_PRICE, `status` = :P_STATUS, `updated_at` = :UPDATED_AT 
						WHERE `id` = :UPDATE_ID";

		$query    = $this->connection->prepare($sqlCode);
		$values   = array(
			':P_TITLE'		=> $this->title,
			':P_LOGO'		=> $this->logo,
			':P_UNIT'		=> $this->unit,
			':P_PRICE'		=> $this->price,
			':P_STATUS'		=> $this->status,
			':UPDATED_AT'	=> date("Y-m-d H:i:s"),
			':UPDATE_ID'	=> $this->id
		);

		try {
			if ($query->execute($values)) {
				$totalRowUpdated = $query->rowCount();
				return $totalRowUpdated;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function checkout($user, $name, $mobile, $address)
	{
		$this->userID				= $this->encode($user);
		$this->contactName		= $this->encode($name);
		$this->contactMobile		= $this->mobileNoParser($mobile);
		$this->contactAddress	= $this->encode($address);

		$sqlCode	= "INSERT INTO $this->orderTable (
							`order_no`, `user_id`, `contact_name`, `contact_mobile`, `contact_address`, 
							`order_status`, `dates`, `months`, `years`, `created_at`
						) 
						VALUES (
							:P_ORDER_NO, :P_USER_ID, :P_CONTACT_NAME, :P_CONTACT_MOBILE, :P_CONTACT_ADDRESS, 
							:P_ORDER_STATUS, :P_DATES, :P_MONTHS, :P_YEARS, :CREATED_AT
						)";

		$query	= $this->connection->prepare($sqlCode);
		$values	= array(
			':P_ORDER_NO'			=> randID(),
			':P_USER_ID'			=> $this->userID,
			':P_CONTACT_NAME'		=> $this->contactName,
			':P_CONTACT_MOBILE'	=> $this->contactMobile,
			':P_CONTACT_ADDRESS'	=> $this->contactAddress,
			':P_ORDER_STATUS'		=> "Pending",
			':P_DATES'				=> date('Y-m-d'),
			':P_MONTHS'				=> date('M'),
			':P_YEARS'				=> date('Y'),
			':CREATED_AT'			=> date("Y-m-d H:i:s")
		);

		try {
			if ($query->execute($values)) {
				$totalRowInserted	= $query->rowCount();
				$lastInsertId		= $this->connection->lastInsertId();

				return array(
					'totalRowInsert'	=> $totalRowInserted,
					'lastInsertID'		=> $lastInsertId,
				);
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function checkoutItems($order_id, $item_id, $unit, $quantity, $price, $subtotal)
	{
		$this->itemOrderID	= $this->encode($order_id);
		$this->itemID			= $this->encode($item_id);
		$this->itemUnit		= $this->encode($unit);
		$this->itemQuantity	= $this->encode($quantity);
		$this->itemPrice		= $this->encode($price);
		$this->itemSubtotal	= $this->encode($subtotal);

		$sqlCode = "INSERT INTO $this->orderItemsTable (
							`order_id`, `item_id`, `item_unit`, `item_quantity`, `item_price`, `item_subtotal_amount`, `created_at`
						) 
						VALUES (
							:P_ORDER_ID, :P_ITEM_ID, :P_ITEM_UNIT, :P_ITEM_QUANTITY, :P_ITEM_PRICE, :P_ITEM_SUBTOTAL, :CREATED_AT
						)";

		$query	= $this->connection->prepare($sqlCode);
		$values	= array(
			':P_ORDER_ID'			=> $this->itemOrderID,
			':P_ITEM_ID'			=> $this->itemID,
			':P_ITEM_UNIT'			=> $this->itemUnit,
			':P_ITEM_QUANTITY'	=> $this->itemQuantity,
			':P_ITEM_PRICE'		=> $this->itemPrice,
			':P_ITEM_SUBTOTAL'	=> $this->itemSubtotal,
			':CREATED_AT'			=> date("Y-m-d H:i:s")
		);

		try {
			if ($query->execute($values)) {
				$totalRowInserted	= $query->rowCount();
				$lastInsertId		= $this->connection->lastInsertId();

				return array(
					'totalRowInsert'  => $totalRowInserted,
					'lastInsertID'    => $lastInsertId,
				);
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function updateOrderDetails($status, $net, $vat, $charge, $cost, $details, $id, $reason)
	{
		if ($status === "Completed") {
			$this->specificColumn	= 'completed';
			$this->cancelledReason	= NULL;
		} elseif ($status === "Cancelled") {
			$this->specificColumn	= 'cancelled';
			$this->cancelledReason	= !empty($reason) ? $this->encode($reason) : NULL;
		} elseif ($status === "Confirmed") {
			$this->specificColumn	= 'confirmed';
			$this->cancelledReason	= NULL;
		}

		$this->orderStatus		= $this->encode($status);
		$this->netAmount			= $this->encode($net);
		$this->vatAmount			= !empty($vat) ? $this->encode($vat) : NULL;
		$this->serviceCharge		= !empty($charge) ? $this->encode($charge) : NULL;
		$this->miscCostAmount	= !empty($cost) ? $this->encode($cost) : NULL;
		$this->miscCostDetails	= !empty($details) ? $this->encode($details) : NULL;
		$this->totalAmount		= (float) $this->netAmount + (float) $this->vatAmount + (float) $this->serviceCharge + (float) $this->miscCostAmount;
		$this->orderID				= $id;

		$sqlCode	= "UPDATE $this->orderTable
						SET `order_status` = :P_STATUS, `{$this->specificColumn}_date` = :P_STATUS_DATE, `cancelled_reason` = :P_CANCEL_REASON, `net_amount` = :P_NET_AMOUNT, `vat_amount` = :P_VAT_AMOUNT, `service_charge` = :P_SERVICE_CHARGE, `misc_cost_amount` = :P_MISC_COST_AMOUNT, `misc_cost_details` = :P_MISC_COST_DETAILS, `total_amount` = :P_TOTAL_AMOUNT, `updated_at` = :UPDATED_AT 
						WHERE `id` = :UPDATE_ID";

		$query	= $this->connection->prepare($sqlCode);
		$values	= array(
			':P_STATUS'					=> $this->orderStatus,
			':P_STATUS_DATE'			=> date('Y-m-d H:i:s'),
			':P_CANCEL_REASON'		=> $this->cancelledReason,
			':P_NET_AMOUNT'			=> $this->netAmount,
			':P_VAT_AMOUNT'			=> $this->vatAmount,
			':P_SERVICE_CHARGE'		=> $this->serviceCharge,
			':P_MISC_COST_AMOUNT'	=> $this->miscCostAmount,
			':P_MISC_COST_DETAILS'	=> $this->miscCostDetails,
			':P_TOTAL_AMOUNT'			=> $this->totalAmount,
			':UPDATED_AT'				=> date("Y-m-d H:i:s"),
			':UPDATE_ID'				=> $this->orderID
		);

		try {
			if ($query->execute($values)) {
				$totalRowUpdated = $query->rowCount();
				return $totalRowUpdated;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function ratingAndReview($rating, $review, $id)
	{
		$this->rating	= $this->encode($rating);
		$this->review	= $this->encode($review);
		$this->orderID	= $id;

		$sqlCode	= "UPDATE $this->orderTable
						SET `rating` = :P_RATING, `review` = :P_REVIEW, `updated_at` = :UPDATED_AT 
						WHERE `id` = :UPDATE_ID";

		$query	= $this->connection->prepare($sqlCode);
		$values	= array(
			':P_RATING'		=> $this->rating,
			':P_REVIEW'		=> $this->review,
			':UPDATED_AT'	=> date("Y-m-d H:i:s"),
			':UPDATE_ID'	=> $this->orderID
		);

		try {
			if ($query->execute($values)) {
				$totalRowUpdated = $query->rowCount();
				return $totalRowUpdated;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}
}

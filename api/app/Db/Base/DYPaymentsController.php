<?php

/**
 * Auto generated file
 *
 * WARNING: please don't edit.
 *
 * Proudly With: gobl v1.5.0
 * Time: 1622529633
 */


namespace DELIVERY\App\Db\Base;

use Gobl\DBAL\QueryBuilder;
use Gobl\ORM\ORM;
use Gobl\ORM\ORMControllerBase;
use DELIVERY\App\Db\DYPayment as DYPaymentReal;
use DELIVERY\App\Db\DYPaymentsResults as DYPaymentsResultsReal;
use DELIVERY\App\Db\DYPaymentsQuery as DYPaymentsQueryReal;

/**
 * Class DYPaymentsController
 */
abstract class DYPaymentsController extends ORMControllerBase
{
	/**
	 * DYPaymentsController constructor.
	 *
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct(
			ORM::getDatabase('DELIVERY\App\Db'),
			DYPayment::TABLE_NAME,
			DYPaymentReal::class,
			DYPaymentsQueryReal::class,
			DYPaymentsResultsReal::class
		);
	}

	/**
	 * Adds item to `dy_payments`.
	 *
	 * @param array $values the row values
	 *
	 * @throws \Throwable
	 *
	 * @return \DELIVERY\App\Db\DYPayment
	 */
	public function addItem(array $values = [])
	{
		/** @var \DELIVERY\App\Db\DYPayment $result */
		$result = parent::addItem($values);

		return $result;
	}

	/**
	 * Updates one item in `dy_payments`.
	 *
	 * The returned value will be:
	 * - `false` when the item was not found
	 * - `DYPayment` when the item was successfully updated,
	 * when there is an error updating you can catch the exception
	 *
	 * @param array $filters    the row filters
	 * @param array $new_values the new values
	 *
	 * @throws \Throwable
	 *
	 * @return bool|\DELIVERY\App\Db\DYPayment
	 */
	public function updateOneItem(array $filters, array $new_values)
	{
		return parent::updateOneItem($filters, $new_values);
	}

	/**
	 * Updates all items in `dy_payments` that match the given item filters.
	 *
	 * @param array $filters    the row filters
	 * @param array $new_values the new values
	 *
	 * @throws \Throwable
	 *
	 * @return int affected row count
	 */
	public function updateAllItems(array $filters, array $new_values)
	{
		return parent::updateAllItems($filters, $new_values);
	}

	/**
	 * Deletes one item from `dy_payments`.
	 *
	 * The returned value will be:
	 * - `false` when the item was not found
	 * - `DYPayment` when the item was successfully deleted,
	 * when there is an error deleting you can catch the exception
	 *
	 * @param array $filters the row filters
	 *
	 * @throws \Throwable
	 *
	 * @return bool|\DELIVERY\App\Db\DYPayment
	 */
	public function deleteOneItem(array $filters)
	{
		return parent::deleteOneItem($filters);
	}

	/**
	 * Deletes all items in `dy_payments` that match the given item filters.
	 *
	 * @param array $filters the row filters
	 *
	 * @throws \Throwable
	 *
	 * @return int affected row count
	 */
	public function deleteAllItems(array $filters)
	{
		return parent::deleteAllItems($filters);
	}

	/**
	 * Gets item from `dy_payments` that match the given filters.
	 *
	 * The returned value will be:
	 * - `null` when the item was not found
	 * - `DYPayment` otherwise
	 *
	 * @param array $filters  the row filters
	 * @param array $order_by order by rules
	 *
	 * @throws \Throwable
	 *
	 * @return null|\DELIVERY\App\Db\DYPayment
	 */
	public function getItem(array $filters, array $order_by = [])
	{
		/* @var null|\DELIVERY\App\Db\DYPayment $result */
		$result = parent::getItem($filters, $order_by);

		return $result;
	}

	/**
	 * Gets all items from `dy_payments` that match the given filters.
	 *
	 * @param array    $filters  the row filters
	 * @param null|int $max      maximum row to retrieve
	 * @param int      $offset   first row offset
	 * @param array    $order_by order by rules
	 * @param bool|int $total    total rows without limit
	 *
	 * @throws \Throwable
	 *
	 * @return \DELIVERY\App\Db\DYPayment[]
	 */
	public function getAllItems(array $filters = [], $max = null, $offset = 0, array $order_by = [], &$total = false)
	{
		/** @var \DELIVERY\App\Db\DYPayment[] $results */
		$results = parent::getAllItems($filters, $max, $offset, $order_by, $total);

		return $results;
	}

	/**
	 * Gets all items from `dy_payments` with a custom query builder instance.
	 *
	 * @param \Gobl\DBAL\QueryBuilder $qb
	 * @param null|int                $max    maximum row to retrieve
	 * @param int                     $offset first row offset
	 * @param bool|int                $total  total rows without limit
	 *
	 * @throws \Throwable
	 *
	 * @return \DELIVERY\App\Db\DYPayment[]
	 */
	public function getAllItemsCustom(QueryBuilder $qb, $max = null, $offset = 0, &$total = false)
	{
		/** @var \DELIVERY\App\Db\DYPayment[] $results */
		$results = parent::getAllItemsCustom($qb, $max, $offset, $total);

		return $results;
	}
}

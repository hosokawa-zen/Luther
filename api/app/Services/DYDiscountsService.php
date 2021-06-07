<?php

/**
 * Copyright (c) 2017-present, Emile Silas Sare
 *
 * This file is part of OZone package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


// Auto generated file
//
// WARNING: please don't edit,
//
// Proudly With: O'Zone v2.0.0
// Time: 1622529620
namespace DELIVERY\App\Services;

use Gobl\DBAL\Relations\CallableVR;
use Gobl\DBAL\Relations\Relation;
use Gobl\DBAL\Relations\VirtualRelation;
use Gobl\DBAL\Types\TypeBigint;
use Gobl\DBAL\Types\TypeInt;
use Gobl\ORM\ORM;
use DELIVERY\App\Db\DYOrderDiscountsController;
use DELIVERY\App\Db\DYOrderDiscount;
use OZONE\OZ\Core\BaseService;
use OZONE\OZ\Core\ORMRequest;
use OZONE\OZ\Exceptions\NotFoundException;
use OZONE\OZ\Router\RouteInfo;
use OZONE\OZ\Router\Router;

/**
 * Class DYDiscountsService
 *
 * to add item to discounts
 * - POST    /discounts
 *
 * to update property(ies) of the item with the given :order_discount_id
 * - PATCH     /discounts/:order_discount_id
 *
 * to update property(ies) of all items in `dy_discounts`
 * - PATCH     /discounts
 *
 * to delete item with the given :order_discount_id
 * - DELETE  /discounts/:order_discount_id
 *
 * to delete all items in `dy_discounts`
 * - DELETE  /discounts
 *
 * to get the item with the given :order_discount_id
 * - GET     /discounts/:order_discount_id
 *
 * to get all items in dy_discounts
 * - GET     /discounts
 *
 * to get relation for the item in `dy_discounts` with the given :order_discount_id
 * - GET     /discounts/:order_discount_id/relation
 */
final class DYDiscountsService extends BaseService
{
	//========================================================
	//=	POST REQUEST METHODS
	//========================================================

	/**
	 * Creates a new entry in the table `dy_discounts`
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionCreateEntity(ORMRequest $orm_request)
	{
		$values = $orm_request->getFormData(self::table());

		$controller = new DYOrderDiscountsController();
		$entity     = $controller->addItem($values);

		$this->getResponseHolder()
			 ->setDone($controller->getCRUD()
								  ->getMessage())
			 ->setData(['item' => $entity]);
	}

	//========================================================
	//=	PATCH REQUEST METHODS
	//========================================================

	/**
	 * Updates only one item in the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionUpdateOneItem(ORMRequest $orm_request)
	{
		$orm_request = $orm_request->createScopedInstance(self::table());
		$values      = $orm_request->getFormData();
		$filters     = $orm_request->getFilters();

		$controller = new DYOrderDiscountsController();
		$entity     = $controller->updateOneItem($filters, $values);

		if ($entity instanceof DYOrderDiscount) {
			$this->getResponseHolder()
				 ->setDone($controller->getCRUD()
									  ->getMessage())
				 ->setData(['item' => $entity]);
		} else {
			throw new NotFoundException();
		}
	}

	/**
	 * Updates all items in the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionUpdateAllItems(ORMRequest $orm_request)
	{
		$orm_request = $orm_request->createScopedInstance(self::table());
		$values      = $orm_request->getFormData();
		$filters     = $orm_request->getFilters();

		$controller = new DYOrderDiscountsController();
		$count      = $controller->updateAllItems($filters, $values);

		$this->getResponseHolder()
			 ->setDone($controller->getCRUD()
								  ->getMessage())
			 ->setData(['affected' => $count]);
	}

	//========================================================
	//=	DELETE REQUEST METHODS
	//========================================================

	/**
	 * Deletes only one item in the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionDeleteEntity(ORMRequest $orm_request)
	{
		$filters = $orm_request->getFilters(self::table());

		$controller = new DYOrderDiscountsController();
		$entity     = $controller->deleteOneItem($filters);

		if ($entity instanceof DYOrderDiscount) {
			$this->getResponseHolder()
				 ->setDone($controller->getCRUD()
									  ->getMessage())
				 ->setData(['item' => $entity]);
		} else {
			throw new NotFoundException();
		}
	}

	/**
	 * Deletes all items in the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionDeleteAll(ORMRequest $orm_request)
	{
		$filters = $orm_request->getFilters(self::table());

		$controller = new DYOrderDiscountsController();
		$count      = $controller->deleteAllItems($filters);

		$this->getResponseHolder()
			 ->setDone($controller->getCRUD()
								  ->getMessage())
			 ->setData(['affected' => $count]);
	}

	//========================================================
	//=	GET REQUEST METHODS
	//========================================================

	/**
	 * Gets only one item from the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionGetEntity(ORMRequest $orm_request)
	{
		$orm_request = $orm_request->createScopedInstance(self::table());
		$filters     = $orm_request->getFilters();
		$order_by    = $orm_request->getOrderBy();

		$controller = new DYOrderDiscountsController();
		$entity     = $controller->getItem($filters, $order_by);

		if (!$entity) {
			throw new NotFoundException();
		}

		$relations = $this->listEntityRelations($entity, $orm_request);

		$this->getResponseHolder()
			 ->setDone($controller->getCRUD()
								  ->getMessage())
			 ->setData([
			 	'item'      => $entity,
			 	'relations' => $relations,
			 ]);
	}

	/**
	 * Gets all items from the table `dy_discounts` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionGetAll(ORMRequest $orm_request)
	{
		$collection = $orm_request->getCollection();

		$orm_request   = $orm_request->createScopedInstance(self::table());
		$filters       = $orm_request->getFilters();
		$order_by      = $orm_request->getOrderBy();
		$max           = $orm_request->getMax();
		$offset        = $orm_request->getOffset();
		$page          = $orm_request->getPage();
		$total_records = 0;

		$controller = new DYOrderDiscountsController();

		if ($collection) {
			$table      = ORM::getDatabase('DELIVERY\App\Db')
							 ->getTable(DYOrderDiscount::TABLE_NAME);
			$collection = $table->getCollection($orm_request->getCollection());

			if (!$collection) {
				throw new NotFoundException();
			}

			$results = $collection->run($orm_request, $total_records);
		} else {
			$results = $controller->getAllItems($filters, $max, $offset, $order_by, $total_records);
		}

		$relations = [];

		if (\count($results)) {
			$relations = $this->listEntitiesRelations($results, $orm_request);
		}

		$this->getResponseHolder()
			 ->setDone($controller->getCRUD()
								  ->getMessage())
			 ->setData([
			 	'items'     => $results,
			 	'max'       => $max,
			 	'page'      => $page,
			 	'total'     => $total_records,
			 	'relations' => $relations,
			 ]);
	}

	/**
	 * Gets relation item(s) that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionGetRelation(ORMRequest $orm_request)
	{
		if (!$orm_request->getColumnFilters(DYOrderDiscount::COL_ID)) {
			throw new NotFoundException();
		}

		$filters      = $orm_request->getFilters(self::table());
		$req_rel_name = $orm_request->getRelations()[0];

		$controller = new DYOrderDiscountsController();
		$entity     = $controller->getItem($filters);

		if (!$entity) {
			throw new NotFoundException();
		}

		$max           = $orm_request->getMax();
		$page          = $orm_request->getPage();
		$total_records = 0;

		$relations = $this->listEntityRelations($entity, $orm_request, $total_records);
		$r         = $relations[$req_rel_name];

		if (\is_array($r)) {
			$data = [
				'items' => $r,
				'max'   => $max,
				'page'  => $page,
				'total' => $total_records,
			];
		} else {
			$data = [
				'item' => $r,
			];
		}

		$this->getResponseHolder()
			 ->setDone()
			 ->setData($data);
	}

	/**
	 * @param \DELIVERY\App\Db\DYOrderDiscount        $entity
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 * @param int                       &$total_records
	 *
	 * @throws \OZONE\OZ\Exceptions\NotFoundException
	 *
	 * @return array
	 */
	private function listEntityRelations(DYOrderDiscount $entity, ORMRequest $orm_request, &$total_records = null)
	{
		$query_relations = $orm_request->getRelations();
		$relations       = [];

		if (!empty($query_relations)) {
			$rel_map = $this->resolveRelations($query_relations);

			foreach ($rel_map as $name => $rel) {
				if ($rel instanceof Relation) {
					/*@var Relation $rel */
					$rel_type = $rel->getType();

					if ($rel_type === Relation::ONE_TO_MANY || $rel_type === Relation::MANY_TO_MANY) {
						$relations[$name] = $this->getRelationItemsList($rel, $entity, $orm_request, $total_records);
					} else {
						$relations[$name] = $this->getRelationItem($rel, $entity);
					}
				} elseif ($rel instanceof VirtualRelation) {
					/*@var VirtualRelation $rel */
					$relations[$name] = $rel->run($entity, $orm_request, $total_records);
				}
			}
		}

		return $relations;
	}

	/**
	 * @param \DELIVERY\App\Db\DYOrderDiscount[]      $entities
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 * @param int                       &$total_records
	 *
	 * @throws \OZONE\OZ\Exceptions\NotFoundException
	 *
	 * @return array
	 */
	private function listEntitiesRelations(array $entities, ORMRequest $orm_request, &$total_records = null)
	{
		$query_relations = $orm_request->getRelations();
		$relations       = [];

		if (!empty($query_relations)) {
			$rel_map = $this->resolveRelations($query_relations);

			foreach ($rel_map as $name => $rel) {
				if ($rel instanceof Relation) {
					foreach ($entities as $entity) {
						$arr      = $entity->asArray(false);
						$id       = $arr[DYOrderDiscount::COL_ID];
						$rel_type = $rel->getType();

						if ($rel_type === Relation::ONE_TO_MANY || $rel_type === Relation::MANY_TO_MANY) {
							$relations[$name][$id] = $this->getRelationItemsList(
								$rel,
								$entity,
								$orm_request,
								$total_records
							);
						} else {
							$relations[$name][$id] = $this->getRelationItem($rel, $entity);
						}
					}
				} elseif ($rel instanceof VirtualRelation) {
					if ($rel instanceof CallableVR && $rel->canHandleList()) {
						$relations[$name] = $rel->run($entities, $orm_request, $total_records);
					} else {
						foreach ($entities as $entity) {
							$arr                   = $entity->asArray(false);
							$id                    = $arr[DYOrderDiscount::COL_ID];
							$relations[$name][$id] = $rel->run($entity, $orm_request, $total_records);
						}
					}
				}
			}
		}

		return $relations;
	}

	/**
	 * @param \Gobl\DBAL\Relations\Relation $relation
	 * @param \DELIVERY\App\Db\DYOrderDiscount            $entity
	 * @param \OZONE\OZ\Core\ORMRequest     $orm_request
	 * @param int                           $total_records
	 *
	 * @return array
	 */
	private function getRelationItemsList(
		Relation $relation,
		DYOrderDiscount $entity,
		ORMRequest $orm_request,
		&$total_records = null
	) {
		$target_columns_map = [];
		$target             = $relation->getTargetTable();
		$target_columns     = $target->getColumns();
		$orm_request        = $orm_request->createScopedInstance($target);

		foreach ($target_columns as $column) {
			$target_columns_map[$column->getFullName()] = 1;
		}

		$relation_getter = $relation->getGetterName();

		return \call_user_func_array([
			$entity,
			$relation_getter,
		], [
			$orm_request->getFilters(),
			$orm_request->getMax(),
			$orm_request->getOffset(),
			$orm_request->getOrderBy(),
			&$total_records,
		]);
	}

	/**
	 * @param \Gobl\DBAL\Relations\Relation $relation
	 * @param \DELIVERY\App\Db\DYOrderDiscount            $entity
	 *
	 * @return mixed
	 */
	private function getRelationItem(Relation $relation, DYOrderDiscount $entity)
	{
		$filters          = [];
		$relation_columns = $relation->getRelationColumns();
		$entity_data      = $entity->asArray();

		foreach ($relation_columns as $from => $target) {
			$filters[$target] = $entity_data[$from];
		}

		$relation_getter = $relation->getGetterName();

		return \call_user_func([$entity, $relation_getter]);
	}

	/**
	 * @param array $relations
	 *
	 * @throws \OZONE\OZ\Exceptions\NotFoundException
	 *
	 * @return array
	 */
	private function resolveRelations(array $relations)
	{
		$table   = ORM::getDatabase('DELIVERY\App\Db')
					  ->getTable(DYOrderDiscount::TABLE_NAME);
		$missing = [];
		$rel_map = [];

		// we firstly check all relation
		foreach ($relations as $name) {
			if ($table->hasRelation($name)) {
				$rel_map[$name] = $table->getRelation($name);
			} elseif ($table->hasVirtualRelation($name)) {
				$rel_map[$name] = $table->getVirtualRelation($name);
			} else {
				$missing[] = $name;
			}
		}

		// checks if there are missing relations
		if (\count($missing)) {
			throw new NotFoundException(null, ['RELATIONS_MISSING', $missing]);
		}

		return $rel_map;
	}

	/**
	 * @return \Gobl\DBAL\Table
	 */
	public static function table()
	{
		return ORM::getDatabase('DELIVERY\App\Db')
				  ->getTable(DYOrderDiscount::TABLE_NAME);
	}

	/**
	 * @inheritdoc
	 */
	public static function registerRoutes(Router $router)
	{
		$type_obj    = self::table()
						   ->getColumn(DYOrderDiscount::COL_ID)
						   ->getTypeObject();
		$bigint_type = TypeBigint::class;
		$int_type    = TypeInt::class;
		$is_number   = ($type_obj instanceof $bigint_type || $type_obj instanceof $int_type);

		$options = [
			'order_discount_id'    => $is_number ? '[0-9]+' : '[^/]+',
			'relation' => Relation::NAME_PATTERN,
		];

		$router->post('/discounts', function (RouteInfo $r) {
			$context     = $r->getContext();
			$orm_request = new ORMRequest($context, $context->getRequest()
															->getFormData());

			$service = new self($context);
			$service->actionCreateEntity($orm_request);

			return $service->respond();
		}, $options)
			   ->get('/discounts/{order_discount_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('order_discount_id', $r->getArg('order_discount_id'));
			   	$service = new self($context);
			   	$service->actionGetEntity($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->get('/discounts', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$service     = new self($context);
			   	$service->actionGetAll($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->get('/discounts/{order_discount_id}/{relation}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('order_discount_id', $r->getArg('order_discount_id'));
			   	$orm_request->addRelation($r->getArg('relation'));

			   	$service = new self($context);
			   	$service->actionGetRelation($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->patch('/discounts/{order_discount_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('order_discount_id', $r->getArg('order_discount_id'));

			   	$service = new self($context);
			   	$service->actionUpdateOneItem($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->patch('/discounts', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$service     = new self($context);
			   	$service->actionUpdateAllItems($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->delete('/discounts/{order_discount_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('order_discount_id', $r->getArg('order_discount_id'));

			   	$service = new self($context);
			   	$service->actionDeleteEntity($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->delete('/discounts', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('order_discount_id', $r->getArg('order_discount_id'));

			   	$service = new self($context);
			   	$service->actionDeleteAll($orm_request);

			   	return $service->respond();
			   }, $options);
	}
}
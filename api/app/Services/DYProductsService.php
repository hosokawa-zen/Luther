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
use DELIVERY\App\Db\DYProductsController;
use DELIVERY\App\Db\DYProduct;
use OZONE\OZ\Core\BaseService;
use OZONE\OZ\Core\ORMRequest;
use OZONE\OZ\Exceptions\NotFoundException;
use OZONE\OZ\Router\RouteInfo;
use OZONE\OZ\Router\Router;

/**
 * Class DYProductsService
 *
 * to add item to products
 * - POST    /products
 *
 * to update property(ies) of the item with the given :product_id
 * - PATCH     /products/:product_id
 *
 * to update property(ies) of all items in `dy_products`
 * - PATCH     /products
 *
 * to delete item with the given :product_id
 * - DELETE  /products/:product_id
 *
 * to delete all items in `dy_products`
 * - DELETE  /products
 *
 * to get the item with the given :product_id
 * - GET     /products/:product_id
 *
 * to get all items in dy_products
 * - GET     /products
 *
 * to get relation for the item in `dy_products` with the given :product_id
 * - GET     /products/:product_id/relation
 */
final class DYProductsService extends BaseService
{
	//========================================================
	//=	POST REQUEST METHODS
	//========================================================

	/**
	 * Creates a new entry in the table `dy_products`
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionCreateEntity(ORMRequest $orm_request)
	{
		$values = $orm_request->getFormData(self::table());

		$controller = new DYProductsController();
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
	 * Updates only one item in the table `dy_products` that matches some filters
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

		$controller = new DYProductsController();
		$entity     = $controller->updateOneItem($filters, $values);

		if ($entity instanceof DYProduct) {
			$this->getResponseHolder()
				 ->setDone($controller->getCRUD()
									  ->getMessage())
				 ->setData(['item' => $entity]);
		} else {
			throw new NotFoundException();
		}
	}

	/**
	 * Updates all items in the table `dy_products` that matches some filters
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

		$controller = new DYProductsController();
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
	 * Deletes only one item in the table `dy_products` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionDeleteEntity(ORMRequest $orm_request)
	{
		$filters = $orm_request->getFilters(self::table());

		$controller = new DYProductsController();
		$entity     = $controller->deleteOneItem($filters);

		if ($entity instanceof DYProduct) {
			$this->getResponseHolder()
				 ->setDone($controller->getCRUD()
									  ->getMessage())
				 ->setData(['item' => $entity]);
		} else {
			throw new NotFoundException();
		}
	}

	/**
	 * Deletes all items in the table `dy_products` that matches some filters
	 *
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 *
	 * @throws \Throwable
	 */
	public function actionDeleteAll(ORMRequest $orm_request)
	{
		$filters = $orm_request->getFilters(self::table());

		$controller = new DYProductsController();
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
	 * Gets only one item from the table `dy_products` that matches some filters
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

		$controller = new DYProductsController();
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
	 * Gets all items from the table `dy_products` that matches some filters
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

		$controller = new DYProductsController();

		if ($collection) {
			$table      = ORM::getDatabase('DELIVERY\App\Db')
							 ->getTable(DYProduct::TABLE_NAME);
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
		if (!$orm_request->getColumnFilters(DYProduct::COL_ID)) {
			throw new NotFoundException();
		}

		$filters      = $orm_request->getFilters(self::table());
		$req_rel_name = $orm_request->getRelations()[0];

		$controller = new DYProductsController();
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
	 * @param \DELIVERY\App\Db\DYProduct        $entity
	 * @param \OZONE\OZ\Core\ORMRequest $orm_request
	 * @param int                       &$total_records
	 *
	 * @throws \OZONE\OZ\Exceptions\NotFoundException
	 *
	 * @return array
	 */
	private function listEntityRelations(DYProduct $entity, ORMRequest $orm_request, &$total_records = null)
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
	 * @param \DELIVERY\App\Db\DYProduct[]      $entities
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
						$id       = $arr[DYProduct::COL_ID];
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
							$id                    = $arr[DYProduct::COL_ID];
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
	 * @param \DELIVERY\App\Db\DYProduct            $entity
	 * @param \OZONE\OZ\Core\ORMRequest     $orm_request
	 * @param int                           $total_records
	 *
	 * @return array
	 */
	private function getRelationItemsList(
		Relation $relation,
		DYProduct $entity,
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
	 * @param \DELIVERY\App\Db\DYProduct            $entity
	 *
	 * @return mixed
	 */
	private function getRelationItem(Relation $relation, DYProduct $entity)
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
					  ->getTable(DYProduct::TABLE_NAME);
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
				  ->getTable(DYProduct::TABLE_NAME);
	}

	/**
	 * @inheritdoc
	 */
	public static function registerRoutes(Router $router)
	{
		$type_obj    = self::table()
						   ->getColumn(DYProduct::COL_ID)
						   ->getTypeObject();
		$bigint_type = TypeBigint::class;
		$int_type    = TypeInt::class;
		$is_number   = ($type_obj instanceof $bigint_type || $type_obj instanceof $int_type);

		$options = [
			'product_id'    => $is_number ? '[0-9]+' : '[^/]+',
			'relation' => Relation::NAME_PATTERN,
		];

		$router->post('/products', function (RouteInfo $r) {
			$context     = $r->getContext();
			$orm_request = new ORMRequest($context, $context->getRequest()
															->getFormData());

			$service = new self($context);
			$service->actionCreateEntity($orm_request);

			return $service->respond();
		}, $options)
			   ->get('/products/{product_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('product_id', $r->getArg('product_id'));
			   	$service = new self($context);
			   	$service->actionGetEntity($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->get('/products', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$service     = new self($context);
			   	$service->actionGetAll($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->get('/products/{product_id}/{relation}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('product_id', $r->getArg('product_id'));
			   	$orm_request->addRelation($r->getArg('relation'));

			   	$service = new self($context);
			   	$service->actionGetRelation($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->patch('/products/{product_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('product_id', $r->getArg('product_id'));

			   	$service = new self($context);
			   	$service->actionUpdateOneItem($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->patch('/products', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$service     = new self($context);
			   	$service->actionUpdateAllItems($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->delete('/products/{product_id}', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('product_id', $r->getArg('product_id'));

			   	$service = new self($context);
			   	$service->actionDeleteEntity($orm_request);

			   	return $service->respond();
			   }, $options)
			   ->delete('/products', function (RouteInfo $r) {
			   	$context     = $r->getContext();
			   	$orm_request = new ORMRequest($context, $context->getRequest()
																   ->getFormData());
			   	$orm_request->addColumnFilter('product_id', $r->getArg('product_id'));

			   	$service = new self($context);
			   	$service->actionDeleteAll($orm_request);

			   	return $service->respond();
			   }, $options);
	}
}

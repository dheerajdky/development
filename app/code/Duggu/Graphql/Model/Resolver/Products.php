<?php

declare(strict_types=1);

Namespace  Duggu\Graphql\Model\Resolver;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;

use Magento\Framework\GraphQl\Config\Element\Field;

use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

use Magento\Framework\GraphQl\Query\ResolverInterface;

class Products implements ResolverInterface

{

    /**

     * @inheritdoc

     */

   public function __construct(

        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,

        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder

    ) {

        $this->productRepository = $productRepository;

        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

    }

   public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)

    {

        $productsData = $this->getProductsData();

        return $productsData;

    }

      /**

     * @return array

     * @throws GraphQlNoSuchEntityException

     */

    private function getProductsData(): array

    {

        try {

            /* filter for all the pages */

            $searchCriteria = $this->searchCriteriaBuilder->create();

            $products = $this->productRepository->getList($searchCriteria)->getItems();

            $productId = $product->getId();

            foreach($products as $product) {

                $productRecord['allProducts'][$productId]['sku'] = $product->getSku();

                $productRecord['allProducts'][$productId]['name'] = $product->getName();

                $productRecord['allProducts'][$productId]['price'] = $product->getPrice();

            }

        } catch (NoSuchEntityException $e) {

            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);

        }

        return $productRecord;

    }

}
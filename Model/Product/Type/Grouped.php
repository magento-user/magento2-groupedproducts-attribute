<?php

namespace Vendor\GroupedProduct\Model\Product\Type;

use Magento\Catalog\Api\ProductRepositoryInterface;

class Grouped extends \Magento\GroupedProduct\Model\Product\Type\Grouped
{
    public function getAssociatedProductCollection($product)
    {
        parent::getAssociatedProductCollection($product);
        $links = $product->getLinkInstance();
        $links->setLinkTypeId(\Magento\GroupedProduct\Model\ResourceModel\Product\Link::LINK_TYPE_GROUPED);
        $collection = $links->getProductCollection()->addAttributeToSelect('*')->setFlag(
            'product_children',
            true
        )->setIsStrongMode();
        $collection->setProduct($product);
        return $collection;
    }
}
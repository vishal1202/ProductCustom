<?php
namespace ProductCustom\CustomAttribute\Api;

interface ProductTypeSetterInterface
{
    /**
     * Set product type for product based on SKU
     *
     * @param string $sku
     * @param mixed $value
     * @return bool
     */
    public function setProductType($sku, $value);
}

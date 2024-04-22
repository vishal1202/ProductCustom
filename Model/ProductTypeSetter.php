<?php
namespace ProductCustom\CustomAttribute\Model;

use ProductCustom\CustomAttribute\Api\ProductTypeSetterInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductTypeSetter implements ProductTypeSetterInterface
{
    protected $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function setProductType($sku, $value)
    {
        try {
            $product = $this->productRepository->get($sku);
            $product->setData('product_type', $value); // Assuming 'product_type' is your custom attribute code
            $this->productRepository->save($product);
            return true;
        } catch (NoSuchEntityException $e) {
            // Handle exception if product with given SKU not found
            return $e->getMessage();
        } catch (\Exception $e) {
            // Handle other exceptions
            return $e->getMessage();
        }
    }
}

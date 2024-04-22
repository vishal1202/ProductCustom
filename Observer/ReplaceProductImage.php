<?php
namespace ProductCustom\CustomAttribute\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\Product;
use Psr\Log\LoggerInterface;
class ReplaceProductImage implements ObserverInterface
{

    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var Product $product */
        $product = $observer->getEvent()->getProduct();
        // $product->getData('image');
        // $product->getData('thumbnail');
        // $product->getData('small_image');
        $productType = $product->getData('product_type');
        if ($productType == 1) {
            $this->logger->info('Replacing image for product ID: ' . $product->getId());

            // Verify image path
            $imagePath = 'catalog/product/9/7/pexels-photo-270348.png'; // change the image path according to your media directory
            $this->logger->info('Image Path: ' . $imagePath);

            // Add image to media gallery
            $product->addImageToMediaGallery($imagePath, array('image', 'thumbnail', 'small_image'), false, false);
            $product->save();

            $this->logger->info('Image replaced successfully.');
        }
    }
}

<?php



namespace ProductCustom\CustomAttribute\Model\Source\Config;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Options extends AbstractSource
{
    /**
     * @return array
     */
    public function getAllOptions(): array
    {
        $this->_options=[ 
            ['label' => 'Standard', 'value' => '0'],
            ['label' => 'Custom', 'value' => '1']
        ];
        return $this->_options;
    }
}
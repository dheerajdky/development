<?php
namespace Nethues\ProductColor\Ui\Modifier\Product;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class Style extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        // Configure 'text_color' attribute
        $textColorCode = 'text_color';
        $meta['product-details']['children']['container_' . $textColorCode]['children'] = array_replace_recursive(
            $meta['product-details']['children']['container_' . $textColorCode]['children'],
            [
                $textColorCode => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'formElement' => 'colorPicker',
                                'colorPickerMode' => 'full',
                                'colorFormat' => 'hex',
                            ],
                        ],
                    ],
                ],
            ]
        );

        // Configure 'bg_color' attribute
        $bgColorCode = 'bg_color';
        $meta['product-details']['children']['container_' . $bgColorCode]['children'] = [
            $bgColorCode => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => __('Background Color'),
                            'dataType' => 'text',
                            'formElement' => 'colorPicker',
                            'componentType' => 'field',
                            'dataScope' => $bgColorCode,
                            'colorPickerMode' => 'full',
                            'colorFormat' => 'hex',
                        ],
                    ],
                ],
            ],
        ];

        return $meta;
    }

    public function modifyData(array $data)
    {
        return $data;
    }
}

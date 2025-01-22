<?php
namespace Dheeraj\Manufacturer\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->getContext()->getUrl('dheeraj_manufacturer/manufacturer/edit', ['id' => $item['manufacturer_id']]),
                    'label' => __('Edit'),
                ];

                $item[$this->getData('name')]['delete'] = [
                    'href' => $this->getContext()->getUrl('dheeraj_manufacturer/manufacturer/delete', ['id' => $item['manufacturer_id']]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete Manufacturer'),
                        'message' => __('Are you sure you want to delete this manufacturer?')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}

<?php
namespace Dheeraj\Manufacturer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('dheeraj_manufacturer')
        )->addColumn(
            'manufacturer_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Manufacturer ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            150,
            ['nullable' => false],
            'Manufacturer Name'
        )->addColumn(
            'description',
            Table::TYPE_TEXT,
            '64k',
            [],
            'Manufacturer Description'
        )->addColumn(
            'is_enabled',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false, 'default' => 1],
            'Is Manufacturer Enabled'
        )->addColumn(
            'website',
            Table::TYPE_TEXT,
            255,
            [],
            'Manufacturer Website URL'
        )->setComment(
            'Manufacturer Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

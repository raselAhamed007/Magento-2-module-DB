<?php

namespace Rasel\DatabaseConfig\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('custom_db_table')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'item',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Item Name'
        )->addColumn(
            'short_description',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Item Short Description'
        )->addColumn(
            'long_description',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Item Long Description'
        )->addIndex(
            $setup->getIdxName('custom_db_table', ['item']),
            ['item']
        )->setComment(
            'Sample Items'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}

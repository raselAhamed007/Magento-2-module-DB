<?php

namespace Rasel\DatabaseConfig\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
   
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('custom_db_table'),
            [
                'item' => 'Item 1',
                'short_description' => 'Short Description One',
                'long_description' => 'Long Description One'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('custom_db_table'),
            [
                'item' => 'Item 2',
                'short_description' => 'Short Description Two',
                'long_description' => 'Long Description Two'
            ]
        );

        $setup->endSetup();
    }
}
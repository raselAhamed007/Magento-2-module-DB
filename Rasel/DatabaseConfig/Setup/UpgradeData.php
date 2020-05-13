<?php

namespace Rasel\DatabaseConfig\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('custom_db_table'),
                [
                    'price' => '$20'
                ],
                $setup->getConnection()->quoteInto('id = ?', 1)
            );
        }

        $setup->endSetup();
    }
}
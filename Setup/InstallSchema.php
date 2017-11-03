<?php
/**
 * InternalLinking Magento 2 Module
 * Copyright © Piotr Jaworski. All rights reserved.
 */
namespace PiotrJaworski\InternalLinking\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()
            ->newTable($installer->getTable('piotrjaworski_internallinking_links'))
            ->addColumn(
                'link_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Link Id'
            )
            ->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => false],
                'Url'
            )
            ->addColumn(
                'keyword',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Keyword'
            )
            ->addColumn(
                'cssClass',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'CSS Class'
            )
            ->addColumn(
                'style',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Inline Styling'
            )
            ->addColumn(
                'target',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Target'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Created At'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false],
                'Status'
            )
            ->addIndex(
                $installer->getIdxName('piotrjaworski_internallinking_links', ['link_id']),
                ['link_id']
            )
            ->addIndex(
                $installer->getIdxName('piotrjaworski_internallinking_links', ['keyword']),
                ['keyword']
            )                
            ->setComment('PiotrJaworski InternalLinking Links Table');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
    
}

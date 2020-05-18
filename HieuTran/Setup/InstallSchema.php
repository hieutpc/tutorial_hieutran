<?php
// This file will execute only one time when install the module. If you installed the module before, you will need to upgrade module and write the table create code to the UpgradeSchema.php in that folder
// and change attribute setup_version greater than current setup version in module.xml at app/code/Tutorial/HieuTran/etc/module.xml.

namespace Tutorial\HieuTran\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        /*
         * Our table's name is: "tt_hieutran_records"
         */
        if (!$installer->tableExists('tt_hieutran_records')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('tt_hieutran_records')
            )
                ->addColumn(
                    'entity_id', // Change1
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'FAQ Record ID'
                )
                ->addColumn(
                    'title',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false], // Bug4
                    'FAQ Title'
                )
                ->addColumn(
                    'description',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '2M',
                    [],
                    'FAQ Description '
                )
                ->addColumn(
                    'image',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'FAQ Image'
                )
                ->addColumn(
                    'status',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1, // Bug3
                    ['nullable' => false],
                    'FAQ Status'
                )
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Created At'
                )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            )->setComment('FAQ Table');

            $installer->getConnection()->createTable($table);

        }
        $installer->endSetup();
    }
}

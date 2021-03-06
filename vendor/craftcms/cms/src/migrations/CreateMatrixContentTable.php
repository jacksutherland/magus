<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\migrations;

use craft\db\Migration;

/**
 * CreateMatrixContentTable Migration
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class CreateMatrixContentTable extends Migration
{
    // Properties
    // =========================================================================

    /**
     * @var string|null The table name
     */
    public $tableName;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'elementId' => $this->integer()->notNull(),
            'siteId' => $this->integer()->notNull(),
            'dateCreated' => $this->dateTime()->notNull(),
            'dateUpdated' => $this->dateTime()->notNull(),
            'uid' => $this->uid(),
        ]);

        $this->createIndex(null, $this->tableName, ['elementId', 'siteId'], true);
        $this->addForeignKeys();
    }

    /**
     * Adds the foreign keys.
     */
    public function addForeignKeys()
    {
        $this->addForeignKey(null, $this->tableName, ['elementId'], '{{%elements}}', ['id'], 'CASCADE', null);
        $this->addForeignKey(null, $this->tableName, ['siteId'], '{{%sites}}', ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        return false;
    }
}

<?php

namespace craft\app\migrations;

use Craft;
use craft\app\db\Migration;
use craft\app\enums\ColumnType;

/**
 * m150519_150900_fieldversion_conversion migration.
 */
class m150519_150900_fieldversion_conversion extends Migration
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function safeUp()
	{
		$this->alterColumn('{{%info}}', 'fieldVersion', 'char(12)');
	}

	/**
	 * @inheritdoc
	 */
	public function safeDown()
	{
		echo "m150519_150900_fieldversion_conversion cannot be reverted.\n";
		return false;
	}
}

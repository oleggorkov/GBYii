<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_activity}}`.
 */
class m190814_115137_create_user_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_activity}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'activity_id' => $this->integer(),
            'create_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_activity}}');
    }
}

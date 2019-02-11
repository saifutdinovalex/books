<?php

use yii\db\Migration;

/**
 * Handles the creation of table `author`.
 */
class m190211_063539_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'user_add' => $this->integer()->notNull(),
            'date_create' => $this->integer()->notNull(),
            'active' => $this->integer(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('author');
    }
}

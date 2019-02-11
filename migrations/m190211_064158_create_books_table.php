<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 * Has foreign keys to the tables:
 *
 * - `author`
 * - `genre`
 */
class m190211_064158_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'user_add' => $this->integer()->notNull(),
            'date_create' => $this->integer()->notNull(),
            'active' => $this->integer(1)->defaultValue(1),
            'author_id' => $this->intger(),
            'year' => $this->integer(4)->notNull(),
            'genre' => $this->integer(),
            'number_page' => $this->integer(5)->notNull(),
            'picture' => $this->text()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-books-author_id',
            'books',
            'author_id'
        );

        // add foreign key for table `author`
        $this->addForeignKey(
            'fk-books-author_id',
            'books',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        // creates index for column `genre`
        $this->createIndex(
            'idx-books-genre',
            'books',
            'genre'
        );

        // add foreign key for table `genre`
        $this->addForeignKey(
            'fk-books-genre',
            'books',
            'genre',
            'genre',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `author`
        $this->dropForeignKey(
            'fk-books-author_id',
            'books'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-books-author_id',
            'books'
        );

        // drops foreign key for table `genre`
        $this->dropForeignKey(
            'fk-books-genre',
            'books'
        );

        // drops index for column `genre`
        $this->dropIndex(
            'idx-books-genre',
            'books'
        );

        $this->dropTable('books');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors_book}}`.
 */
class m220720_144556_create_authors_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-books-author_id',
            'books',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
    }
}

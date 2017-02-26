<?php
use Migrations\AbstractMigration;

class CreateArticlesTags extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles_tags');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('article_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('tag_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('weight', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex([
            'article_id',
        ], [
            'name' => 'BY_ARTICLE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'tag_id',
        ], [
            'name' => 'BY_TAG_ID',
            'unique' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}

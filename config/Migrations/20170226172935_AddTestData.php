<?php
use Migrations\AbstractMigration;

class AddTestData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
	    $sql = <<<SQL
			INSERT INTO `articles` (`id`, `secondary_id`, `title`, `content`) VALUES
('e08d0e6e-fa8c-11e6-aa1c-8c52f6dd719b', '4381d503-0858-4af2-a8d4-615e7a91f9c4', 'Article #1', 'Article #1');
INSERT INTO `articles_tags` (`id`, `article_id`, `tag_id`, `weight`) VALUES
('20639a14-19f2-40a8-a393-16b3375353c8', '4381d503-0858-4af2-a8d4-615e7a91f9c4', '740147b3-e756-4f12-a25b-fda5e8756ddb', '5');
INSERT INTO `tags` (`id`, `secondary_id`, `name`) VALUES
('0a992e57-a551-464f-9a4d-4b8d70810d72', '740147b3-e756-4f12-a25b-fda5e8756ddb', 'Tag #1'),
('ca2eb592-fa90-11e6-aa1c-8c52f6dd719b', '5d918bfd-45ce-4661-8884-93c794767cae', 'Tag #2');
SQL;

	    $this->execute($sql);
    }
}

# Application to show error in CakePHP's ORM belongsToMany Association 


## Installation

1. Set up an app.php to point to a working database
2. Run `bin/cake migrations migrate`.
3. Visit `/belongs_to_many_bug/articles`

## Confirmation

You'll notice that the result of the `Articles->find()->contain(['Tags'])` does not contain any Tags.

The SQL Generated for the page, shows what is wrong:

```
SELECT Articles.id AS `Articles__id`, Articles.secondary_id AS `Articles__secondary_id`, Articles.title AS `Articles__title`, Articles.content AS `Articles__content` FROM articles Articles

SELECT ArticlesTags.id AS `Tags_CJoin__id`, ArticlesTags.article_id AS `Tags_CJoin__article_id`, ArticlesTags.tag_id AS `Tags_CJoin__tag_id`, ArticlesTags.weight AS `Tags_CJoin__weight`, Tags.id AS `Tags__id`, Tags.secondary_id AS `Tags__secondary_id`, Tags.name AS `Tags__name` FROM tags Tags INNER JOIN articles_tags ArticlesTags ON Tags.id = (ArticlesTags.tag_id) WHERE ArticlesTags.article_id in ('4381d503-0858-4af2-a8d4-615e7a91f9c4')
```

Instead of using INNER JOIN on Tags.secondary_id, it is set on Tags.id.

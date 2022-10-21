<?php

namespace app\models;

use app\phpmvc\db\DbModel;

/**
 *
 * @author  Gideon gideoti
 * @package app\models
 */
class Tag extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public string $slug = '';
    public string $tag_desc = '';

    public static function tableName(): string
    {
        return 'tags';
    }

    public function attributes(): array
    {
        return ['title', 'tag_desc', 'slug'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
            'tag_desc' => 'Tag Description',
            'slug' => 'Slug'
        ];
    }

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'slug' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'tag_desc' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

}
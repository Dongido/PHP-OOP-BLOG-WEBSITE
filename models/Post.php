<?php

namespace app\models;

use app\phpmvc\db\DbModel;

/**
 *
 * @author  Gideon gideoti
 * @package app\models
 */
class Post extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public string $category_id = '';
    public string $tag_id = '';
    public string $summary = '';
    public string $content = '';
    public string $display_status = '';
    public string $display_position = '';
    public string $photo = '';

    public static function tableName(): string
    {
        return 'posts';
    }

    public function attributes(): array
    {
        return [
            'category_id', 'tag_id', 'title',
            'summary', 'content', 'display_status',
            'display_position', 'created_at', 'photo'
        ];
    }

    public function labels(): array
    {
        return [
            'category_id' => 'Category',
            'tag_id' => 'Tag',
            'title' => 'Title',
            'summary' => 'Short Description',
            'content' => 'Content',
            'display_status' => 'Display Status',
            'display_position' => 'Display Position',
            'photo' => 'Photo'
        ];
    }

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'category_id' => [self::RULE_REQUIRED],
            'tag_id' => [self::RULE_REQUIRED],
            'summary' => [self::RULE_REQUIRED],
            'content' => [self::RULE_REQUIRED],
            'display_status' => [self::RULE_REQUIRED],
            'display_position' => [self::RULE_REQUIRED],
            //'photo' => [self::RULE_REQUIRED]
        ];
    }

    public function save()
    {
        return parent::save();
    }

}
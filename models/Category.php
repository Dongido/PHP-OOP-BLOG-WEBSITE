<?php

namespace app\models;

use app\phpmvc\db\DbModel;

/**
 *
 * @author  Gideon gideoti
 * @package app\models
 */
class Category extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public string $cat_desc = '';

    public static function tableName(): string
    {
        return 'categories';
    }

    public function attributes(): array
    {
        return ['title', 'cat_desc'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
            'cat_desc' => 'Category Description'
        ];
    }

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'cat_desc' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

}
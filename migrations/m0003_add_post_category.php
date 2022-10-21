<?php


class m0003_add_post_category {
    public function up()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                cat_desc VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE categories;";
        $db->pdo->exec($SQL);
    }
}
<?php


class m0005_add_tag {
    public function up()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE tags (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(75) NOT NULL,
                tag_desc VARCHAR(255) NOT NULL,
                slug VARCHAR(80) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE tags;";
        $db->pdo->exec($SQL);
    }
}
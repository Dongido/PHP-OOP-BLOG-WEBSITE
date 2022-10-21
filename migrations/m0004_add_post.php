<?php


class m0004_add_post {
    public function up()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE posts (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                category_id INT,
                tag_id INT,
                title VARCHAR(255) NOT NULL,
                slug VARCHAR(255) NOT NULL,
                summary TINYTEXT NULL,
                content TEXT NULL DEFAULT NULL,
                photo VARCHAR(100) NOT NULL,
                display_status VARCHAR(10) NOT NULL,
                display_position ENUM('flash_news', 'sport_light', 'global_news', 'celebrity_news') NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (category_id) REFERENCES categories(id),
                FOREIGN KEY (tag_id) REFERENCES tags(id)
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE posts;";
        $db->pdo->exec($SQL);
    }
}
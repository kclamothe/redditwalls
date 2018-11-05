use heroku_a9d8c3a5ddb125b;

CREATE TABLE IF NOT EXISTS user (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(256) NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS wallpaper (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL,
    reddit_link VARCHAR(2083) NOT NULL,
    image_link VARCHAR(2083) NOT NULL,
    date DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS favorites
(
	user_id INTEGER,
    wallpaper_id INTEGER,
    FOREIGN KEY (user_id) references user(id),
    FOREIGN KEY (wallpaper_id) references wallpaper(id)
)

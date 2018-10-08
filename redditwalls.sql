CREATE TABLE user (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(256) NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(64) NOT NULL
);

CREATE TABLE wallpaper (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    reddit_link VARCHAR(MAX) NOT NULL,
    image_link VARCHAR(MAX) NOT NULL
);

CREATE TABLE favorites
(
    user_id INTEGER FOREIGN KEY references user(id),
    item_id INTEGER FOREIGN KEY references wallpaper(id)
)
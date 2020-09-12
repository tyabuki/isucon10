DROP DATABASE IF EXISTS isuumo;
CREATE DATABASE isuumo;

DROP TABLE IF EXISTS isuumo.estate;
DROP TABLE IF EXISTS isuumo.chair;

CREATE TABLE isuumo.estate
(
    id          INTEGER             NOT NULL PRIMARY KEY,
    name        VARCHAR(64)         NOT NULL,
    description VARCHAR(4096)       NOT NULL,
    thumbnail   VARCHAR(128)        NOT NULL,
    address     VARCHAR(128)        NOT NULL,
    latitude    DOUBLE PRECISION    NOT NULL,
    longitude   DOUBLE PRECISION    NOT NULL,
    rent        INTEGER             NOT NULL,
    door_height INTEGER             NOT NULL,
    door_width  INTEGER             NOT NULL,
    features    VARCHAR(64)         NOT NULL,
    popularity  INTEGER             NOT NULL,
    door_long   INTEGER             NOT NULL DEFAULT 0,
    door_short  INTEGER             NOT NULL DEFAULT 0,
    INDEX idx_door_size(door_height, door_width),
    INDEX idx_door_size2(door_long, door_short, popularity, id),
    INDEX idx_rent(rent, id)
);

alter table isuumo.estate add index sort_idx(popularity, id);
alter table isuumo.estate add index w_search_idx(door_width, popularity, id);
alter table isuumo.estate add index h_search_idx(door_height, popularity, id);
alter table isuumo.estate add index r_search_idx(rent, popularity, id);


CREATE TABLE isuumo.chair
(
    id          INTEGER         NOT NULL PRIMARY KEY,
    name        VARCHAR(64)     NOT NULL,
    description VARCHAR(4096)   NOT NULL,
    thumbnail   VARCHAR(128)    NOT NULL,
    price       INTEGER         NOT NULL,
    height      INTEGER         NOT NULL,
    width       INTEGER         NOT NULL,
    depth       INTEGER         NOT NULL,
    color       VARCHAR(64)     NOT NULL,
    features    VARCHAR(64)     NOT NULL,
    kind        VARCHAR(64)     NOT NULL,
    popularity  INTEGER         NOT NULL,
    stock       INTEGER         NOT NULL,
    INDEX idx_lowprice(price, id),
    INDEX idx_popularity(popularity, id)
);

alter table isuumo.chair add index sort_idx(popularity, id);
alter table isuumo.chair add index w_search_idx(width, stock, popularity, id);
alter table isuumo.chair add index h_search_idx(height, stock, popularity, id);
alter table isuumo.chair add index d_search_idx(depth, stock, popularity, id);
alter table isuumo.chair add index p_search_idx(price, stock, popularity, id);
alter table isuumo.chair add index c_search_idx(color, stock, popularity, id);
alter table isuumo.chair add index kind_search_idx(kind, stock, popularity, id);

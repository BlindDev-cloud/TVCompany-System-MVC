CREATE TABLE releases
(
    id       SERIAL PRIMARY KEY,
    video    TEXT    NOT NULL,
    comment  TEXT DEFAULT NULL,
    order_id INTEGER NOT NULL,

    CONSTRAINT fk_order_id FOREIGN KEY (order_id) REFERENCES orders (id)
);
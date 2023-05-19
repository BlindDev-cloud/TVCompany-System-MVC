CREATE TABLE scripts
(
    id       SERIAL PRIMARY KEY,
    document TEXT    NOT NULL,
    comment  TEXT DEFAULT NULL,
    order_id INTEGER NOT NULL,

    CONSTRAINT fk_order_id FOREIGN KEY (order_id) REFERENCES orders (id)
);
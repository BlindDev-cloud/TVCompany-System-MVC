CREATE TABLE releases
(
    id       SERIAL PRIMARY KEY,
    video    TEXT    NOT NULL,
    order_id INTEGER NOT NULL REFERENCES orders (id)
);
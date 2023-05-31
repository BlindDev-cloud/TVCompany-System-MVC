CREATE TABLE releases
(
    id       SERIAL PRIMARY KEY,
    video    TEXT    NOT NULL,
    order_id INTEGER UNIQUE NOT NULL REFERENCES orders (id)
);
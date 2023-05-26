CREATE TABLE order_assignments
(
    order_id   INTEGER REFERENCES orders (id),
    account_id INTEGER REFERENCES accounts (id),
    role       VARCHAR NOT NULL,

    PRIMARY KEY (order_id,
                 account_id),
    CHECK ( role IN
            (
             'producer',
             'manager'
                ))
);
CREATE TABLE orders
(
    id          SERIAL PRIMARY KEY,
    topic       VARCHAR(255) NOT NULL,
    description TEXT         NOT NULL,
    created_at  DATE    DEFAULT now(),
    cost        NUMERIC DEFAULT NULL,
    deadline    DATE    DEFAULT NULL,
    status      VARCHAR(100),
    client_id   INTEGER      NOT NULL REFERENCES clients (id),

    CHECK ( status IN
            ('planning',
             'agreement',
             'recording',
             'demonstration',
             'denial',
             'completed'
                ) )
);
CREATE TABLE roles
(
    id   SERIAL PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL,
    CHECK ( name IN
            ('manager',
             'admin',
             'producer',
             'journalist',
             'editor'))
);
CREATE TABLE accounts
(
    id          SERIAL PRIMARY KEY,
    email       VARCHAR(150) UNIQUE NOT NULL,
    password    TEXT                NOT NULL,
    role        VARCHAR             NOT NULL,
    employee_id INTEGER UNIQUE DEFAULT NULL REFERENCES employees (id) ON DELETE RESTRICT,

    CHECK ( role IN
            (
             'admin',
             'manager',
             'producer'
                ))
);
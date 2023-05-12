CREATE TABLE accounts
(
    id          SERIAL PRIMARY KEY,
    email       VARCHAR(150) UNIQUE NOT NULL,
    password    TEXT                NOT NULL,
    employee_id INTEGER UNIQUE DEFAULT NULL REFERENCES employees (id) ON DELETE RESTRICT,
    role_id     INTEGER             NOT NULL REFERENCES roles (id) ON DELETE RESTRICT
);
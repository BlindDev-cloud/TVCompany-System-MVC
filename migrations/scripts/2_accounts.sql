CREATE TABLE accounts
(
    id          SERIAL PRIMARY KEY,
    email       VARCHAR(150) UNIQUE NOT NULL,
    password    VARCHAR(255)        NOT NULL,
    employee_id INTEGER UNIQUE DEFAULT NULL,
    role_id     INTEGER             NOT NULL,

    CONSTRAINT fk_employee_id FOREIGN KEY (employee_id) REFERENCES employees (id) ON DELETE SET NULL,
    CONSTRAINT fk_role_id FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE RESTRICT
);
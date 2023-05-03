CREATE TABLE orders
(
    id          SERIAL PRIMARY KEY,
    topic       VARCHAR(255) NOT NULL,
    description TEXT         NOT NULL,
    created_at  DATE         DEFAULT now(),
    cost        NUMERIC      DEFAULT NULL,
    deadline    DATE         DEFAULT NULL,
    status      VARCHAR(100) DEFAULT 'planning',
    team_id     INTEGER      NOT NULL,
    manager_id  INTEGER      NOT NULL,
    client_id   INTEGER      NOT NULL,

    CONSTRAINT fk_team_id FOREIGN KEY (team_id) REFERENCES teams (id),
    CONSTRAINT fk_manager_id FOREIGN KEY (manager_id) REFERENCES accounts (id),
    CONSTRAINT fk_client_id FOREIGN KEY (client_id) REFERENCES clients (id)
);
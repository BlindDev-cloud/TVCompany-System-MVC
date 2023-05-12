CREATE TABLE teams
(
    id            SERIAL PRIMARY KEY,
    manager_id    INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    producer_id   INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    journalist_id INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    editor_id     INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    status        BOOLEAN DEFAULT true
);
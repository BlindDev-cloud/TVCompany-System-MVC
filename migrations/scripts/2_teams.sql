CREATE TABLE teams
(
    id            SERIAL PRIMARY KEY,
    producer_id   INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    journalist_id INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    editor_id     INTEGER NOT NULL REFERENCES accounts (id) ON DELETE RESTRICT,
    is_free        BOOLEAN DEFAULT false
);
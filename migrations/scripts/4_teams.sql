CREATE TABLE teams
(
    id            SERIAL PRIMARY KEY,
    name          varchar(100)   not null,
    producer_id   INTEGER UNIQUE NOT NULL,
    journalist_id INTEGER UNIQUE NOT NULL,
    editor_id     INTEGER UNIQUE NOT NULL,
    is_free       BOOLEAN DEFAULT true,

    CONSTRAINT fk_producer_id FOREIGN KEY (producer_id) REFERENCES accounts (id),
    CONSTRAINT fk_journalist_id FOREIGN KEY (producer_id) REFERENCES accounts (id),
    CONSTRAINT fk_editor_id FOREIGN KEY (producer_id) REFERENCES accounts (id)
);
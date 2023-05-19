CREATE TABLE materials
(
    id         SERIAL PRIMARY KEY,
    video      TEXT    NOT NULL,
    release_id INTEGER NOT NULL,

    CONSTRAINT fk_release_id FOREIGN KEY (release_id) REFERENCES releases (id)
);
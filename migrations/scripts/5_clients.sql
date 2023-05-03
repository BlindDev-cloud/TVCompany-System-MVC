CREATE TABLE clients
(
    id         SERIAL PRIMARY KEY,
    name       VARCHAR(50)         NOT NULL,
    surname    VARCHAR(50)         NOT NULL,
    patronymic VARCHAR(50)         NOT NULL,
    email      VARCHAR(150) UNIQUE NOT NULL,
    phone      varchar(20) UNIQUE  NOT NULL
);
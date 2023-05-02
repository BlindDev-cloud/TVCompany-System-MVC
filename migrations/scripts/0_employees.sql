CREATE TABLE employees
(
    id                 SERIAL PRIMARY KEY,
    name               VARCHAR(50)         NOT NULL,
    surname            VARCHAR(50)         NOT NULL,
    patronymic         VARCHAR(50)         NOT NULL,
    email              VARCHAR(150) UNIQUE NOT NULL,
    phone              varchar(20) UNIQUE  NOT NULL,
    date_of_birth      DATE                NOT NULL,
    date_of_employment DATE DEFAULT now(),
    position           VARCHAR(100)        NOT NULL,

    CONSTRAINT full_name UNIQUE (name,
                                 surname,
                                 patronymic)
);
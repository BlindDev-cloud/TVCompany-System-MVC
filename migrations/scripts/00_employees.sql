CREATE TABLE employees
(
    id                 SERIAL PRIMARY KEY,
    name               VARCHAR(50)         NOT NULL,
    surname            VARCHAR(50)         NOT NULL,
    email              VARCHAR(150) UNIQUE NOT NULL,
    phone              varchar(20) UNIQUE  NOT NULL,
    position           VARCHAR(100)        NOT NULL,
    CHECK ( position IN
            ('manager',
             'admin',
             'producer',
             'journalist',
             'editor',
             'sound operator',
             'video operator',
             'host') )
);
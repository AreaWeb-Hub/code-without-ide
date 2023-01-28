# Login / Registration

Авторизация и регистрация на PHP, которая целиком и полностью была написана в редакторе nano без использования IDE

## Таблицы в базе 

```sql
-- auto-generated definition
create table users
(
    id       bigint auto_increment
        primary key,
    name     varchar(255) null,
    email    varchar(255) null,
    phone    varchar(255) null,
    password varchar(255) null,
    token    varchar(255) null,
    constraint unique_email
        unique (email)
);
```

drop table if exists usuarios cascade;

create table usuarios(
    id                  bigserial             constraint pk_usuarios primary key,
    nick                varchar(20) not null constraint uq_usuarios_nick unique,
    password            char(10)     not null,
    email               varchar(100) not null,
    token                varchar(64)  not null
);

drop table if exists iframes cascade;

create table iframes (
    id           bigserial constraint pk_iframes primary key,
    nick_usuarios    varchar(20)    constraint fk_usuarios_iframes references usuarios(nick)
                          on update cascade on delete cascade,
    contador     varchar(150),
    url          varchar(150),
    fecha        DATE  not null default current_date
);

/*insert into usuarios(nick, password, email, token)
values('admin', 'admin', 'manuel.roca@iesdonana.org', 'asdfghjklnasdfghjklñasdfghjkln'),
      ('pepe', 'pepe', 'manuel.roca@iesdonana.com', 'qwertyuiop'),
      ('juan', 'juan', 'manuel.roca@iesdonana.gob', 'zxcvbnm'),
      ('manuel','manuel', 'manuel.roca@iesdonana.es', 'qazxswedc');*/




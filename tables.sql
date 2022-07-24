create table urls
(
    id serial not null
        constraint urls_pk
            primary key,
    url varchar(256) not null,
    short varchar(256) not null
);

create unique index urls_short_uindex
	on urls (short);

create unique index urls_url_uindex
	on urls (url);
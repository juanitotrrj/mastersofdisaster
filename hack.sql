CREATE TABLE namria (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  OBJECTID_1 bigint(20) DEFAULT NULL,
  OBJECT_ID float DEFAULT NULL,
  BLDG_NAME varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  TYPE varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  STATUS varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  HSE_NO varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  STREET varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  CITY_MUNIC varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id_UNIQUE (id)
);
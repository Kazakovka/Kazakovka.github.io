SET NAMES utf8 COLLATE utf8_unicode_ci;
DROP DATABASE IF EXISTS SHOP;
CREATE DATABASE SHOP
DEFAULT CHARACTER SET utf8;
USE SHOP;

/*** Справочник стран ***/
CREATE TABLE REFCTR
( CODCTR   CHAR(3),   /* Код страны */
  NAMECTR  VARCHAR(60),        /* Краткое название страны */
  FULLNAME VARCHAR(65),        /* Полное название страны */
  CONSTRAINT PK_REFCTR PRIMARY KEY (CODCTR)
);

/*** Зарегистрированные пользователи ***/
CREATE TABLE SHOP_REGUSERS
( USERID     INTEGER AUTO_INCREMENT NOT NULL,       /* ID зарегистрированного пользователя  */
  USERNAME   VARCHAR(50) NOT NULL,                  /* Логин пользователя */
  PASSKEY    VARCHAR(20) NOT NULL,                  /* Пароль пользователя */
  FIRSTNAME  VARCHAR(100) NOT NULL,                 /* Имя */
  SECONDNAME VARCHAR(100) NOT NULL,                 /* Отчество */
  LASTNAME   VARCHAR(100) NOT NULL,                 /* Фамилия */
  SEX        CHAR(1) DEFAULT '0',                   /* Пол  */
  YEARBIRTH  CHAR(4),                               /* Год рождения */
  CONSTRAINT PK_SHOP_REGUSERS
    PRIMARY KEY(USERID)
);

/*** Категории товаров ***/
CREATE TABLE SHOP_CATEGORY              
( ID           CHAR(2) NOT NULL,	  /* Код категории товара */
  CATEGORYNAME VARCHAR(50) NOT NULL,  /* Название категории */
  AMOUNT       CHAR(2) NOT NULL,	  /* Количество товаров */
  CONSTRAINT PK_SHOP_CATEGORY         
  PRIMARY KEY (ID)
);
  
/*** Группа товаров ***/
CREATE TABLE SHOP_CATEGORY_GROUP
( CATEGORYID CHAR(2) NOT NULL,      /* Код категории товара */
  GROUPID    CHAR(3) NOT NULL,      /* Код группы товара */
  GROUPNAME  VARCHAR(50) NOT NULL,  /* Название группы */
  AMOUNT     CHAR(3) NOT NULL,      /* Количество товара */
  CONSTRAINT PK_SHOP_CATEGORY_GROUP
    PRIMARY KEY (GROUPID),
  CONSTRAINT FK_SHOP_CATEGORY_GROUP
    FOREIGN KEY (CATEGORYID) REFERENCES SHOP_CATEGORY(ID)
);

/*** Товар ***/
CREATE TABLE SHOP_ITEM
( GROUPID      CHAR(3) NOT NULL,       /* Код группы товара */
  ITEMID       CHAR(3) NOT NULL,       /* ID товара */
  CODCTR       CHAR(3),                /* Код страны */
  BRAND        VARCHAR(50) NOT NULL,   /* Бренд товара */
  MODEL        VARCHAR(50) NOT NULL,   /* Модель товара */
  ITEMNAME     VARCHAR(50) NOT NULL,   /* Название товара */
  ITEMPRICE    CHAR(10) NOT NULL,      /* Цена товара */
  ITEMGARRANTY CHAR(3) NULL,           /* Срок гарантии товара */
  ITEMAMOUNT   CHAR(3) NOT NULL,       /* Количество товара на складе */
  ITEMBUYUSERS CHAR(4) NOT NULL,       /* Количество покупок данного товара */
  CONSTRAINT PK_SHOP_ITEM
    PRIMARY KEY(ITEMID),
  CONSTRAINT FK1_SHOP_ITEM
    FOREIGN KEY(GROUPID) REFERENCES SHOP_CATEGORY_GROUP(GROUPID),
  CONSTRAINT FK2_SHOP_ITEM
    FOREIGN KEY (CODCTR) REFERENCES REFCTR(CODCTR)
      ON UPDATE CASCADE
      ON DELETE SET NULL
);

/*** Корзина ***/
CREATE TABLE ITEMBOX
( IDBOX     CHAR(5) NOT NULL,      /* Идентификационный номер корзины */
  ITEMID    CHAR(3) NOT NULL,      /* ID товара */
  ITEMNAME  VARCHAR(50) NOT NULL,  /* Название товара */
  AMOUNT    CHAR(2) NOT NULL,      /* Количество товара */
  ITEMPRICE CHAR(10) NOT NULL,     /* Цена товара */
  CONSTRAINT PK_ITEMBOX
    PRIMARY KEY(IDBOX),
  CONSTRAINT FK_ITEMBOX
	FOREIGN KEY (ITEMID) REFERENCES SHOP_ITEM(ITEMID)
);


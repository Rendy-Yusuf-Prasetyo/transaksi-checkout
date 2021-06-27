/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16/06/2021 15:34:02                          */
/*==============================================================*/


drop table if exists BARANG;

drop table if exists CART;

drop table if exists CART_ITEM;

drop table if exists PELANGGAN;

drop table if exists TRANSAKSI;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   ID_BARANG            int not null AUTO_INCREMENT,
   NAMA_BARANG          varchar(100) not null,
   HARGA                float(255) not null,
   STOK                 float(255) not null,
   DESKRIPSI            varchar(10000) not null,
   primary key (ID_BARANG)
);

/*==============================================================*/
/* Table: CART                                                  */
/*==============================================================*/
create table CART
(
   ID_CART              int not null AUTO_INCREMENT,
   ID_PELANGGAN         int,
   DELIVERY_CHARGE      numeric(50,0) not null,
   GRAND_TOTAL          float(500,0) not null,
   PRIZE                float(500,0) not null,
   primary key (ID_CART)
);

/*==============================================================*/
/* Table: CART_ITEM                                             */
/*==============================================================*/
create table CART_ITEM
(
   ID_CART_ITEM         int not null AUTO_INCREMENT,
   ID_CART		int,
   ID_BARANG            int,
   PRICE                float(255) not null,
   QUANTITY             float(255) not null,
   primary key (ID_CART_ITEM),
   foreign key (ID_CART) references CART (ID_CART)
);

/*==============================================================*/
/* Table: PELANGGAN                                             */
/*==============================================================*/
create table PELANGGAN
(
   ID_PELANGGAN         int not null AUTO_INCREMENT,
   NAMA_PELANGGAN       varchar(200) not null,
   primary key (ID_PELANGGAN)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI
(
   ID_TRANSAKSI         int not null AUTO_INCREMENT,
   ID_PELANGGAN         int,
   ID_CART              int,
   ID_BARANG            int,
   JUMLAH               float(255) not null,
   primary key (ID_TRANSAKSI)
);


alter table CART add constraint FK_RELATIONSHIP_8 foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN) on delete restrict on update restrict;

alter table CART_ITEM add constraint FK_RELATIONSHIP_2 foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_RELATIONSHIP_4 foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_RELATIONSHIP_5 foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_RELATIONSHIP_6 foreign key (ID_CART)
      references CART (ID_CART) on delete restrict on update restrict;




create table CLIENTE( Id INTEGER(6) NOT NULL,
	Contraseña TEXT NOT NULL,
	Nombre VARCHAR(80) NOT NULL,
	Correo VARCHAR(30) NOT NULL,
	Telefono INTEGER(10) NOT NULL,
	Direccion TEXT NOT NULL,
	Ciudad VARCHAR(30) NOT NULL,
	Estado VARCHAR(30) NOT NULL,
    CodPostal INTEGER(5) NOT NULL, 
  PRIMARY KEY (Id));

create table PROVEEDOR( Id INTEGER(6) NOT NULL,
	Contraseña TEXT NOT NULL,
	Nombre VARCHAR(80) NOT NULL,
    Descripcion MEDIUMTEXT NOT NULL,
	Correo VARCHAR(30) NOT NULL,
	Telefono INTEGER(10) NOT NULL,
	Calle VARCHAR(60) NOT NULL,
	Colonia VARCHAR(60) NOT NULL,
	Ciudad VARCHAR(30) NOT NULL,
	Estado VARCHAR(30) NOT NULL,
    CodPostal INTEGER(5) NOT NULL, 
  PRIMARY KEY (Id));
  
create table ARTICULO( Id INTEGER(6) NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  Precio FLOAT NOT NULL,
  Descripcion MEDIUMTEXT NOT NULL,
  Id_proveedor INTEGER (6) NOT NULL,
  Nombre_proveedor VARCHAR (14) NOT NULL,
  Stock INTEGER(3) NOT NULL,
  
 PRIMARY KEY (Id));
 
create table VENDE (Id INTEGER(6) NOT NULL,
  Fecha_venta DATE NOT NULL,
  Id_cliente INTEGER(6) NOT NULL,
  Id_proveedor INTEGER(6) NOT NULL,
  Id_articulo INTEGER(6) NOT NULL,
  Cantidad INTEGER(2) NOT NULL,
  Precio_articulo INTEGER(5) NOT NULL,
  Precio_total INTEGER(5) NOT NULL,
 
  PRIMARY KEY (Id),
  FOREIGN KEY (Id_proveedor) REFERENCES PROVEEDOR (Id),
  FOREIGN KEY (Id_articulo) REFERENCES ARTICULO (Id),
  FOREIGN KEY (Id_cliente) REFERENCES CLIENTE(Id));

           
create table COMPRA( Id INTEGER (6) NOT NULL,
  Fecha_compra DATE NOT NULL,
  Id_proveedor INTEGER(6) NOT NULL,
  Id_articulo INTEGER(6) NOT NULL,
  Cantidad INTEGER(2) NOT NULL,
  Precio_articulo FLOAT NOT NULL,
  Precio_total FLOAT NOT NULL,
  
  PRIMARY KEY (Id),
  FOREIGN KEY (Id_proveedor) REFERENCES PROVEEDOR (Id),
  FOREIGN KEY (Id_articulo) REFERENCES ARTICULO (Id));


insert into CLIENTE values ( 140504,'password123','pedro', 'h@kja', 1234567891, 'Calle 12 sur 4466 Colonia las Pitas', 'Puebla', 'Puebla', 74325);
insert into ARTICULO values (151515, 'Chanclas talla 2', 555,'Chanclas blancas con negro talla 2', 141699, 'Pedro', 100); 
insert into PROVEEDOR values (1, 'password121', 'Pedro', 'Soy un artista', 'holas@gmail.com',22236655, 
'Calle Girasoles', 'Colonia Atlixco', 'Puebla', 'Puebla', '72340');
insert into VENDE values (444,'16-02-15', 140504, 1,151515,2,123,246);
insert into COMPRA values (044,'16-02-15', 1, 151515,4,10,40);

Select *
From vende,compra

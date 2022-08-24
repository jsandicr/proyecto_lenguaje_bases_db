CREATE TABLESPACE TBS_DATA DATAFILE 'C:\Databases\Oracle19c\oradata\BDPIZZA\DATAFILES\BDPIZZA_Data01.DBF' SIZE 1G DEFAULT STORAGE (INITIAL 5M NEXT 5M PCTINCREASE 0);
CREATE TABLESPACE TBS_INDEX DATAFILE 'C:\Databases\Oracle19c\oradata\BDPIZZA\DATAFILES\BDPIZZA_Index01.DBF' SIZE 100M DEFAULT STORAGE (INITIAL 5M NEXT 5M PCTINCREASE 0);


alter session set "_ORACLE_SCRIPT" = TRUE;
CREATE USER ADMPIZZA IDENTIFIED BY Admin01 DEFAULT TABLESPACE TBS_DATA TEMPORARY TABLESPACE TEMP;
ALTER USER ADMPIZZA IDENTIFIED BY Admin01 DEFAULT TABLESPACE TBS_INDEX;
GRANT CONNECT TO ADMPIZZA;
GRANT RESOURCE TO ADMPIZZA;
ALTER USER ADMPIZZA QUOTA UNLIMITED ON TBS_DATA;
ALTER USER ADMPIZZA QUOTA UNLIMITED ON TBS_INDEX;
GRANT DBA TO ADMPIZZA;


CREATE TABLE TB_ROLES(
   TBR_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBR_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBR_NOMBRE VARCHAR2(50) NOT NULL
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_USUARIOS(
   TBU_ID INTEGER NOT NULL CONSTRAINT PK_TBU_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBU_NOMBRE VARCHAR2(50) NOT NULL,
   TBU_APELLIDO1 VARCHAR2(50) NOT NULL,
   TBU_APELLIDO2 VARCHAR2(50) NOT NULL,
   TBU_DIRRECION VARCHAR2(200) NOT NULL,
   TBU_TELEFONO NUMBER NOT NULL,	
   TBR_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBR_ID_TBU FOREIGN KEY (TBR_ID) REFERENCES TB_ROLES(TBR_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_FACTURAS(
   TBF_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBF_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBF_FECHA DATE NOT NULL,
   TBF_TOTAL FLOAT NOT NULL,
   TBU_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBU_ID_TBF FOREIGN KEY (TBU_ID) REFERENCES TB_USUARIOS(TBU_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_TIPO_PRODUCTO(
   TBTP_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBTP_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBTP_NOMBRE VARCHAR2(50) NOT NULL
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_PRODUCTOS(
   TBP_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBP_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBP_NOMBRE VARCHAR2(50) NOT NULL,
   TBP_DESCRIPCION VARCHAR2(200) NOT NULL,
   TBP_PRECIO FLOAT NOT NULL,
   TBTP_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBTP_ID_BDP FOREIGN KEY (TBTP_ID) REFERENCES TB_TIPO_PRODUCTO(TBTP_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_PROMOCIONES(
   TBPR_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBPR_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBPR_DESCRIPCION VARCHAR2(200) NOT NULL,
   TPPR_ESTDO CHAR(1) NOT NULL
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_PROMOCIONES_PRODUCTOS(
   TBPR_ID INTEGER NOT NULL,
   TBP_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBPR_ID_TBPP FOREIGN KEY (TBPR_ID) REFERENCES TB_PROMOCIONES(TBPR_ID),
   CONSTRAINT PK_TBP_ID_TBPP FOREIGN KEY (TBP_ID) REFERENCES TB_PRODUCTOS(TBP_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_SUCURSALES(
   TBS_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBS_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBS_NOMBRE VARCHAR2(50) NOT NULL
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_PEDIDOS(
   TBPE_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBPE_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBPE_ENVIO CHAR(1) NOT NULL,
   TBF_ID INTEGER NOT NULL,
   TBS_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBF_ID_TBPE FOREIGN KEY (TBF_ID) REFERENCES TB_FACTURAS(TBF_ID),
   CONSTRAINT PK_TBS_ID_TBPE FOREIGN KEY (TBS_ID) REFERENCES TB_SUCURSALES(TBS_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_DETALLE_FACTURA(
   TBDF_ID INTEGER NOT NULL CONSTRAINT PK_TBDF_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
   TBDF_CANTIDAD INTEGER NOT NULL,
   TBF_ID INTEGER NOT NULL,
   TBP_ID INTEGER NOT NULL,
   CONSTRAINT PK_TBF_ID_TBPDF FOREIGN KEY (TBF_ID) REFERENCES TB_FACTURAS(TBF_ID),
   CONSTRAINT PK_TBP_ID_TBPDF FOREIGN KEY (TBP_ID) REFERENCES TB_PRODUCTOS(TBP_ID)
) TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

CREATE TABLE TB_LOGIN( 
    TBL_ID INTEGER GENERATED ALWAYS AS IDENTITY NOT NULL CONSTRAINT PK_TBL_ID PRIMARY KEY USING INDEX TABLESPACE TBS_INDEX,
    TBU_ID INTEGER NOT NULL,
    TBL_PASSWORD VARCHAR2(15) ,
    CONSTRAINT PK_TBL_ID_TBU FOREIGN KEY (TBU_ID) REFERENCES TB_USUARIOS(TBU_ID)
)TABLESPACE TBS_DATA STORAGE (INITIAL 1M NEXT 1M PCTINCREASE 0);

--Paquete de CRUD de Usuarios
create or replace NONEDITIONABLE PACKAGE PKG_USUARIO
    IS
       PROCEDURE PR_VALIDA(CONTRCA IN TB_LOGIN.TBL_PASSWORD%TYPE, USUARIO IN TB_LOGIN.TBU_ID%TYPE, valida OUT SYS_REFCURSOR);

       PROCEDURE INSERTAR_USUARIO(TBU_ID IN TB_USUARIOS.TBU_ID%TYPE, 
                                             TBU_NOMBRE IN TB_USUARIOS.TBU_NOMBRE%TYPE, 
                                             TBU_APELLIDO1 IN TB_USUARIOS.TBU_APELLIDO1%TYPE,
                                             TBU_APELLIDO2 IN TB_USUARIOS.TBU_APELLIDO2%TYPE,
                                             TBU_DIRRECION IN TB_USUARIOS.TBU_DIRRECION%TYPE, 
                                             TBU_TELEFONO IN TB_USUARIOS.TBU_TELEFONO%TYPE,
                                             TBR_ID IN TB_USUARIOS.TBR_ID%TYPE,
                                             TBL_PASSWORD IN TB_LOGIN.TBL_PASSWORD%TYPE);

        PROCEDURE MODIFICAR_USUARIO(IDI IN TB_USUARIOS.TBU_ID%TYPE, 
                                             NOMBRE IN TB_USUARIOS.TBU_NOMBRE%TYPE, 
                                             APELLIDO1 IN TB_USUARIOS.TBU_APELLIDO1%TYPE,
                                             APELLIDO2 IN TB_USUARIOS.TBU_APELLIDO2%TYPE,
                                             DIRRECION IN TB_USUARIOS.TBU_DIRRECION%TYPE, 
                                             TELEFONO IN TB_USUARIOS.TBU_TELEFONO%TYPE);

        PROCEDURE ELIMINAR_USUARIO(IDI IN TB_USUARIOS.TBU_ID%TYPE);

        FUNCTION PR_ROLES RETURN VARCHAR2;
	
	FUNCTION NAVBAR(ROL IN INTEGER,SESION IN INTEGER) RETURN VARCHAR2;

    END;
/
create or replace NONEDITIONABLE PACKAGE BODY PKG_USUARIO
    IS
        PROCEDURE PR_VALIDA(CONTRCA IN TB_LOGIN.TBL_PASSWORD%TYPE, USUARIO IN TB_LOGIN.TBU_ID%TYPE, valida OUT SYS_REFCURSOR)
        IS
        BEGIN
            OPEN valida FOR
            SELECT * FROM TB_USUARIOS U 
            INNER JOIN TB_LOGIN L ON  U.TBU_ID=L.TBU_ID
            WHERE L.TBU_ID=USUARIO AND L.TBL_PASSWORD=CONTRCA;
        END;

        PROCEDURE INSERTAR_USUARIO(TBU_ID IN TB_USUARIOS.TBU_ID%TYPE, 
                                             TBU_NOMBRE IN TB_USUARIOS.TBU_NOMBRE%TYPE, 
                                             TBU_APELLIDO1 IN TB_USUARIOS.TBU_APELLIDO1%TYPE,
                                             TBU_APELLIDO2 IN TB_USUARIOS.TBU_APELLIDO2%TYPE,
                                             TBU_DIRRECION IN TB_USUARIOS.TBU_DIRRECION%TYPE, 
                                             TBU_TELEFONO IN TB_USUARIOS.TBU_TELEFONO%TYPE,
                                             TBR_ID IN TB_USUARIOS.TBR_ID%TYPE,
                                             TBL_PASSWORD IN TB_LOGIN.TBL_PASSWORD%TYPE)
    IS
        BEGIN
            INSERT INTO TB_USUARIOS(TBU_ID, TBU_NOMBRE, TBU_APELLIDO1, TBU_APELLIDO2, TBU_DIRRECION,TBU_TELEFONO, TBR_ID)VALUES
            (TBU_ID,TBU_NOMBRE,TBU_APELLIDO1, TBU_APELLIDO2, TBU_DIRRECION,TBU_TELEFONO, TBR_ID);

            INSERT INTO TB_LOGIN(TBU_ID, TBL_PASSWORD)VALUES
            (TBU_ID,TBL_PASSWORD);

        END;

       PROCEDURE MODIFICAR_USUARIO(IDI IN TB_USUARIOS.TBU_ID%TYPE, 
                                             NOMBRE IN TB_USUARIOS.TBU_NOMBRE%TYPE, 
                                             APELLIDO1 IN TB_USUARIOS.TBU_APELLIDO1%TYPE,
                                             APELLIDO2 IN TB_USUARIOS.TBU_APELLIDO2%TYPE,
                                             DIRRECION IN TB_USUARIOS.TBU_DIRRECION%TYPE, 
                                             TELEFONO IN TB_USUARIOS.TBU_TELEFONO%TYPE)

    IS
        BEGIN
            UPDATE TB_USUARIOS SET TBU_NOMBRE= NOMBRE,
                                   TBU_APELLIDO1= APELLIDO1,
                                   TBU_APELLIDO2= APELLIDO2,
                                   TBU_DIRRECION= DIRRECION,
                                   TBU_TELEFONO= TELEFONO 
            WHERE TBU_ID=IDI;

        END;

      PROCEDURE ELIMINAR_USUARIO(IDI IN TB_USUARIOS.TBU_ID%TYPE)                                         

    IS
        BEGIN
            DELETE FROM TB_LOGIN WHERE TBU_ID=IDI;
            DELETE FROM TB_USUARIOS WHERE TBU_ID=IDI;
        END; 
	
 FUNCTION PR_ROLES RETURN VARCHAR2
 IS
    TEXTO VARCHAR2(200);
    CURSOR BOLSA IS SELECT * FROM TB_ROLES;
    BOLSA_ITEM BOLSA%ROWTYPE;
    BEGIN
        OPEN BOLSA;
        LOOP
            FETCH BOLSA INTO BOLSA_ITEM;
            EXIT WHEN BOLSA%NOTFOUND;
                TEXTO:=TEXTO||'<option value="'||BOLSA_ITEM.TBR_ID||'">'||BOLSA_ITEM.TBR_NOMBRE||'</option>';
            END LOOP;
        CLOSE BOLSA;
        RETURN TEXTO;
    END;
    
 FUNCTION NAVBAR(ROL IN INTEGER,SESION IN INTEGER) RETURN VARCHAR2
 IS
    HOME VARCHAR2(1000);
    ROLAD INTEGER;
    ROLCL INTEGER;
    BEGIN
        HOME:='  <li>
                <a href="./index.php#home">Inicio</a>
                </li>
                <li>
                <a href="./index.php#about">Acerca de nosotros</a>
                </li>
                <li>
                <a href="./index.php#menu">Menu</a>
                </li>
                <li>
                <a href="./index.php#ordenar">Ordenar express</a>
                </li>';
                
              SELECT TBR_ID INTO ROLAD FROM TB_ROLES WHERE TBR_NOMBRE='Administradores';
              SELECT TBR_ID INTO ROLCL FROM TB_ROLES WHERE TBR_NOMBRE='Clientes';
                 
              IF ROL=ROLAD THEN 
              HOME:=HOME||'<li><a href="usuarios.php">Administacion Usuarios</a></li>
                      <li><a href="producto.php">Administracion de Productos</a></li>
                      <li><a href=".php">Pedidos</a></li>';
              END IF;
              
              IF SESION=1 THEN
              HOME:=HOME||'<li><a onclick="preguntarSiNoCerrarSesion()">Cerrar Sesion</a></li>';
              ELSIF SESION !=1 THEN
              HOME:=HOME||'<li><a href="login.php">Iniciar Sesion</a></li>';
              END IF;
              
              RETURN HOME;
    END;
END;

CREATE OR REPLACE VIEW VW_USUARIOS ("TBU_ID", "TBU_NOMBRE", "TBU_APELLIDO1", "TBU_APELLIDO2", "TBU_DIRRECION", "TBU_TELEFONO", "TBR_NOMBRE") AS 
SELECT TBU_ID,TBU_NOMBRE,TBU_APELLIDO1,TBU_APELLIDO2,TBU_DIRRECION,TBU_TELEFONO, TBR_NOMBRE
						from TB_USUARIOS U  INNER JOIN TB_ROLES R ON U.TBR_ID=R.TBR_ID;

INSERT INTO TB_ROLES(TBR_NOMBRE)VALUES('Clientes');
INSERT INTO TB_ROLES(TBR_NOMBRE)VALUES('Administradores');







----------------------------------------------
--Package productos

create or replace NONEDITIONABLE PACKAGE PKG_PRODUCTO
    IS
      

        PROCEDURE INSERTAR_PRODUCTO(        
                                             TBP_NOMBRE IN TB_PRODUCTOS.TBP_NOMBRE%TYPE, 
                                             TBP_DESCRIPCION IN TB_PRODUCTOS.TBP_DESCRIPCION%TYPE,
                                             TBP_PRECIO IN TB_PRODUCTOS.TBP_PRECIO%TYPE,
                                             TBTP_ID IN TB_PRODUCTOS.TBTP_ID%TYPE);


       PROCEDURE MODIFICAR_PRODUCTO(IDI IN TB_PRODUCTOS.TBP_ID%TYPE, 
                                             NOMBRE IN TB_PRODUCTOS.TBP_NOMBRE%TYPE, 
                                             DESCRIPCION IN TB_PRODUCTOS.TBP_DESCRIPCION%TYPE,
                                             PRECIO IN TB_PRODUCTOS.TBP_PRECIO%TYPE);

        PROCEDURE ELIMINAR_PRODUCTO(IDI IN TB_PRODUCTOS.TBP_ID%TYPE);  

        FUNCTION TIPO_PRODUCTO RETURN VARCHAR2;



    END;
\

create or replace NONEDITIONABLE PACKAGE BODY PKG_PRODUCTO
    IS
       

        PROCEDURE INSERTAR_PRODUCTO(        
                                             TBP_NOMBRE IN TB_PRODUCTOS.TBP_NOMBRE%TYPE, 
                                             TBP_DESCRIPCION IN TB_PRODUCTOS.TBP_DESCRIPCION%TYPE,
                                             TBP_PRECIO IN TB_PRODUCTOS.TBP_PRECIO%TYPE,
                                             TBTP_ID IN TB_PRODUCTOS.TBTP_ID%TYPE)
                                       
    IS
        BEGIN
            INSERT INTO TB_PRODUCTOS( TBP_NOMBRE, TBP_DESCRIPCION, TBP_PRECIO, TBTP_ID)VALUES
            (TBP_NOMBRE,TBP_DESCRIPCION, TBP_PRECIO, TBTP_ID);



        END;

       PROCEDURE MODIFICAR_PRODUCTO(IDI IN TB_PRODUCTOS.TBP_ID%TYPE, 
                                             NOMBRE IN TB_PRODUCTOS.TBP_NOMBRE%TYPE, 
                                             DESCRIPCION IN TB_PRODUCTOS.TBP_DESCRIPCION%TYPE,
                                             PRECIO IN TB_PRODUCTOS.TBP_PRECIO%TYPE)



    IS
        BEGIN
            UPDATE TB_PRODUCTOS SET TBP_NOMBRE= NOMBRE,
                                   TBP_DESCRIPCION= DESCRIPCION,
                                   TBP_PRECIO= PRECIO


            WHERE TBP_ID=IDI;

        END;

      PROCEDURE ELIMINAR_PRODUCTO(IDI IN TB_PRODUCTOS.TBP_ID%TYPE)                                         

    IS
        BEGIN

            DELETE FROM TB_PRODUCTOS WHERE TBP_ID=IDI;
        END;  


 FUNCTION TIPO_PRODUCTO RETURN VARCHAR2
 IS
    TEXTO VARCHAR2(200);
    CURSOR BOLSA IS SELECT * FROM TB_TIPO_PRODUCTO;
    BOLSA_ITEM BOLSA%ROWTYPE;
    BEGIN
        OPEN BOLSA;
        LOOP
            FETCH BOLSA INTO BOLSA_ITEM;
            EXIT WHEN BOLSA%NOTFOUND;
                TEXTO:=TEXTO||'<option value="'||BOLSA_ITEM.TBTP_ID||'">'||BOLSA_ITEM.TBTP_NOMBRE||'</option>';
            END LOOP;
        CLOSE BOLSA;
        RETURN TEXTO;
    END; 


END;

INSERT INTO TB_TIPO_PRODUCTO (TBTP_NOMBRE) VALUES ('BEBIDAS');
INSERT INTO TB_TIPO_PRODUCTO (TBTP_NOMBRE) VALUES ('PIZZA');

  CREATE OR REPLACE FORCE NONEDITIONABLE VIEW "ADMPIZZA"."VW_PRODUCTOS" ("TBP_ID", "TBP_NOMBRE", "TBP_DESCRIPCION", "TBP_PRECIO", "TBTP_NOMBRE") AS 
  SELECT TBP_ID, TBP_NOMBRE, TBP_DESCRIPCION, TBP_PRECIO, TBTP_NOMBRE 
FROM TB_PRODUCTOS P 
INNER JOIN  TB_TIPO_PRODUCTO T ON  P.TBTP_ID = T.TBTP_ID;

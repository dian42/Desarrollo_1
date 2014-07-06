INSERT INTO TIPO_CONJUNTO VALUES('D','Edificio de departamentos');
INSERT INTO TIPO_CONJUNTO VALUES('C','Condominio');
INSERT INTO TIPO_COPROPIETARIO VALUES('A','Arrendatario');
INSERT INTO TIPO_COPROPIETARIO VALUES('P','Propietario');
INSERT INTO TIPO_GASTO VALUES('C','Consumo');
INSERT INTO TIPO_GASTO VALUES('A','Administración');
INSERT INTO TIPO_ADICIONAL VALUES('C','Calefacción');
INSERT INTO TIPO_ADICIONAL VALUES('R','Reserva');
INSERT INTO ESTADO_COPROPIETARIO VALUES('A','Activo');
INSERT INTO ESTADO_COPROPIETARIO VALUES('I','Inactivo');
INSERT INTO ESTADO_DEUDA VALUES('P','Pagado');
INSERT INTO ESTADO_DEUDA VALUES('N','No Pagado');
INSERT INTO ESTADO_RESERVA VALUES('A','Aceptada');
INSERT INTO ESTADO_RESERVA VALUES('R','Rechazado');
INSERT INTO REGION VALUES(DEFAULT,'Magallanes');
INSERT INTO REGION VALUES(DEFAULT,'Metropolitana');
INSERT INTO COMUNA VALUES(DEFAULT,'San Pedro',1);
INSERT INTO COMUNA VALUES(DEFAULT,'La Reina',2);
INSERT INTO ADMINISTRADOR VALUES(17795858,'Pedro Pablo','Perez','Pereira','xxxxx',45547738,'PPPP@mail.cl');
INSERT INTO ADMINISTRADOR VALUES(9287546,'Luis','Montiel','Plaza','xxxxxxx',77454504,'Admin435@mail.cl');
INSERT INTO CONJUNTO VALUES(DEFAULT,'Los Alamos',25355674,245666345,'Los Cobres 1623','D',17795858,1);
INSERT INTO CONJUNTO VALUES(DEFAULT,'El Trauco',27777734,3255564457,'Los juncos 851','C',9287546,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'c023',89,0.25,1);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'a065',80,0.02,2);
INSERT INTO COPROPIETARIO VALUES(6753575,'Susana Rocio','González','Lopéz',77547738,'El manzano 512','sgonzalez@mail.cl','xxxxx','P',1);
INSERT INTO COPROPIETARIO VALUES(8754644,'Claudio Andrés','Sepúlveda','Vivanco',77489504,'ClaudioS@mail.cl','Jardin Alto','xxxxxxx','A',2);
-----------
INSERT INTO ESPACIO VALUES(DEFAULT,'Quincho','Espacio común, preferentemente para la realización de asados',1);
INSERT INTO ESPACIO VALUES(DEFAULT,'sala audiovisual','Para ver películas o hacer presentaciones',2);
INSERT INTO RESERVA VALUES(DEFAULT,'10/06/2015','cumpleañós',2,2,'A');
INSERT INTO RESERVA VALUES(DEFAULT,'03/04/2006','opera',1,1,'R');
INSERT INTO GASTO VALUES(DEFAULT,'Pago de sueldos a conserjes al día','26/02/2022',5187390,1,'C');
INSERT INTO GASTO VALUES(DEFAULT,'Pago del agua al d ́ıa','23/08/2015',7098241,2,'A');
INSERT INTO ADICIONAL VALUES(DEFAULT,'20 m3' ,4000 ,'26/02/2022',2,'C');
INSERT INTO ADICIONAL VALUES(DEFAULT,'Sala de eventos',3000,'23/08/2015',1,'R');
INSERT INTO DEUDA VALUES(DEFAULT,'26/02/2022',144965,'05/03/2022',null,1,'N');
INSERT INTO DEUDA VALUES(DEFAULT,'23/08/2015',1300848,'05/09/2015','04/09/2015',2,'P');
INSERT INTO IMAGEN VALUES(DEFAULT,'/var/www/proyecto/02443.png','Boleta agua','Cancelada al dia',2);
INSERT INTO IMAGEN VALUES(DEFAULT,'/var/www/proyecto/0241.png','Boleta electricidad','Cancelada al dia',1);
INSERT INTO COP_PRO VALUES(6753575,2,'28/07/1983','A');
INSERT INTO COP_PRO VALUES(8754644,1,'11/09/1973','I');
INSERT INTO GAS_DEU VALUES(2,2);
INSERT INTO GAS_DEU VALUES(1,1);
INSERT INTO ADI_DEU VALUES(1,1);
INSERT INTO ADI_DEU VALUES(2,2);
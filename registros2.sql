INSERT INTO TIPO_CONJUNTO VALUES('D','Edificio de departamentos');
INSERT INTO TIPO_CONJUNTO VALUES('C','Condominio');
INSERT INTO TIPO_COPROPIETARIO VALUES('A','Arrendatario');
INSERT INTO TIPO_COPROPIETARIO VALUES('P','Propietario');
INSERT INTO TIPO_GASTO VALUES('C','Consumo');
INSERT INTO TIPO_GASTO VALUES('A','Administración');
INSERT INTO TIPO_GASTO VALUES('P','Piscina');
INSERT INTO TIPO_GASTO VALUES('J','Mantenimiento');
INSERT INTO TIPO_ADICIONAL VALUES('C','Calefacción');
INSERT INTO TIPO_ADICIONAL VALUES('A','Agua Caliente');
INSERT INTO TIPO_ADICIONAL VALUES('R','Reserva');
INSERT INTO TIPO_ADICIONAL VALUES('E','Estacionamiento');
----
INSERT INTO ESTADO_COPROPIETARIO VALUES('A','Activo');
INSERT INTO ESTADO_COPROPIETARIO VALUES('I','Inactivo');
INSERT INTO ESTADO_DEUDA VALUES('P','Pagado');
INSERT INTO ESTADO_DEUDA VALUES('N','No Pagado');
INSERT INTO ESTADO_RESERVA VALUES('A','Aceptada');
INSERT INTO ESTADO_RESERVA VALUES('R','Desechado');
----
INSERT INTO ADMINISTRADOR VALUES(17795858,'Pedro','Perez','Pereira','gato123',45547738,'PPPP@mail.cl');
INSERT INTO ADMINISTRADOR VALUES(9287546,'Luis','Montiel','Plaza','newwaves',77454504,'Admin435@mail.cl');
INSERT INTO CONJUNTO VALUES(DEFAULT,'Los Alamos',25355674,24566,'Gran Avenida 1623','C',17795858,1);
INSERT INTO CONJUNTO VALUES(DEFAULT,'El Trauco',23136523,3254457,'Camino de hojas 1453','D',9287546,1);
INSERT INTO CONJUNTO VALUES(DEFAULT,'Pantenon',22222222,45709808,'Los Cardenales 342','D',9287546,2);
INSERT INTO CONJUNTO VALUES(DEFAULT,'Las Araucarias',27777777,34234457,'El avanico 2255','D',9287546,2);
INSERT INTO CONJUNTO VALUES(DEFAULT,'Los Cipreces',23434334,9999999,'Arreta Cañas 5854','D',9287546,1);
INSERT INTO CONJUNTO VALUES(DEFAULT,'El Alerce',21331331,10000000,'Los Olmos 3450','D',9287546,2);
INSERT INTO CONJUNTO VALUES(DEFAULT,'El Boldo',29125677,123,'Marcela Paz 3450','D',9287546,2);
INSERT INTO CONJUNTO VALUES(DEFAULT,'Señor Litre',24576743,0,'Vicuña Makenna 666','D',9287546,2);
INSERT INTO CONJUNTO VALUES(DEFAULT,'Los Manzanos',27274220,454546,'Las Sophoras 9999','D',9287546,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'c023',890,0.40,1);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'a065',8000,0.40,1);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'e065',89,0.25,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'r065',123,0.30,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'f063',321,0.20,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'d025',66,0.25,2);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'65',666,0.25,3);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'88',133,0.25,3);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'f123',5909,0.20,3);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'f33',1232,0.15,3);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'654',3332,0.15,3);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'33',444,0.02,4);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'344',3323,0.30,4);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'g44',1234,0.22,5);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'244',4332,0.12,5);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'22',933,0.42,5);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'wee',3344,0.18,6);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'ee',8987,0.12,6);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'232',7880,0.12,6);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'344',9860,0.43,6);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'g44',8860,0.23,7);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'23',880,0.33,7);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'g34',8075,0.55,8);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'t55',8890,0.10,8);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'g33',8870,0.14,8);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'f33',890,0.09,8);
INSERT INTO PROPIEDAD VALUES(DEFAULT,'334',454,0.12,8);

INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345671,'Virginia','Rice','Nielsen',4664416,'Ap #793-1517 Non Av.','tristique@Nulltae.org',1,'A',11);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345672,'Anastasia','Serrano','Hayes',2400649,'Ap #734-7468 Ornare Ave','Curabitur.ut.odio@Donec.edu',2,'A',237);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345673,'Igor','Nelson','Quinn',1635987,'277-7370 Semper Rd.','ipsum@enim.org',3,'A',48);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345674,'Medge','Bolton','Hunter',4736842,'156-1178 Eu Street','malesuada@Innecorci.com',4,'A',244);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345675,'Stacy','Rocha','Giles',1503618,'951-2285 Sagittis St.','consectetuer.cursus.et@indolor.org',5,'A',172);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345676,'Illana','Frye','Chang',7764963,'7554 Amet, Av.','Cras@tortornibhsit.co.uk',6,'A',253);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345677,'Oren','Barber','Chapman',6123116,'P.O. Box 103, 3542 Tortor St.','Integer.vitae.nibh@faucibuslectusa.ca',7,'A',34);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345678,'Portia','Conrad','Compton',5841522,'524-4735 Pede, Rd.','convallis.ligula@facilisis.net',8,'A',248);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345679,'Aspen','Dickerson','Patrick',8425779,'8407 Proin St.','arcu.Sed.eu@loremut.org',9,'A',282);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345670,'Jocelyn','Cote','Carroll',3557256,'Ap #319-1811 Ac, St.','penatibus.et@malesuada.edu',10,'A',22);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345681,'Austin','Ferguson','Pratt',1371192,'P.O. Box 257, 4894 Ut Av.','mattis.ornare.lectus@orci.org',11,'A',275);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345682,'Emmanuel','Whitfield','Mason',5089737,'873 Lectus. Rd.','Aenean.eget.magna@etliberoProin.com',12,'A',112);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345683,'Ciara','Santana','Hill',1917770,'Ap #204-1579 Dolor St.','sed.sapien@viverraMaecenas.com',13,'A',33);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345684,'Brock','Brown','Sanford',3439829,'1175 Ullamcorper St.','Phasellus.dolor@senectusetnetus.edu',14,'A',98);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345685,'Zahir','Hayden','Warren',6137135,'P.O. Box 891, 689 Libero Rd.','Aliquam@enimCurabiturmassa.org',15,'A',170);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345686,'Keelie','Sanchez','Simpson',5412438,'3611 Natoque St.','eros.non.enim@mattis.com',16,'A',324);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345687,'Colette','Jordan','Johnston',7434264,'840 Tellus. Ave','Maecenas.malesuada@velitduisemper.edu',17,'A',86);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345688,'Autumn','Burnett','Dickerson',8016699,'Ap #744-1636 Nulla St.','semper.erat@antelectus.edu',18,'P',53);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345689,'Jescie','Velazquez','Alvarado',2823439,'4890 Turpis. Rd.','Aliquam@suscipitest.ca',19,'P',134);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345680,'Amanda','Humphrey','Yates',7594701,'Ap #201-5523 Curae; Ave','et.ultrices.posuere@consectetuer.co.uk',20,'P',320);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345691,'Rhea','Meadows','Meyer',2821943,'Ap #884-7862 Arcu. Street','molestie@vulputateullamcorper.co.uk',21,'P',337);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345692,'Derek','Harmon','Gross',7557239,'Ap #693-5382 Euismod Av.','neque.sed@a.com',22,'P',309);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345693,'Bruno','Weiss','Dodson',3132816,'566-5957 Rutrum Rd.','tellus.lorem@urnaNullam.org',23,'P',18);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345694,'Carl','Patton','Avila',3166700,'9204 Sed, St.','tellus.sem@eueuismodac.com',24,'P',193);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345695,'Noel','Peters','Norris',5027019,'P.O. Box 696, 2134 Nonummy Road','blandit.Nam@Aeneansed.co.uk',25,'P',2);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345696,'Dominic','Palmer','Scott',4213605,'P.O. Box 856, 602 Elit, St.','enim@VivamusnisiMauris.net',26,'P',44);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345697,'Chava','Russo','Ashley',7997965,'248-9509 Sollicitudin Rd.','eget.magna.Suspendisse@Nullaeu.com',27,'P',82);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345698,'Madeline','Whitfield','Browning',4449858,'Ap #953-6608 Elit, Av.','Suspendisse.sagittis.Nullam@ac.org',28,'P',12);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345699,'Emma','Yang','Bolton',9291080,'P.O. Box 492, 2931 A Avenue','tincidunt@ut.edu',29,'P',188);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345612,'Eleanor','Logan','Phelps',2973734,'6105 Nam Rd.','feugiat@aliquet.com',30,'P',232);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345613,'Bertha','Hodge','Hanson',4182734,'8307 Odio Rd.','mauris.id@orci.edu',31,'P',242);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345614,'Madeline','Wood','Snyder',3661397,'5731 Auctor St.','iaculis.aliquet.diam@ipsumac.edu',32,'P',333);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345624,'Kirk','Sandoval','Webb',9449027,'Ap #317-3517 Cras Avenue','risus.Morbi.metus@commodoat.co.uk',33,'P',343);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345635,'Claudia','Osborne','Harper',3750778,'6844 Nunc Street','risus@egestas.net',34,'P',132);
INSERT INTO COPROPIETARIO (cop_run,cop_nombres,cop_ap_paterno,cop_ap_materno,cop_fono,cop_direccion,cop_mail,cop_clave,cop_tcop_id,cop_com_id) VALUES (12345645,'Noah','Harris','Stanley',5705473,'5687 Vestibulum Street','Fusce.mollis@adipiscing.net',35,'P',61);


--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (1,'09/30/2013','11/04/2014','25/04/2015',22,'P');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (2,'09/21/2013','16/07/2013','28/03/2015',14,'P');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (3,'03/30/2014','13/09/2013','27/09/2013',22,'P');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (4,'06/06/2014','30/11/2013','17/09/2013',25,'P');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (5,'09/23/2014','11/12/2014','13/12/2014',2,'N');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (6,'01/24/2014','04/03/2014','03/12/2014',20,'N');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (7,'01/14/2014','11/10/2013','19/05/2015',28,'N');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (8,'06/22/2015','30/10/2014','18/12/2014',2,'N');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (9,'04/27/2014','16/12/2013','22/10/2014',9,'N');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (10,'10/03/2014','15/06/2014','05/03/2014',13,1'R');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (11,'04/09/2015','09/10/2013','17/05/2015',11,1'R');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (12,'03/11/2014','31/12/2014','23/01/2015',1,1'R');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (13,'08/18/2013','23/04/2015','16/06/2015',18,1'A');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (14,'12/16/2013','03/09/2013','17/02/2015',16,1'A');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (15,'05/17/2015','19/01/2014','12/03/2015',11,1'A');--
--INSERT INTO DEUDA (deu_id,deu_fecha,deu_fecha_limite,deu_fecha_cancel,deu_pro_id,deu_ede_id) VALUES (16,'10/11/2013','31/05/2014','03/05/2014',13,1'A');--
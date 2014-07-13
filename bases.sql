-- CREATE TABLE epictable (   mytable_key    serial primary key,   moobars        VARCHAR(40) not null, foobars        DATE );
-- insert into epictable(moobars,foobars) values('delicious moobars','2012-05-01')
-- insert into epictable(moobars,foobars) values('worldwide interblag','2012-05-02')

CREATE TABLE TIPO_ADICIONAL(
	tad_id varchar(1) primary key,
	tad_nombre varchar(15) not null
);

CREATE TABLE TIPO_GASTO(
	tga_id varchar(1) primary key,
	tga_nombre varchar(15) not null
);

CREATE TABLE TIPO_CONJUNTO(
	tcon_id varchar(1) primary key,
	tcon_descripcion varchar(50) not null
);

CREATE TABLE TIPO_COPROPIETARIO(
	tcop_id varchar(1) primary key,
	tcop_nombre varchar(20) not null -- largo no apto
);

CREATE TABLE ESTADO_COPROPIETARIO(
	eco_id varchar(1) primary key,
	eco_descripcion varchar(15) not null
);

CREATE TABLE ESTADO_RESERVA(
	ere_id varchar(1) primary key,
	ere_descripcion varchar(10) not null
);

CREATE TABLE ESTADO_DEUDA(
	ede_id varchar(1) primary key,
	ede_descripcion varchar(10) not null
);

CREATE SEQUENCE REGION_reg_id_seq;
CREATE TABLE REGION (
    reg_id numeric(2) primary key DEFAULT nextval('REGION_reg_id_seq'),
 	reg_nombre varchar(20) not null
);
ALTER SEQUENCE REGION_reg_id_seq OWNED BY REGION.reg_id;

CREATE SEQUENCE COMUNA_com_id_seq;
CREATE TABLE COMUNA (
    com_id numeric(3) primary key DEFAULT nextval('COMUNA_com_id_seq'),
 	com_nombre varchar(20) not null,
 	com_reg_id numeric(2) references REGION(reg_id)
);
ALTER SEQUENCE COMUNA_com_id_seq OWNED BY COMUNA.com_id;

CREATE TABLE ADMINISTRADOR (
    adm_run numeric(8) primary key,
 	adm_name varchar(50) not null,
 	adm_ap_pat varchar(30) not null,
 	adm_ap_mat varchar(30) not null,
 	adm_password varchar(15) not null,
 	adm_fono numeric(8) not null,
 	adm_mail varchar(50) not null
);

CREATE SEQUENCE CONJUNTO_con_id_seq;
CREATE TABLE CONJUNTO (
    con_id numeric(5) primary key DEFAULT nextval('CONJUNTO_con_id_seq'),
 	con_nombre varchar(50) not null,
 	con_fono numeric(8) not null,
 	con_fondo numeric(10) not null,
 	con_direccion varchar(50) not null,
 	con_tcon_id varchar(1) references TIPO_CONJUNTO(tcon_id),
 	con_adm_run numeric(8) references ADMINISTRADOR(adm_run),
 	con_com_id numeric(3) references COMUNA(com_id)
);
ALTER SEQUENCE CONJUNTO_con_id_seq OWNED BY CONJUNTO.con_id;

CREATE TABLE COPROPIETARIO (
    cop_run numeric(8) primary key,
 	cop_nombres varchar(50) not null,
 	cop_ap_paterno varchar(30) not null,
 	cop_ap_materno varchar(30) not null,
 	cop_fono numeric(8) not null,
 	cop_direccion varchar(50) not null,
 	cop_mail varchar(50) null,
 	cop_clave varchar(10) not null,
 	cop_tcop_id varchar(1) references TIPO_COPROPIETARIO(tcop_id),
 	cop_com_id numeric(3) references COMUNA(com_id)
);

CREATE SEQUENCE PROPIEDAD_pro_id_seq;
CREATE TABLE PROPIEDAD (
    pro_id numeric(5) primary key DEFAULT nextval('PROPIEDAD_pro_id_seq'),
 	pro_numero varchar(8) not null,
 	pro_m2 numeric(4) not null,
 	pro_alicuota numeric(6,3) not null,
 	pro_con_id numeric(5) references CONJUNTO(con_id)
);
ALTER SEQUENCE PROPIEDAD_pro_id_seq OWNED BY PROPIEDAD.pro_id;

CREATE TABLE COP_PRO (
 	cpr_cop_id numeric(8) references COPROPIETARIO(cop_run),
 	cpr_pro_id numeric(5) references PROPIEDAD(pro_id),
 	cpr_fecha date not null,
 	cpr_eco_id varchar(1) references ESTADO_COPROPIETARIO(eco_id),
 	primary key(cpr_cop_id,cpr_pro_id)
);

CREATE SEQUENCE ESPACIO_esp_id_seq;
CREATE TABLE ESPACIO (
    esp_id numeric(5) primary key DEFAULT nextval('ESPACIO_esp_id_seq'),
 	esp_lugar varchar(20) not null,
 	esp_descripcion varchar(100) not null,
 	esp_con_id numeric(5) references CONJUNTO(con_id)
);
ALTER SEQUENCE ESPACIO_esp_id_seq OWNED BY ESPACIO.esp_id;

CREATE SEQUENCE RESERVA_res_id_seq;
CREATE TABLE RESERVA (
    res_id numeric(5) primary key DEFAULT nextval('RESERVA_res_id_seq'),
 	res_fecha date not null,
 	res_actividad varchar(100) not null,
 	res_pro_id numeric(5) references PROPIEDAD(pro_id),
 	res_esp_id numeric(5) references ESPACIO(esp_id),
 	res_ere_id varchar(1) references ESTADO_RESERVA(ere_id)
);
ALTER SEQUENCE RESERVA_res_id_seq OWNED BY RESERVA.res_id;

CREATE SEQUENCE GASTO_gas_id_seq;
CREATE TABLE GASTO (
    gas_id numeric(5) primary key DEFAULT nextval('GASTO_gas_id_seq'),
 	gas_descripcion varchar(100) not null,
 	gas_fecha date not null,
 	gas_costo numeric(7) not null,
 	gas_con_id numeric(5) references CONJUNTO(con_id),
 	gas_tga_id varchar(1) references TIPO_GASTO(tga_id)
);
ALTER SEQUENCE GASTO_gas_id_seq OWNED BY GASTO.gas_id;

CREATE SEQUENCE ADICIONAL_adi_id_seq;
CREATE TABLE ADICIONAL (
    adi_id numeric(5) primary key DEFAULT nextval('ADICIONAL_adi_id_seq'),
 	adi_descripcion varchar(100) not null,
 	adi_costo numeric(7) not null,
 	adi_fecha date not null,
 	adi_pro_id numeric(5) references PROPIEDAD(pro_id),
 	adi_tad_id varchar(1) references TIPO_ADICIONAL(tad_id)
);
ALTER SEQUENCE ADICIONAL_adi_id_seq OWNED BY ADICIONAL.adi_id;

CREATE SEQUENCE DEUDA_deu_id_seq;
CREATE TABLE DEUDA (
    deu_id numeric(8) primary key DEFAULT nextval('DEUDA_deu_id_seq'),
 	deu_fecha date not null,
 	deu_monto numeric(12) not null,
 	deu_fecha_limite date not null,
 	deu_fecha_cancel date null,
 	deu_pro_id numeric(5) references PROPIEDAD(pro_id),
 	deu_ede_id varchar(1) references ESTADO_DEUDA(ede_id)
);
ALTER SEQUENCE DEUDA_deu_id_seq OWNED BY DEUDA.deu_id;

CREATE TABLE GAS_DEU (
 	gde_gas_id numeric(5) references GASTO(gas_id),
 	gde_deu_id numeric(8) references DEUDA(deu_id),
 	primary key(gde_gas_id,gde_deu_id)
);

CREATE TABLE ADI_DEU (
 	ade_adi_id numeric(5) references ADICIONAL(adi_id),
 	ade_deu_id numeric(8) references DEUDA(deu_id),
 	primary key(ade_adi_id,ade_deu_id)
);

CREATE SEQUENCE IMAGEN_ima_id_seq;
CREATE TABLE IMAGEN (
    ima_id numeric(5) primary key DEFAULT nextval('IMAGEN_ima_id_seq'),
 	ima_path varchar(50) not null,
 	ima_nombre varchar(30) not null,
 	ima_descripcion varchar(100) not null,
 	ima_gas_id numeric(5) references GASTO(gas_id)
);
ALTER SEQUENCE IMAGEN_ima_id_seq OWNED BY IMAGEN.ima_id;
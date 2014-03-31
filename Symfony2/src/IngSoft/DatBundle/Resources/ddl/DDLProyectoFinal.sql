CREATE SCHEMA ingsoft_database_schema;

CREATE TABLE ingsoft_database_schema.administradores ( 
	correo_electronico   varchar(60)  NOT NULL  ,
	contrasenia          varchar(30)  NOT NULL  ,
	codigo               varchar(20)  NOT NULL  ,
	CONSTRAINT pk_administradores PRIMARY KEY ( codigo ),
	CONSTRAINT pk_administradores_0 UNIQUE ( correo_electronico ) 
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.calificaciones ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(30)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	puntaje_adquicision  numeric(3,2)  NOT NULL  ,
	CONSTRAINT pk_calificaciones PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.departamentos ( 
	codigo               varchar(10)  NOT NULL  ,
	nombre               varchar(30)  NOT NULL  ,
	CONSTRAINT pk_departamentos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.etiquetas ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre_etiqueta      varchar(50)    ,
	CONSTRAINT pk_etiquetas PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.municipios ( 
	codigo               varchar(10)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	codigo_postal        varchar(8)  NOT NULL  ,
	codigo_departamento  varchar(10)  NOT NULL  ,
	CONSTRAINT pk_municipios PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_municipios ON ingsoft_database_schema.municipios ( codigo_departamento );

CREATE TABLE ingsoft_database_schema.promociones ( 
	codigo               varchar(20)  NOT NULL  ,
	fecha_comienzo       datetime  NOT NULL  ,
	fecha_fin            datetime  NOT NULL  ,
	porcentaje_descuento numeric(2,2)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	CONSTRAINT pk_promociones PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.tipos_conocimientos ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	CONSTRAINT pk_tipos_conocimientos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.tipos_usuario ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(30)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	CONSTRAINT pk_tipos_usuario PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.barrios ( 
	codigo               varchar(20)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	numero_localidad     int  NOT NULL  ,
	codigo_municipio     varchar(10)  NOT NULL  ,
	CONSTRAINT pk_barrios PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_barrios ON ingsoft_database_schema.barrios ( codigo_municipio );

CREATE TABLE ingsoft_database_schema.conocimientos ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre_titulo        varchar(60)    ,
	fecha_obtencion      date  NOT NULL  ,
	codigo_tipo          int  NOT NULL  ,
	CONSTRAINT pk_conocimientos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_conocimientos ON ingsoft_database_schema.conocimientos ( codigo_tipo );

CREATE TABLE ingsoft_database_schema.etiquetas_conocimiento ( 
	codigo_etiqueta      int  NOT NULL  ,
	codigo_conocimiento  int  NOT NULL  ,
	CONSTRAINT idx_etiquetas_conocimiento PRIMARY KEY ( codigo_etiqueta, codigo_conocimiento )
 ) engine=InnoDB;

CREATE INDEX idx_etiquetas_conocimiento_0 ON ingsoft_database_schema.etiquetas_conocimiento ( codigo_conocimiento );

CREATE INDEX idx_etiquetas_conocimiento_1 ON ingsoft_database_schema.etiquetas_conocimiento ( codigo_etiqueta );

CREATE TABLE ingsoft_database_schema.institutos ( 
	codigo               varchar(20)  NOT NULL  ,
	direccion            varchar(90)  NOT NULL  ,
	codigo_barrio        varchar(20)  NOT NULL  ,
	CONSTRAINT pk_institutos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_institutos ON ingsoft_database_schema.institutos ( codigo_barrio );

CREATE TABLE ingsoft_database_schema.usuarios ( 
	cedula               varchar(20)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	correo               varchar(60)  NOT NULL  ,
	direccion            varchar(90)  NOT NULL  ,
	telefono_domicilio   varchar(20)  NOT NULL  ,
	telefono_celular     varchar(20)  NOT NULL  ,
	correo_electronico   varchar(60)  NOT NULL  ,
	fecha_inscripcion    datetime  NOT NULL  ,
	perfil_activo        bool  NOT NULL  ,
	codigo_tipo          int  NOT NULL  ,
	contrasenia          varchar(30)  NOT NULL  ,
	codigo_perfil        int  NOT NULL  ,
	eliminado            bool  NOT NULL  ,
	codigo_barrio        varchar(20)  NOT NULL  ,
	CONSTRAINT pk_usuarios PRIMARY KEY ( cedula ),
	CONSTRAINT idx_usuarios_correo UNIQUE ( correo_electronico ) ,
	CONSTRAINT idx_usuarios_0 UNIQUE ( codigo_perfil ) 
 ) engine=InnoDB;

CREATE INDEX idx_usuarios_1 ON ingsoft_database_schema.usuarios ( codigo_barrio );

CREATE INDEX idx_usuarios_2 ON ingsoft_database_schema.usuarios ( codigo_tipo );

CREATE TABLE ingsoft_database_schema.usuarios_conocimientos ( 
	codigo_usuario       varchar(20)  NOT NULL  ,
	codigo_conocimiento  int  NOT NULL  ,
	codigo               int  NOT NULL  AUTO_INCREMENT,
	instituto_certificado varchar(20)  NOT NULL  ,
	CONSTRAINT pk_usuarios_conocimientos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_usuarios_conocimientos ON ingsoft_database_schema.usuarios_conocimientos ( codigo_usuario );

CREATE INDEX idx_usuarios_conocimientos_0 ON ingsoft_database_schema.usuarios_conocimientos ( codigo_conocimiento );

CREATE INDEX idx_usuarios_conocimientos_1 ON ingsoft_database_schema.usuarios_conocimientos ( instituto_certificado );

CREATE TABLE ingsoft_database_schema.calificaciones_prestadores ( 
	codigo_prestador     varchar(20)  NOT NULL  ,
	codigo_calificacion  int  NOT NULL  ,
	codigo               int  NOT NULL  AUTO_INCREMENT,
	actual               bool  NOT NULL  ,
	CONSTRAINT pk_califaciones_usuario PRIMARY KEY ( codigo ),
	CONSTRAINT idx_califaciones_usuario_0 UNIQUE ( codigo_prestador ) 
 ) engine=InnoDB;

CREATE INDEX idx_califaciones_usuario ON ingsoft_database_schema.calificaciones_prestadores ( codigo_calificacion );

CREATE TABLE ingsoft_database_schema.certificados_cono ( 
	cod_usuario_cono     int  NOT NULL  ,
	url_host             text  NOT NULL  ,
	CONSTRAINT idx_certificados_cono PRIMARY KEY ( cod_usuario_cono )
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.empresas ( 
	nit                  varchar(30)  NOT NULL  ,
	correo               varchar(60)  NOT NULL  ,
	direccion            varchar(90)  NOT NULL  ,
	telefono             varchar(20)  NOT NULL  ,
	codigo_cliente_fiel  varchar(20)  NOT NULL  ,
	codigo_barrio        varchar(20)  NOT NULL  ,
	CONSTRAINT pk_empresas PRIMARY KEY ( nit ),
	CONSTRAINT idx_empresas UNIQUE ( codigo_cliente_fiel ) 
 ) engine=InnoDB;

CREATE INDEX idx_empresas_0 ON ingsoft_database_schema.empresas ( codigo_barrio );

CREATE TABLE ingsoft_database_schema.imagenes_perfil ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	url_host             text  NOT NULL  ,
	codigo_usuario       varchar(20)  NOT NULL  ,
	CONSTRAINT pk_imagenes_perfil PRIMARY KEY ( codigo ),
	CONSTRAINT idx_imagenes_perfil UNIQUE ( codigo_usuario ) 
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.penalizaciones ( 
	codigo               varchar(20)  NOT NULL  ,
	motivo               varchar(60)  NOT NULL  ,
	fecha_inicio         datetime  NOT NULL  ,
	fecha_fin            datetime  NOT NULL  ,
	codigo_prestador     varchar(20)  NOT NULL  ,
	CONSTRAINT pk_penalizaciones PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_penalizaciones ON ingsoft_database_schema.penalizaciones ( codigo_prestador );

CREATE TABLE ingsoft_database_schema.actividades ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	calificacion         numeric(3,2)  NOT NULL  ,
	codigo_objetivo      int  NOT NULL  ,
	codigo_tutor         varchar(20)  NOT NULL  ,
	CONSTRAINT pk_actividades PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_actividades ON ingsoft_database_schema.actividades ( codigo_objetivo );

CREATE INDEX idx_actividades_0 ON ingsoft_database_schema.actividades ( codigo_tutor );

CREATE TABLE ingsoft_database_schema.aspectos ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(30)  NOT NULL  ,
	calificacion         numeric(3,2)  NOT NULL  ,
	porcentaje_influencia numeric(2,2)  NOT NULL  ,
	codigo_prueba        varchar(20)  NOT NULL  ,
	CONSTRAINT pk_aspectos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_aspectos ON ingsoft_database_schema.aspectos ( codigo_prueba );

CREATE TABLE ingsoft_database_schema.categorias ( 
	codigo               varchar(60)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	categoria_mayor      varchar(60)    ,
	eliminada            bool  NOT NULL  ,
	CONSTRAINT pk_categorias PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_categorias ON ingsoft_database_schema.categorias ( categoria_mayor );

CREATE TABLE ingsoft_database_schema.comentarios ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	comentario           text  NOT NULL  ,
	nombre_visitante     varchar(60)  NOT NULL  ,
	correo_visitante     varchar(70)  NOT NULL  ,
	fecha_publicacion    datetime  NOT NULL  ,
	comentario_noticia   int  NOT NULL  ,
	CONSTRAINT pk_comentarios PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_comentarios ON ingsoft_database_schema.comentarios ( comentario_noticia );

CREATE TABLE ingsoft_database_schema.contratos ( 
	codigo               varchar(30)  NOT NULL  ,
	url_pdf              text  NOT NULL  ,
	fecha_firmado        date  NOT NULL  ,
	codigo_proyecto      varchar(20)  NOT NULL  ,
	CONSTRAINT pk_contratos PRIMARY KEY ( codigo ),
	CONSTRAINT idx_contratos UNIQUE ( codigo_proyecto ) 
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.etiquetas_noticias ( 
	codigo_etiqueta      int  NOT NULL  ,
	codigo_noticia       int  NOT NULL  ,
	CONSTRAINT idx_etiquetas_noticias PRIMARY KEY ( codigo_etiqueta, codigo_noticia )
 ) engine=InnoDB;

CREATE INDEX idx_etiquetas_noticias_1 ON ingsoft_database_schema.etiquetas_noticias ( codigo_noticia );

CREATE TABLE ingsoft_database_schema.etiquetas_pruebas ( 
	codigo_prueba        varchar(30)  NOT NULL  ,
	codigo_etiqueta      int  NOT NULL  ,
	CONSTRAINT idx_etiquetas_pruebas PRIMARY KEY ( codigo_prueba, codigo_etiqueta )
 ) engine=InnoDB;

CREATE INDEX idx_etiquetas_pruebas_0 ON ingsoft_database_schema.etiquetas_pruebas ( codigo_etiqueta );

CREATE INDEX idx_etiquetas_pruebas_1 ON ingsoft_database_schema.etiquetas_pruebas ( codigo_prueba );

CREATE TABLE ingsoft_database_schema.etiquetas_solicitudes ( 
	codigo_solicitud     int  NOT NULL  ,
	codigo_etiqueta      int  NOT NULL  ,
	CONSTRAINT idx_etiquetas_solicitudes PRIMARY KEY ( codigo_solicitud, codigo_etiqueta )
 ) engine=InnoDB;

CREATE INDEX idx_etiquetas_solicitudes ON ingsoft_database_schema.etiquetas_solicitudes ( codigo_solicitud );

CREATE INDEX idx_etiquetas_solici_et ON ingsoft_database_schema.etiquetas_solicitudes ( codigo_etiqueta );

CREATE TABLE ingsoft_database_schema.foros ( 
	codigo               varchar(20)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	codigo_categoria     varchar(60)  NOT NULL  ,
	CONSTRAINT pk_foros PRIMARY KEY ( codigo ),
	CONSTRAINT idx_foros UNIQUE ( codigo_categoria ) 
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.listas_chequeo ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(30)  NOT NULL  ,
	url_host             text  NOT NULL  ,
	codigo_objetivo      int  NOT NULL  ,
	CONSTRAINT pk_listas_chequeo PRIMARY KEY ( codigo ),
	CONSTRAINT idx_listas_chequeo UNIQUE ( codigo_objetivo ) 
 ) engine=InnoDB;

CREATE TABLE ingsoft_database_schema.noticias ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	tituto               varchar(20)  NOT NULL  ,
	contenido            text  NOT NULL  ,
	fecha_publicacion    datetime  NOT NULL  ,
	categoria_noticia    varchar(60)  NOT NULL  ,
	CONSTRAINT pk_noticias PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_noticias ON ingsoft_database_schema.noticias ( categoria_noticia );

CREATE TABLE ingsoft_database_schema.noticias_compartidas ( 
	fecha_compartida     datetime  NOT NULL  ,
	codigo_noticia       int  NOT NULL  ,
	codigo_usuario       varchar(20)  NOT NULL  ,
	codigo               int  NOT NULL  AUTO_INCREMENT,
	CONSTRAINT pk_noticias_compartidas PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_noticias_compartidas ON ingsoft_database_schema.noticias_compartidas ( codigo_usuario );

CREATE INDEX idx_noticias_compartidas_0 ON ingsoft_database_schema.noticias_compartidas ( codigo_noticia );

CREATE TABLE ingsoft_database_schema.objetivos ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	calificacion         numeric(3,2)  NOT NULL  ,
	codigo_proyecto      varchar(20)  NOT NULL  ,
	porcentaje_influencia numeric(2,2)  NOT NULL  ,
	CONSTRAINT pk_objetivos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_objetivos ON ingsoft_database_schema.objetivos ( codigo_proyecto );

CREATE TABLE ingsoft_database_schema.pagos ( 
	codigo               int  NOT NULL  ,
	valor_total          numeric(10,4)    ,
	fecha_pago           date  NOT NULL  ,
	tipo_pago            bool  NOT NULL  ,
	codigo_contrato      varchar(30)  NOT NULL  ,
	codigo_usuario       varchar(20)  NOT NULL  ,
	CONSTRAINT pk_pagos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_pagos ON ingsoft_database_schema.pagos ( codigo_contrato );

CREATE INDEX idx_pagos_0 ON ingsoft_database_schema.pagos ( codigo_usuario );

CREATE TABLE ingsoft_database_schema.prestadores_actividades ( 
	codigo_prestador     varchar(20)  NOT NULL  ,
	codigo_actividad     int  NOT NULL  ,
	CONSTRAINT idx_prestadores_actividades PRIMARY KEY ( codigo_prestador, codigo_actividad )
 ) engine=InnoDB;

CREATE INDEX idx_prestadores_actividades ON ingsoft_database_schema.prestadores_actividades ( codigo_actividad );

CREATE INDEX idx_prestadores_actividades0 ON ingsoft_database_schema.prestadores_actividades ( codigo_prestador );

CREATE TABLE ingsoft_database_schema.prestadores_proyecto ( 
	codigo_proyecto      varchar(20)  NOT NULL  ,
	codigo_prestador     varchar(20)  NOT NULL  ,
	CONSTRAINT idx_prestadores_proyecto PRIMARY KEY ( codigo_proyecto, codigo_prestador )
 ) engine=InnoDB;

CREATE INDEX idx_prestadores_proyecto_0 ON ingsoft_database_schema.prestadores_proyecto ( codigo_proyecto );

CREATE INDEX idx_prestadores_proyecto_1 ON ingsoft_database_schema.prestadores_proyecto ( codigo_prestador );

CREATE TABLE ingsoft_database_schema.proyectos ( 
	codigo               varchar(30)  NOT NULL  ,
	nombre               varchar(60)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	fecha_comienzo       date  NOT NULL  ,
	fecha_limite         date  NOT NULL  ,
	valor_pagado         numeric(20,4)  NOT NULL  ,
	cantidad_trabajadores int  NOT NULL  ,
	calificacion_total   numeric(3,2)    ,
	codigo_categoria     varchar(60)  NOT NULL  ,
	codigo_empresa       varchar(30)  NOT NULL  ,
	codigo_moderador     varchar(20)  NOT NULL  ,
	codigo_tutor         varchar(20)  NOT NULL  ,
	codigo_promocion     varchar(20)    ,
	CONSTRAINT pk_proyectos PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_proyectos ON ingsoft_database_schema.proyectos ( codigo_categoria );

CREATE INDEX idx_proyectos_0 ON ingsoft_database_schema.proyectos ( codigo_empresa );

CREATE INDEX idx_proyectos_1 ON ingsoft_database_schema.proyectos ( codigo_moderador );

CREATE INDEX idx_proyectos_2 ON ingsoft_database_schema.proyectos ( codigo_tutor );

CREATE INDEX idx_proyectos_3 ON ingsoft_database_schema.proyectos ( codigo_promocion );

CREATE TABLE ingsoft_database_schema.pruebas_tecnicas ( 
	codigo               varchar(20)  NOT NULL  ,
	calificacion_total   numeric(3,2)  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	url_pdf              text  NOT NULL  ,
	numero_preguntas     decimal(3)  NOT NULL  ,
	dificultad_prueba    numeric(3,2)  NOT NULL  ,
	codigo_categoria     varchar(20)  NOT NULL  ,
	codigo_administrador varchar(20)  NOT NULL  ,
	CONSTRAINT pk_pruebas_tecnicas PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_pruebas_tecnicas ON ingsoft_database_schema.pruebas_tecnicas ( codigo_categoria );

CREATE INDEX idx_pruebas_tecnicas_0 ON ingsoft_database_schema.pruebas_tecnicas ( codigo_administrador );

CREATE TABLE ingsoft_database_schema.recursos_noticias ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	nombre_recurso       varchar(60)  NOT NULL  ,
	url_host_recurso     text  NOT NULL  ,
	codigo_noticia       int  NOT NULL  ,
	CONSTRAINT pk_recursos_multimedia PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_recursos_multimedia ON ingsoft_database_schema.recursos_noticias ( codigo_noticia );

CREATE TABLE ingsoft_database_schema.referencias ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	enlace_referencia    text  NOT NULL  ,
	noticias_codigo      int  NOT NULL  ,
	CONSTRAINT pk_referencias PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_referencias ON ingsoft_database_schema.referencias ( noticias_codigo );

CREATE TABLE ingsoft_database_schema.solicitudes ( 
	codigo               int  NOT NULL  AUTO_INCREMENT,
	numero_pres_solicitados int  NOT NULL  ,
	fecha_publicacion    datetime  NOT NULL  ,
	descripcion          text  NOT NULL  ,
	fecha_lim_respuesta  datetime  NOT NULL  ,
	codigo_foro          varchar(60)  NOT NULL  ,
	codigo_empresa       varchar(30)  NOT NULL  ,
	codigo_promocion     varchar(20)    ,
	CONSTRAINT pk_solicitudes PRIMARY KEY ( codigo )
 ) engine=InnoDB;

CREATE INDEX idx_solicitudes ON ingsoft_database_schema.solicitudes ( codigo_foro );

CREATE INDEX idx_solicitudes_0 ON ingsoft_database_schema.solicitudes ( codigo_empresa );

CREATE INDEX idx_solicitudes_1 ON ingsoft_database_schema.solicitudes ( codigo_promocion );

ALTER TABLE ingsoft_database_schema.actividades ADD CONSTRAINT fk_actividades_objetivos FOREIGN KEY ( codigo_objetivo ) REFERENCES ingsoft_database_schema.objetivos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.actividades ADD CONSTRAINT fk_actividades_usuarios FOREIGN KEY ( codigo_tutor ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.aspectos ADD CONSTRAINT fk_aspectos_pruebas_tecnicas FOREIGN KEY ( codigo_prueba ) REFERENCES ingsoft_database_schema.pruebas_tecnicas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.barrios ADD CONSTRAINT fk_barrios_municipios FOREIGN KEY ( codigo_municipio ) REFERENCES ingsoft_database_schema.municipios( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.calificaciones_prestadores ADD CONSTRAINT fk_califaciones_usuario FOREIGN KEY ( codigo_prestador ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.calificaciones_prestadores ADD CONSTRAINT fk_califaciones_usuarios_ca FOREIGN KEY ( codigo_calificacion ) REFERENCES ingsoft_database_schema.calificaciones( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.categorias ADD CONSTRAINT fk_categorias_categorias FOREIGN KEY ( categoria_mayor ) REFERENCES ingsoft_database_schema.categorias( codigo ) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.certificados_cono ADD CONSTRAINT fk_certificados_us_con FOREIGN KEY ( cod_usuario_cono ) REFERENCES ingsoft_database_schema.usuarios_conocimientos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.comentarios ADD CONSTRAINT fk_comentarios_noticias FOREIGN KEY ( comentario_noticia ) REFERENCES ingsoft_database_schema.noticias( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.conocimientos ADD CONSTRAINT fk_conocimientos FOREIGN KEY ( codigo_tipo ) REFERENCES ingsoft_database_schema.tipos_conocimientos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.contratos ADD CONSTRAINT fk_contratos_proyectos FOREIGN KEY ( codigo_proyecto ) REFERENCES ingsoft_database_schema.proyectos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.empresas ADD CONSTRAINT fk_empresas_usuarios FOREIGN KEY ( codigo_cliente_fiel ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.empresas ADD CONSTRAINT fk_empresas_barrios FOREIGN KEY ( codigo_barrio ) REFERENCES ingsoft_database_schema.barrios( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.etiquetas_conocimiento ADD CONSTRAINT fk_etiquetas_conocimiento FOREIGN KEY ( codigo_conocimiento ) REFERENCES ingsoft_database_schema.conocimientos( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_conocimiento ADD CONSTRAINT fk_etiquetas_cono FOREIGN KEY ( codigo_etiqueta ) REFERENCES ingsoft_database_schema.etiquetas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_noticias ADD CONSTRAINT fk_etiquetas_noticias_noticias FOREIGN KEY ( codigo_noticia ) REFERENCES ingsoft_database_schema.noticias( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_noticias ADD CONSTRAINT fk_etiquetas_noticias FOREIGN KEY ( codigo_etiqueta ) REFERENCES ingsoft_database_schema.etiquetas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_pruebas ADD CONSTRAINT fk_etiquetas_pruebas_etiquetas FOREIGN KEY ( codigo_etiqueta ) REFERENCES ingsoft_database_schema.etiquetas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_pruebas ADD CONSTRAINT fk_etiquetas_pruebas FOREIGN KEY ( codigo_prueba ) REFERENCES ingsoft_database_schema.pruebas_tecnicas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_solicitudes ADD CONSTRAINT fk_etiquetas_solicitudes FOREIGN KEY ( codigo_solicitud ) REFERENCES ingsoft_database_schema.solicitudes( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.etiquetas_solicitudes ADD CONSTRAINT fk_etiquetas_solicitudes_et FOREIGN KEY ( codigo_etiqueta ) REFERENCES ingsoft_database_schema.etiquetas( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.foros ADD CONSTRAINT fk_foros_categorias FOREIGN KEY ( codigo_categoria ) REFERENCES ingsoft_database_schema.categorias( codigo ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE ingsoft_database_schema.imagenes_perfil ADD CONSTRAINT fk_imagenes_perfil_usuarios FOREIGN KEY ( codigo_usuario ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.institutos ADD CONSTRAINT fk_institutos_barrios FOREIGN KEY ( codigo_barrio ) REFERENCES ingsoft_database_schema.barrios( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.listas_chequeo ADD CONSTRAINT fk_listas_chequeo_objetivos FOREIGN KEY ( codigo_objetivo ) REFERENCES ingsoft_database_schema.objetivos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.municipios ADD CONSTRAINT fk_municipios_departamentos FOREIGN KEY ( codigo_departamento ) REFERENCES ingsoft_database_schema.departamentos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.noticias ADD CONSTRAINT fk_noticias_categorias FOREIGN KEY ( categoria_noticia ) REFERENCES ingsoft_database_schema.categorias( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.noticias_compartidas ADD CONSTRAINT fk_noticias_compartidas FOREIGN KEY ( codigo_usuario ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.noticias_compartidas ADD CONSTRAINT fk_noticias_comp_no FOREIGN KEY ( codigo_noticia ) REFERENCES ingsoft_database_schema.noticias( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.objetivos ADD CONSTRAINT fk_objetivos_proyectos FOREIGN KEY ( codigo_proyecto ) REFERENCES ingsoft_database_schema.proyectos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.pagos ADD CONSTRAINT fk_pagos_contratos FOREIGN KEY ( codigo_contrato ) REFERENCES ingsoft_database_schema.contratos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.pagos ADD CONSTRAINT fk_pagos_usuarios FOREIGN KEY ( codigo_usuario ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.penalizaciones ADD CONSTRAINT fk_penalizaciones_usuarios FOREIGN KEY ( codigo_prestador ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.prestadores_actividades ADD CONSTRAINT fk_prestadores_actividades FOREIGN KEY ( codigo_actividad ) REFERENCES ingsoft_database_schema.actividades( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.prestadores_actividades ADD CONSTRAINT fk_prestadores_act FOREIGN KEY ( codigo_prestador ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.prestadores_proyecto ADD CONSTRAINT fk_prestadores_proyecto FOREIGN KEY ( codigo_proyecto ) REFERENCES ingsoft_database_schema.proyectos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.prestadores_proyecto ADD CONSTRAINT fk_prestadores_proyus FOREIGN KEY ( codigo_prestador ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.proyectos ADD CONSTRAINT fk_proyectos_categorias FOREIGN KEY ( codigo_categoria ) REFERENCES ingsoft_database_schema.categorias( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.proyectos ADD CONSTRAINT fk_proyectos_empresas FOREIGN KEY ( codigo_empresa ) REFERENCES ingsoft_database_schema.empresas( nit ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.proyectos ADD CONSTRAINT fk_proyectos_usuarios FOREIGN KEY ( codigo_moderador ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.proyectos ADD CONSTRAINT fk_proyectos_tutor FOREIGN KEY ( codigo_tutor ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.proyectos ADD CONSTRAINT fk_proyectos_promociones FOREIGN KEY ( codigo_promocion ) REFERENCES ingsoft_database_schema.promociones( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.pruebas_tecnicas ADD CONSTRAINT fk_pruebas_tecnicas_categorias FOREIGN KEY ( codigo_categoria ) REFERENCES ingsoft_database_schema.categorias( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.pruebas_tecnicas ADD CONSTRAINT fk_pruebas_tecnicas FOREIGN KEY ( codigo_administrador ) REFERENCES ingsoft_database_schema.administradores( correo_electronico ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.recursos_noticias ADD CONSTRAINT fk_recursos_multimedia FOREIGN KEY ( codigo_noticia ) REFERENCES ingsoft_database_schema.noticias( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.referencias ADD CONSTRAINT fk_referencias_noticias FOREIGN KEY ( noticias_codigo ) REFERENCES ingsoft_database_schema.noticias( codigo ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ingsoft_database_schema.solicitudes ADD CONSTRAINT fk_solicitudes_foros FOREIGN KEY ( codigo_foro ) REFERENCES ingsoft_database_schema.foros( codigo ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE ingsoft_database_schema.solicitudes ADD CONSTRAINT fk_solicitudes_empresas FOREIGN KEY ( codigo_empresa ) REFERENCES ingsoft_database_schema.empresas( nit ) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE ingsoft_database_schema.solicitudes ADD CONSTRAINT fk_solicitudes_promociones FOREIGN KEY ( codigo_promocion ) REFERENCES ingsoft_database_schema.promociones( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.usuarios ADD CONSTRAINT fk_usuarios_barrios FOREIGN KEY ( codigo_barrio ) REFERENCES ingsoft_database_schema.barrios( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.usuarios ADD CONSTRAINT fk_usuarios_tipos_usuario FOREIGN KEY ( codigo_tipo ) REFERENCES ingsoft_database_schema.tipos_usuario( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.usuarios_conocimientos ADD CONSTRAINT fk_usuarios_conocimientos FOREIGN KEY ( codigo_usuario ) REFERENCES ingsoft_database_schema.usuarios( cedula ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.usuarios_conocimientos ADD CONSTRAINT fk_usuarios_cono FOREIGN KEY ( codigo_conocimiento ) REFERENCES ingsoft_database_schema.conocimientos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ingsoft_database_schema.usuarios_conocimientos ADD CONSTRAINT fk_usuarios_cono_inst FOREIGN KEY ( instituto_certificado ) REFERENCES ingsoft_database_schema.institutos( codigo ) ON DELETE NO ACTION ON UPDATE NO ACTION;


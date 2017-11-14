CREATE TABLE curriculos (
  id int(11) NOT NULL,
  id_candidato int(11) NOT NULL,
  endereco varchar(200) NOT NULL,
  objetivo varchar(200) NOT NULL,
  formacao varchar(200) NOT NULL,
  habilidades varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE empresas (
  id int(11) NOT NULL,
  nome varchar(50) NOT NULL,
  cnpj varchar(14) NOT NULL,
  email varchar(50) NOT NULL,
  senha varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE usuarios (
  id int(11) NOT NULL,
  nome varchar(50) NOT NULL,
  cpf varchar(11) NOT NULL,
  senha varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE vagas (
  id int(11) NOT NULL,
  id_empresa int(11) NOT NULL,
  descricao varchar(200) NOT NULL,
  horario varchar(50) NOT NULL,
  salario double NOT NULL,
  beneficios varchar(500) NOT NULL,
  categoria varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE curriculos
  ADD PRIMARY KEY (id);

ALTER TABLE empresas
  ADD PRIMARY KEY (id);

ALTER TABLE usuarios
  ADD PRIMARY KEY (id);

ALTER TABLE vagas
  ADD PRIMARY KEY (id);

ALTER TABLE curriculos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE empresas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE usuarios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE vagas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
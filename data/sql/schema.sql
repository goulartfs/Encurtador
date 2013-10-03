CREATE TABLE campanha (id BIGINT AUTO_INCREMENT, usuario_id BIGINT, orcamento FLOAT(18, 2), titulo VARCHAR(255), descricao TEXT, url_campanha TEXT, is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE campanha_controle (id BIGINT AUTO_INCREMENT, campanha_id BIGINT, ip_viewer VARCHAR(255), is_processed TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE conta (id BIGINT AUTO_INCREMENT, user_id BIGINT, saldo FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE conta_operacao (id BIGINT AUTO_INCREMENT, conta_id BIGINT, tipo_operacao_id BIGINT, valor FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX tipo_operacao_id_idx (tipo_operacao_id), INDEX conta_id_idx (conta_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tipo_operacao (id BIGINT AUTO_INCREMENT, tipo VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tipo_usuario (id BIGINT AUTO_INCREMENT, tipo VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE url (id BIGINT AUTO_INCREMENT, usuario_id BIGINT, original_url TEXT NOT NULL, short_url VARCHAR(255) NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE url_controle (id BIGINT AUTO_INCREMENT, url_id BIGINT, ipuser VARCHAR(255), is_processed TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX url_id_idx (url_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE usuario (id BIGINT AUTO_INCREMENT, user_id BIGINT, tipo_usuario_id BIGINT, endereco TEXT, estado VARCHAR(255), cidade VARCHAR(255), cep VARCHAR(255), telefone VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX tipo_usuario_id_idx (tipo_usuario_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE conta ADD CONSTRAINT conta_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE conta_operacao ADD CONSTRAINT conta_operacao_tipo_operacao_id_tipo_operacao_id FOREIGN KEY (tipo_operacao_id) REFERENCES tipo_operacao(id) ON UPDATE RESTRICT ON DELETE RESTRICT;
ALTER TABLE conta_operacao ADD CONSTRAINT conta_operacao_conta_id_conta_id FOREIGN KEY (conta_id) REFERENCES conta(id) ON UPDATE RESTRICT ON DELETE RESTRICT;
ALTER TABLE url_controle ADD CONSTRAINT url_controle_url_id_url_id FOREIGN KEY (url_id) REFERENCES url(id) ON UPDATE RESTRICT ON DELETE RESTRICT;
ALTER TABLE usuario ADD CONSTRAINT usuario_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE usuario ADD CONSTRAINT usuario_tipo_usuario_id_tipo_usuario_id FOREIGN KEY (tipo_usuario_id) REFERENCES tipo_usuario(id) ON UPDATE RESTRICT ON DELETE RESTRICT;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;

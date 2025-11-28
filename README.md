# 🎬 Catálogo de Séries - CRUD em PHP

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/Status-Concluído-success?style=for-the-badge)

Bem-vindo ao **Catálogo de Séries**, uma aplicação web desenvolvida em PHP para gerir uma coleção pessoal de séries de TV. Este projeto implementa um sistema completo de **CRUD** (Create, Read, Update, Delete), permitindo listar, adicionar, editar e excluir séries de uma base de dados MySQL.

---

## 🚀 Funcionalidades

* ✅ **Listagem de Séries:** Visualização de todas as séries cadastradas em uma tabela organizada.
* ✅ **Adicionar Nova Série:** Formulário para registo de título, género, plataforma de streaming e ano de lançamento.
* ✅ **Editar Série:** Possibilidade de alterar qualquer dado de uma série já existente.
* ✅ **Excluir Série:** Remoção de registos com confirmação de segurança para evitar cliques acidentais.
* 🎨 **Design Responsivo:** Interface moderna (Tema Dark) construída com Bootstrap 5 e CSS personalizado.

---

## 🛠️ Tecnologias Utilizadas

* **Back-end:** PHP 7.4+
* **Banco de Dados:** MySQL / MariaDB
* **Front-end:** HTML5, CSS3, [Bootstrap 5.3](https://getbootstrap.com/)
* **Estilização:** Tema "Dark Streaming" personalizado (`style.css`).
* **Tipografia:** Fonte [Outfit](https://fonts.google.com/specimen/Outfit) via Google Fonts.

---

## 📂 Estrutura do Projeto

| Arquivo | Descrição |
| :--- | :--- |
| `pagina1.php` | Página principal que lista as séries (Home). |
| `adicionar.php` | Formulário para inserir novos registos. |
| `editar.php` | Formulário para alterar registos existentes. |
| `excluir.php` | Script lógico para remover registos. |
| `conexao.php` | Ficheiro de configuração e conexão com o banco de dados. |
| `style.css` | Folha de estilos personalizada. |

---

## ⚙️ Como Configurar e Executar

### 1. Pré-requisitos

* Servidor local (XAMPP, WAMP, Laragon) ou hospedagem web (ex: InfinityFree).
* Banco de dados MySQL.

### 2. Configuração do Banco de Dados

Crie um banco de dados chamado `series_db` e execute o seguinte comando SQL para criar a tabela necessária:

```sql
CREATE DATABASE IF NOT EXISTS series_db;
USE series_db;

CREATE TABLE IF NOT EXISTS series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    plataforma VARCHAR(50) NOT NULL,
    ano INT NOT NULL
);

-- (Opcional) Inserir dados de teste
INSERT INTO series (titulo, genero, plataforma, ano) VALUES 
('Stranger Things', 'Sci-Fi', 'Netflix', 2016),
('The Mandalorian', 'Sci-Fi', 'Disney+', 2019),
('Breaking Bad', 'Drama', 'Netflix', 2008);
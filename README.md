# 📚 Sistema de Biblioteca

Projeto desenvolvido para a disciplina de Programação Web utilizando o framework **Laravel**. O sistema permite o gerenciamento de uma biblioteca por meio de operações CRUD (Create, Read, Update e Delete), possibilitando o cadastro, consulta, edição e remoção de informações de forma prática e organizada.

## ✨ Funcionalidades

- ✅ Cadastro de livros
- ✅ Listagem de livros
- ✅ Edição de registros
- ✅ Exclusão de registros
- ✅ Interface web amigável
- ✅ Utilização do padrão MVC
- ✅ Integração com banco de dados relacional

## 🛠️ Tecnologias Utilizadas

- PHP
- Laravel
- Blade
- MySQL
- Bootstrap
- Vite

## 🚀 Como executar o projeto

### Pré-requisitos

- PHP 8+
- Composer
- Node.js
- MySQL

### Instalação

Clone o repositório:

```bash
git clone https://github.com/BrunoPradoPrado/trabalhopweb.git
```

Acesse a pasta do projeto:

```bash
cd trabalhopweb
```

Instale as dependências PHP:

```bash
composer install
```

Instale as dependências JavaScript:

```bash
npm install
```

Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure as credenciais do banco de dados no arquivo `.env`.

Execute as migrations:

```bash
php artisan migrate
```

Inicie o servidor Laravel:

```bash
php artisan serve
```

Em outro terminal, execute:

```bash
npm run dev
```

## 📂 Estrutura do Projeto

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

## 🎓 Objetivo Acadêmico

Este projeto foi desenvolvido com o objetivo de aplicar conceitos fundamentais de desenvolvimento web, utilizando o framework Laravel para implementar uma aplicação baseada no padrão MVC e operações CRUD completas.

## 👨‍💻 Autor

**Bruno do Prado**

GitHub: https://github.com/BrunoPradoPrado

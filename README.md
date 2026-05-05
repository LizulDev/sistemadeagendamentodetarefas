

 # 🗓️ Sistema de Agendamento de Serviços

Projeto desenvolvido para a disciplina de Desenvolvimento Web e Aplicativos. O sistema consiste em uma plataforma para gestão de clientes, catálogo de serviços e controle de horários, utilizando uma arquitetura moderna baseada em containers.

🛠️ Tecnologias Utilizadas
Framework: Laravel 11

Linguagem: PHP 8.1

Banco de Dados: MySQL 8.0

Ambiente: Docker & Docker Compose

Frontend: Blade Templates & Bootstrap 5

📂 Funcionalidades Implementadas
O sistema centraliza todas as operações em um Dashboard unificado, permitindo:

- Gestão de Usuários: CRUD completo com validação de dados

- Catálogo de Serviços: Cadastro de serviços com descrição e formatação monetária brasileira.

- Controle de Agendamentos: Vinculação entre clientes e serviços com suporte a campos de data e hora (datetime-local).

- Filtros de Busca: Sistema de filtragem por nome para facilitar a localização de registros.


## 📌 Requisitos

Antes de começar, você precisa ter instalado na sua máquina:

### 1️⃣ Git
Utilizado para clonar o projeto.

🔗 https://git-scm.com/downloads

Verifique a instalação:
```bash
git --version
```

---

### 2️⃣ Docker
Utilizado para rodar o ambiente completo (PHP, Nginx e MySQL) sem instalar
essas ferramentas manualmente.

🔗 https://www.docker.com/products/docker-desktop/

Verifique a instalação:
```bash
docker --version
docker compose version
```

⚠️ **Importante**
- O Docker Desktop deve estar **aberto e em execução** antes de continuar.
- No Windows, recomenda-se usar **WSL 2** (o próprio instalador orienta).

---

### 3️⃣ Editor de Código (recomendado)
Sugestão: **Visual Studio Code**

🔗 https://code.visualstudio.com/

---

## 🚀 Subindo o projeto pela primeira vez

### 1️⃣ Clonar o repositório

```bash
git clone <URL_DO_REPOSITORIO>
cd <PASTA_DO_PROJETO>
```

---

### 2️⃣ Criar o arquivo de ambiente

```bash
cp .env.example .env
```

---

### 3️⃣ Subir os containers com Docker

```bash
docker compose up -d --build
```

Esse comando pode demorar alguns minutos na primeira execução.

---

### 4️⃣ Instalar as dependências do Laravel

```bash
docker compose exec app composer install
```

---

### 5️⃣ Gerar a chave da aplicação

```bash
docker compose exec app php artisan key:generate
```

---

### 6️⃣ Acessar a aplicação

Abra o navegador e acesse:

```
http://localhost:8080/dashboard
```

Se você visualizar a página inicial do sistema, o ambiente está funcionando ✅

---

## 🛑 Problemas comuns

- **Docker não inicia**
  Verifique se o Docker Desktop está aberto.

- **Porta 8080 já está em uso**
  Feche outros serviços que possam estar usando essa porta.

- **Erro de permissão em arquivos**
  Reinicie os containers:
  ```bash
  docker compose down
  docker compose up -d

  
- **Erro ao subir contêiners** 
Verifique se sua rede tem bloqueios para este tipo de aplicação


Tenha uma excelente experiência 👌


# Customer Insights

Aplicação Laravel para gerenciamento de insights de clientes.

## Requisitos

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

## Instalação

### 1. Instalar dependências

```bash
composer install
npm install
```

### 2. Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Edite o arquivo `.env` e configure as credenciais do banco de dados:

```env
DB_DATABASE=customer_insights
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 3. Banco de dados

```bash
php artisan migrate
```

### 4. Executando

```bash
php artisan serve
```

Este comando sobe o servidor PHP e o Vite em paralelo.

Acesse: [http://localhost:8000](http://localhost:8000)

# Estoque

Sistema de gestão de estoque construído em Laravel: cadastro de produtos e categorias, validação de regras de negócio, relacionamento entre entidades, cobertura de testes automatizados e uma API JSON somente leitura.

## Stack

- PHP 8.3+
- Laravel 13
- SQLite
- Blade (views server-side)
- PHPUnit (testes unitários e de feature)

## Funcionalidades

- **CRUD completo de produtos**: listagem paginada, criação, edição e remoção.
- **Cadastro de categorias**: listagem e criação, associadas aos produtos.
- **Relacionamento produto ↔ categoria** (`belongsTo` / `hasMany`), com eager loading para evitar o problema de N+1 na listagem.
- **Validação via Form Request**: SKU de produto único, nome de categoria único, preço não pode ser negativo, categoria precisa existir quando informada.
- **Testes automatizados**: 12 testes (PHPUnit) cobrindo proteção contra mass assignment (`$fillable`) e o CRUD completo via feature tests, rodando contra um banco SQLite em memória.
- **API JSON somente leitura** para produtos, usando API Resources para controlar exatamente o que é exposto.

## Rotas

| Método | URI | Descrição |
|---|---|---|
| GET | `/produtos` | Lista produtos (paginado), com categoria já carregada |
| GET | `/produtos/create` | Formulário de criação |
| POST | `/produtos` | Cria um produto |
| GET | `/produtos/{produto}/edit` | Formulário de edição |
| PUT/PATCH | `/produtos/{produto}` | Atualiza um produto |
| DELETE | `/produtos/{produto}` | Remove um produto |
| GET | `/categorias` | Lista categorias |
| GET | `/categorias/create` | Formulário de criação |
| POST | `/categorias` | Cria uma categoria |
| GET | `/api/produtos` | Lista produtos em JSON, com categoria |
| GET | `/api/produtos/{produto}` | Detalhe de um produto em JSON |

## Rodando o projeto localmente

```bash
git clone <url-do-repositorio>
cd estoque-laravel

composer install
cp .env.example .env
php artisan key:generate

# cria o arquivo do banco SQLite
touch database/database.sqlite   # no Windows: New-Item -ItemType File database\database.sqlite

php artisan migrate --seed
php artisan serve
```

Acesse `http://127.0.0.1:8000/produtos`.

## Rodando os testes

```bash
php artisan test
```

Os testes rodam contra um banco SQLite em memória (configurado em `phpunit.xml`), então não afetam o `database/database.sqlite` de desenvolvimento.

## Estrutura relevante

```
app/Http/Controllers/    Controllers de Produto e Categoria
app/Http/Requests/       Regras de validação (Form Requests)
app/Http/Resources/      Formatação da API JSON
app/Models/              Produto e Categoria (Eloquent)
database/migrations/     Schema versionado
database/seeders/        Dados de teste
resources/views/         Views Blade
routes/web.php           Rotas da interface (CRUD via Blade)
routes/api.php           Rotas da API JSON
tests/Unit/              Testes isolados (sem banco/framework)
tests/Feature/           Testes de rota, validação e banco
```

## Licença

Construído sobre o framework Laravel, licenciado sob [MIT](https://opensource.org/licenses/MIT).

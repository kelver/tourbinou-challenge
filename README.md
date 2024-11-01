# Desafio Técnico para Dev Fullstack PHP na Tourbinou

## Projeto Laravel com Docker e Sail

Este projeto Laravel utiliza Docker e Laravel Sail para facilitar o desenvolvimento em um ambiente isolado. Com automação de tarefas via Makefile, é possível configurar e gerenciar o ambiente de forma eficiente e intuitiva.

### Requisitos

* **Docker** e **Docker Compose**
* **Node.js** e **NPM** (para tarefas frontend)

### Iniciando o Projeto

#### 1. Configuração Inicial

Clone o repositório e entre na pasta do projeto:

```bash
git clone <URL do repositório>
cd <nome da pasta>  
```

### 1.1. Execute o comando abaixo para configurar o ambiente e instalar as dependências:
Se todo o ambiente estiver ok, apenas esse comando deve executar tudo necessário para colocar a aplicação para rodar.
```bash
make
```

### 2. Comandos do Makefile
O Makefile contém uma série de comandos úteis para gerenciar o ambiente de desenvolvimento. Aqui estão algumas das funcionalidades disponíveis:

## Ações de Pré-commit

```bash
make check
```

Executa todas as ações de pré-commit configuradas.

## Preparar o Ambiente

```bash
make env
```
Copia o arquivo .env.example para .env.

```bash
make prepare
```
Instala as dependências do Composer.

## Gerenciar Containers Docker

```bash
make up
```
Inicia todos os containers Docker.

```bash
make down
```
Para todos os containers Docker.

```bash
make restart
```

Para e reinicia todos os containers Docker.

## Gerar Chave Laravel

```bash
make key-generate
```
Gera uma nova chave para o Laravel.

## Gerenciar Dependências Node.js

```bash
make npm-install
```

Instala todas as dependências Node.js.

```bash
make npm-run-build
```

Constrói os ativos frontend.

## Verificação de Código

```bash
make lint
```
Executa o Pint para formatar o código.

## Após a Configuração
Após a execução do comando make, seu ambiente estará pronto para uso. Acesse o projeto em http://tourbinou.test e aproveite!

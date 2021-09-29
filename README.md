# Nuvenz

---

## Tecnologia

- **Linguagem:** PHP 7.4
- **Framework:** Wordpress 5.7.2
- **Banco de dados:** MySQL 5.6

## Requisitos
Para execução do projeto é necessário ter as seguintes ferramentas instaladas no ambiente:

- **[Docker Desktop - Windows e Mac](https://www.docker.com/products/docker-desktop)** ou **[Docker Engine - Linux](https://docs.docker.com/engine/install/)**: necessário para criar um servidor local;
- **[GIT](https://git-scm.com/)** (last version);

---

## Por onde começar

1. Para rodar o projeto, você precisar ter o Docker instalado localmente;

2. Baixar o banco de dados da área de Downloads do Bitbucket e colocar dentro do diretório `database`, criar caso não exista;

2. Executar o comando `docker-compose up` para iniciar o ambiente

---

## Dados de acesso

**Ambiente Local:**
http://localhost

**Painel Administrativo:**
http://localhost/wp-admin

Usuário: `gerenciador`
Senha: `LMO$qgE4D(fCzh1sK7`

---

## Git flow

Primeiro, comece baixando o código da _branch_ `develop`. Nesta _branch_ se concentram os códigos que estão com desenvolvimento em andamento.

Após isso, crie uma nova `feature` _branch_, com o nome que deseja, e checkout o _branch_:
```
git checkout -b feature/<nome_da_branch>
```

Após executar a demanda, faça o _pull request_ para a _branch_ `develop`:
```
git add --all
git commit -m "Comentário do que foi realizado no branch"
git push origin develop
```
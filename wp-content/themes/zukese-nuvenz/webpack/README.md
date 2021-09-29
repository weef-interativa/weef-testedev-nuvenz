# brivia-kpmg-ktax

### Introdução

Este repositório contém todos os arquivos referentes à interface do projeto.

### Dependências

Os processos de build do projeto dependem do node.

A versão mais indicada para o correto funcionamento é a versão 8.9

---

### Instalação e processo de build

Ao clonar este repositório execute o comando de instalação npm.

```
$ npm install
```

---

#### Desenvolvimento

Durante o processo de desenvolvimento do projeto, o comando utilizado será `npm start`

```
$ npm start
```

Este comando:

- Inicia o webpack em modo de **desenvolvimento**.

- **Não** gera arquivos de output.

- Sobe um servidor de desenvolvimento `webpack-dev-server`
- - Localizado em [http://localhost:8080](http://localhost:8080)
- - *Certifique-se de que essa porta está disponível*.

- Faz um *watch* nos arquivos do projeto para recompilar em tempo de desenvolvimento

---

#### Produção

Após o desenvolvimento dos componentes, para gerar um entregável minificado pronto para ser fornecido em **produção**, o comando utilizado será `npm run build`

```
$ npm run build
```

Este comando:

- Inicia o webpack em modo de **produção**

- Deleta o diretório *dist/*

- Compila os assets CSS *(SCSS)*, JS *(ES6)*, e HTML *(Handlebars)*

- Copia os arquivos do diretório *public/*

- Gera um novo diretório *dist/* com os arquivos de output

---
  

#### TL;DR [Quick Start] desenvolvimento

*Instala as dependências npm e sobe webpack em **desenvolvimento**.*

```
$ npm i && npm start
```

---

### Estrutura de diretórios

#### Resumo:

- `/node_modules`
Dependências npm

- `/dist`
Arquivos compilados e otimizados para utilização em produção

- `/public`
Arquivos estáticos

- `/src`
Arquivos fonte do projeto

- `/webpack.config`
Configurações de desenvolvimento e produção dos processos de bundle do webpack

---

#### DIST `dist/`

O diretório `dist/` contém todos os arquivos compilados do projeto, incluindo javascript e css minificados, páginas html compiladas e outras mídias localizadas em `assets/`.

Este diretório não deve ser alterado manualmente pois ele é deletado e gerado pelo comando `npm run build`

As páginas são geradas na raíz do diretório e a página home é duplicada e renomeada para *index.html*.

---
  
#### SRC `src/`

O diretório `src/` contém os arquivos fontes do projeto.

Este diretório é estruturado da seguinte forma:

- `components/`
Componentes do projeto.
Cada componente é localizado em um diretório homônimo e pode conter arquivos .js, .scss e .html.
Os componentes podem ser incluidos como partials com o handlebars dentro de outros componentes ou páginas.

- `hbs-data/` e `globals.js`
Arquivos js que exportam dados fake para agilizar o desenvolvimento dos htmls com templates handlebars.

- `helpers/`
Arquivos de helpers do projeto, utilidades de estilos .scss são localizadas aqui

- `layouts/`
Abertura e fechamento das tags html, head e body do projeto.

- `pages/`
Páginas do projeto. As páginas são como componentes, possuem arquivos scss, js e html.
Um diretório de página pode conter várias sub-páginas.

- `vendor/`
Arquivos scss e js referentes a bibliotecas de terceiros.

- `app.js`
Ponto de entrada da aplicação, neste arquivo realizamos os includes de todos os componentes e páginas, bem como os estilos do arquivo `style.scss`

- `index.html`
Include da página home.

- `styles.scss`
Ponto de entrada de estilos da aplicação, aqui são importados todos os arquivos de estilos dos componentes.

#### PUBLIC `public/`
Todos os arquivos deste diretório são copiados para o diretório `dist/` durante o processo de compilação em modo de **produção**.

## Tecnologias
|Nome		|Versão	|
|--|--|
|ECMAScript	|6		|
|Babel		|7		|
|Webpack	|4.x	|
|jQuery		|3.x	|
|Bootstrap	|4.x	|
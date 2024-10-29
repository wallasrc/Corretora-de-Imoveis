# Projeto Imobiliário com Laravel

Este é um projeto de site para uma imobiliária, desenvolvido com o framework Laravel, que inclui um sistema administrativo completo. O objetivo inicial foi demonstrar domínio da base de PHP com Laravel, criando uma estrutura funcional e organizada.

## Objetivos do Projeto

O projeto foi criado para:
1. **Mostrar domínio do Laravel e PHP**: Implementando funcionalidades principais, autenticação, CRUDs básicos e integração com banco de dados e MVC.
2. **Criar uma base para boas práticas**: A partir deste ponto, o plano é evoluir o projeto com melhores práticas de codificação e uso de design patterns.
3. **Implementar camadas de Repositories e Services**: Para separar responsabilidades e organizar o código, será adicionado o uso de `Repositories` e `Services` para lidar com a lógica de negócios de forma mais modular.
4. **Orientação a Testes**: A ideia é preparar o projeto para ter uma cobertura de testes ampla, começando com testes unitários e, gradualmente, evoluindo para testes de integração e de interface (end-to-end).

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para desenvolvimento web.
- **SQLite**: Banco de dados leve e fácil de configurar, ideal para desenvolvimento e testes locais.
- **Materialize CSS**: Framework CSS baseado em Material Design, usado para estilizar e dar responsividade à interface.

## Estrutura do Projeto

- **Frontend do Site**: Página principal, listagem de imóveis, filtro de busca e página de detalhes dos imóveis.
- **Painel Administrativo**: Área para gerenciar os imóveis, clientes e mais.

## Funcionalidades

- **Gerenciamento de Imóveis**: CRUD de imóveis com informações como título, descrição, localização, preço e fotos.
- **Gerenciamento de Usuários**: Administração de usuários do sistema com diferentes níveis de permissão.
- **Relatórios e Estatísticas**: Painel com visualização de dados para apoiar as decisões estratégicas da imobiliária (em desenvolvimento).

## Evolução do Projeto

### Próximas Etapas

1. **Refatoração com Repositories e Services**: Será implementada uma camada de `Repositories` para lidar com a persistência de dados e uma camada de `Services` para concentrar a lógica de negócios. 
2. **Boas Práticas de Codificação**: O código será ajustado para seguir as melhores práticas de Laravel, garantindo escalabilidade e facilidade de manutenção.
3. **Cobertura de Testes**: A base de testes será ampliada para incluir testes unitários e de integração, além de testes funcionais nas principais funcionalidades do sistema.

## Instalação e Configuração

### Passo a Passo

1. **Clone o Repositório**: Clone este repositório em sua máquina.
   `git clone <URL_DO_REPOSITORIO>`
   `cd nome-do-projeto`
   
3. Instale as Dependências do Laravel
   `composer install`

4. Configure o Arquivo
   `DB_CONNECTION=sqlite`
   `DB_DATABASE=/caminho/para/database.sqlite`

5. Crie o Arquivo de Banco de Dados
   `touch database/database.sqlite`
   
7. Gere a Chave da Aplicação
    `php artisan key:generate`

8. Execute as Migrações e Seeders
   `php artisan migrate --seed`

#Contribuição
Sugestões e melhorias são sempre bem-vindas! Para contribuir, siga as etapas:

1. Faça um fork do projeto.
2. Crie uma branch com a feature ou correção de bug: `git checkout -b minha-feature`.
3. Faça um commit das suas mudanças: `git commit -m 'Minha nova feature'`.
4. Faça um push para a branch: `git push origin minha-feature`.
5. bra um `Pull Request`.

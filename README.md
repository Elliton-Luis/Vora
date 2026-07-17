# Vora

Um sistema de anotações web minimalista baseado em Markdown, inspirado na estrutura de conhecimento do Obsidian, mas acessível de qualquer dispositivo.

O projeto foi desenhado com uma arquitetura desacoplada para garantir uma solução robusta e escalável, separando claramente as responsabilidades entre a API e a interface de consumo.

## 🐳 Ambiente de Desenvolvimento

Toda a aplicação é orquestrada via **Docker**. Isso garante um ambiente de desenvolvimento isolado, padronizado e pronto para uso, sem a necessidade de instalar dependências (como PHP, Composer ou Node) diretamente no seu sistema operacional.

## 🏗️ Arquitetura do Projeto

O repositório está organizado no formato monorepo para facilitar o fluxo de trabalho:

*   📁 **`/api`**: Backend construído em PHP com o framework Laravel, responsável por expor os endpoints RESTful, validar regras de negócio e gerenciar o banco de dados.
*   📁 **`/frontend`**: Aplicação cliente construída com Vue.js e Tailwind CSS para consumir a API e renderizar a interface de usuário de forma reativa.

## 🧪 Qualidade e Testes

A estabilidade da aplicação é assegurada através de testes automatizados utilizando o framework **PEST**. O projeto foi desenhado para ter módulos de teste cobrindo de ponta a ponta todas as camadas do sistema (Rotas, Controllers, Services, Validações e Banco de Dados), garantindo que as regras de negócio funcionem perfeitamente.

## 🗄️ Modelagem de Dados

O banco de dados relacional foi estruturado para suportar aninhamento de pastas e pertencimento seguro de dados:

*   **Users:** `name`, `email`, `password`
*   **Folders:** `title`, `color`, `parent_folder_id` (auto-relacionamento para subpastas), `user_id` (FK 1:N com Users)
*   **Notes:** `title`, `content`, `folder_id` (FK 1:N com Folders), `user_id` (FK 1:N com Users), `is_starred`

## 🚀 Roadmap de Desenvolvimento

O desenvolvimento segue um fluxo cronológico focado primeiro na estabilidade e segurança da API, e, posteriormente, na interface visual.

- [x] **Modelagem de Dados:** Criação das Migrations e Models.
- [x] **Definição de Endpoints:** Mapeamento das rotas da API.
- [ ] **Regras de Negócio (Em andamento):** Desenvolvimento de Controllers e Services.
- [ ] **Garantia de Qualidade:** Criação de testes automatizados com PEST em todos os módulos.
- [ ] **Refatoração:** Melhorias de código e otimização de consultas arquiteturais baseadas nos testes.
- [ ] **Segurança:** Implementação da camada de Autenticação.
- [ ] **Interface Web:** Desenvolvimento do Frontend consumindo a API finalizada.
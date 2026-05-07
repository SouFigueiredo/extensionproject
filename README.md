# 📚 Extension Project — Gestão Inteligente de Salas

Sistema web desenvolvido com foco em **gestão, visualização e agendamento de salas acadêmicas**, buscando facilitar a organização de ambientes dentro da faculdade de forma simples, rápida e eficiente.

---

## 🚀 Objetivo do Projeto

O projeto tem como proposta central oferecer uma plataforma onde seja possível:

- ✅ Visualizar salas disponíveis
- ✅ Verificar horários ocupados
- ✅ Realizar agendamentos
- ✅ Gerenciar reservas
- ✅ Controlar acessos administrativos
- ✅ Organizar melhor os ambientes acadêmicos

A ideia é transformar o processo de reserva de salas, que muitas vezes é manual e desorganizado, em algo digital e intuitivo.

---

# 🌐 Acesso ao Projeto

### 🔗 Deploy

https://soufigueiredo.github.io/extensionproject/index.html

---

# 🛠️ Tecnologias Utilizadas

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

---

# 🔐 Sistema de Autenticação

O sistema atualmente possui autenticação administrativa utilizando:

- Sessões (`$_SESSION`)
- `password_hash()`
- `password_verify()`
- API REST em PHP

---

# 🗄️ Banco de Dados

### Nome do banco:

```sql
gestaosala
```

---

# 🔑 Geração de Hash

O arquivo:

```txt
gerarhash.php
```

é utilizado apenas para gerar hashes de senha criptografadas com:

```php
password_hash()
```

Isso permite cadastrar usuários diretamente no MySQL de forma segura.

---

# 📂 Estrutura Inicial do Projeto

```txt
extensionproject/
│
├── api/
│   ├── auth/
│   │   ├── login.php
│   │   └── logout.php
│   │
│   ├── config/
│   │   └── connect.php
│   │
│   ├── reservas/
│   │   ├── cancelar.php
│   │   ├── criar.php
│   │   └── listar.php
│   │
│   └── salas/
│       ├── criar.php
│       ├── deletar.php
│       ├── editar.php
│       └── listar.php
│
├── public/
│   ├── js/
│   ├── index.html
│   └── style.css
│
└── README.md
```

---

# 🎯 Funcionalidades Planejadas

- [x] Tela de login
- [x] Autenticação segura
- [x] Integração com MySQL
- [ ] Dashboard administrativo
- [ ] Cadastro de salas
- [ ] Sistema de agendamento
- [ ] Controle de disponibilidade
- [ ] Diferentes níveis de usuário
- [ ] Histórico de reservas
- [ ] API REST completa
- [ ] Interface responsiva

---

# 💡 Visão do Projeto

O Extension Project busca unir:

- organização acadêmica
- praticidade
- automação
- experiência do usuário

Tudo isso em uma aplicação web moderna voltada ao ambiente universitário.

---

# 👨‍💻 Desenvolvimento

Projeto desenvolvido para fins acadêmicos e aprendizado prático de:

- desenvolvimento web
- APIs REST
- autenticação
- integração frontend/backend
- modelagem de banco de dados

---

# 📌 Observações

Atualmente o projeto está em fase inicial de desenvolvimento, com foco na construção da base estrutural do sistema e implementação das funcionalidades principais.

---

# ⭐ Extension Project

> “Organizando espaços, facilitando conexões.”

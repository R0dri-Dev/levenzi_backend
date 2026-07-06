# Sistema Levenzi API

## Endpoints

- **GET** `/api/health`
  - Retorna `{ ok: true }`

- **POST** `/api/auth/login`
  - Body: `{ email, password }`
  - Resp: `{ access_token, token_type, expires_in }`

- **POST** `/api/auth/logout`
  - Header: `Authorization: Bearer <token>`
  - Resp: `{ message }`

> Nota: la documentación interactiva de Scramble existe en `http://127.0.0.1:8000/docs/api#/` (la UI puede verse fea pero es funcional).


# TODO - Levenzi Backend (CRUD + Auth JWT)

## Checklist
- [ ] Refactor de módulos CRUD para que usen arquitectura tipo Auth:
  - [ ] Security/Http/Controllers solo orquesta (sin lógica)
  - [ ] Security/Http/Requests para validaciones
  - [ ] Security/Services para lógica CRUD (list/get/create/update/delete)
  - [ ] Security/Actions opcional si aplica
  - [ ] Mantener Routes apuntando al mismo Controller
- [ ] Crear módulos (excepto Auth) con estructura fija:
  - [ ] Modules/<mod>/Http/Controllers
  - [ ] Modules/<mod>/Http/Requests
  - [ ] Modules/<mod>/Services
  - [ ] Modules/<mod>/Http/Routes
- [ ] Módulos a refactorizar:
  - [ ] companias
  - [ ] sedes
  - [ ] clientes
  - [ ] doctores
  - [ ] marcas
  - [ ] instalaciones
  - [ ] roles
  - [ ] usuarios
  - [ ] permisos
  - [ ] modulos
  - [ ] productos
- [ ] Probar que `php artisan route:list` muestra todos los endpoints.


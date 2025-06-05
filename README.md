# ConstruVial:

Aplicación web de gestión de maquinarias para obras viales. Permite administrar maquinarias, asignaciones, mantenimientos y generar informes PDF por máquina.

## Tecnologías:

- [Laravel](https://laravel.com/)  
- [Breeze](https://laravel.com/docs/starter-kits#breeze)  
- [Tailwind CSS](https://tailwindcss.com/)  
- [Composer](https://getcomposer.org/)  
- [Node.js y NPM](https://nodejs.org/)  

## Requisitos:

- PHP >= 8.1  
- Composer  
- Node.js  
- MySQL u otro gestor compatible  

## Instalación:

```bash
git clone https://github.com/MercadoLucila/ConstruVial.git
cd construvial
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


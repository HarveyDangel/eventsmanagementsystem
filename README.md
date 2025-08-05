# 🎉 Event Management System (EMS)

A **web-based platform** designed for **Biliran Province State University (BiPSU)** to simplify event scheduling, tracking, and feedback collection.  
It allows students, faculty, and administrators to manage events efficiently with role-based access control.

## 📌 Table of Contents
- [About](#about)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Roles](#system-roles)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

---

## About

The **Event Management System (EMS)** is a Laravel-based application for organizing and managing university events.  
It provides an easy way for student organizations to propose events, for faculty to oversee activities, and for the admin to maintain proper event records.

This system improves transparency, reduces paperwork, and ensures a smooth approval process.

---

## Features

- 🔐 **Multi-role Authentication** (Admin, Faculty/Student Organization)
- 🗓 **Event Creation & Approval Workflow**
- 📋 **Event List & History Tracking**
- 💬 **Feedback Collection**
- 📊 **Dashboard with Statistics**
- 📂 **Account Management** by Admin
- ⚡ **Fast & Lightweight** UI with Alpine.js

---

## Tech Stack

| Category   | Technology |
|------------|------------|
| Framework  | Laravel |
| Frontend   | Blade Templates, Alpine.js |
| Database   | MySQL |
| Architecture | MVC |
| Styling    | Tailwind CSS |
| Deployment | Local / Cloud Hosting |

---

## System Roles

| Role  | Permissions |
|-------|-------------|
| **Admin** | Manage accounts, approve/decline events, view all data |
| **Faculty/Student Organization** | Create events, submit for approval, view events, monitor activities, give feedback |

---

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/event-management-system.git
   cd event-management-system

2. **Install dependencies
   ```bash
   composer install
   npm install

3. **Set up environment file**
   ```bash
    cp .env.example .env
    php artisan key:generate

4. **Configure database**
- Create a new MySQL database (e.g., ems_db)
- Update .env with your DB credentials

5. **Run Migration**
   ```bash
    php artisan migrate

5. **Serve the application**
   ```bash
    php artisan serve

## Usage
- Login with your role credentials.
- Navigate to Events to view or create an event.
- Submit events for approval (for organizations).
- Approve/decline events (for admin).
- Give feedback about the system.

## Contributing
- Fork the repository.
- Create a new branch (feature/your-feature).
- Commit your changes.
- Push to your branch and create a Pull Request.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

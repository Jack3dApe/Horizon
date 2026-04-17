# Horizon — Game Store

Horizon is a full-stack web application for buying and managing video games. Built with Laravel 11, it supports a public storefront for browsing and purchasing games, and an admin panel for managing the entire platform.

---

## Homepage

<!-- Add a screenshot of the homepage here -->
![Homepage]()

---

## Features

### Storefront (Guest & Authenticated Users)
- Browse games with a carousel, top games, trending, and genre filtering
- AI-powered search
- Wishlist management
- Shopping cart and checkout flow
- PayPal payment integration
- User registration, login, and password recovery
- Social login via GitHub and Google
- Game library (owned games)
- Game reviews and ratings
- Support ticket system
- Multi-language support
- Email activation

### Admin Panel
- Dashboard with platform overview and activity logs
- Full CRUD for Games, Publishers, Genres, Users, Reviews, and Support Tickets
- Soft delete with restore/permanent delete for all resources
- Role-based access control (via Spatie Laravel Permission)
- Notification center

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.3, Laravel 11 |
| Frontend | Blade, Vite, Tailwind CSS, Bootstrap 5, Tabler UI |
| Database | SQLite (dev) |
| Auth | Laravel built-in + Socialite (GitHub, Google) |
| Permissions | Spatie Laravel Permission |
| Payments | PayPal |
| Icons | Font Awesome, Bootstrap Icons, Tabler Icons |
| Charts | ApexCharts |

---

## Getting Started

### Requirements
- PHP 8.3+ with `php8.3-xml` and `php8.3-sqlite3`
- Composer
- Node.js & npm

### Setup

```bash
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
npm install --legacy-peer-deps
```

### Running

```bash
php artisan serve
npm run dev
```

App will be available at `http://127.0.0.1:8000`.

---

## License

MIT

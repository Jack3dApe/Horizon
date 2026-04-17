# Horizon — Game Store

Horizon is a full-stack web application for buying and managing video games. Built with Laravel 11, it supports a public storefront for browsing and purchasing games, and an admin panel for managing the entire platform.

---

## Homepage
<img width="1842" height="850" alt="image 2" src="https://github.com/user-attachments/assets/86351bb1-d63f-4530-8347-d44414332ad0" />

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

## Environment & API Keys

After copying `.env.example` to `.env`, fill in the following keys:

### PayPal (payments)
| Key | Description |
|---|---|
| `PAYPAL_CLIENT_ID` | PayPal REST app client ID |
| `PAYPAL_SECRET` | PayPal REST app secret |

Create an app at [developer.paypal.com](https://developer.paypal.com) → My Apps & Credentials.

### OpenAI (AI search)
| Key | Description |
|---|---|
| `OPENAI_API_KEY` | OpenAI API key for the AI-powered search feature |

Get a key at [platform.openai.com/api-keys](https://platform.openai.com/api-keys).

### GitHub OAuth (social login)
| Key | Description |
|---|---|
| `GITHUB_CLIENT_ID` | GitHub OAuth app client ID |
| `GITHUB_CLIENT_SECRET` | GitHub OAuth app secret |
| `GITHUB_REDIRECT_URL` | Must match the callback URL set in the GitHub app (e.g. `http://localhost/auth/github/callback`) |

Register an OAuth app at GitHub → Settings → Developer Settings → OAuth Apps.

### Google OAuth (social login)
| Key | Description |
|---|---|
| `GOOGLE_CLIENT_ID` | Google OAuth client ID |
| `GOOGLE_CLIENT_SECRET` | Google OAuth client secret |
| `GOOGLE_REDIRECT_URL` | Must match the redirect URI set in Google Cloud Console (e.g. `http://localhost/auth/google/callback`) |

Create credentials at [console.cloud.google.com](https://console.cloud.google.com) → APIs & Services → Credentials.

### Freshdesk (support tickets)
| Key | Description |
|---|---|
| `FRESHDESK_API_KEY` | Freshdesk API key for support ticket integration |
| `FRESHDESK_URL` | Your Freshdesk domain (e.g. `https://yourcompany.freshdesk.com`) |

Find your API key in Freshdesk → Profile Settings.

---

## License

MIT

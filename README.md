# 📸 HOPn Models – Laravel Backend MVP

HOPn Models is a backend MVP project built with **Laravel** and **MySQL** that enables clients to connect with models through profile browsing and booking requests.

---

## 🚀 Features

- ✅ Create & view model profiles with filtering
- ✅ Store **only external portfolio links** (YouTube, Instagram, TikTok)
- ✅ No file uploads (images/videos are embedded)
- ✅ Clients can submit booking requests
- ✅ Admin dashboard to view booking stats and status updates
- ✅ Email notification when a new booking is received
- ✅ Token-based authentication for admin panel
- ✅ Slug support for model profile pages (used for QR code generation)

---

## ⚙️ Tech Stack

- **Backend**: PHP (Laravel)
- **Database**: MySQL
- **Frontend**: HTML, Vanilla JS (basic interface)
- **Authentication**: Laravel Sanctum (for token-based admin login)
- **Email**: Laravel Mail (Mailable class for booking notifications)

---

## 📦 API Endpoints

### 🔹 Model Profile Endpoints

| Method | Endpoint                  | Description                                |
|--------|---------------------------|--------------------------------------------|
| POST   | `/api/models`             | Create new model profile                   |
| GET    | `/api/models`             | List all models (with optional filters)    |
| GET    | `/api/models/{id}`        | View single model by ID                    |
| GET    | `/api/models/{slug}`      | View model by slug (for QR)                |

**Optional Filters:** `gender`, `city`, `model_type`, `price_min`, `price_max`

---

### 🔹 Booking Endpoints

| Method | Endpoint                  | Description                                |
|--------|---------------------------|--------------------------------------------|
| POST   | `/api/bookings`           | Submit booking request                     |
| GET    | `/api/bookings`           | View all bookings (admin only)             |
| PATCH  | `/api/bookings/{id}`      | Update booking status                      |

---

### 🔹 Admin Endpoints

| Method | Endpoint                  | Description                                |
|--------|---------------------------|--------------------------------------------|
| POST   | `/api/admin/login`        | Admin login, returns token                 |
| GET    | `/api/dashboard`          | Dashboard stats: total models & bookings   |

---

## 🔐 Admin Authentication

- Admin login returns a **Bearer token**
- Required for accessing `/api/bookings` and `/api/dashboard`
- Token must be stored in localStorage and sent in the `Authorization` header

---

## 💌 Email Notification

- A `BookingNotification` email is sent on each booking
- Configurable via `.env` and `config/mail.php`
- You must set up a mail driver (SMTP or Mailtrap recommended for testing)

---

## 📂 Folder Structure (Key Files)
app/
├── Models/
│ └── ModelProfile.php
│ └── Booking.php
│ └── Admin.php
├── Http/Controllers/
│ └── ModelProfileController.php
│ └── BookingController.php
│ └── AdminAuthController.php
│ └── AdminController.php
├── Mail/
│ └── BookingNotification.php

routes/
└── api.php

resources/views/
└── emails/booking.blade.php

---

## 🛠 Setup Instructions

```bash
# Clone the project
git clone https://github.com/your-username/hopn-models.git

# Enter directory
cd hopn-models

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Set database config in .env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

# (Optional) Configure Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxx
MAIL_PASSWORD=xxxx

# Generate key
php artisan key:generate

# Run migrations
php artisan migrate

# Start server
php artisan serve

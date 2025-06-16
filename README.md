# Job Order Statement (JOS) Generation System

A Laravel 9 mini-project to manage Job Orders and generate Job Order Statements (JOS) by grouping based on Contractor, Conductor, and Month.

## 🚀 Features

- Full relational database design using Laravel Migrations
- Eloquent model relationships
- Group Job Orders by Contractor + Conductor + Month (jos_date)
- Auto-generated JOS reference numbers (e.g., JOS-202506-001)
- Total job orders, total amount, paid amount, and balance calculation
- Remarks field with each JOS
- PDF export of JOS (via DomPDF)
- Seeders to generate realistic sample data
- Simple, responsive UI using Bootstrap 5

## 🛠️ Tech Stack

- Laravel 9
- MySQL
- DomPDF (for PDF export)
- Bootstrap 5 (for UI)

## 📦 Setup Instructions

```bash
git clone https://github.com/your-username/jos-system.git
cd jos-system
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

- Update `.env` with your local DB credentials
- Visit `http://localhost:8000` in your browser

## 📁 Main Modules

- Type of Work (CRUD)
- Contractors (CRUD)
- Conductors (CRUD)
- Job Orders (CRUD)
- Job Order Statements (JOS):
  - Filter by Month
  - Group and generate JOS
  - View JOS and linked Job Orders
  - Export JOS as PDF

## 👩‍💻 Developed by

**Richa Sharma**

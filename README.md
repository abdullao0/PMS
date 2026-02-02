# 🛒 PMS - Product Management System

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  <br>
  <strong>A Modern, Integrated Solution for Shop and Product Management</strong>
</p>

---

## 🌟 Overview

**PMS (Product Management System)** is a robust web application built with **Laravel 12**, designed to streamline how business owners manage their shops, inventories, and customer interactions. It bridges the gap between traditional management and modern automation by integrating **n8n** for seamless support workflows.

Whether you're managing a single shop or tracking a diverse product catalog across multiple categories, PMS provides the tools you need in a high-performance, user-friendly environment.

## 🚀 Key Features

### 🏪 Shop Management
- **Custom Shop Profiles**: Create and manage your shop with a unique identity, logo, and description.
- **Team Tracking**: Maintain records of the number of employees for each shop.
- **Settings Dashboard**: Easily update shop configurations as your business grows.

### 📦 Product & Inventory
- **Full CRUD Operations**: Create, read, update, and manage products with ease.
- **Categorization**: Multi-category support for better product organization.
- **Smart Status**: Toggle product visibility (Active/Inactive) to manage seasonal inventory or stock-outs.
- **Real-time Analytics**: Built-in dashboard to view active product counts and stock levels.

### 📨 Communication & Reporting
- **Email Automation**: Generate and send detailed reports of active and inactive products directly to your inbox.
- **Integrated Support**: A custom contact system that ensures your customers are always heard.

### 🤖 Automation (n8n Integration)
- **Support Webhooks**: PMS is integrated with **n8n.cloud**. Contact form submissions are automatically pushed to an n8n webhook, allowing for advanced automation like:
  - Auto-sending data to Slack/Discord.
  - Creating support tickets in Trello or Jira.
  - Feeding leads into a CRM.

---

## 🛠️ Technology Stack

### Backend
- **Framework**: [Laravel 12](https://laravel.com)
- **Language**: PHP 8.2+
- **Database**: SQLite (Default) / MySQL / PostgreSQL
- **Security**: Laravel Sanctum for secure API and session management.

### Frontend
- **Engine**: Blade Templates
- **Styling**: [Tailwind CSS 4.0](https://tailwindcss.com)
- **Interactivity**: Axios for API calls, SweetAlert2 for beautiful notifications.
- **Asset Bundling**: Vite

### Orchestration & Tools
- **Automation**: [n8n](https://n8n.io) (Low-code workflow automation)
- **Deployment**: Laravel Vite Plugin
- **Task Runner**: Composer & NPM

---

## ⚙️ Installation & Setup

Follow these steps to get your project up and running locally.

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM

### Setup Instructions

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/PMS.git
   cd PMS
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate
   ```

5. **Build Assets**:
   ```bash
   npm run build
   ```

6. **Start the Development Server**:
   ```bash
   composer dev
   ```
   *Note: This runs Laravel, Vite, and Queue listeners simultaneously.*

---

## 🔗 n8n Integration Details

PMS uses a webhook-driven architecture for support. To configure your n8n workflow:

1. Create a "Webhook" node in n8n.
2. Set the method to `POST`.
3. Update the URL in `app/Http/Controllers/MailController.php` (for backend) and `resources/views/welcome.blade.php` (for frontend) to match your n8n endpoint.

Example Webhook URL structure:
`https://your-n8n-instance.cloud/webhook/support`

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

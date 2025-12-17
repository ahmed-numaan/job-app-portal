# Job Application Portal

A comprehensive job portal application built with Laravel 12, featuring separate modules for job seekers and administrators. This project demonstrates modern web development practices with a modular architecture, responsive design, and Docker containerization.

## 🚀 Features

### Job Seekers Portal
- **User Registration & Authentication** - Secure user accounts with profile management
- **Job Search & Filtering** - Advanced search with location, salary, and skill filters
- **Job Applications** - Apply to positions with resume upload and cover letters
- **Application Tracking** - Monitor application status and history
- **Profile Management** - Update personal information and change passwords

### Admin Panel
- **Company Management** - Add and manage company profiles with logos and details
- **Vacancy Management** - Create, edit, and manage job postings
- **Application Review** - Review and process job applications
- **Skills Management** - Maintain skill categories and requirements
- **User Management** - Oversee user accounts and permissions

### Technical Features
- **Modular Architecture** - Separate modules for JobsSite and AdminSite
- **Responsive Design** - Mobile-friendly interface with Bootstrap 5
- **Docker Support** - Complete containerized development environment
- **Database Relations** - Proper Eloquent relationships between models
- **Data Tables** - Interactive tables with sorting and pagination
- **Email Integration** - MailHog for development email testing

## 🛠️ Tech Stack

### Backend
- **Laravel 12** - PHP framework with modern features
- **PHP 8.2+** - Latest PHP version with type declarations
- **MySQL 8.0** - Relational database for data persistence
- **Laravel Modules** - Modular application structure

### Frontend
- **Bootstrap 5** - Responsive CSS framework
- **AdminLTE 4** - Admin dashboard template
- **jQuery & Alpine.js** - JavaScript frameworks
- **Vite** - Modern build tool for assets
- **SASS** - CSS preprocessor

### Development Tools
- **Docker & Docker Compose** - Containerized development
- **Nginx** - Web server
- **MailHog** - Email testing
- **PHPUnit** - Testing framework
- **Laravel Pint** - Code formatting

## 📦 Installation

### Prerequisites
- Docker and Docker Compose
- Git

### Quick Start with Docker

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd job-app-portal
   ```

2. **Start Docker containers**
   ```bash
   docker-compose up -d
   ```

3. **Install dependencies and setup**
   ```bash
   docker exec laravel_app composer run setup
   ```

4. **Access the application**
   - Main Application: http://localhost:8000
   - MailHog (Email testing): http://localhost:8025

### Manual Installation

1. **Install PHP dependencies**
   ```bash
   composer install
   ```

2. **Install Node.js dependencies**
   ```bash
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Start development server**
   ```bash
   php artisan serve
   ```

## 🏗️ Project Structure

```
job-app-portal/
├── Modules/
│   ├── AdminSite/          # Admin panel module
│   └── JobsSite/           # Job seekers module
├── app/
│   ├── Models/
│   │   ├── User.php        # User authentication
│   │   ├── Company.php     # Company profiles
│   │   ├── Vacancy.php     # Job postings
│   │   ├── Application.php # Job applications
│   │   └── Skill.php       # Skills management
├── database/
│   └── migrations/         # Database schema
├── public/
│   ├── adminlte/          # Admin theme assets
│   └── usertheme/         # User theme assets
├── docker/                # Docker configuration
└── resources/             # Views and assets
```

## 🗄️ Database Schema

### Core Models
- **Users** - Authentication and user profiles
- **Companies** - Employer information and branding
- **Vacancies** - Job postings with requirements
- **Applications** - Job applications with status tracking
- **Skills** - Skill categories and requirements
- **VacancySkill** - Many-to-many relationship for job skills

### Key Relationships
- Users can have many Applications
- Companies can have many Vacancies
- Vacancies can have many Applications
- Vacancies belong to many Skills

## 🎨 UI/UX Features

### User Interface
- Clean, modern design with intuitive navigation
- Responsive layout for desktop and mobile devices
- Professional job listing cards with company branding
- Advanced search and filtering capabilities

### Admin Interface
- AdminLTE dashboard with comprehensive management tools
- DataTables for efficient data browsing and management
- Form validation and user feedback
- File upload for company logos and user resumes

## 🔧 Development Features

### Code Quality
- PSR-4 autoloading standards
- Eloquent ORM for database interactions
- Form request validation
- Proper error handling and logging

### Testing
- PHPUnit test suite setup
- Feature and unit test examples
- Test database configuration

### Performance
- Vite for optimized asset bundling
- Database indexing for search performance
- Eager loading to prevent N+1 queries

## 🚀 Deployment

The application is containerized and ready for deployment with:
- Docker production configuration
- Environment variable management
- Asset optimization for production
- Database migration scripts

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Created as a portfolio project demonstrating full-stack Laravel development skills, including:
- Modern PHP development with Laravel
- Modular application architecture
- Database design and relationships
- Frontend integration with modern tools
- Docker containerization
- Professional UI/UX implementation

---

*This project showcases proficiency in Laravel development, modern web technologies, and professional software development practices.*

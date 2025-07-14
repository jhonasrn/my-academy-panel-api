# 🗺️ Project Roadmap — Academy Panel API

## ✅ Phase 0: Initial Setup

- Symfony 7.3 project created
- API Platform integrated
- MySQL connected via MAMP (port: 8889)
- `User` entity created and migrated
- API documentation accessible at `/api`

---

## 🔐 Phase 1: Authentication System

- Create `AdminUser` entity
- Implement login using JWT
- Protect routes based on user roles
- Set up security bundle and token-based access

---

## 👥 Phase 2: User Management

- Full CRUD operations for `User`
- Associate users with courses
- Enable filters, search and pagination
- Validate user data (email, required fields, etc.)

---

## 📚 Phase 3: Course and Content Management

- Create `Course`, `Module`, and `Lesson` entities
- Nest modules inside courses, and lessons inside modules
- Enable lesson publishing/unpublishing
- Support lesson ordering within modules

---

## 📊 Phase 4: Admin Panel

- Build dashboard with metrics: total users, active courses, published lessons
- Add filters and sort options in resource views
- Secure admin routes

---

## ⚙️ Phase 5: Infrastructure & Deployment

- Set up Docker (Symfony, MySQL, PHP-FPM)
- Configure `.env` files for dev/staging/production
- Prepare CI/CD scripts (optional via GitHub Actions)

---

## 🧾 Standards and Practices

- All code, comments, and naming in **English**
- Branch naming conventions:
  - `feat/feature-name`
  - `fix/bug-description`
  - `chore/config-task`
- Conventional commit messages:
  - `setup: initial project configuration`
  - `feat: add authentication`
  - `fix: adjust user validation`
- Main branch (`main`) used for stable release
- Features developed in individual branches

---

## 📌 Notes

- This roadmap reflects the current vision and may be updated during development.
- Each phase should be documented via issues or task boards if using tools like GitHub Projects or Jira.


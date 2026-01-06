# Mini Shop Platform (Laravel)

A Laravel-based mini shop platform built to explore modern authentication, online payments, and full-stack application architecture.

This project represents a **single-owner shop** where users can browse and purchase products from an admin (shop owner). Alongside the shop functionality, it also includes **light media-style features**, added intentionally to deepen hands-on experience with Laravel’s ecosystem.

---

## ✨ Purpose

The main goals of this project are to:

- Build a **realistic e-commerce flow** using Laravel
- Experiment with **Auth0 authentication**
- Integrate **online payments** (Stripe, with PayPal planned)
- Practice **Docker-based development workflows**
- Gain deeper familiarity with **Laravel + Tailwind + PostgreSQL**

This is both a **learning project** and a **functional mini shop**.

---

## 🛠 Tech Stack

- **Framework:** Laravel  
- **Styling:** Tailwind CSS  
- **Database:** PostgreSQL (PSQL)  
- **Authentication:** Auth0  
- **Payments:** Stripe (PayPal planned)  
- **Environment:** Docker & Docker Compose  
- **Frontend tooling:** Vite / NPM  

---

## 📦 Features

### Shop
- Single-owner (admin) shop
- Product listing and purchasing
- User checkout flow
- Stripe payment integration

### Users & Auth
- User authentication via Auth0
- Role separation (admin / user)
- Secure session handling

### Media / Learning Features
- Basic media or content-style functionality
- Added to explore Laravel routing, controllers, and views
- Not intended to be a full social platform

---

## 🚀 Getting Started

### Prerequisites
- Docker & Docker Compose
- Node.js & NPM

### Run the Project

```bash
docker compose up
npm run dev

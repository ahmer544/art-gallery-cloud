# 🎨 Cloud-Native Art Gallery Management System

![PHP Version](https://img.shields.io/badge/PHP-7.4%20%7C%208.2-blue)
![Database](https://img.shields.io/badge/Database-MySQL-orange)
![Containerization](https://img.shields.io/badge/Container-Docker-2496ED)
![Deployment](https://img.shields.io/badge/Deployed%20on-Railway-000000)
![Status](https://img.shields.io/badge/Status-Live-brightgreen)

A containerized, full-stack relational web platform for managing digital art galleries, exhibitions, and artwork cataloging. Originally engineered as a monolithic PHP/MySQL application, the project was migrated and re-architected into a micro-containerized cloud execution environment automated via CI/CD.

🌐 **Live Cloud Application:** [art-gallery-cloud-production-5cf3.up.railway.app](https://art-gallery-cloud-production-5cf3.up.railway.app)

---

## 🏛️ System Architecture

The application runs inside an isolated Linux container orchestrated on Railway PaaS, communicating with a managed cloud MySQL instance via dynamic environment variable bindings.

[ Client / Browser ]
│
▼ (HTTP / Port Binding via POSIX $PORT)
[ Railway Edge Proxy ]
│
▼
[ Docker Container (PHP CLI + Router) ]
│
▼ (TCP Socket Connection)
[ Managed Railway MySQL Database ]


---

## ✨ Key Technical Features

* **Dynamic Catalog & Exhibition Management:** Relational data rendering for artwork items, exhibitions, and bidding.
* **Containerized Execution:** Built using a lightweight custom `Dockerfile` enforcing isolated dependency management and portable runtime configuration.
* **Environment-Driven Configuration:** Decoupled database connection layer using dynamic POSIX environment variables (`MYSQLHOST`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLDATABASE`, `MYSQLPORT`).
* **Custom Built-in Request Routing:** Automated request routing (`src/router.php`) supporting clean extensionless URL handling without reliance on monolithic Apache web server directives.
* **Continuous Integration & Deployment (CI/CD):** Zero-downtime, automated deployment pipelines triggered directly on main branch commits.

---

## 🛠️ Technology Stack

* **Backend:** PHP (`PDO` & `mysqli` data access layers)
* **Database:** MySQL (Relational Schema Design & Query Optimization)
* **Containerization:** Docker (Debian/Linux Base Image)
* **Cloud Infrastructure:** Railway PaaS, Edge Routing, POSIX Shell Runtime
* **Frontend:** HTML5, CSS3, JavaScript
* **Version Control:** Git, GitHub Actions CI/CD

---

## 🚀 Local Development Setup

To run this containerized application locally using Docker:

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/ahmer544/art-gallery-cloud.git](https://github.com/ahmer544/art-gallery-cloud.git)
   cd art-gallery-cloud

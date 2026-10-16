# 🎨 Containerized Web Application Architecture & Cloud Migration

![Docker](https://img.shields.io/badge/Containerization-Docker-2496ED?logo=docker)
![Railway](https://img.shields.io/badge/PaaS-Railway-0B0D0E?logo=railway)
![PHP](https://img.shields.io/badge/Backend-PHP-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?logo=mysql)
![Deployment](https://img.shields.io/badge/Status-Live%20Production-brightgreen)

🚀 **Live Production App:** [https://art-gallery-cloud-production-5cf3.up.railway.app](https://art-gallery-cloud-production-5cf3.up.railway.app)

ArtSphere is a full-stack art gallery management and exhibition platform. Originally developed as a monolithic PHP/MySQL web application, it was re-architected and modernized into a lightweight, containerized runtime using Docker and deployed on Railway PaaS with an automated CI/CD pipeline.

---

## 🏗️ Architecture & Cloud Migration Highlights

* **Monolith-to-Cloud Modernization:** Refactored local monolithic codebase into a lightweight Docker container for cloud-native execution.
* **Environment & Security Decoupling:** Separated configuration from source code by refactoring database connection layers (`PDO`/`mysqli`) to bind dynamic POSIX environment variables (`MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLDATABASE`), preventing hardcoded credential leaks.
* **Custom Routing Layer:** Built a lightweight router script (`router.php`) to handle clean URL routing and serve static assets seamlessly within the Apache/Docker container.
* **Automated CI/CD:** Configured automatic build and deployment pipelines triggered on `git push` to the `main` branch via Railway PaaS integration.

---

## 🛠️ Tech Stack & Tools

* **Backend Language:** PHP 8.x
* **Database Management:** MySQL / Relational Schema Design
* **Containerization:** Docker
* **Cloud Platform (PaaS):** Railway
* **Frontend:** HTML5, CSS3, JavaScript
* **Version Control:** Git, GitHub

---


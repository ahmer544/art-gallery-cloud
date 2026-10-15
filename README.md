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

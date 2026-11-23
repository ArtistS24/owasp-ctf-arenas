# BrightBoard — Cross-Site Scripting (XSS) Arena

[![Stack](https://img.shields.io/badge/Stack-PHP_8.2_%2B_SQLite_%2B_JS-8957e5?style=flat-square&labelColor=161b22)](#local-deployment)
[![Coverage](https://img.shields.io/badge/Coverage-OWASP_Top_10-30363d?style=flat-square&labelColor=161b22)](https://owasp.org/www-project-top-ten/)
[![Challenges](https://img.shields.io/badge/Scope-20_Questions_(23_Pages)-30363d?style=flat-square&labelColor=161b22)](#walkthroughs)

**BrightBoard** is a Dockerized PHP/SQLite internal discussion board built from scratch for the Cyberium "Hack The Grid" CTF tournament (`XE107-M03`), covering Reflected, Stored, and DOM-based Cross-Site Scripting and session cookie hijacking.

## Walkthroughs

| Document | Scope & Vectors | Questions | Walkthrough PDF |
| :--- | :--- | :---: | :--- |
| **BrightBoard Master Walkthrough** | Reflected (`?q=`), Stored SQLite thread payloads, DOM `innerHTML` sinks (`?name=`), and `document.cookie` hijacking | 10 | [`BrightBoard-XSS-Walkthrough.pdf`](walkthroughs/BrightBoard-XSS-Walkthrough.pdf) (580 KB · 12p) |
| **Challenge 01 — Reflected XSS** | URL parameter reflection, HTML context breaking, and script execution | 10 | [`c1-reflected-xss.pdf`](walkthroughs/c1-reflected-xss.pdf) (887 KB · 11p) |

## Local Deployment

Archive password: `infected`. Launches the PHP 8.2 + SQLite PDO Docker Compose service on port `8080`:

```bash
unzip -P infected htg-xss.zip
cd htg-xss-final
bash start.sh
# Access portal at http://localhost:8080
```

### Teardown

```bash
bash stop.sh
# Or manually: docker compose down
```

---

[Back to OWASP CTF Arenas](../README.md)

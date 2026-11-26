# CorpNet — SQL Injection Arena

[![Stack](https://img.shields.io/badge/Stack-PHP_8.2_%2B_MySQL_8.0-8957e5?style=flat-square&labelColor=161b22)](#local-deployment)
[![Coverage](https://img.shields.io/badge/Coverage-OWASP_Top_10-30363d?style=flat-square&labelColor=161b22)](https://owasp.org/www-project-top-ten/)
[![Challenges](https://img.shields.io/badge/Scope-10_Questions_(11_Pages)-30363d?style=flat-square&labelColor=161b22)](#walkthrough)

**CorpNet** is a Docker Compose PHP/MySQL corporate directory application built from scratch for the Cyberium "Hack The Grid" CTF tournament (`XE107 - SQL`), covering login authentication bypass (`admin'#`), directory filter bypass (`OR 1=1`), and `UNION SELECT` credential extraction.

## Walkthrough

| Document | Exploitation Phases | Questions | Walkthrough PDF |
| :--- | :--- | :---: | :--- |
| **CorpNet SQLi Lab** | Error probing -> `admin'#` login auth bypass -> `1 OR 1=1` directory dump -> `UNION SELECT` credential &amp; access-code extraction | 10 | [`corpnet-sqli-walkthrough.pdf`](walkthroughs/corpnet-sqli-walkthrough.pdf) (621 KB · 11p) |

## Local Deployment

Launches linked `web` (`php:8.2-apache`) and `db` (`mysql:8.0`) containers on port `8080`:

```bash
cd htg-sqli-final
bash start.sh
# Access portal at http://localhost:8080
```

### Teardown

```bash
bash stop.sh   # Interactive: [1] Pause or [2] Full wipe
```

---

[Back to OWASP CTF Arenas](../README.md)

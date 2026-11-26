# CorpLink — PHP Exploitation Arena

[![Stack](https://img.shields.io/badge/Stack-PHP_8.2_%2B_Apache-8957e5?style=flat-square&labelColor=161b22)](#local-deployment)
[![Coverage](https://img.shields.io/badge/Coverage-OWASP_Top_10-30363d?style=flat-square&labelColor=161b22)](https://owasp.org/www-project-top-ten/)
[![Challenges](https://img.shields.io/badge/Stages-4_Challenges_(37_Qs)-30363d?style=flat-square&labelColor=161b22)](#walkthroughs)

**CorpLink** is a containerized corporate intranet portal built from scratch for the Cyberium "Hack The Grid" CTF tournament (`XE107-M04`), exposing four progressive server-side PHP vulnerabilities.

## Walkthroughs

| Challenge | Attack Vector | Flaw & Impact | Questions | Walkthrough PDF |
| :--- | :--- | :--- | :---: | :--- |
| **Challenge 01** | Unrestricted File Upload | Missing MIME &amp; extension whitelist -> direct PHP webshell upload RCE | 10 | [`c1-file-upload.pdf`](walkthroughs/c1-file-upload.pdf) (1.1 MB · 11p) |
| **Challenge 02** | OS Command Injection | Unsanitized IP parameter concatenated into shell execution (`; && \|`) -> RCE | 10 | [`c2-command-injection.pdf`](walkthroughs/c2-command-injection.pdf) (1.0 MB · 11p) |
| **Challenge 03** | Local File Inclusion (LFI) | Dynamic `include()` path parameter without sanitization -> `../../etc/passwd` disclosure | 9 | [`c3-lfi.pdf`](walkthroughs/c3-lfi.pdf) (866 KB · 10p) |
| **Challenge 04** | Insecure Cookie Handling | Unsigned client-editable role cookie -> admin dashboard privilege escalation | 8 | [`c4-cookie.pdf`](walkthroughs/c4-cookie.pdf) (742 KB · 9p) |

## Local Deployment

Runs in an isolated Docker container (`corplink-lab`) on port `8080`:

```bash
cd htg-php
bash start.sh
# Access portal at http://localhost:8080
```

### Teardown

```bash
bash stop.sh
# Or manually: docker stop corplink-lab && docker rm corplink-lab
```

---

[Back to OWASP CTF Arenas](../README.md)

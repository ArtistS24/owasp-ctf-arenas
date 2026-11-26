# Security Policy

## Supported Versions

| Version | Supported |
| :--- | :--- |
| `main` (Latest) | :white_check_mark: |

## Scope & Intentional Vulnerabilities

All three containerized web applications in this repository (`corplink-php/`, `corpnet-sqli/`, and `brightboard-xss/`) are **deliberately vulnerable educational CTF arenas** built for the Cyberium "Hack The Grid" tournament and intended strictly for isolated local laboratory practice.

- Application-level flaws documented in the walkthrough PDFs (unrestricted file upload, OS command injection, LFI, insecure cookies, SQL injection, and XSS) are intentional by design.
- Arena containers are intended strictly for isolated `localhost` lab deployment. Never bind arena ports to public or untrusted network interfaces.

## Reporting a Vulnerability

If you identify an **unintended** security issue such as host-level isolation weaknesses, container escape vectors, or unsafe helper script behavior in `start.sh` / `stop.sh`:

1. **Do not file a public issue** disclosing container escape primitives or host compromise paths.
2. **Email the report directly** to: **albindeniswork@gmail.com**
3. **Please provide**:
   - Affected arena directory or script
   - Step-by-step reproduction steps or Proof of Concept
   - Impact assessment
   - Recommended remediation or patch (if identified)

### Response Timeline

- **Initial Acknowledgment**: Within 48 hours of receipt.
- **Triage & Reproduction**: Within 5 business days.
- **Remediation & Patch**: Pushed directly to `main` upon verification.

### Safe Harbor

Good-faith security research conducted in isolated local environments and reported via responsible disclosure receives full safe harbor protection.

#!/bin/bash
set -e

cd "$(dirname "$0")"
echo "[*] Starting BrightBoard XSS Lab..."
if docker compose version &>/dev/null; then
    docker compose up -d --build
else
    docker-compose up -d --build
fi
echo "[*] Lab running at http://localhost:8080"

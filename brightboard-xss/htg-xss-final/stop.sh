#!/bin/bash

cd "$(dirname "$0")"
echo "[*] Stopping BrightBoard XSS Lab..."
if docker compose version &>/dev/null; then
    docker compose down
else
    docker-compose down
fi
echo "[*] Lab stopped."

#!/bin/bash
set -e

echo ""
echo "============================================"
echo "  CorpNet Portal - SQL Challenge"
echo "  WebGrid Labs | Cyberium Arena"
echo "============================================"
echo ""

if ! command -v docker &>/dev/null; then
    echo "[-] Docker is required. Please install Docker first."
    exit 1
fi

# Support modern Docker Compose v2 plugin and legacy docker-compose v1
if docker compose version &>/dev/null; then
    COMPOSE_CMD=(docker compose)
elif command -v docker-compose &>/dev/null; then
    COMPOSE_CMD=(docker-compose)
else
    echo "[-] Docker Compose plugin not found."
    exit 1
fi

cd "$(dirname "$0")"
echo "[*] Building and starting CorpNet arena..."
"${COMPOSE_CMD[@]}" down --rmi local 2>/dev/null || true
"${COMPOSE_CMD[@]}" up --build -d

echo "[*] Waiting for http://localhost:8080..."
for _ in $(seq 1 30); do
    if curl -s http://localhost:8080 >/dev/null 2>&1; then
        break
    fi
    sleep 2
done

echo ""
echo "============================================"
echo "  Challenge is ready at http://localhost:8080"
echo "  To stop: bash stop.sh"
echo "============================================"
echo ""

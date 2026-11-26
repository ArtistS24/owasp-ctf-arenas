#!/bin/bash

if docker compose version &>/dev/null; then
    COMPOSE_CMD=(docker compose)
else
    COMPOSE_CMD=(docker-compose)
fi

echo ""
echo "  [1] Pause  -- stop containers and keep database state"
echo "  [2] Wipe   -- stop containers and remove local lab volumes/images"
echo ""
read -rp "  Choose [1/2]: " choice

cd "$(dirname "$0")"

if [ "$choice" = "1" ]; then
    "${COMPOSE_CMD[@]}" stop
    echo "[+] Challenge paused. Run ./start.sh to resume."
elif [ "$choice" = "2" ]; then
    "${COMPOSE_CMD[@]}" down --rmi local --volumes --remove-orphans
    echo "[+] Lab containers and volumes wiped."
else
    echo "[-] Invalid choice. Nothing changed."
fi

#!/bin/bash
CONTAINER="corplink-lab"
docker stop $CONTAINER 2>/dev/null && echo "[+] Stopped." || echo "[!] Not running."
docker rm   $CONTAINER 2>/dev/null

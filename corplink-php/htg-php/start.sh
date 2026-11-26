#!/bin/bash
IMAGE="corplink-lab"
CONTAINER="corplink-lab"
PORT=8080
docker stop $CONTAINER 2>/dev/null
docker rm   $CONTAINER 2>/dev/null
echo "[*] Building image..."
docker build -t $IMAGE .
echo "[*] Starting on port $PORT..."
docker run -d --name $CONTAINER -p $PORT:80 $IMAGE
echo ""
echo "[+] CorpLink PHP Lab running at http://localhost:$PORT"
echo "[*] To stop: bash stop.sh"

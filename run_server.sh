#!/bin/bash

# Auto Run Script for Cricket Jersey Project

echo "🚀 Starting Cricket Jersey Server..."

# Server port
PORT=8000

# Run PHP server in background
php -S localhost:$PORT > /dev/null 2>&1 &

# Wait a bit for PHP to start
sleep 3

# Check if ngrok exists
if [ ! -f "./ngrok" ]; then
    echo "❌ ngrok not found! Please place ngrok in this folder."
    exit 1
fi

echo "🌐 Starting ngrok tunnel on port $PORT..."
./ngrok http $PORT > /dev/null &

# Wait a bit for ngrok to initialize
sleep 5

# Show ngrok public URL
echo "🔗 Your public link:"
curl -s http://127.0.0.1:4040/api/tunnels | grep -o 'https://[0-9a-zA-Z.-]*\.ngrok\.io'

echo 'Step 1: Pulling latest changes from GitHub'

git pull origin main

echo 'Step 2: Rebuild docker images'

docker-compose -f prod.docker-compose.yml build octane

echo 'Step 3: Restarting docker containers'

docker-compose -f prod.docker-compose.yml up -d
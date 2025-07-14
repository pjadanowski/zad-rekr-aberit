# Laravel Project for the Recruitment

## Requirements

- Docker

## Setup

```bash
# Clone repository
git clone https://github.com/pjadanowski/zad-rekr-aberit
cd zad-rekrut-aberit

# Install dependencies
composer install

# Setup environment
cp .env.example .env
./vendor/bin/sail artisan key:generate

# Start services
./vendor/bin/sail up -d

# Setup database
./vendor/bin/sail artisan migrate
```

## Usage

```bash
# Start
./vendor/bin/sail up -d

# Stop
./vendor/bin/sail down

# Run tests
./vendor/bin/sail test
```

Access application at http://localhost

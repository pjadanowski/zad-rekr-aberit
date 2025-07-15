# Laravel Project for the Recruitment

## ✅ Important information after completion of the task:

**The application can still be improved and further developed. It's possible to create additional `services` or `actions`, but I wanted to limit myself to around two hours.

What I would also consider doing is, for example, moving the logic for creating or fetching Products or the Cart from the controller into separate actions, such as `Cart/GetCartAction`. This would also make it easier to implement authorization checks (e.g., whether the user is allowed to retrieve the cart), and the code would be cleaner and more modular.

- I added caching for product categories, since in my opinion these models will change the least frequently. When changes do occur, we simply clear the cache.

I also added pagination for the product list (of course, this is all within the scope of a demo). These features can easily be added to other endpoints as needed


I also added some example tests and cleaned up boilerplate code. 
I'm happy to answer any further questions!

## ✅ Application Setup Instructions
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
./vendor/bin/sail artisan migrate:fresh --seed
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

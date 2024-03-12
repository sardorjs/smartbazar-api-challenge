# SmartBazar API Challenge
![](https://trustbank.uz/upload/iblock/614/Bez-nazvaniya-_2_.png)

## Documentation
`<link>` : <https://docs.google.com/document/d/1p5QwSpLiGMt-oW2jRXm8ciymrlaQauifjogdKV9duHE/edit>

## Requirements
- Docker Desktop
- Composer
- GIT

## Installation & setup (Mac)
#### - Install the project via git clone:
```
git clone https://github.com/sardorjs/smartbazar-api-challenge.git
```

#### - Go to the folder:
```
cd smartbazar-api-challenge
```

#### - Install dependencies via Composer
```
composer update
```

#### - Create .env file from .example
```
cp .env.example .env
```


#### - Laravel Sail. Configure A Shell Alias
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

#### - *Prevent problems with MySQL errors by clearing Docker
```
docker-compose down --volumes
```

#### - Start Sail in Detached Mode
```
sail up -d
```

#### - Generate a new key in .env
```
sail artisan key:generate
```


#### - Build Database and Tables via Migrations
```
sail artisan migrate --seed
```
#### - Installing Vite and the Laravel Plugin
```
sail npm install
```

#### - Run NPM to get all styles of TailwindCSS and etc
```
sail npm run dev
```

## FRONT END

#### Go to Homepage
> [localhost](http://localhost/)


## BACK END

#### Go to Admin Panel
> [localhost/admin](http://localhost/admin)


#### Admin Credentials:
- email: admin@admin.com
- password: admin12345


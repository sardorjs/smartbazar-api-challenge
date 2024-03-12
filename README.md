# SmartBazar API Challenge
![](https://trustbank.uz/upload/iblock/614/Bez-nazvaniya-_2_.png)

## Documentation
`<link>` : <https://docs.google.com/document/d/1p5QwSpLiGMt-oW2jRXm8ciymrlaQauifjogdKV9duHE/edit>

## Requirements
- Docker Desktop
- Composer
- GIT
- Node
- NPM

## Installation & setup
#### 1) Install the project via git clone:
```
git clone https://github.com/sardorjs/smartbazar-api-challenge.git
```

#### 2) Go to the folder:
```
cd smartbazar-api-challenge
```

#### 3) Install dependencies via Composer
```
composer install
```

#### 4) Laravel Sail. Configure A Shell Alias
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

#### 5) Start Sail in Detached Mode
```
sail up -d
```
#### 6) Build Database and Tables via Migrations
```
sail artisan migrate --seed
```

#### 7) Run NPM
```
npm run dev
```

##FRONT END

#### Go to Homepage
> [localhost](http://localhost/)


##BACK END

#### Go to Admin Panel
> [localhost/admin](http://localhost/admin)


#### Admin Credentials:
- email: admin@admin.com
- password: admin12345


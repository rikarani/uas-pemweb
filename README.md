# UAS Pemograman Web

bikin Blog Sederhana

## Nama Kelompok

- a (xxxxxxxxxxx)
- a (xxxxxxxxxxx)
- a (xxxxxxxxxxx)

## Tech Stuck

- Bootstrap
- Laravel

## Pre-requisite

Udah Install [Composer](https://getcomposer.org/) dan [Node.JS](https://nodejs.org/en)

# Ritual

1. clone repo

```
git clone https://github.com/rikarani/belajar-laravel
```

<br>

2. copas ini

```
composer install
```

<br>

3. trus copas ini

```
npm install
```

<br>

4. Copy file .env.example

```
copy .env.example .env
```

<br>

5. Generate App Key

```
php artisan key:generate
```

<br>

6. Jalanin Servernya

```
php artisan serve
```

<br>

7. Jalanin HMR

```
npm run dev
```

# Environment Variables

buka file `.env`

cari baris ini dan sesuaikan dengan konfigurasi database

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

dan tambahkan ini di baris paling terakhir

```
FAKER_LOCALE=id_ID
FILESYSTEM_DISK=public
```


# Contributing

Contributions are always welcome!

1. bikin branch baru
```
git checkout -b <nama_branch>
```

2. ngoding lah

3. kalo udah, commit
```
git add <nama_file>
git commit -m <commit_message>
```

4. trus push
```
git push origin <nama_branch>
```



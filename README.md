# Aplikasi CRUD User & Hobi — Laravel + JWT Authentication

Aplikasi sederhana dengan **Laravel** untuk pengelolaan data User beserta Hobinya

Aplikasi menyediakan **dua antarmuka** dengan operasi CRUD yang sama:

1. **Web UI (Blade)** — form input dan tabel daftar user, tanpa login.
2. **REST API** — endpoint CRUD JSON yang dilindungi JWT Authentication (harus login terlebih dahulu untuk mendapatkan token).

---

## Fitur

### Blade (Web UI)

- Form input untuk menambah dan memperbarui user beserta daftar hobi (hobi diinput sebagai teks yang dipisah oleh koma, seperti `Sepak Bola, Membaca`).
- Tabel daftar user beserta hobinya.
- Button Edit dan Delete pada kolom Aksi di setiap data User.
- Validasi form dan pesan sukses/error (flash message).

### API

- `POST     /api/login` — login, mengembalikan JWT token
- `GET      /api/me` — data user yang sedang login
- `POST     /api/logout` — logout (token invalidate)
- `POST     /api/refresh` — refresh token
- `GET      /api/users` — daftar user beserta hobinya
- `POST     /api/users` — tambah user beserta hobinya
- `GET      /api/users/{id}` — detail user beserta hobinya
- `PUT      /api/users/{id}` — perbarui user beserta hobinya
- `DELETE   /api/users/{id}` — hapus user beserta hobinya

> Semua endpoint user di atas **diharuskan menyertakan JWT token** di header
> `Authorization: Bearer <token>`. Tanpa token yang valid, request akan ditolak
> dengan status `401 Unauthorized`.

---

## Teknologi

- PHP 8.x + Laravel 11.x
- SQLite (bisa disesuaikan menggunakan MySQL / MariaDB atau PostgreSQL)
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) — JWT Authentication
- Blade Template Engine

---

## Instalasi

1. **Clone repository & install dependency**

```bash
   composer install
```

2. **Konfigurasi environment**

```bash
   cp .env.example .env
   php artisan key:generate
```

Sesuaikan koneksi database di file `.env`:

```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=crud_user_hobi
   DB_USERNAME=root
   DB_PASSWORD=
```

3. **Setup JWT**

```bash
   composer require tymon/jwt-auth
   php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
   php artisan jwt:secret
```

Pastikan guard `api` di `config/auth.php` menggunakan driver `jwt`:

```php
   'guards' => [
       'web' => [
           'driver' => 'session',
           'provider' => 'users',
       ],
       'api' => [
           'driver' => 'jwt',
           'provider' => 'users',
       ],
   ],
```

Implementasikan `Tymon\JWTAuth\Contracts\JWTSubject` pada model `App\Models\User` dengan method `getJWTIdentifier()` dan `getJWTCustomClaims()`.

4. **Migrasi database**

```bash
   php artisan migrate
```

5. **Jalankan server**

```bash
   composer run dev
   # bisa juga menggunakan `php run dev`
```

---

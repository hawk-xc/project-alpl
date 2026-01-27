# Proyek Aplikasi Listrik pasca bayar

Aplikasi iki ta gae dinggo nglunasi proyek sing dinggo serkom analisis, aku wis ngawe podo instruksi ndek modul FR02, aplikasi iki ta gae karo pirang-pirang gaman, salah sawijine :
1. Laravel rolas
2. Filament versi papat
3. spatie/laravel-permission versi enem

nek arsitekture aku nganggo arsitektur N-Tier Architecture, ora akeh2 soale apps monolitik og, laravel dinggo backend + dashboard management, mysql dinggo nyimpen data, terus ta develop nganggo docker terus ta dadekne dee sak jaringan, wis ngono ae.

## Carane install
dinggo install perlu kebutuhan antarane :
1. Docker (menowo butuh dinggo container app)
2. PHP 8.3^
3. MySQL latest
4. Composer latest

Kui mau ubo rampe ne, saiki cara ne install :
```bash
composer install
php artisan migrate --seed
php artisan storage:link
```

### Tips ae
Kan nganggo SQL to, dee ki due rule dinggo satpam ora oleh sekerah-kerah nambah function, trigger, lan sak panunggalane, nek menowo enek error koyo ngene iki :
```bash
General error: 1419 You do not have the SUPER privilege and binary logging is enabled (you *might* want to use the less safe log_bin_trust_function_creators variable)
```

sing santai, mlebu o SQL nganggo user root (kamituwo ne user) :
```bash
SET GLOBAL log_bin_trust_function_creators = ON;
```
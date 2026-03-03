
<div align="center">

# 🚗 MoveGrove Backend

[![PHP](https://img.shields.io/badge/PHP-8.1+-blueviolet?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-006699?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Redis](https://img.shields.io/badge/Redis-Cache-green?style=flat&logo=redis&logoColor=white)](https://redis.io/)
[![License:MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=flat)](LICENSE)

**🎓 مشروع جامعي - تطبيق مشاركة رحلات | Backend API متكامل**
</div>

## 📋 نظرة عامة
**MoveGrove** - نظام مشاركة رحلات احترافي (قادتِ فريق 3 أشخاص):
- سائقين ← رحلات ← ركاب (Relationships معقدة)
- Real-time notifications + Advanced filtering
- مشروع جامعي متكامل ✅

## 🛠️ التقنيات
|الطبقة|التقنية|الميزات|
|-|-|-|
|Framework|Laravel 10+|Eloquent/Middleware/Queues|
|Auth|Sanctum + OTP|Tokens + Roles|
|DB|MySQL|Indexes + Complex Relations|
|Real-time|Pusher + Redis|Notifications + Cache|
|APIs|RESTful|Resources + Rate Limiting|

## 🚀 التثبيت
```bash
git clone https://github.com/lana-lababidy/move-grove-backend.git
cd move-grove-backend
composer install
cp .env.example .env
# عدّل .env:
# DB_DATABASE=movo
# DB_USERNAME=root
# DB_PASSWORD=
php artisan key:generate
php artisan migrate --seed
php artisan serve
API: http://127.0.0.1:8000/api

📖 الـ API الرئيسية
Method	Endpoint	الوصف	الصلاحية
POST	/api/register	تسجيل (OTP)	Public
GET	/api/rides	قائمة رحلات + فلترة	Public
POST	/api/rides	إنشاء رحلة	Sop
GET	/api/rides/{id}	تفاصيل رحلة	All
POST	/api/rides/{id}/join	الانضمام لرحلة	Passenger
فلترة متقدمة:

text
GET /api/rides?location=دمشق&date=2026-03-05&price_max=5000
✨ الميزات المتقدمة
text
✅ Real-time Notifications (Pusher)
✅ OTP Authentication  
✅ Advanced Search/Filter/Sort
✅ File Upload + Image Optimization
✅ Complex Relationships (Users↔Rides↔Passengers)
✅ API Resources + Error Handling
✅ Rate Limiting + Pagination
✅ Roles: Driver/Passenger/Admin
🧪 Postman Collection
📥 MoveGrove.postman_collection.json

Run in Postman

📁 الهيكل
text
move-grove-backend/
├── app/
│   ├── Models/Ride.php
│   ├── Models/User.php (Driver/Passenger)
│   ├── Http/Middleware/Auth
├── Jobs/ (Queues)
├── routes/api.php
└── database/migrations/
📊 قاعدة البيانات
text
Users (Driver/Passenger/Admin) → Rides → Passengers (Many-to-Many)
                     ↓
              Notifications (Real-time)

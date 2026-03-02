# MoveGrove Backend

**مشروع جامعي: تطبيق مشاركة رحلات - Backend API**  
قادت فريق 3 أشخاص لبناء نظام يربط السائقين بالركاب.

## 🛠️ التقنيات
- Laravel 10+ (MVC, Eloquent)
- MySQL (Users ↔ Rides)  
- RESTful APIs (Sanctum Auth)
- PHP 8+, Postman

##  الميزات
-  تسجيل/دخول مع tokens
-  CRUD رحلات + فلترة
-  تقييم
-  Error handling

##  التشغيل
```bash
git clone https://github.com/lana-lababidy/move-grove-backend.git
composer install
cp .env.example .env

#  الـ.env:
DB_DATABASE=movo
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate
php artisan migrate
php artisan serve


## APIs للاختبار
- POST /api/register
- GET /api/rides

  ## Postman Collection
✅ **الـCollection جاهزة للاختبار**  
**Download**: [move-grove.postman_collection.json](move-grove.postman_collection.json)


المطورة: لانا لبابيدي

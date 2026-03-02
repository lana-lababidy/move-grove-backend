# MoveGrove Backend

**مشروع جامعي: تطبيق مشاركة رحلات - Backend API**  
قادت فريق 3 أشخاص لبناء نظام متكامل.

## 🛠️ التقنيات
- Laravel 10+ (Eloquent, Middleware, Queues)
- MySQL (Complex relationships + indexes)  
- RESTful APIs + Sanctum Auth
- Redis (Caching), Pusher (Real-time)

## ✨ الميزات الكاملة  
- ✅ Authentication (Sanctum tokens + OTP)
- ✅ Authorization (Roles: driver/passenger/admin)  
- ✅ CRUD مع Validation متقدمة
- ✅ Advanced Filtering (location, date, price)
- ✅ Relationships (Users↔Rides↔Passengers)
- ✅ Real-time Notifications (Queues+Pusher)
- ✅ File Upload + Image Optimization
- ✅ Search + Pagination + Sorting
- ✅ API Resources + Error Handling
- ✅ Rate Limiting + Testing

## 🚀 التشغيل
```bash
git clone https://github.com/lana-lababidy/move-grove-backend.git
composer install
cp .env.example .env

# الـ.env:
DB_DATABASE=movo
DB_USERNAME=root  
DB_PASSWORD=

php artisan key:generate
php artisan migrate --seed
php artisan serve


## APIs للاختبار
- POST /api/register
- GET /api/rides

  ## Postman Collection
✅ **الـCollection جاهزة للاختبار**  
**Download**: [move-grove.postman_collection.json](move-grove.postman_collection.json)


المطورة: لانا لبابيدي

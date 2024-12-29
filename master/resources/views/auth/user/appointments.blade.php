@include("auth.user.partials.header")

<style>
    /* تنسيق حاوية النموذج */
    .form-container {
        background-color:rgb(49, 62, 66);
        color: white;
        padding: 30px;
        border-radius: 15px;
        max-width: 600px;
        margin: 30px auto;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .form-container h3 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        color: #fff;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        color: #ecf0f1;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #34495e;
        background-color: #34495e;
        color: white;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        background-color: #2c3e50;
        border-color: #3498db;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.3);
    }

    .form-group button {
        background-color: #fda417;
        color: white;
        padding: 14px;
        width: 100%;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #2980b9;
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* تحسين المظهر في الشاشات الصغيرة */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px;
            padding: 20px;
        }
    }

    /* تنسيق قسم المشاريع */
    .projects-section {
        margin-top: 40px;
    }

    .project-category {
        margin-bottom: 40px;
    }

    .project-category h4 {
        color: #fff;
        text-align: center;
        margin-bottom: 20px;
        font-size: 22px;
    }

    .project-images {
        display: flex;
        justify-content: space-between; /* لضبط المسافة بين الصور */
        flex-wrap: wrap;
        gap: 20px; /* تحديد المسافة بين الصور */
        margin-top: 20px;
    }

    .project-images img {
        width: 32%; /* تحديد عرض ثابت للصور ليكون 3 صور في كل صف */
        object-fit: cover; /* الحفاظ على تناسق الصورة */
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="images">
    @include("auth.user.partials.navbar")
</div>

<!-- عرض الرسائل (النجاح والخطأ) -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="form-container">
    <h3>إجراء الحجز</h3>
    <form action="{{ route('ap.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="service_type" class="text-right">نوع الخدمة:</label>
            <select id="service_type" name="service_type" required>
                <option value="">اختر نوع الخدمة</option>
                <option value="cutting">القص</option>
                <option value="coring">الكور</option>
            </select>
        </div>

        <div class="form-group">
            <label for="time" class="text-right">وقت الحجز:</label>
            <input type="datetime-local" id="time" name="time" dir="rtl" required class="form-control">
        </div>

        <div class="form-group">
            <label for="location" class="text-right">الموقع</label>
            <input type="text" id="location" name="location" rows="4" placeholder="الموقع">
        </div>

        <div class="form-group">
            <label for="description" class="text-right">وصف إضافي:</label>
            <textarea id="description" name="description" rows="4" placeholder="اكتب أي تفاصيل إضافية هنا..."></textarea>
        </div>

        

        <div class="form-group">
            <button type="submit">إرسال الحجز</button>
        </div>
    </form>
</div>

<!-- قسم مشاريع كور -->

<!-- قسم مشاريع قص -->

@include("auth.user.partials.footer")
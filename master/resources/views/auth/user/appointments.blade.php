@include("auth.user.partials.header")



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
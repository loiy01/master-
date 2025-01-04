@include("auth.user.partials.header")

<div class="images">
    @include("auth.user.partials.navbar")
</div>

<div class="profile-container" style="direction: rtl; text-align: right; padding: 20px;">
    <div class="profile-card" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9; max-width: 600px; margin: 0 auto;">
        <!-- Left Section -->
        <div class="profile-left" style="margin-bottom: 20px;">
            <h3 style="margin: 0;">{{ Auth::user()->name }}</h3>
            <p style="color: #555;">{{ Auth::user()->email }}</p>
        </div>

        <!-- Right Section -->
        <div class="profile-right">
            <h3 style="margin-bottom: 15px;">المعلومات الشخصية</h3>
            <div class="profile-detail" style="margin-bottom: 10px;">
                <span style="font-weight: bold;">رقم الهاتف:</span>
                <span>{{ Auth::user()->phone ?? 'لم يتم التحديد' }}</span>
            </div>
            <div class="profile-detail" style="margin-bottom: 10px;">
                <span style="font-weight: bold;">العنوان:</span>
                <span>{{ Auth::user()->address ?? 'لم يتم التحديد' }}</span>
            </div>
            <div class="edit-profile" style="margin-top: 20px;">
                <a href="{{ route('profile.edit') }}">
                    <button style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">تعديل الملف الشخصي</button>
                </a>
            </div>

            <!-- New Button for Orders -->
            <div class="new-order-button" style="margin-top: 20px;">
                <a href="{{ route('ord') }}">
                    <button style="background-color: #f6a120; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">عرض الطلبات</button>
                </a>
            </div>
        </div>
    </div>
</div>

@include("auth.user.partials.footer")

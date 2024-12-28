@include("auth.user.partials.header")

<!-- Include Navbar -->
<div class="images">
    @include("auth.user.partials.navbar")
</div>

<div class="profile-container">
    <div class="profile-card">
        <!-- Left Section -->
        <div class="profile-left">
            <h3>{{ Auth::user()->name }}</h3>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <!-- Right Section -->
        <div class="profile-right">
            <h3>المعلومات الشخصية</h3>
            <div class="profile-detail">
                <span>رقم الهاتف:</span>
                <span>{{ Auth::user()->phone ?? 'لم يتم التحديد' }}</span>
            </div>
            <div class="profile-detail">
                <span>العنوان:</span>
                <span>{{ Auth::user()->address ?? 'لم يتم التحديد' }}</span>
            </div>
            <div class="edit-profile">
                <a href="{{ route('profile.edit') }}">
                    <button>تعديل الملف الشخصي</button>
                </a>
            </div>
        </div>
    </div>
</div>

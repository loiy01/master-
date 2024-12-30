<style>
    .map-responsive iframe {
    width: 100%;
    height: 400px; /* تعديل الارتفاع */
}
</style>
@include("auth.user.partials.header")

<div class="images">
@include("auth.user.partials.navbar")
</div>

<div class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="contact_taital text-right">تواصل معنا</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="contact_section_2">
            <div class="row">
                <div class="col-md-6">
                    <!-- عرض رسالة النجاح إذا كانت موجودة -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('con') }}" method="POST">
                        @csrf
                        <div class="mail_section_1">
                            <input type="text" class="mail_text" placeholder="الاسم" name="Name" required>
                            <input type="email" class="mail_text" placeholder="البريد الالكتروني" name="Email" required>
                            <textarea class="massage-bt" placeholder="الرسالة" rows="5" id="comment" name="Message" required></textarea>
                            <button type="submit" class="btn btn-success w-100 py-3">ارسال</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d13535.621595716559!2d35.86781699492653!3d31.990579864068792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDU5JzI2LjAiTiAzNcKwNTAnNTcuNyJF!5e0!3m2!1sar!2sjo!4v1734894375176!5m2!1sar!2sjo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("auth.user.partials.footer")

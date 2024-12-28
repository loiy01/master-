@include("auth.user.partials.header")
<div class="images">
    @include("auth.user.partials.navbar")
</div>
<div>
    <form action="{{ route('man') }}" method="POST">
        @csrf
        <label for="manufacturer_name"> الشركة المصنعة</label>
        <input type="text" name="manufacturer_name" placeholder="اسم الشركة ">
        <label for="description">الجهز+وصف المشكلة</label>
        <input type="text" name="description">
        <button type="submit">ارسال</button>


    </form>
</div>
@include("auth.user.partials.footer")
@include("auth.user.partials.header")
<style>
   .container_main {
    position: relative;
    width: 100%;
    height: 250px; /* يمكنك تعديل القيمة حسب الحاجة */
    overflow: hidden;
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* يحافظ على نسب الصورة ويغطي المساحة بالكامل */
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5); /* إذا أردت إضافة تأثير تظليل */
}

.text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}
.container_main {
    position: relative;
    width: 100%;
    height: 250px; /* يمكنك تعديل القيمة حسب الحاجة */
    overflow: hidden;
    direction: rtl; /* جعل الاتجاه من اليمين لليسار */
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* يحافظ على نسب الصورة ويغطي المساحة بالكامل دون تشويه */
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5); /* تأثير التظليل عند التمرير على الصورة */
}

.text {
    position: absolute;
    top: 50%;
    right: 50%; /* تعديل الوضع إلى الجهة اليمنى */
    transform: translate(50%, -50%);
    color: white;
}

.project_main {
    text-align: right; /* محاذاة النص لليمين */
}

.work_text {
    font-size: 20px;
    font-weight: bold;
    color: white;
}

.some_text {
    font-size: 16px;
}


</style>
<div class="header_section">

   @include("auth.user.partials.navbar")
   <div class="banner_section layout_padding">
      <div dir="rtl" class="text-right">
         <div class="row">
            <div class="col-sm-12">
               <div class="banner_taital_main">
                  <h1 class="banner_taital">مؤسسة الاختراق الفني</h1>
                  <p class="banner_text">نقدم خدماتنا على مستوى المملكة كاملة وتتمتاز خدماتنا بوجود فريق عمل مميز وأجهزة
                     حديثة</p>
                  <div class="btn_main" style="display: flex; gap: 10px; justify-content: flex-start;">
                     <div class="started_text active"><a href={{route('contact')}}>تواصل معنا</a></div>
                     <div class="started_text"><a href="#">من نحن</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<div class="services_section layout_padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="services_taital">خدماتنا</h1>
            <p class="services_text_1"></p>
         </div>
      </div>
      <div class="services_section_2">


         <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- Card: فتحات كور -->
            <div class="col">
               <div class="card border-0 shadow text-center">
                  <div class="card-img-top p-3">
                     <img src="{{ asset('assets/images/h1.png') }}" alt="فتحات كور" class="img-fluid rounded"
                        style="width: 100%; height: 180px; object-fit: cover;">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title mb-3">فتحات كور</h5>
                     <a href="{{ route('ap') }}" class="btn btn-outline-primary w-100 py-2">احجز الآن</a>
                  </div>
               </div>
            </div>

            <!-- Card: قص باطون -->
            <div class="col">
               <div class="card border-0 shadow text-center">
                  <div class="card-img-top p-3">
                     <img src="{{ asset('assets/images/cut.jpg') }}" alt="قص باطون" class="img-fluid rounded"
                        style="width: 100%; height: 180px; object-fit: cover;">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title mb-3">قص باطون</h5>
                     <a href="{{ route('ap') }}" class="btn btn-outline-primary w-100 py-2">احجز الآن</a>
                  </div>
               </div>
            </div>

            <!-- Card: العدد -->
            <div class="col">
               <div class="card border-0 shadow text-center">
                  <div class="card-img-top p-3">
                     <img src="{{ asset('assets/images/to.png') }}" alt="العدد" class="img-fluid rounded"
                        style="width: 100%; height: 180px; object-fit: cover;">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title mb-3">العدد</h5>
                     <a href="{{ route('prod') }}" class="btn btn-outline-primary w-100 py-2">زيارة المتجر</a>
                  </div>
               </div>
            </div>

            <!-- Card: صيانة -->
            <div class="col">
               <div class="card border-0 shadow text-center">
                  <div class="card-img-top p-3">
                     <img src="{{ asset('assets/images/table.jpg') }}" alt="صيانة" class="img-fluid rounded"
                        style="width: 100%; height: 180px; object-fit: cover;">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title mb-3">صيانة</h5>
                     <!-- Button that triggers the modal -->
                     <a href="#" class="btn btn-outline-primary w-100 py-2" data-bs-toggle="modal"
                        data-bs-target="#maintenanceModal">طلب صيانة</a>
                  </div>
               </div>
            </div>

            <!-- Modal Structure -->
            <div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" style="max-width: 500px; width: 100%;">
                  <div class="modal-content"
                     style="background-color: rgb(44, 62, 80); color: white; border-radius: 10px;">
                     <div class="modal-header" style="border-bottom: 2px solid rgba(255, 255, 255, 0.2);">
                        <h5 class="modal-title" id="maintenanceModalLabel" style="font-size: 1.5rem;color: white;">طلب
                           صيانة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                           style="color: white;"></button>
                     </div>
                     <div class="modal-body" style="padding: 30px;">
                        <!-- Form inside the modal -->
                        <form action="{{ route('man') }}" method="POST">
                           @csrf
                           <div class="mb-3">
                              <label for="manufacturer_name" class="form-label" style="font-size: 1.1rem;">الشركة
                                 المصنعة</label>
                              <input type="text" class="form-control" name="manufacturer_name" placeholder="اسم الشركة"
                                 required
                                 style="background-color: #34495e; color: white; border: 1px solid #2c3e50; font-size: 1.1rem;">
                           </div>
                           <div class="mb-3">
                              <label for="description" class="form-label text-right"
                                 style="font-size: 1.1rem;">الجهاز+وصف المشكلة</label>
                              <input type="text" class="form-control" name="description" required
                                 style="background-color: #34495e; color: white; border: 1px solid #2c3e50; font-size: 1.1rem;">
                           </div>
                           <button type="submit" class="btn btn-primary w-100"
                              style="background-color: #16a085; border-color: #1abc9c; font-size: 1.2rem;">ارسال</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>


         </div>




      </div>

   </div>
</div>
<!-- services section end -->
<!-- about sectuion start -->

<!-- about sectuion end -->
<!-- projects section start -->
<div class="projects_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="projects_taital text-center">مشاريعنا</h1>
            <div class="nav-tabs-navigation">
               <div class="nav-tabs-wrapper">
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="projects_section_2 layout_padding">
      <div class="container">
         <div class="pets_section">
            <div class="pets_section_2">
               <div id="main_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src={{asset('assets/images/newcore2.png')}} alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">كور</h2>
                                 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src={{asset('assets/images/newcore4.png')}}  alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">كور</h2>
                                 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src={{asset('assets/images/newcore3.png')}}  alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">كور</h2>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src={{asset('assets/images/newcut1.png')}}  alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">قص</h2>
                                 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src={{asset('assets/images/newcut2.png')}}  alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">قص</h2>
                                 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="container_main">
                                 <img src="images/img-3.png" alt="" class="image">
                                 <div class="overlay">
                                    <div class="text">
                                       <h4 class="some_text"><i class="fa fa-link" aria-hidden="true"></i></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="project_main">
                                 <h2 class="work_text">Home Work</h2>
                                 <p class="dummy_text">alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable. If you are going to use</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- projects section end -->
<!-- testimonial section start -->
<div class="testimonial_section layout_padding">
   <div class="container">
      <div id="costum_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="testimonial_taital">Testimonial</h1>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text">Molik <span style="float: right;"><img
                                 src="images/quick-icon.png"></span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text"><img src="images/quick-icon.png"> <span
                              style="float: right;">jeaanson</span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="testimonial_taital">Testimonial</h1>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text">Molik <span style="float: right;"><img
                                 src="images/quick-icon.png"></span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text"><img src="images/quick-icon.png"> <span
                              style="float: right;">jeaanson</span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="testimonial_taital">Testimonial</h1>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text">Molik <span style="float: right;"><img
                                 src="images/quick-icon.png"></span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                     <div class="testimonial_section_2">
                        <h2 class="client_name_text"><img src="images/quick-icon.png"> <span
                              style="float: right;">jeaanson</span></h2>
                        <p class="textimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                           eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                           dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#costum_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#costum_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>
<!-- testimonial section end -->

@include("auth.user.partials.footer")
<!-- Bootstrap CSS -->

<!-- Bootstrap JS and Popper (required for Bootstrap modals) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
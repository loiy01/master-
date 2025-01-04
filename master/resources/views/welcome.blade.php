@include("auth.user.partials.header")
<style>
/* التصميم الأساسي */
.banner_section {
    padding: 20px;
    background: url("../images/banner.jpg") no-repeat center center/cover; /* إذا كانت هناك خلفية */
    text-align: center;
    color: #fff;
}

.banner_taital_main {
    padding: 20px;
}

.banner_taital {
    font-size: 2.5rem; /* الحجم الافتراضي */
    margin-bottom: 15px;
}

.banner_text {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn_main {
    display: flex;
    gap: 10px;
    justify-content: center; /* تغيير المحاذاة الافتراضية */
}

.started_text a {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1rem;
}

.started_text.active a {
    background-color: #007bff;
}

/* ميديا كويريز للشاشات الصغيرة جدًا */
@media (max-width: 575.98px) {
    .banner_taital {
        font-size: 1.8rem;
    }

    .banner_text {
        font-size: 1rem;
    }

    .btn_main {
        flex-direction: column; /* ترتيب الأزرار عموديًا */
        gap: 5px;
    }

    .started_text a {
        font-size: 0.9rem;
        padding: 8px 15px;
    }
}

/* ميديا كويريز للشاشات المتوسطة */
@media (max-width: 768px) {
    .banner_taital {
        font-size: 2rem;
    }

    .banner_text {
        font-size: 1.1rem;
    }

    .btn_main {
        gap: 8px;
    }

    .started_text a {
        font-size: 0.95rem;
        padding: 9px 18px;
    }
}

/* ميديا كويريز للشاشات الكبيرة */
@media (min-width: 769px) {
    .btn_main {
        justify-content: flex-start; /* المحاذاة إلى اليسار */
    }
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
            <div class="col">
               <div class="card border-0 shadow text-center">
                  <div class="card-img-top p-3">
                     <img src="{{ asset('assets/images/table.jpg') }}" alt="صيانة" class="img-fluid rounded"
                        style="width: 100%; height: 180px; object-fit: cover;">
                  </div>
                  <div class="card-body">
                     <h5 class="card-title mb-3">صيانة</h5>
                     <a href="#" class="btn btn-outline-primary w-100 py-2" data-bs-toggle="modal"
                        data-bs-target="#maintenanceModal">طلب صيانة</a>
                  </div>
               </div>
            </div>
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
                              style="background-color: #fda417; border-color: #fda417; font-size: 1.2rem;">ارسال</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
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
<div class="testimonial_section" style="background-color: rgb(236, 239, 241); padding: 40px 0;">
   <div class="container">
      <h1 class="testimonial_taital text-center" style="color: rgb(49, 62, 66); font-weight: bold; margin-bottom: 30px;">آراء العملاء</h1>
      <div id="testimonial_slider" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="testimonial_item text-center" style="padding: 20px; margin-bottom: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                  <h2 class="client_name_text text-right" style="color: rgb(49, 62, 66); font-weight: bold; margin-bottom: 10px;">أحمد</h2>
                  <p class="testimonial_text" style="color: #555;">خدمة القص كانت ممتازة! المعدات كانت حديثة والدقة في العمل رائعة، الفتحات كانت نظيفة وسريعة. أشكر الفريق على احترافيتهم.</p>
               </div>
            </div>
            <div class="carousel-item">
               <div class="testimonial_item text-center" style="padding: 20px; margin-bottom: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                  <h2 class="client_name_text text-right" style="color: rgb(49, 62, 66); font-weight: bold; margin-bottom: 10px;">يوسف</h2>
                  <p class="testimonial_text" style="color: #555;">خدمات رائعة جدا.</p>
               </div>
            </div>
            <div class="carousel-item">
               <div class="testimonial_item text-center" style="padding: 20px; margin-bottom: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                  <h2 class="client_name_text text-right" style="color: rgb(49, 62, 66); font-weight: bold; margin-bottom: 10px;">خليل</h2>
                  <p class="testimonial_text" style="color: #555;">لقد استفدنا كثيراً من خدمة صيانة المعدات. الفريق كان على قدر عالي من الكفاءة، وتم صيانة جميع المعدات بشكل مثالي.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include("auth.user.partials.footer")
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
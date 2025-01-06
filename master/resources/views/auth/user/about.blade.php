  
     @include("auth.user.partials.header")
     
      <!-- header top section start -->
      <!-- header section start -->
      <div class="images">
    @include("auth.user.partials.navbar")
</div>
      <!-- header section end -->
      <!-- about sectuion start -->
      <div class="about_section layout_padding text-right">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="about_taital" style="margin-top: 30%;" >من نحن</h1>
                  <p class="about_text">نحن متخصصون في تقديم خدمات متكاملة للمعدات الصناعية، من بيع وشراء إلى صيانة احترافية تلبي أعلى المعايير. كما نوفر حلولًا دقيقة للقص وفتح الكور باستخدام أحدث التقنيات لضمان تلبية احتياجات عملائنا بكفاءة ودقة. رؤيتنا هي أن نكون الشريك الأول في تطوير المشاريع من خلال خدماتنا المبتكرة والموثوقة. </p>
                  
               </div>
               <div class="col-md-6" style="display: flex; justify-content: center;">
                  <div class="about_img">
                     <div class="video_bt">
                        <img class="mgrp mr-5" src="{{ asset('assets/images/store2.JPEG') }}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about sectuion end -->
      <!-- footer section start -->
      @include("auth.user.partials.footer")
      <!-- footer section end -->
      <!-- copyright section start -->
      

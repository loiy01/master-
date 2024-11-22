@include('admin.partials.header-admin')

<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            @include('admin.partials.siadebar')
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14" style="padding-bottom: 10px;">Add New Category</h1>

                                    <form class="dash-address-manipulation" enctype="multipart/form-data" method="POST" action="{{ route('admin.categories.store') }}">
                                        @csrf
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="category_name">Category Name *</label>
                                                <input style="" class="input-text input-text--primary-style" name="name" step="0.01" type="text" id="category_name" placeholder="Category Name" required>
                                            </div>
                                        </div>
                                        
                                        <div class="gl-inline">
                                            <div class="gl-inline" style='display: flex; justify-content: center; padding-left: 10px; padding-bottom: 10px;'>
                                                <div class="upload-container">
                                                    <div id="drop-area" class="drop-area">
                                                        <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                        <input type="file" id="fileElem" name="image" accept="image/*" style="display:none" required>
                                                    </div>
                                                
                                                    <!-- Preview and confirmation buttons -->
                                                    <div id="preview-container" class="preview-container">
                                                        <img id="preview-image" alt="Image Preview">
                                                        <div>
                                                            <a class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
@include('admin.partials.footer')

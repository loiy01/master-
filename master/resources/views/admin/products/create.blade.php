@include("admin.partials.header-admin")

<!--====== App Content ======-->
<div class="app-content">
    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-12">
                        @include('admin.partials.siadebar')
                    </div>
                    <!-- Main Content -->
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14" style="padding-bottom: 10px;">Add New Product</h1>
                                <form class="dash-address-manipulation" enctype="multipart/form-data" method="POST" action="{{ route('admin.products.store') }}">
                                    @csrf
                                    <!-- Product Name -->
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="name">Product Name *</label>
                                        <input class="input-text input-text--primary-style" id="name" name="name" type="text" placeholder="Product Name" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="description">Description *</label>
                                        <textarea class="input-text input-text--primary-style" id="description" name="description" placeholder="Product Description" required></textarea>
                                    </div>

                                    <!-- Price -->
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="price">Price *</label>
                                        <input class="input-text input-text--primary-style" id="price" name="price" type="number" step="0.01" placeholder="Price" required>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="quantity">Quantity *</label>
                                        <input class="input-text input-text--primary-style" id="quantity" name="quantity" type="number" placeholder="Quantity" required>
                                    </div>

                                    <!-- Category -->
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="category_id">Category *</label>
                                        <select class="select-box select-box--primary-style" id="category_id" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="gl-inline" style="display: flex; justify-content: center; padding-left: 10px; padding-bottom: 10px;">
                                        <div class="upload-container">
                                            <div id="drop-area" class="drop-area">
                                                <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                <input type="file" id="fileElem" name="image" accept="image/*" style="display: none;" required>
                                            </div>
                                            <!-- Preview -->
                                            <div id="preview-container" class="preview-container">
                                                <img id="preview-image" alt="Image Preview">
                                                <div>
                                                    <a class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - App Content ======-->

<!--====== Main Footer ======-->
@include("admin.partials.footer")

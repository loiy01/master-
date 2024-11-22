@include("admin.partials.header-admin")

<!--====== End - Main Header ======-->

<!--====== App Content ======-->
<div class="app-content">
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
                                    <h1 class="dash__h1 u-s-m-b-14">Edit Product</h1>

                                    <span class="dash__text u-s-m-b-30"></span>
                                    <form id="productForm" enctype="multipart/form-data" class="dash-address-manipulation" method="POST" action="{{ route('admin.products.update', $product->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="product-name">Product Name *</label>
                                                <input class="input-text input-text--primary-style" type="text" name="name" id="product-name" value="{{ $product->name }}" required>
                                            </div>

                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="categories">Categories *</label>
                                                <select name="category_id" class="select-box select-box--primary-style" id="categories" required>
                                                    <option value="">Choose Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" 
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="gl-label" for="product_description">Product Description *</label>
                                            <textarea class="input-text--primary-style" style="width: 100%; padding:10px" id="product_description" name="description" rows="4" required>{{ $product->description }}</textarea>
                                        </div>

                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="price">Price *</label>
                                                <input class="input-text input-text--primary-style" name="price" step="0.01" type="number" id="product_price" value="{{ $product->price }}" required>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="quantity">Quantity *</label>
                                                <input class="input-text input-text--primary-style" name="quantity" type="number" id="product_quantity" value="{{ $product->quantity }}" required>
                                            </div>
                                            
                                        </div>

                                        <div class="gl-inline" style="display: flex; justify-content:center; padding-left:10px; padding-bottom:10px;">
                                            <div class="upload-container">
                                                <div id="drop-area" class="drop-area" style="display:none;">
                                                    <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                    <input type="file" id="fileElem" name="image" accept="image/*" style="display:none">
                                                </div>
                                        
                                                <div id="preview-container" class="preview-container" style="display:block;">
                                                    <img id="preview-image" src="{{ asset('storage/' . $product->image) }}" >
                                                    <div>
                                                        <a class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</a>
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
@include("admin.partials.footer")


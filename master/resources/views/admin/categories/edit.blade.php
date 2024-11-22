@include("admin.partials.header-admin")

<!-- Section for Edit Category -->
<div class="app-content">

    <!-- Section 2 -->
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar for Dashboard Links -->
                        <div class="col-lg-3 col-md-12">
                            @include('admin.partials.siadebar')
                        </div>

                        <!-- Main Content Area for Category Edit Form -->
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14" style="padding-bottom: 10px;">Edit Category</h1>

                                    <form class="dash-address-manipulation" method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.update', $category->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="category_name">Category Name *</label>
                                                <input class="input-text input-text--primary-style" name="name" type="text" id="category_name" placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                                <input class="input-text input-text--primary-style" name="category_id" type="text" id="category_id" style="display:none" value="{{ $category->id }}">
                                            </div>
                                        </div>

                                        <div class="gl-inline" style="display: flex; justify-content: center; padding-left: 10px; padding-bottom: 10px;">
                                            <div class="upload-container">
                                                <div id="drop-area" class="drop-area" style="display:none;">
                                                    <p>Drag & Drop your images here or <span id="browse">Browse</span></p>
                                                    <input type="file" id="fileElem" name="image" accept="image/*" style="display:none">
                                                </div>
                                                <div id="preview-container" class="preview-container" style="display:block;">
                                                    @if($category->image)
                                                        <img id="preview-image" src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="u-img-fluid">
                                                        <div>
                                                            <button type="button" class="btn-cancel btn btn--e-brand-b-2" id="cancel-btn">Delete Image</button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn--e-brand-b-2">SAVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.partials.footer")

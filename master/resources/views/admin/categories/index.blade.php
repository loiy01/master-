@include("admin.partials.header-admin")

<!-- Section for Categories -->
<div class="app-content">
    <!-- Section 2 -->
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar for Dashboard Links -->

                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            @include('admin.partials.siadebar')


                            <!--====== End - Dashboard Features ======-->
                        </div>

                        <!-- Main Content Area for Category Table -->
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="dash__address-header">
                                        <h1 class="dash__h1">Categories</h1>

                                        <a class="dash__custom-link btn--e-brand-b-2"
                                            href="{{ route('admin.categories.create') }}">
                                            <i class="fas fa-plus u-s-m-r-8"></i>
                                            <span>Add New Category</span>
                                        </a>
                                    </div>
                                    <div class="search-bar" style="margin-bottom: 20px;">
                                        <form method="GET" action="{{ route('admin.categories.index') }}">
                                            <input type="text" name="search" placeholder="Search categories..."
                                                value="{{ request('search') }}"
                                                style="padding: 8px; border-radius: 6px; border: 1px solid #ddd; width: 300px;">
                                            <button type="submit"
                                                style="padding: 8px 16px; background-color: rgb(250, 68, 0); color: white; border: none; border-radius: 6px;">
                                                Search
                                            </button>
                                        </form>
                                    </div>

                                </div>

                                <div class="dash__table">
                                    <table class="dash__table">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Category Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th>{{ $category->name }}</th>
                                                    <th>
                                                        <div class="description__img-wrap">
                                                            <img class="u-img-fluid"
                                                                style="border-radius: 10000px;width: 90px;height: 90px;"
                                                                src="{{ asset('storage/' . $category->image) }}"
                                                                alt="Category Image">
                                                        </div>
                                                    </th>
                                                    <th style="display: flex;">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                            class="address-book-edit btn--e-transparent-platinum-b-2"
                                                            style="margin-right:4px;">
                                                            Edit
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form
                                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                type="submit">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination" style="display: flex; justify-content: center;">
                                        {{$categories->links('pagination::bootstrap-4')}}
                                    </div>
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
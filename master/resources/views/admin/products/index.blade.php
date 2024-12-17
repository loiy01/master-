@include("admin.partials.header-admin")

<div class="app-content">
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            @include('admin.partials.siadebar')
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Products</h1>
                                    <a class="btn btn--e-brand-b-2 u-s-m-b-20" href="{{ route('admin.products.create') }}">
                                        <i class="fas fa-plus u-s-m-r-8"></i>Add New Product
                                    </a>

                                    <div class="table-responsive">
                                    

                                        <table class="dash__table">
                                            <thead>
                                                <tr>
                                                    <th class="image-column">Image</th>
                                                    <th>Name</th>
                                                    <th class="description-column">Description</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Category</th>
                                                    <th class="actions-column">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td class="image-column">
                                                            @if ($product->image)
                                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                                            @else
                                                                <span>No Image</span>
                                                            @endif
                                                        </td>
                                                        <td class="name-column">{{ $product->name }}</td>
                                                        <td class="description-column">{{ $product->description }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td class="actions-column">
                                                            <div class="action-buttons">
                                                                <a class="btn btn--e-brand-b-2" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn--e-danger-b-2" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

<style>
.table-responsive {
    width: 100%;
}

.dash__table {
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
}

.dash__table th, 
.dash__table td {
    padding: 12px;
    text-align: left;
    vertical-align: middle;
    word-wrap: break-word;
}

/* تحديد عرض الأعمدة */
.image-column {
    width: 80px;
}

.name-column {
    width: 15%;
}

.description-column {
    width: 25%;
}

.actions-column {
    width: 180px;
}

/* تنسيق الصورة */
.product-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}

/* تنسيق الأزرار */
.action-buttons {
    display: flex;
    gap: 8px;
}

.action-buttons form {
    margin: 0;
}

.btn {
    padding: 6px 12px;
    font-size: 14px;
}

/* تعديل النصوص الطويلة */
.description-column {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* تحسين المظهر العام */
/* .dash__table tr:nth-child(even) {
    background-color: #f9f9f9;
} */

.dash__table tr:hover {
    background-color: #f5f5f5;
}

.dash__table th {
    background-color: #f4f4f4;
    font-weight: bold;
}
</style>

@include("admin.partials.footer")
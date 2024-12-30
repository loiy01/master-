<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index(Request $request)
{
    $query = Category::query();

    // تحقق إذا كان هناك طلب بحث
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // استخدام pagination لجلب النتائج
    $categories = $query->paginate(5); // يعرض 10 عناصر في كل صفحة

    return view('admin.categories.index', compact('categories'));
}

    // عرض صفحة إضافة فئة جديدة
    public function create()
    {
        return view('admin.categories.create');
    }

    // تخزين الفئة الجديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        Category::create([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    // عرض صفحة تعديل الفئة
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // تحديث الفئة
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category->name = $validated['name'];

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($category->image) {
                \Storage::delete('public/' . $category->image);
            }
            // تخزين الصورة الجديدة
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    // حذف الفئة وجميع المنتجات المرتبطة بها
   
    public function destroy($id)
{
    $category = Category::findOrFail($id);

    // حذف المنتجات المرتبطة بالفئة
    $category->products()->delete();

    // حذف الفئة نفسها
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Category and all related products removed successfully.');
}

}

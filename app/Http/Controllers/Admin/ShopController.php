<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Crawls;
use App\Models\Keywords;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Lesson;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Variationimage;
use App\Models\Category;
use App\Models\Product_categories;
use App\Models\Album;
use App\Models\Review;
use App\Models\Photos;
use App\Models\Brand;
use App\Models\Sub_category;
use Auth;
use App\Models\Faq;
use App\Models\ShopImage;
use App\Models\Size;
use App\Models\Color;
use App\Models\Vendor;
use App\Models\Variation;
use App\Models\Products;
use App\Models\Product_images;
use App\Models\Merchandise;
use App\Traits\MyTrait;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    use MyTrait;
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function get_sub_cat(Request $request)
    {
        $sub_cat  = Sub_category::where('is_active', 1)->where('category_id', $request->cat_id)->get();
        $param = array();
        if (sizeof($sub_cat) > 0) {
            $param = ['status' => 1, 'data' => $sub_cat];
            return response()->json($param);
        } else {
            $param = ['status' => 0];
            return response()->json($param);
        }
    }

    /******************Product Listing**********************/
    public function products_listing()
    {
        $products = Products::with('get_categories')->orderByDesc('is_featured')->get();
        return view('admin.products-management.list')->with('title', 'Products Management')->with(compact('products'));
    }

    public function add_products()
    {
        $categories = Product_categories::where('is_active', 1)->get();
        return view('admin.products-management.add')->with('title', 'Add Product')->with(compact('categories'));
    }

    public function create_products(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'short_desc' => 'required',
            'img_path' => 'required|mimes:jpeg,jpg,png,gif,webp',
        ]);


        $slug = $this->slug_maker($request->input('title'), Products::class);
        $product = Products::create([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'category_id' =>  $request['category_id'],
            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
            'short_desc' =>  $request['short_desc'],
            'slug' => $slug,
        ]);


        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $product->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $product->id)->update(
                [
                    'img_path' => asset($main_image),
                ]
            );
        }

        if (request()->hasFile('product_images')) {
            $paths = $request->file('product_images');
            foreach ($paths as $index  => $path) {
                $file_name =  $request->file('product_images')[$index];
                $image =   $request->file('product_images')[$index]->store('Uploads/Product/other-images/' . rand() . rand(10, 1000), 'public');
                $image_path = Product_images::create(
                    [
                        'product_id' => $product->id,
                        'img_path' => asset($image),

                    ]
                );
            }
        }
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Added Successfuly!!');
    }

    public function delete_other_img($id)
    {
        $delete_img = Product_images::where('id', $id)->delete();
        return back()->with('notify_success', 'Image Deleted!');
    }

    public function edit_products($id)
    {
        $product = Products::where('id', $id)->first();
        $categories = Product_categories::where('is_active', 1)->get();
        $other_images = Product_images::where('product_id', $id)->get();
        $data = compact('categories', 'product', 'other_images');
        return view('admin.products-management.edit')->with('title', 'Edit Product')
            ->with($data);
    }

    public function saveproducts(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'short_desc' => 'required',
        ]);
        $slug = $this->slug_maker($request->input('title'), Products::class);

        $product = Products::where('id', $request->id)->update([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'slug' => $slug,
            'category_id' =>  $request['category_id'],
            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
            'short_desc' =>  $request['short_desc'],
        ]);

        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $request->id)->update(
                [
                    'img_path' => asset($main_image),
                ]
            );
        }
        if (request()->hasFile('product_images')) {
            $paths = $request->file('product_images');
            foreach ($paths as $index  => $path) {
                $file_name =  $request->file('product_images')[$index];
                $image =   $request->file('product_images')[$index]->store('Uploads/Product/other-images/' . rand() . rand(10, 1000), 'public');
                $image_path = Product_images::create(
                    [
                        'product_id' => $request->id,
                        'img_path' => asset($image),

                    ]
                );
            }
        }
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Added Successfuly!!');
    }

    public function suspend_products($id)
    {
        $products = Products::where('id', $id)->first();
        if ($products->is_active == 0) {
            $products->is_active = 1;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success', 'Product Activated Successfuly!!');
        } else {
            $products->is_active = 0;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success', 'Product Suspended Successfuly!!');
        }
    }

    public function delete_products($id)
    {
        $products = Products::where('id', $id)->delete();
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Deleted Successfuly!!');
    }

    public function merchandise_listing()
    {
        $merchandise = Merchandise::with('merchandiseBelongsToCategory')->get();
        return view('admin.merchandise-management.list')->with('title', 'Merchandise Management')->with('merchandise_menu', true)->with(compact('merchandise'));
    }

    public function add_merchandise()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('admin.merchandise-management.add')->with('title', 'Add Merchandise')->with(compact('categories'))->with('merchandise_menu', true);
    }

    public function create_merchandise(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:merchandise',
            'price' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'info_desc' => 'required',
            'width' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'depth' => 'required|numeric|min:1',
            'weight_pound' => 'required|numeric',
            'weight_kg' => 'required|numeric',
            'category' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png,gif,webp',
            'other_image' => 'required',
            'other_image.*' => 'image|mimes:jpeg,png,jpg,gif,webp'
        ]);
        if ($validator->passes()) {
            $merchandise = Merchandise::create([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'long_desc' =>  $request['long_desc'],
                'info_desc' =>  $request['info_desc'],
                'width' =>  $request['width'],
                'height' =>  $request['height'],
                'depth' =>  $request['depth'],
                'weight_pound' =>  $request['weight_pound'],
                'weight_kg' =>  $request['weight_kg'],
                'category_id' =>  $request['category'],
            ]);
            if (request()->hasFile('main_image')) {
                $main_image = request()->file('main_image')->store('Uploads/merchandise/main_image/' . $merchandise->id . rand() . rand(10, 100), 'public');
                $image = ShopImage::create(
                    [
                        'cat_type' => 'merchandise',
                        'img_path' => $main_image,
                        'ref_id' => $merchandise->id,
                        'img_type' => 1
                    ]
                );
            }
            if (request()->hasFile('other_image')) {
                $documents = $request->file('other_image');
                foreach ($documents as $index  => $p) {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();
                    $image =   $request->file('other_image')[$index]->store('Uploads/merchandise/other_image/' . rand() . rand(10, 1000), 'public');
                    $other_image = ShopImage::create(
                        [
                            'cat_type' => 'merchandise',
                            'img_path' => $image,
                            'ref_id' => $merchandise->id,
                            'img_type' => 2
                        ]
                    );
                }
            }
            return response()->json(['msg' => 'Merchandise Created Successfully!', 'status' => 1]);
        } else {
            return response()->json(['error' => $validator->errors()->all(), 'status' => 2]);
        }
    }

    public function edit_merchandise($slug)
    {
        $merchandise = Merchandise::where('slug', $slug)->with(['merchandiseBelongsToCategory', 'merchandiseHasMainImage', 'merchandiseHasMultiImages'])->first();
        $categories = Category::where('is_active', 1)->get();
        return view('admin.merchandise-management.edit')->with('title', 'Edit Merchandise')->with('merchandise_menu', true)->with(compact('merchandise', 'categories'));
    }

    public function savemerchandise(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required',
            'price' => 'required',
            'qty' => 'required|numeric|min:1',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'info_desc' => 'required',
            'width' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'depth' => 'required|numeric|min:1',
            'weight_pound' => 'required|numeric',
            'weight_kg' => 'required|numeric',
            'category' => 'required',
        ]);
        if ($validator->passes()) {
            $check_slug = Merchandise::where('slug', $request->slug)->where('id', '!=', $request->id)->first();
            if ($check_slug) {
                return response()->json(['error' => 'Unique Slug Is Required!', 'status' => 2]);
            }
            $merchandise = Merchandise::where('id', $request->id)->update([
                'name' =>  $request['name'],
                'slug' =>  $request['slug'],
                'price' => $request['price'],
                'qty' =>  $request['qty'],
                'short_desc' =>  $request['short_desc'],
                'long_desc' =>  $request['long_desc'],
                'info_desc' =>  $request['info_desc'],
                'width' =>  $request['width'],
                'height' =>  $request['height'],
                'depth' =>  $request['depth'],
                'weight_pound' =>  $request['weight_pound'],
                'weight_kg' =>  $request['weight_kg'],
                'category_id' =>  $request['category'],
            ]);

            if (request()->hasFile('main_image')) {
                $validator = Validator::make($request->all(), [
                    'main_image' => 'required|mimes:jpeg,jpg,png,gif,webp',
                ]);
                $main_image = request()->file('main_image')->store('Uploads/merchandise/main_image/' . $request->id . rand() . rand(10, 100), 'public');
                $delete_img = ShopImage::where('cat_type', 'merchandise')->where('ref_id', $request->id)->where('img_type', 1)->delete();
                $image = ShopImage::create(
                    [
                        'cat_type' => 'merchandise',
                        'img_path' => $main_image,
                        'ref_id' => $request->id,
                        'img_type' => 1
                    ]
                );
            }
            if (request()->hasFile('other_image')) {
                $validator = Validator::make($request->all(), [
                    'other_image' => 'required',
                    'other_image.*' => 'image|mimes:jpeg,png,jpg'
                ]);
                $documents = $request->file('other_image');
                $delete_img = ShopImage::where('cat_type', 'merchandise')->where('ref_id', $request->id)->where('img_type', 2)->delete();
                foreach ($documents as $index  => $p) {
                    $file_name =  $request->file('other_image')[$index]->getClientOriginalName();
                    $image =   $request->file('other_image')[$index]->store('Uploads/merchandise/other_image/' . rand() . rand(10, 1000), 'public');
                    $other_image = ShopImage::create(
                        [
                            'cat_type' => 'merchandise',
                            'img_path' => $image,
                            'ref_id' => $request->id,
                            'img_type' => 2
                        ]
                    );
                }
            }
            return response()->json(['msg' => 'Merchandise Updated Successfully!', 'status' => 1]);
        } else {
            return response()->json(['error' => $validator->errors()->all(), 'status' => 2]);
        }
    }

    public function suspend_merchandise($id)
    {
        $merchandise = Merchandise::where('id', $id)->first();
        if ($merchandise->is_active == 0) {
            $merchandise->is_active = 1;
            $merchandise->save();
            return redirect()->route('admin.merchandise_listing')->with('notify_success', 'Merchandise Activated Successfuly!!');
        } else {
            $merchandise->is_active = 0;
            $merchandise->save();
            return redirect()->route('admin.merchandise_listing')->with('notify_success', 'Merchandise Suspended Successfuly!!');
        }
    }

    public function delete_merchandise($id)
    {
        $merchandise = Merchandise::where('id', $id)->with(['merchandiseHasMainImage', 'merchandiseHasMultiImages'])->delete();
        return redirect()->route('admin.merchandise_listing')->with('notify_success', 'Merchandise Deleted Successfuly!!');
    }

    /**************Color***********************/
    public function suspend_color($id)
    {
        $color = Color::where('id', $id)->first();
        if ($color->is_active == 0) {
            $color->is_active = 1;
            $color->save();
            return redirect()->route('admin.color_listing')->with('notify_success', 'Color Activated Successfuly!!');
        } else {
            $color->is_active = 0;
            $color->save();
            return redirect()->route('admin.color_listing')->with('notify_success', 'Color Suspended Successfuly!!');
        }
    }

    public function delete_color($id)
    {
        $color = Color::where('id', $id)->delete();
        return redirect()->route('admin.color_listing')->with('notify_success', 'Color Deleted Successfuly!!');
    }

    public function color_listing()
    {
        $color = Color::with('productBelongsToColor')->latest()->get();
        return view('admin.color-management.list')->with('title', 'Color Management')->with('color_menu', true)->with(compact('color'));
    }

    public function add_color()
    {
        $products = Products::where('is_active', 1)->get();
        $categories = Category::where('is_active', 1)->get();
        return view('admin.color-management.add')->with('title', 'Add Flavor')->with('flavor_menu', true)->with(compact('products', 'categories'));
    }

    public function create_color(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'qty' => 'required',

        ]);

        $color = Color::create([
            'product_id' => $request['product_id'],
            'name' => $request['name'],
            'code' => $request['code'],
            'price' => $request['price'],
            'qty' => $request['qty'],

        ]);
        return redirect()->route('admin.color_listing')->with('notify_success', 'Color Created Successfuly!!');
    }

    public function edit_color($id)
    {

        $color = Color::where('id', $id)->with('productBelongsToColor')->first();
        return view('admin.color-management.edit')->with('title', 'Edit Color')->with('color_menu', true)->with(compact('color'));
    }

    public function savecolor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $flavor = Color::where('id', $request->id)->update([
            'name' => $request['name'],
            'code' => $request['code'],
            'price' => $request['price'],
            'qty' => $request['qty'],
        ]);

        return redirect()->route('admin.color_listing')->with('notify_success', 'Flavor Updated Successfuly!!');
    }
    /**************Color ENd*************************/

    public function suspend_size($id)
    {
        $size = Size::where('id', $id)->first();
        if ($size->is_active == 0) {
            $size->is_active = 1;
            $size->save();
            return redirect()->route('admin.size_listing')->with('notify_success', 'Size Activated Successfuly!!');
        } else {
            $size->is_active = 0;
            $size->save();
            return redirect()->route('admin.size_listing')->with('notify_success', 'Size Suspended Successfuly!!');
        }
    }

    public function delete_size($id)
    {
        $size = Size::where('id', $id)->delete();
        return redirect()->route('admin.size_listing')->with('notify_success', 'Size Deleted Successfuly!!');
    }

    public function size_listing()
    {
        $size = Size::latest()->get();
        // $faq_type = FaqType::where('is_active',1)->get();
        return view('admin.size-management.list')->with('title', 'Size Management')->with('size_menu', true)->with(compact('size'));
    }

    public function add_size()
    {
        // $faq_type = FaqType::where('is_active',1)->get();
        return view('admin.size-management.add')->with('title', 'Add Size')->with('size_menu', true);
    }

    public function create_size(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $size = Size::create([
            'name' => $request['name'],
            'code' => $request['code'],
        ]);

        return redirect()->route('admin.size_listing')->with('notify_success', 'Size Created Successfuly!!');
    }

    public function edit_size($id)
    {
        $size = Size::where('id', $id)->first();
        return view('admin.size-management.edit')->with('title', 'Edit Size')->with('size_menu', true)->with(compact('size'));
    }

    public function savesize(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $size = Size::where('id', $request->id)->update([
            'name' => $request['name'],
            'code' => $request['code'],
        ]);

        return redirect()->route('admin.size_listing')->with('notify_success', 'Size Updated Successfuly!!');
    }

    public function suspend_variation($id)
    {
        $variation = Variation::where('id', $id)->first();
        if ($variation->is_active == 0) {
            $variation->is_active = 1;
            $variation->save();
            return redirect()->route('admin.variation_listing')->with('notify_success', 'Variation Activated Successfuly!!');
        } else {
            $variation->is_active = 0;
            $variation->save();
            return redirect()->route('admin.variation_listing')->with('notify_success', 'Variation Suspended Successfuly!!');
        }
    }

    public function delete_variation($id)
    {
        $variation = Variation::where('id', $id)->delete();
        return redirect()->route('admin.variation_listing')->with('notify_success', 'Variation Deleted Successfuly!!');
    }

    public function variation_listing()
    {
        $variation = Variation::with('variationBelongsToColor', 'variationBelongsToProduct', 'variationBelongsToSize')->latest()->get();
        return view('admin.variation-management.list')->with('title', 'Variation Management')->with('variation_menu', true)->with(compact('variation'));
    }

    public function add_variation()
    {
        $products = Products::where('is_active', 1)->latest()->get();
        $color = Flavor::where('is_active', 1)->latest()->get();
        $size = Size::where('is_active', 1)->latest()->get();
        return view('admin.variation-management.add')->with('title', 'Add Variation')->with('variation_menu', true)->with(compact('products', 'color', 'size'));
    }

    public function create_variation(Request $request)
    {
        $request->validate(
            [
                'product' => 'required',
                'color' => 'required',
                'size_id' => 'required|unique:variation,size_id',
            ],
            [
                'size_id.unique' => 'The size has already been taken',
            ]
        );

        $variation = Variation::create([
            'product_id' => $request['product'],
            'color_id' => $request['color'],
            'size_id' => $request['size_id'],
            'stock' => $request['stock'],
        ]);
        return redirect()->route('admin.variation_listing')->with('notify_success', 'Variation Created Successfuly!!');
    }

    public function edit_variation($id)
    {
        $variation = Variation::where('id', $id)->with('variationBelongsToColor', 'variationBelongsToProduct', 'variationBelongsToSize')->first();
        $products = Products::where('is_active', 1)->latest()->get();
        $color = Flavor::where('is_active', 1)->latest()->get();
        $size = Size::where('is_active', 1)->latest()->get();
        $id = $id;
        return view('admin.variation-management.edit')->with('title', 'Edit Variation')->with('variation_menu', true)->with(compact('variation', 'products', 'color', 'size', 'id'));
    }

    public function savevariation(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'color' => 'required',
            'size_id' => 'required',
        ]);

        $variation = Variation::where('id', $request->id)->update([
            'product_id' => $request['product'],
            'color_id' => $request['color'],
            'size_id' => $request['size_id'],
            'stock' => $request['stock'],
        ]);

        return redirect()->route('admin.variation_listing')->with('notify_success', 'Variation Updated Successfuly!!');
    }

    public function suspend_variationimage($id)
    {
        $variationimage = Variationimage::where('id', $id)->first();
        if ($variationimage->is_active == 0) {
            $variationimage->is_active = 1;
            $variationimage->save();
            return redirect()->route('admin.variationimage_listing')->with('notify_success', 'Variation Image Activated Successfuly!!');
        } else {
            $variationimage->is_active = 0;
            $variationimage->save();
            return redirect()->route('admin.variationimage_listing')->with('notify_success', 'Variation Image Suspended Successfuly!!');
        }
    }

    public function delete_variationimage($id)
    {
        $variationimage = Variationimage::where('id', $id)->with('variationimageBelongsToColor', 'variationimageBelongsToProduct', 'variationimageBelongsToSize')->delete();
        return redirect()->route('admin.variationimage_listing')->with('notify_success', 'Variation Image Deleted Successfuly!!');
    }

    public function variationimage_listing()
    {
        $variationimage = Variationimage::with('variationimageBelongsToColor', 'variationimageBelongsToProduct', 'variationimageBelongsToSize')->latest()->get();
        return view('admin.variation-image-management.list')->with('title', 'Variation Image Management')->with('variationimage_menu', true)->with(compact('variationimage'));
    }

    public function add_variationimage()
    {
        $products = Products::where('is_active', 1)->latest()->get();
        $color = Flavor::where('is_active', 1)->latest()->get();
        $size = Size::where('is_active', 1)->latest()->get();
        return view('admin.variation-image-management.add')->with('title', 'Add Variation Image')->with('variation_menu', true)->with(compact('products', 'color', 'size'));
    }

    public function create_variationimage(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'color' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png,gif,webp',
        ]);

        $variationimage = Variationimage::create([
            'product_id' => $request['product'],
            'color_id' => $request['color'],
        ]);

        if (request()->hasFile('main_image')) {
            $main_image = request()->file('main_image')->store('Uploads/variationimage/image/' . $variationimage->id . rand() . rand(10, 100), 'public');
            $image = Variationimage::where('id', $variationimage->id)->update(
                [
                    'img_path' => $main_image,
                ]
            );
        }
        return redirect()->route('admin.variationimage_listing')->with('notify_success', 'Variation Image Created Successfuly!!');
    }

    public function edit_variationimage($id)
    {
        $variationimage = Variationimage::where('id', $id)->first();
        $products = Products::where('is_active', 1)->latest()->get();
        $color = Flavor::where('is_active', 1)->latest()->get();
        $size = Size::where('is_active', 1)->latest()->get();
        return view('admin.variation-image-management.edit')->with('title', 'Edit Variation Image')->with('variationimage_menu', true)->with(compact('variationimage', 'products', 'color', 'size'));
    }

    public function savevariationimage(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'color' => 'required',
        ]);

        $variation = Variationimage::where('id', $request->id)->update([
            'product_id' => $request['product'],
            'color_id' => $request['color'],
        ]);

        if (request()->hasFile('main_image')) {
            $main_image = request()->file('main_image')->store('Uploads/variationimage/image/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Variationimage::where('id', $request->id)->update(
                [
                    'img_path' => $main_image,
                ]
            );
        }
        return redirect()->route('admin.variationimage_listing')->with('notify_success', 'Variation Updated Successfuly!!');
    }

    public function get_color(Request $request)
    {
        $color  = variationimage::where('is_active', 1)->where('product_id', $request->product_id)->with('variationimageBelongsToColor', 'variationimageBelongsToProduct', 'variationimageBelongsToSize')->get();

        $param = array();
        if (sizeof($color) > 0) {
            $param = ['status' => 1, 'data' => $color];
            return response()->json($param);
        } else {
            $param = ['status' => 0];
            return response()->json($param);
        }
    }
}

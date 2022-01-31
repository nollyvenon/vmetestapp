<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Products;
use Livewire\WithFileUploads;
use App\Models\ProductImage;
class AddProduct extends Component
{
    use WithFileUploads;
    
    public $images = [];
    
    public $name, $barcode, $price, $brand;

    protected $rules = [
        'name' => 'required|min:6',
        'barcode' => 'required|min:3',
        'price' =>'required'
    ];

    public function render()
    {
        return view('livewire.add-product');
    }

    public function store() {
        $this->validate();
        $product  = new Products();
        $product->name = $this->name;
        $product->barcode  = $this->barcode;
        $product->brand = $this->brand;
        $product->price = $this->price;
        $product->image_url = 'null';
        $product->date_added = date('Y-m-d');
        $product->save();
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);
        
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images');
            $image =  new ProductImage;
            $image->url = $this->images[$key];
            $image->product_id = $product->id;
            $image->save();
        }
    
        $this->images = json_encode($this->images);

        

        return redirect()->to('/');

    }
}

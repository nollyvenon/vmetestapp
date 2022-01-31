<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductMail;

class Product extends Component
{  
    use WithPagination;

    public $search = '';
    
    public $showEditModal = false;

    public Products $editing;

    public $sortField = 'id';

    public $minValue = 0;
    public $maxValue = 10000000;

    public $sortDirection ='asc';

    public $brand = '';


    protected $listeners = ['delete'];

    protected $rules = [
        'editing.name' => 'required',
        'editing.barcode'=>'required',
        'editing.brand'=> 'required',
        'editing.price'=>'required',
        'editing.image_url'=>'required'
    ];

    

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {   
        if($this->maxValue === '') {
            $this->maxValue =1000000;
        }
        sleep(1);
        if(!$this->brand) {
            return view('livewire.product', [
                'products' => Products::where('name', 'like', '%'.$this->search.'%')
                ->where('price', '>=', $this->minValue)
                ->where('price', '<=', $this->maxValue)
                ->orderBy($this->sortField, $this->sortDirection)            
                ->paginate(10),
            ]);
        } else {
            return view('livewire.product', [
                'products' => Products::where('name', 'like', '%'.$this->search.'%')
                ->where('price', '>=', $this->minValue)
                ->where('price', '<=', $this->maxValue)
                ->where('brand', $this->brand)
                ->orderBy($this->sortField, $this->sortDirection)  
                ->paginate(10),
            ]);       
               
        }
    }

    public function sortBy($field) {

        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';   
        }

        $this->sortField = $field;
    }
    public function edit(Products $product) {

        $this->editing = $product;

        $this->showEditModal = true;
    }

    public function deleteConfirm($id) {
        $product = Products::find($id);
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover the product!',
            'id' =>$id
        ]);
    }

    public function save() {
        $this->validate();
        
        $this->editing->save();

        $this->showEditModal =false;
    }
    public function delete($id) {
        $product = Products::find($id);
        $product->delete();
    }

    // public function updatedMinValue($value) {
    //     $this->minValue= $value;
    // }


    // send email
    public function sendEmail(){ 
        // dd($this->search);
       $products = Products::where('name', 'like', '%'.$this->search.'%')->get();
        $fileName = 'products.csv';
        $columnNames = [
            'ID',
            'Name',
            'Barcode',
            'Brand',
            'Price',
            'Image URL',
            'Date Added'
        ];
    
        $file = fopen($fileName, 'w');
        fputcsv($file, $columnNames);

        foreach ($products as $product) {
            fputcsv($file, [
                    $product->id,
                    $product->name,
                    $product->barcode,
                    $product->brand,
                    $product->price,
                    $product->image_url,
                    $product->date_added
            ]);
        }

        fclose($file);
        $details = [
            'title' => 'Products List',
            'body' => 'It is notified to staff member to check the attached product list',
            'file'=>  $fileName
        ];
       
        Mail::to('send_to_email@gmail.com')->send(new ProductMail($details));
       
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Email Sent', 
            'text' => 'Email has been sent successfully.'
        ]);

    }
}

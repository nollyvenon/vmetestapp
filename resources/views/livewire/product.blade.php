<div>
    <div class="sm:px-6 w-full">
        
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="lg:flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Products</p>
                <div class="md:flex items-center mt-6 lg:mt-0">
                    <div class="flex items-center">
                    <form method="Post" action="{!! url('import') !!}" id="CsvForm" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="fileInput" id='fileInput' style="display:none">
                            <button id="CsvBtn" class="focus:ring-2 text-white focus:ring-offset-2 focus:ring-indigo-600  px-2.5 py-2.5 mr-3 bg-indigo-700 hover:bg-indigo-600 rounded focus:outline-none " role="button" aria-label="display tabs">
                            IMPORT CSV  <!-- <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/table_4-svg1.svg" alt="display"> -->
                            </button>
                        </form>
                    
                        <div tabindex="0" class="focus:outline-none focus:ring-2 focus:ring-gray-600  flex items-center pl-3 bg-white border w-64 rounded border-gray-200">
                            <input wire:model="search" type="text" class="py-2.5 pl-1 w-full focus:outline-none text-sm rounded text-gray-600 placeholder-gray-500" placeholder="Search" />
                        </div>
                    </div>
                    <div class="flex items-center mt-4 md:mt-0 md:ml-3 lg:ml-0">
                        
                        <button onclick="window.location='{{ route('addProduct') }}'" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <p class="text-sm font-medium leading-none text-white">Add Products</p>
                        </button>
                    </div>
                    <div class="flex items-center mt-4 md:mt-0 md:ml-3 lg:ml-0">
                        
                        <button wire:click="sendEmail()" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <p class="text-sm font-medium leading-none text-white">Send Mail</p>
                        </button>
                    </div>
                   
                </div>
                
            </div>
            
        </div>
        <div class="sm:px-6 w-full p-4 pb-4 flex items-end ">
        <div class=" w-full flex items-end justify-end">
        <div class="w-7/12" >
                <div tabindex="0" class="focus:outline-none focus:ring-2 focus:ring-gray-600  flex items-center bg-white border w-64 rounded border-gray-200">
                        <label for="Name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100 p-2">Brand</label>
                        <input wire:model="brand" type="text" class="py-2.5 pl-1 w-full focus:outline-none text-sm rounded text-gray-600 placeholder-gray-500" placeholder="Brand" />
                </div>
        </div>
            <div class="w-1/5 " >
                <div tabindex="0" class="focus:outline-none focus:ring-2 focus:ring-gray-600  flex items-center bg-white border w-64 rounded border-gray-200">
                        <label for="Name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100  p-2">Min  Price</label>
                        <input wire:model="minValue" type="number" class="py-2.5 pl-1 w-full focus:outline-none text-sm rounded text-gray-600 placeholder-gray-500" placeholder="Min Price" />
                </div>
                
            </div>
            <div class="w-1/5 " >
                <div tabindex="0" class="focus:outline-none focus:ring-2 focus:ring-gray-600  flex items-center  bg-white border w-64 rounded border-gray-200">
                    <label for="Name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100 p-2">Max Price</label>
                    
                    <input wire:model="maxValue" type="number" class="py-2.5 pl-1 w-full focus:outline-none text-sm rounded text-gray-600 placeholder-gray-500" placeholder="Max Price" />
                </div>
                
            </div>
        </div>
    </div>
        <div class="bg-white px-4 md:px-8 xl:px-10 overflow-x-auto">
            <table class="w-full whitespace-nowrap" wire:loading.class.delay='opacity-50'>
                <thead>
                    <tr tabindex="0" class="focus:outline-none h-20 w-full text-sm leading-none text-gray-600">
                        <th class="font-normal text-left pl-4" sortable  wire:click="sortBy('id')" :direction="$sortField === 'id' ? $sortDirection : null">#</th>
                        <th class="font-normal text-left pl-11" wire:click="sortBy('name')" >Name</th>
                        <th class="font-normal text-left pl-10" wire:click="sortBy('barcode')">Barcode</th>
                        <th class="font-normal text-left" wire:click="sortBy('brand')">Brand</th>
                        <th class="font-normal text-left" wire:click="sortBy('price')">Price</th>
                        <th class="font-normal text-left" wire:click="sortBy('image_url')">Image URL</th>
                        <th class="font-normal text-left" wire:click="sortBy('date_added')">Date Added</th>
                        <th class="font-normal text-left w-32">Actions</th>
                    </tr>
                </thead>
                <tbody class="w-full">
                    @forelse ($products as $product)
                        <tr tabindex="0" class="focus:outline-none  h-20 text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white hover:bg-gray-100">
                            <td class="pl-4">{{$product->id}}</td>
                            <td class="pl-11">
                                <div class="flex items-center">
                                {{$product->name}}
                                </div>
                            </td>
                            <td>
                                <p class="mr-16 pl-10">  {{$product->barcode}}</p>
                            </td>
                            <td>
                                <p class="mr-16">{{$product->brand}}</p>
                            </td>
                            <td>
                                <p class="mr-16">{{$product->price}}</p>
                            </td>
                            <td>
                                <div class="w-20 h-6 flex items-center mr-16 justify-center bg-blue-50 rounded-full">
                                {{$product->image_url}}
                                </div>
                            </td>
                            <td>
                                <div class="w-20 h-6 flex items-center mr-16 justify-center bg-blue-50 rounded-full">
                                {{$product->date_added}}
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center">
                                    <button wire:click="edit({{$product}})" class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 bg-gray-100 mr-3 hover:bg-gray-200 py-2.5 px-5 rounded text-sm leading-3 text-gray-600 focus:outline-none">Edit</button>
                                    <button  wire:click="deleteConfirm({{$product->id}}) class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 bg-gray-100 mr-5 hover:bg-gray-200 py-2.5 px-5 rounded text-sm leading-3 text-gray-600 focus:outline-none">Delete</button>
                                    <div class="relative px-5 pt-2">
                                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 focus:outline-none" onclick="dropdownFunction(this)" role="button" aria-label="option">
                                            <img class="dropbtn" onclick="dropdownFunction(this)" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/table_4-svg4.svg" alt="Search">
                                        </button>
                                        <div class="dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 hidden">
                                            <div tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <p>Edit</p>
                                            </div>
                                            <button wire:click="deleteProduct(4)" tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                                <p>Delete</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr tabindex="0" class="focus:outline-none  h-20 text-sm leading-none text-gray-700 border-b border-t border-gray-200 bg-white hover:bg-gray-100">
                        <td colspan="8">
                            <div class="flex justify-center items-center">
                                
                                <span class="font-medium py-8 text-cool-gray-400 text-xl "> No record Found</span>
                            </div>
                        </td> 
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    <form wire:submit.prevent='save'>

        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">   Edit Product</x-slot>
            <x-slot name="content">
                    <div class="w-11/12 mx-auto">
                        <div class="container mx-auto">
                            <div class="my-8 mx-auto xl:w-full xl:mx-0">
                                <div class="xl:flex lg:flex md:flex flex-wrap justify-between">
                                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                        <label for="Name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Name</label>
                                        <input wire:model="editing.name" tabindex="0" aria-label="Enter Product name" type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" />
                                          @error('editing.name') <span class="error text-red-800">{{ $message }}</span> @enderror

                                    </div>
                                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                        <label for="barcode" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Barcode</label>
                                        <input  wire:model="editing.barcode" tabindex="0" aria-label="Enter Barcode Number" type="text" id="barcode" name="barcode" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" />
                                        @error('editing.barcode') <span class="error text-red-800">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                        <label for="brand" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Brand</label>
                                        <input  wire:model="editing.brand" tabindex="0" aria-label="Enter Brand" type="text" id="brand" name="brand"  class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" />
                                    </div>
                                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                        <label for="price" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price</label>
                                        <input wire:model="editing.price"tabindex="0" aria-label="Enter Price" type="text" id="price" name="price" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" />
                                             @error('editing.price') <span class="error text-red-800">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                                        <label for="image_url" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Image URL</label>
                                        <input  wire:model="editing.image_url" tabindex="0" aria-label="image_url" type="text" id="imageURL" name="image_url" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" />
                                    </div>
                                    
                                
                                </div>
                            

                            </div>
                        </div>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <button type="submit">Save</button>
            </x-slot>
        </x-modal.dialog>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $("#CsvBtn").on('click', function(event){
            event.preventDefault();
        $("#fileInput").click();
        $("#fileInput").on("change", function(){
            if($(this).val()) {
                $("#CsvForm").submit();
            }
        });
        });

    </script>
</div>
    

<div>
    <form id="form" class="container mx-auto bg-white dark:bg-gray-800 shadow rounded" wire:submit.prevent="store" enctype="multipart/form-data" >
         @csrf
        <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
            <div class="flex items-center w-11/12 mx-auto">
                <h1 role="heading"  class="text-lg text-gray-800 dark:text-gray-100 font-bold">Add Product</h1>
                <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/form_card_with_inputs-svg1.svg" alt="information">
                    <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/form_card_with_inputs-svg1dark.svg" alt="information">
                </div>
            </div>
        </div>
        <div class="w-11/12 mx-auto">
            <div class="container mx-auto">
                <div class="my-8 mx-auto xl:w-full xl:mx-0">
                    <div class="xl:flex lg:flex md:flex flex-wrap justify-between">
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="Name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Name</label>
                            <input wire:model="name" tabindex="0" aria-label="Enter Product name" type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Name" />
                            @error('name') <span class="error text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="barcode" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Barcode</label>
                            <input wire:model="barcode" tabindex="0" aria-label="Enter Barcode Number" type="text" id="barcode" name="barcode" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Barcode" />
                            @error('barcode') <span class="error text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="brand" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Brand</label>
                            <input wire:model="brand" tabindex="0" aria-label="Enter Brand" type="text" id="brand" name="brand" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Brand" />
                        </div>
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="price" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price</label>
                            <input wire:model="price" tabindex="0" aria-label="Enter Price" type="text" id="price" name="price" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="Price" />
                             @error('price') <span class="error text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="StreetAddress" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Image URL</label>
                            <input tabindex="0" aria-label="image_url" type="text" id="imageURL" name="image_url" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="image_url" />
                        </div>
                        
                        <div class="xl:w-2/5 lg:w-2/5 md:w-2/5 flex flex-col mb-6">
                            <label for="StreetAddress" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Images</label>
                            <input wire:model="images" tabindex="0" aria-label="image_url" type="file" id="images" name="images"  class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none bg-transparent focus:border-indigo-700 text-gray-800 dark:text-gray-100" placeholder="" multiple />
                        </div>
                    </div>
                  

                </div>
            </div>
        </div>
        <div class="w-full py-4 sm:px-12 px-4 bg-gray-100 dark:bg-gray-700 mt-6 flex justify-end rounded-bl rounded-br">
            <button role="button" aria-label="restore form" class="btn text-sm focus:outline-none text-gray-600 dark:text-gray-400 border border-gray-300 dark:hover:border-gray-500 py-2 px-6 mr-4 rounded hover:bg-gray-200 transition duration-150 ease-in-out focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">Back</button>
            <button role="button" aria-label="save form" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm focus:outline-none" type="submit">Save</button>
        </div>
    </form>
    
    
</div>

<script>let form = document.getElementById("form");
// form.addEventListener(
//     "submit",
//     function (event) {
//         event.preventDefault();
//         let elements = form.elements;
//         let payload = {};
//         for (let i = 0; i < elements.length; i++) {
//             let item = elements.item(i);
//             switch (item.type) {
//                 case "checkbox":
//                     payload[item.name] = item.checked;
//                     break;
//                 case "submit":
//                     break;
//                 default:
//                     payload[item.name] = item.value;
//                     break;
//             }
//         }
//         // Place your API call here to submit your payload.
//         // console.log("payload", payload);
//     },
//     true
// );</script>

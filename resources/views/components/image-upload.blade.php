@props(['name' => 'image_url', 'value' => null, 'label' => 'Photo', 'maxSizeMB' => 2])

<div x-data="imageUploadComponent('{{ $value }}', {{ $maxSizeMB }})" class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-bold text-gray-700 mb-1">{{ $label }}</label>
    
    <div 
        @dragover.prevent="isDragging = true" 
        @dragleave.prevent="isDragging = false" 
        @drop.prevent="handleDrop"
        :class="{ 'border-foot-violet bg-violet-50': isDragging, 'border-gray-300 bg-gray-50': !isDragging }"
        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md relative cursor-pointer"
        @click="$refs.fileInput.click()"
    >
        <div class="space-y-1 text-center" x-show="!previewUrl">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-gray-600 justify-center">
                <span class="relative bg-transparent rounded-md font-medium text-foot-violet hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-foot-violet">
                    <span>Téléverser un fichier</span>
                    <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only" x-ref="fileInput" @change="handleFileChange" accept="image/*">
                </span>
                <p class="pl-1">ou glisser-déposer</p>
            </div>
            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à {{ $maxSizeMB }}MB</p>
        </div>

        <div x-show="previewUrl" class="relative group w-full flex justify-center" style="display: none;">
            <img :src="previewUrl" class="max-h-48 rounded object-contain transition-opacity group-hover:opacity-75" />
            
            <button 
                type="button" 
                @click.stop="removeImage"
                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity focus:opacity-100"
                title="Supprimer l'image"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    
    <p x-show="errorMessage" x-text="errorMessage" class="text-red-500 text-xs mt-1" style="display: none;"></p>
    @error($name) <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

    <!-- Script to initialize component -->
    <script>
        document.addEventListener('alpine:init', () => {
            if (!window.imageUploadComponentDefined) {
                window.imageUploadComponentDefined = true;
                Alpine.data('imageUploadComponent', (initialValue, maxSizeMB) => ({
                    isDragging: false,
                    previewUrl: initialValue ? initialValue : null,
                    errorMessage: '',
                    
                    handleDrop(e) {
                        this.isDragging = false;
                        if (e.dataTransfer.files.length > 0) {
                            this.processFile(e.dataTransfer.files[0]);
                            // Set the file input value so it gets submitted
                            this.$refs.fileInput.files = e.dataTransfer.files;
                        }
                    },
                    
                    handleFileChange(e) {
                        if (e.target.files.length > 0) {
                            this.processFile(e.target.files[0]);
                        }
                    },
                    
                    processFile(file) {
                        this.errorMessage = '';
                        
                        // Check if file is an image
                        if (!file.type.match('image.*')) {
                            this.errorMessage = 'Le fichier doit être une image.';
                            this.$refs.fileInput.value = '';
                            return;
                        }
                        
                        // Check file size (maxSizeMB in bytes)
                        if (file.size > maxSizeMB * 1024 * 1024) {
                            this.errorMessage = `L'image ne doit pas dépasser ${maxSizeMB} MB.`;
                            this.$refs.fileInput.value = '';
                            return;
                        }
                        
                        // Set preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previewUrl = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    },
                    
                    removeImage() {
                        this.previewUrl = null;
                        this.$refs.fileInput.value = '';
                        this.errorMessage = '';
                    }
                }));
            }
        });
    </script>
</div>

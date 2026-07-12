<div class="space-y-4">
    <!-- Full-size image preview -->
    <div class="bg-gray-100 rounded-lg overflow-hidden">
        <img src="{{ $url }}" alt="{{ $alt }}" class="w-full max-h-[60vh] object-contain mx-auto">
    </div>

    <!-- Metadata -->
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div>
            <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider">File Name</span>
            <span class="text-gray-900">{{ $original_name }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider">Size</span>
            <span class="text-gray-900">{{ $size }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider">Type</span>
            <span class="text-gray-900">{{ $type }}</span>
        </div>
        <div>
            <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider">Collection</span>
            <span class="text-gray-900 capitalize">{{ $collection ?? '—' }}</span>
        </div>
        <div class="col-span-2">
            <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider">Uploaded</span>
            <span class="text-gray-900">{{ $uploaded ?? '—' }}</span>
        </div>
    </div>

    <!-- URL display -->
    <div>
        <span class="font-semibold text-gray-500 block text-xs uppercase tracking-wider mb-1">Public URL</span>
        <div class="flex gap-2">
            <input type="text" readonly value="{{ $url }}"
                   class="flex-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 text-xs font-mono select-all"
                   onclick="this.select()">
            <button onclick="navigator.clipboard.writeText('{{ $url }}').then(() => { this.innerHTML = 'Copied!'; setTimeout(() => { this.innerHTML = 'Copy'; }, 2000); })"
                    class="px-4 py-2 bg-primary-500 text-white text-sm font-medium rounded-lg hover:bg-primary-600 transition-colors">
                Copy
            </button>
        </div>
    </div>
</div>

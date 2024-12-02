<div class="border rounded-lg shadow-md p-4 text-center"
    style="border: 1px solid #ddd;
    border-radius:0.75rem;
    padding:1rem;
    background-color:white;
    text-align: center;
    box-shadow:0 rpx 6px rgba(0, 0, 0, 0.1)">
    <img 
        src="{{ Storage::disk('public')->url($categories->gambar) }}" 
        alt="{{ $categories->category_name }}" 
        class="w-full h-32 object-cover rounded-lg mb-4"
        style="border-radius: 0.5rem; height: 128px; object-fir: cover; margin-bottom: 0.5rem"
    >
    <h2 class="text-lg font-bold">{{ $categories->category_name }}</h2>
    
</div>

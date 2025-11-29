<header class="flex space-x-4 my-2 justify-end sticky top-0 bg-white py-2 z-10">
    <?php if(auth()->guard()->check()): ?>
        <button popovertarget="clickedprofile" class="rounded-full">
            <img src="<?php echo e(Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('gambar/profile.png')); ?>" alt="profile" class="w-[50px] h-[50px] cursor-pointer border-2 rounded-full border-[#F58E4A]">
        </button>
        <a href="/uploadresep" class="bg-[#F58E4A] hover:bg-[#f56c4a] text-white mx-4 text-lg px-6 py-3 rounded-2xl text-center flex items-center justify-center space-x-2 cursor-pointer">
            <img src="/gambar/upload.png" alt="unggah" class="w-6 h-6" />
            <span>
                Unggah
            </span>
        </a>
    <?php else: ?>
        <a href="/login" class=" bg-[#F58E4A] text-white border mx-4 text-lg px-6 py-3 rounded-2xl hover:bg-[#f56c4a] text-center flex items-center justify-center space-x-2 cursor-pointer">
            Masuk
        </a>
    <?php endif; ?>
</header><?php /**PATH C:\Users\hp\Cooknice2\resources\views/components/header.blade.php ENDPATH**/ ?>
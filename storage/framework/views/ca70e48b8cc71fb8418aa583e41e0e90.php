<?php $__env->startSection('title', 'Cooknice - ' . ($recipe->title ?? 'Resep')); ?>

<?php $__env->startSection('content'); ?>
<div class="flex h-screen overflow-hidden">
    <?php if (isset($component)) { $__componentOriginald31f0a1d6e85408eecaaa9471b609820 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald31f0a1d6e85408eecaaa9471b609820 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald31f0a1d6e85408eecaaa9471b609820)): ?>
<?php $attributes = $__attributesOriginald31f0a1d6e85408eecaaa9471b609820; ?>
<?php unset($__attributesOriginald31f0a1d6e85408eecaaa9471b609820); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald31f0a1d6e85408eecaaa9471b609820)): ?>
<?php $component = $__componentOriginald31f0a1d6e85408eecaaa9471b609820; ?>
<?php unset($__componentOriginald31f0a1d6e85408eecaaa9471b609820); ?>
<?php endif; ?>        
    
    <div class="bg-white w-full flex-1 rounded-md m-2 ml-1 border overflow-y-auto">
        <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

        <div class="p-6">
            <div class="flex flex-wrap gap-4">
                <div class="flex-shrink-0">
                    <?php if($recipe->main_image): ?>
                        <img src="<?php echo e(asset('storage/' . $recipe->main_image)); ?>" alt="<?php echo e($recipe->title); ?>" class="w-64 h-64 object-cover rounded-2xl shadow-md">
                    <?php else: ?>
                        <img src="https://placehold.co/256x256/cccccc/333333?text=No+Image" alt="No Image" class="w-64 h-64 object-cover rounded-2xl bg-gray-200 shadow-md">
                    <?php endif; ?>
                </div> 

                <div class="flex flex-col justify-between flex-1 min-w-[300px]">
                    <div>
                        <h1 class="text-3xl font-bold mb-1 text-gray-900"><?php echo e($recipe->title); ?></h1>

                        <a href="<?php echo e(url('/halamanprofile/' . ($recipe->user->id ?? ''))); ?>" class="inline-flex items-center gap-2 mb-2 px-2 py-1 rounded hover:bg-gray-100">
                            <img src="/gambar/profile.png" alt="profil" class="w-10 h-10 border-2 rounded-full border-[#F58E4A]">
                            <div>
                                <p class="font-semibold text-gray-800"><?php echo e($recipe->user->name ?? 'Pengguna Tidak Dikenal'); ?></p>
                                <?php if($recipe->user->username): ?>
                                    <p class="text-sm text-gray-500"><?php echo e($recipe->user->username ? str_replace('@', '', $recipe->user->username) : ''); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>

                        <p id="deskripsi" class="text-gray-700 <?php echo e(Str::length($recipe->description) > 150 ? 'line-clamp-2' : ''); ?>">
                            <?php echo e($recipe->description); ?>

                        </p>
                        <?php if(Str::length($recipe->description) > 150): ?>
                            <button onclick="toggleDeskripsi()" class="text-[#F58E4A] hover:underline cursor-pointer font-bold text-sm mt-1">Lebih Banyak 
                                <span id="arrow">
                                    ▼
                                </span>
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="mt-4">
                        <button class=" text-white font-semibold px-4 py-2 rounded-lg flex items-center gap-2 bg-[#F58E4A] hover:bg-[#f56c4a] cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="<?php echo e(request()->is('koleksiAda') ? 'black' : 'none'); ?>" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                            Tambahkan ke koleksi
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-6 gap-10 ">
                <div class="mt-2 text-base flex items-center gap-2 text-black w-1/4 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#F58E4A]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <?php echo e($recipe->servings ?? 'N/A'); ?> Porsi
                </div>

                <div class="mt-2 text-base flex items-center gap-2 text-black w-full font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#F58E4A]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <?php echo e($recipe->duration ?? 'N/A'); ?> Menit
                </div>
            </div>

            <div class="flex justify-between mt-10 gap-10 ">
                <div class="w-1/4">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900">Bahan-bahan</h2>
                    <?php if(is_array($recipe->ingredients) && count($recipe->ingredients) > 0): ?>
                        <ul class="list-disc list-inside space-y-2 text-lg text-gray-800">
                            <?php $__currentLoopData = $recipe->ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="border-b border-dotted border-gray-400 font-medium pb-1"><?php echo e($ingredient); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-gray-600">Tidak ada informasi bahan-bahan.</p>
                    <?php endif; ?>
                </div>

                <div class="w-full">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900">Cara Membuat</h2>
                    <?php if(is_array($recipe->steps) && count($recipe->steps) > 0): ?>
                        <ol class="list-decimal pl-5 space-y-6 text-lg text-gray-800">
                            <?php $__currentLoopData = $recipe->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <p class="mb-2"><?php echo e($step); ?></p>
                                    <?php if(isset($recipe->step_images[$index]) && $recipe->step_images[$index]): ?>
                                        <img src="<?php echo e(asset('storage/' . $recipe->step_images[$index])); ?>" class="w-64 h-48 object-cover rounded-lg mt-1 shadow-sm" alt="Langkah <?php echo e($index + 1); ?>">
                                    <?php else: ?>
                                        <img src="https://placehold.co/256x192/cccccc/333333?text=No+Image" class="w-64 h-48 object-cover rounded-lg mt-1 bg-gray-100 shadow-sm">
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    <?php else: ?>
                        <p class="text-gray-600">Tidak ada informasi cara membuat.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($component)) { $__componentOriginalaf931c6533813c406795ddc6c29437fc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf931c6533813c406795ddc6c29437fc = $attributes; } ?>
<?php $component = App\View\Components\Clickedprofile::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('clickedprofile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Clickedprofile::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaf931c6533813c406795ddc6c29437fc)): ?>
<?php $attributes = $__attributesOriginalaf931c6533813c406795ddc6c29437fc; ?>
<?php unset($__attributesOriginalaf931c6533813c406795ddc6c29437fc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf931c6533813c406795ddc6c29437fc)): ?>
<?php $component = $__componentOriginalaf931c6533813c406795ddc6c29437fc; ?>
<?php unset($__componentOriginalaf931c6533813c406795ddc6c29437fc); ?>
<?php endif; ?>

<script>
    function toggleDeskripsi() {
        const desc = document.getElementById("deskripsi");
        const arrow = document.getElementById("arrow");

        if (desc.classList.contains("line-clamp-2")) {
            desc.classList.remove("line-clamp-2");
            arrow.innerText = "▲";
        } else {
            desc.classList.add("line-clamp-2");
            arrow.innerText = "▼";
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Cooknice2\resources\views/halamanResep.blade.php ENDPATH**/ ?>
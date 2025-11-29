<?php $__env->startSection('title', 'Upload Resep'); ?>

<?php $__env->startSection('content'); ?>
<div class = "flex h-screen overflow-hidden">
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
        <div class="bg-[#FFFFFF] text-4xl w-[1250px] flex-1 rounded-md m-2 ml-1 border overflow-y-auto">
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
            
                <div class="bg-white rounded-lg p-6 w-full h-full">
                    <div>
                        <div class="bg-white rounded-lg w-full h-full p-6">
                            <h2 class="text-2xl font-semibold mb-4">Buat Halaman Upload Resep</h2>

                            <?php if(session('success')): ?>
                                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('recipe.store')); ?>" method="POST" enctype="multipart/form-data" class="md:flex md:space-x-6">
                                <?php echo csrf_field(); ?>

                                <!-- Bagian kiri: Foto dan bahan -->
                                <div class="w-full md:w-1/3">
                                    <!-- Kotak Upload Gambar -->
                                    <div
                                        id="drop-area"
                                        class="border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center p-4 cursor-pointer transition hover:bg-gray-50"
                                        style="aspect-ratio: 1/1;"
                                        onclick="document.getElementById('foto').click()"
                                        ondragover="event.preventDefault()"
                                        ondrop="handleDrop(event)"
                                    >
                                        <img id="preview" src="<?php echo e(asset('images/camera.png')); ?>" alt="Preview" class="w-12 h-12 mb-2">
                                        <p class="font-semibold text-gray-700/70">Foto Resep</p>
                                        <p class="text-sm text-gray-500 text-center">Klik atau tarik file ke sini</p>
                                    </div>

                                    <input type="file" name="foto" id="foto" class="hidden" accept="image/*" onchange="handleFile(this.files)">

                                    <!-- Bahan -->
                                    <div class="mt-6">
                                        <label class="block font-medium text-xl mb-2">Bahan</label>
                                        <div id="bahan-container" class="space-y-2 text-xl">
                                            <input type="text" name="bahan[]" class="border p-2 rounded w-full">
                                        </div>
                                        <button type="button" onclick="tambahBahan()" class="mt-2 text-[#F58E4A] hover:underline text-sm cursor-pointer">
                                            + Bahan
                                        </button>
                                    </div>
                                </div>

                                <!-- Bagian kanan: Form -->
                                <div class="w-full md:w-2/3 space-y-6 mt-6 md:mt-0">
                                    <div>
                                        <label class="block font-medium text-xl">Judul Resep</label>
                                        <input type="text" name="title" class="border p-2 rounded w-full text-xl" required>
                                    </div>

                                    <div>
                                        <label class="block font-medium text-xl">Kategori</label>
                                        <select name="category_id" class="border p-2 rounded w-full text-xl text-gray-700/70" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block font-medium text-xl">Deskripsi</label>
                                        <textarea name="description" rows="5" class="border p-2 rounded w-full text-xl"></textarea>
                                    </div>

                                    <div>
                                        <label class="block font-medium text-xl">Porsi</label>
                                        <input type="text" name="porsi" class="border p-2 rounded w-full text-xl">
                                    </div>

                                    <div>   
                                        <label class="block font-medium text-xl">Durasi</label>
                                        <input type="text" name="durasi" placeholder="" class="border p-2 rounded w-full text-xl  ">
                                    </div>

                                    <div>
                                        <label class="block font-medium text-xl mb-1">Langkah-langkah Memasak</label>
                                        <div id="langkah-container" class="space-y-4">
                                            <div class="flex items-start space-x-3">
                                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-[#F58E4A] text-white font-bold text-xl mt-1">
                                                    1
                                                </div>
                                                <div class="flex-1 space-y-2">
                                                    <textarea name="langkah[]" rows="3" class="border p-2 rounded w-full text-xl"></textarea>
                                                    <div
                                                        class="border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center cursor-pointer hover:bg-gray-50"
                                                        style="width: 80px; height: 80px;"
                                                        onclick="this.nextElementSibling.click()"
                                                    >
                                                        <img src="<?php echo e(asset('images/camera.png')); ?>" alt="Preview" class="w-6 h-6">
                                                    </div>
                                                    <input type="file" name="foto_langkah[]" class="hidden" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="tambahLangkah()" class="mt-3 text-[#F58E4A] cursor-pointer hover:underline text-sm">
                                            + Tambah Langkah
                                        </button>
                                    </div>

                                    <button type="submit" class="bg-[#F58E4A] text-white px-10 py-4 rounded-md hover:bg-[#f56c4a] cursor-pointer text-xl">
                                        Terbitkan
                                    </button>
                                </div>
                            </form>
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

</div>

<script>
    function tambahBahan() {
        const container = document.getElementById('bahan-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'bahan[]';
        input.className = 'border p-2 rounded w-full';
        container.appendChild(input);
    }

    function handleFile(files) {
        const file = files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').classList.add('object-cover');
                document.getElementById('preview').classList.remove('w-12', 'h-12', 'mb-2');
                document.getElementById('preview').style.width = '100%';
                document.getElementById('preview').style.height = '100%';
                document.getElementById('preview').style.borderRadius = '0.5rem';
            };
            reader.readAsDataURL(file);
        }
    }

    function handleDrop(e) {
        e.preventDefault();
        const files = e.dataTransfer.files;
        document.getElementById('foto').files = files;
        handleFile(files);
    }

    let langkahCounter = 2;

    function tambahLangkah() {
        const container = document.getElementById('langkah-container');

        const wrapper = document.createElement('div');
        wrapper.className = 'flex items-start space-x-3';

        const circle = document.createElement('div');
        circle.className = 'flex items-center justify-center w-8 h-8 rounded-full bg-[#F58E4A] text-white font-bold text-xl mt-1';
        circle.textContent = langkahCounter;

        const content = document.createElement('div');
        content.className = 'flex-1 space-y-2';
        content.innerHTML = `
            <textarea name="langkah[]" rows="3" class="border p-2 rounded w-full text-xl"></textarea>
            <div
                class="border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center cursor-pointer hover:bg-gray-50"
                style="width: 80px; height: 80px;"
                onclick="this.nextElementSibling.click()"
            >
                <img src="<?php echo e(asset('images/camera.png')); ?>" alt="Preview" class="w-6 h-6">
            </div>
            <input type="file" name="foto_langkah[]" class="hidden" accept="image/*">
        `;

        wrapper.appendChild(circle);
        wrapper.appendChild(content);
        container.appendChild(wrapper);

        langkahCounter++;
    }
    document.addEventListener('change', function (e) {
    if (e.target.name === 'foto_langkah[]') {
        const fileInput = e.target;
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImg = fileInput.previousElementSibling.querySelector('img');
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Cooknice2\resources\views/uploadresep.blade.php ENDPATH**/ ?>
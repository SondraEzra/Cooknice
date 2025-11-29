<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Cooknice</title>
  <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <!-- Popup Container -->
  <div class="relative bg-[#FFFFFF] rounded-xl border-[6px] border-[#F9E2AF] shadow-lg w-full max-w-sm p-6">

    <!-- Logo dan Judul -->
    <div class="flex items-center space-x-1 mt-4 mb-6 justify-center">
    <!-- Logo bundar -->
    <div class="bg-[#F9E2AF] rounded-full p-3 flex items-center justify-center w-12 h-12">
      <!-- Gunakan icon chef sebagai placeholder (bisa ganti dengan SVG atau gambar asli) -->
      <img src="/gambar/fixlogo.png" class="w-11 h-11 object-cover" />
    </div>

    <!-- Teks Cooknice dengan jempol -->
    <div class="flex items-center space-x-2">
      <img src="/gambar/fixtextlogo.png" class="h-[120px] w-auto object-contain" />
    </div>
  </div>
    
    <!-- Tombol Close (X) -->
    <a href="/" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</a>
    
    <!-- Pesan Sukses Atau Eror -->

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Form Login -->
    <form action="<?php echo e(route('daftar')); ?>" method="POST" class="space-y-6">
      <?php echo csrf_field(); ?>
      <!-- Nama -->
      <div>
          <label for="name" class="block text-sm font-semibold font-poppins text-[#005A64] mb-1">Nama</label>
          <div class="relative">
              <input
                  type="text"
                  id="name"
                  name="name"
                  value="<?php echo e(old('name')); ?>"
                  class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64] font-semibold font-poppins"
                  placeholder="Masukkan Nama"/>
              <span class="absolute right-2 top-1.5 text-gray-400">
                  <img src="/gambar/user3.png" class="w-4 h-4"/>
              </span>
              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
      </div>

      <!-- Email -->
      <div>
          <label for="email" class="block text-sm font-semibold font-poppins text-[#005A64] mb-1">Email</label>
          <div class="relative">
              <input
                  type="email"
                  id="email"
                  name="email"
                  value="<?php echo e(old('email')); ?>"
                  class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64] font-semibold font-poppins"
                  placeholder="Masukkan Email"/>
              <span class="absolute right-2 top-1.5 text-gray-400">
                  <img src="/gambar/email1.png" class="w-4 h-4"/>
              </span>
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
      </div>

      <!-- Password -->
      <div>
          <label for="password" class="block text-sm font-semibold font-poppins text-[#005A64] mb-1">Password</label>
          <div class="relative">
              <input
                  type="password"
                  id="password"
                  name="password"
                  class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64] font-semibold font-poppins"
                  placeholder="Masukkan Password"/>
              <span class="absolute right-2 top-1.5 text-gray-400">
                  <img src="/gambar/lock1.png" class="w-4 h-4"/>
              </span>
              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
      </div>

      <!-- Konfirmasi Password -->
      <div>
          <label for="password_confirmation" class="block text-sm font-semibold font-poppins text-[#005A64] mb-1">Konfirmasi Password</label>
          <div class="relative">
              <input
                  type="password"
                  id="password_confirmation"
                  name="password_confirmation"
                  class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64] font-semibold font-poppins"
                  placeholder="Konfirmasi Password"/>
              <span class="absolute right-2 top-1.5 text-gray-400">
                  <img src="/gambar/lock1.png" class="w-4 h-4"/>
              </span>
          </div>
      </div>


      <!-- Tombol Daftar -->
      <div class="mt-6 ml-10 mr-10 items-center justify-center flex">
          <button type="submit" class="cursor-pointer w-full bg-[#005A64] text-white items-center justify-center flex font-semibold font-poppins py-2 rounded-md hover:bg-[#004852] transition duration-200">
              DAFTAR
          </button>
      </div>
    </form>


    <!-- Pemisah -->
    <div class="flex items-center my-4">
      <hr class="flex-grow border-t border-[#000000]" />
      <span class="mx-2 text-sm text-[#000000]">atau</span>
      <hr class="flex-grow border-t border-[#000000]" />
    </div>

    <!-- Login dengan Google -->
    <a href="<?php echo e(route('auth.google')); ?>" class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold font-poppins hover:bg-[#004852] transition duration-200 mb-3">
      <img src="/gambar/google.png" class="w-5 h-5" />
      <span>Masuk dengan Google</span>
    </a>

    <!-- Login dengan Facebook -->
    <a href="<?php echo e(route('auth.facebook')); ?>" class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold font-poppins hover:bg-[#004852] transition duration-200">
        <img src="/gambar/facebook1.png" class="w-6 h-6" />
        <span>Masuk dengan Facebook</span>
    </a>
    
    <!-- Link Login -->
    <p class="text-center text-sm text-black font-semibold font-poppins mt-6">
      Sudah punya akun? 
      <a href="/login" class="text-[#005A64] underline">Login Disini</a>
    </p>

  </div>

  

</body>
</html>
<?php /**PATH C:\Users\hp\Cooknice2\resources\views/daftar.blade.php ENDPATH**/ ?>
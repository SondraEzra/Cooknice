<aside class="bg-white flex-shrink-0 rounded-md m-2 mr-1 border shadow-lg transition-all duration-300 md:w-64 sm:w-20 flex flex-col items-center py-6">
        <!-- Logo -->
        <div class="w-full h-20 mb-10 mt-2 items-center flex justify-center">
          <img src="gambar/fixlogo.png" alt="logo" class="w-15 rounded-full bg-[#F9E2AF] object-cover">
          <img src="gambar/fixtextlogo.png" alt="logo" class="w-35 mt-3 object-cover">
        </div>

        <!-- Menu Items -->
        <nav class="flex flex-col space-y-4 w-full px-4">
          <!-- Item -->
          <a href="/berandaSetelahLogin" class="<?php echo e(request()->is('berandaSetelahLogin', '/') ? 'bg-[#F58E4A] text-white hover:text-black' : 'text-black rounded-xl hover:bg-[#D9D9D9]'); ?> flex items-center space-x-4 px-4 py-3 rounded-xl hover:bg-[#D9D9D9] transition-all duration-300">
            <div class="bg-white p-2 rounded-full">
              <img src="/gambar/home.png" alt="beranda" class="w-6 h-6" />
            </div>
            <span class="text-lg font-semibold hidden sm:inline">
              Beranda
            </span>
          </a>

          <a href="/makanan" class="<?php echo e(request()->is('makanan') ? 'bg-[#F58E4A] text-white hover:text-black' : 'text-black rounded-xl hover:bg-[#D9D9D9]'); ?> flex items-center space-x-4 px-4 py-3 rounded-xl hover:bg-[#D9D9D9] transition-all duration-300">
            <div class="bg-white p-2 rounded-full">
              <img src="/gambar/dish (1).png" alt="makanan" class="w-6 h-6" />
            </div>
            <span class="text-lg font-semibold hidden sm:inline">
              Makanan
            </span>
          </a>

          <a href="/minuman" class="<?php echo e(request()->is('minuman') ? 'bg-[#F58E4A] text-white hover:text-black' : 'text-black rounded-xl hover:bg-[#D9D9D9]'); ?> flex items-center space-x-4 px-4 py-3 rounded-xl hover:bg-[#D9D9D9] transition-all duration-300">
            <div class="bg-white p-2 rounded-full">
              <img src="/gambar/soda.png" alt="minuman" class="w-6 h-6" />
            </div>
            <span class="text-lg font-semibold hidden sm:inline">
              Minuman
            </span>
          </a>

          <a href="/cemilan" class="<?php echo e(request()->is('cemilan') ? 'bg-[#F58E4A] text-white hover:text-black' : 'text-black rounded-xl hover:bg-[#D9D9D9]'); ?> flex items-center space-x-4 px-4 py-3 rounded-xl hover:bg-[#D9D9D9] transition-all duration-300">
            <div class="bg-white p-2 rounded-full">
              <img src="/gambar/nuggets.png" alt="cemilan" class="w-6 h-6" />
            </div>
            <span class="text-lg font-semibold hidden sm:inline">
              Cemilan
            </span>
          </a>

          <a href="/koleksiAda" class="<?php echo e(request()->is('koleksiAda') ? 'bg-[#F58E4A] text-white hover:text-black' : 'text-black rounded-xl hover:bg-[#D9D9D9]'); ?> flex items-center space-x-4 px-4 py-3 rounded-xl hover:bg-[#D9D9D9] transition-all duration-300">
            <div class="bg-white p-2 rounded-full">
              <img src="/gambar/bookmark.png" alt="cemilan" class="w-6 h-6" />
            </div>
            <span class="text-lg font-semibold hidden sm:inline">
              Koleksi
            </span>
          </a>
        </nav>
      </aside><?php /**PATH C:\Users\User\Cooknice2\resources\views/components/sidebar.blade.php ENDPATH**/ ?>
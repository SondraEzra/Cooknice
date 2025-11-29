<!-- Backdrop Blur -->
    <div id="popup-backdrop" class="fixed inset-0 z-40 hidden backdrop-blur-sm bg-transparent"></div>

    <!-- === POPUP LOGIN === -->
    <div
      id="login"
      class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl border-[6px] border-[#F9E2AF] shadow-lg w-full max-w-sm p-6 z-50 hidden"
    >
      <!-- Logo dan Judul -->
      <div class="flex items-center space-x-1 mt-4 mb-6 justify-center">
        <div class="bg-[#F9E2AF] rounded-full p-3 flex items-center justify-center w-12 h-12">
          <img src="/gambar/fixlogo.png" class="w-11 h-11 object-cover" />
        </div>
        <div class="flex items-center space-x-2">
          <img src="/gambar/fixtextlogo.png" class="h-[120px] w-auto object-contain" />
        </div>
      </div>

      <!-- Tombol Close -->
      <button
        id="closeLogin"
        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold cursor-pointer"
      >
        &times;
      </button>

      <!-- Form Login -->
      <form class="space-y-6">
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-semibold font-poppins text-[#005A64] mb-1">Email</label>
          <div class="relative">
            <input
              type="email"
              id="email"
              name="email"
              class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64] font-semibold font-poppins"
              placeholder="Masukkan Email"
            />
            <span class="absolute right-2 top-1.5 text-gray-400">
              <img src="/gambar/email1.png" class="w-4 h-4" />
            </span>
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
              placeholder="Masukkan Password"
            />
            <span class="absolute right-2 top-1.5 text-gray-400">
              <img src="/gambar/lock1.png" class="w-4 h-4" />
            </span>
          </div>
        </div>
      </form>

      <!-- Tombol Masuk -->
      <div class="mt-6 ml-10 mr-10 items-center justify-center flex">
        <a href="#" type="submit" class="w-full bg-[#005A64] text-white  items-center justify-center flex font-semibold font-poppins py-2 rounded-md hover:bg-[#004852] transition duration-200">
          MASUK
        </a>
      </div>

      <!-- Pemisah -->
      <div class="flex items-center my-4">
        <hr class="flex-grow border-t border-black" />
        <span class="mx-2 text-sm text-black">atau</span>
        <hr class="flex-grow border-t border-black" />
      </div>

      <!-- Login dengan Google dan Facebook -->
      <button class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold hover:bg-[#004852] transition mb-3 cursor-pointer">
        <img src="/gambar/google.png" class="w-5 h-5" />
        <span>Masuk dengan Google</span>
      </button>
      <button class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold hover:bg-[#004852] transition cursor-pointer">
        <img src="/gambar/facebook1.png" class="w-6 h-6" />
        <span>Masuk dengan Facebook</span>
      </button>

      <!-- Link Daftar -->
      <p class="text-center text-sm text-black font-semibold font-poppins mt-6">
        Belum punya akun?
        <a href="#" id="switchToDaftar" class="text-[#005A64] underline">Daftar Disini</a>
      </p>
    </div>

    <!-- === POPUP DAFTAR === -->
    <div
      id="daftar"
      class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl border-[6px] border-[#F9E2AF] shadow-lg w-full max-w-sm p-6 z-50 hidden"
    >
      <!-- Logo dan Judul -->
      <div class="flex items-center space-x-1 mt-4 mb-6 justify-center">
        <div class="bg-[#F9E2AF] rounded-full p-3 flex items-center justify-center w-12 h-12">
          <img src="/gambar/fixlogo.png" class="w-11 h-11 object-cover" />
        </div>
        <div class="flex items-center space-x-2">
          <img src="/gambar/fixtextlogo.png" class="h-[120px] w-auto object-contain" />
        </div>
      </div>

      <!-- Tombol Close -->
      <button
        id="closeDaftar"
        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold cursor-pointer"
      >
        &times;
      </button>

      <!-- Form Daftar -->
      <form class="space-y-6">
        <!-- Nama -->
        <div>
          <label for="name" class="block text-sm font-semibold text-[#005A64] mb-1">Nama</label>
          <div class="relative">
            <input type="text" id="name" class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64]" placeholder="Masukkan Nama" />
            <span class="absolute right-2 top-1.5 text-gray-400">
              <img src="/gambar/user3.png" class="w-4 h-4" />
            </span>
          </div>
        </div>
        <!-- Email & Password -->
        <div>
          <label for="daftarEmail" class="block text-sm font-semibold text-[#005A64] mb-1">Email</label>
          <div class="relative">
            <input type="email" id="daftarEmail" class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64]" placeholder="Masukkan Email" />
            <span class="absolute right-2 top-1.5 text-gray-400">
              <img src="/gambar/email1.png" class="w-4 h-4" />
            </span>
          </div>
        </div>
        <div>
          <label for="daftarPassword" class="block text-sm font-semibold text-[#005A64] mb-1">Password</label>
          <div class="relative">
            <input type="password" id="daftarPassword" class="w-full border-b-2 border-gray-400 focus:outline-none focus:border-[#005A64] pr-10 pb-1 text-[#005A64]" placeholder="Masukkan Password" />
            <span class="absolute right-2 top-1.5 text-gray-400">
              <img src="/gambar/lock1.png" class="w-4 h-4" />
            </span>
          </div>
        </div>
      </form>

      <!-- Tombol Daftar -->
      <div class="mt-6 ml-10 mr-10 items-center justify-center flex">
        <a href="#" type="submit" class="w-full bg-[#005A64] text-white items-center justify-center flex font-semibold font-poppins py-2 rounded-md hover:bg-[#004852] transition duration-200">
          DAFTAR
        </a>
      </div>

      <!-- Pemisah -->
      <div class="flex items-center my-4">
        <hr class="flex-grow border-t border-black" />
        <span class="mx-2 text-sm text-black">atau</span>
        <hr class="flex-grow border-t border-black" />
      </div>

      <!-- Google & Facebook -->
      <button class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold hover:bg-[#004852] transition mb-3 cursor-pointer">
        <img src="/gambar/google.png" class="w-5 h-5" />
        <span>Masuk dengan Google</span>
      </button>
      <button class="w-full flex items-center justify-center space-x-2 border rounded-md py-2 bg-[#005A64] text-white font-semibold hover:bg-[#004852] transition cursor-pointer">
        <img src="/gambar/facebook1.png" class="w-6 h-6" />
        <span>Masuk dengan Facebook</span>
      </button>

      <!-- Link ke Login -->
      <p class="text-center text-sm text-black font-semibold font-poppins mt-6">
        Sudah punya akun? <a href="#" id="switchToLogin" class="text-[#005A64] underline">Login Disini</a>
      </p>
    </div>

    <!-- === SCRIPT === -->
    <script>
      const login = document.getElementById('login');
      const daftar = document.getElementById('daftar');
      const backdrop = document.getElementById('popup-backdrop');

      // Function to show popup
      function showPopup(popup) {
        backdrop.classList.remove('hidden');
        popup.classList.remove('hidden');
      }

      // Function to hide popup
      function hidePopup(popup) {
        backdrop.classList.add('hidden');
        popup.classList.add('hidden');
      }

      // Tombol Buka/Tutup Login
      document.getElementById('openLogin').addEventListener('click', () => {
        showPopup(login);
      });

      document.getElementById('closeLogin').addEventListener('click', () => {
        hidePopup(login);
      });

      document.getElementById('closeDaftar').addEventListener('click', () => {
        hidePopup(daftar);
      });

      // Backdrop click to close
      backdrop.addEventListener('click', () => {
        hidePopup(login);
        hidePopup(daftar);
      });

      // Pindah dari login ke daftar
      document.getElementById('switchToDaftar').addEventListener('click', (e) => {
        e.preventDefault();
        hidePopup(login);
        setTimeout(() => showPopup(daftar), 200); // Delay agar animasi halus
      });

      // Pindah dari daftar ke login
      document.getElementById('switchToLogin').addEventListener('click', (e) => {
        e.preventDefault();
        hidePopup(daftar);
        setTimeout(() => showPopup(login), 200);
      });
    </script>
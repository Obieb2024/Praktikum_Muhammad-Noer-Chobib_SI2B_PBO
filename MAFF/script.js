document.getElementById('tombolMaaf').addEventListener('click', function() {
    // Sembunyikan tombol
    this.style.display = 'none';

    // Tampilkan pesan tersembunyi
    const pesanTersembunyi = document.getElementById('pesan-tersembunyi');
    pesanTersembunyi.classList.remove('hidden');

    // Buat animasi hujan hati
    setInterval(createHeart, 200);
});

function createHeart() {
    const heart = document.createElement('div');
    heart.classList.add('heart');
    
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.animationDuration = Math.random() * 2 + 3 + "s"; // Durasi jatuh 3-5 detik
    
    heart.innerText = '❤️';
    
    document.body.appendChild(heart);
    
    // Hapus hati setelah selesai animasi agar tidak membebani halaman
    setTimeout(() => {
        heart.remove();
    }, 5000);
}
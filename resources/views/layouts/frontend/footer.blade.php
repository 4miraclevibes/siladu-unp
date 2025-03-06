<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p>
                    UPT. Laboratorium Terpadu Universitas Negeri Padang merupakan pusat layanan pengujian 
                    dan kalibrasi yang terakreditasi dengan standar SNI ISO/IEC 17025:2017. 
                    Kami berkomitmen memberikan pelayanan terbaik untuk kegiatan pengujian, 
                    pendidikan, penelitian dan pengabdian kepada masyarakat.
                </p>
            </div>
            <div class="col-md-2">
                <h5>Home</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('beranda') }}" class="text-decoration-none {{ Route::is('beranda') ? 'text-warning' : 'text-white' }}">Beranda</a></li>
                    <li><a href="{{ route('profiles') }}" class="text-decoration-none {{ Route::is('profiles') ? 'text-warning' : 'text-white' }}">Profile</a></li>
                    <li><a href="{{ route('tool') }}" class="text-decoration-none {{ Route::is('tool') ? 'text-warning' : 'text-white' }}">Tools</a></li>
                    <li><a href="{{ route('announcement') }}" class="text-decoration-none {{ Route::is('announcement') ? 'text-warning' : 'text-white' }}">Pengumuman</a></li>
                    <li><a href="{{ route('article') }}" class="text-decoration-none {{ Route::is('article') ? 'text-warning' : 'text-white' }}">Artikel</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-decoration-none {{ Route::is('gallery') ? 'text-warning' : 'text-white' }}">Galeri</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Contact Us</h5>
                <p>Jl. Prof. Dr. Hamka, Air Tawar Padang, Sumatera Barat</p>
                <p>Email: labterpadu@unp.ac.id</p>
                <p>Telp: (0751) 7055644</p>
            </div>
        </div>
        <div class="row mt-4">
            <hr class="border-top border-light">
            <div class="col-11">
                <p class="mb-0">Copyright © 2024 UPT. Laboratorium Terpadu Universitas Negeri Padang, All rights reserved</p>
            </div>
        </div>
    </div>
</footer>

<div class="mt-2 ">
    <ul class="list-unstyled ps-2 text-white">
        <li class="mb-2 bg-brown p-2 px-4">
            <a href="{{ route('dashboard') }}" class="text-white text-decoration-none d-block">Home</a>
        </li>

        <li class="mb-2">
            <a href="#MasterData" data-bs-toggle="collapse" aria-expanded="false" aria-controls="MasterData"
            role="button" class="py-2 px-4 bg-brown text-white text-decoration-none d-block">Data Master</a>
            <div class="collapse" id="MasterData" class="d-flex">
                <div class="col-md-12 bg-light">
                    <ul class="list-unstyled ps-2">
                            @if (auth()->user()->role == 'admin')
                            <li class="mb-1 p-1 px-4">
                                <a href="{{ route('users.index') }}"
                                    class="text-black text-decoration-none d-block">Data User</a>
                            </li>
                            @endif
                            <li class="mb-1 p-1 px-4">
                                <a href="{{ route('barang.index') }}"
                                    class="text-black text-decoration-none d-block">Data Barang</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        <li class="mb-2 bg-brown p-2 px-4">
            <a href="{{ route('pemasukan.index') }}" class="text-white text-decoration-none d-block">Pemasukan</a>
        </li>

        <li class="mb-2 bg-brown p-2 px-4">
            <a href="{{ route('pengeluaran.index') }}" class="text-white text-decoration-none d-block">Pengeluaran</a>
        </li>

        <li class="mb-2">
            <a href="#menuLaporan" data-bs-toggle="collapse" aria-expanded="false" aria-controls="menuLaporan"
                role="button" class="py-2 px-4 bg-brown text-white text-decoration-none d-block">Laporan</a>
            <div class="collapse" id="menuLaporan" class="d-flex">
                <div class="col-md-12 bg-light">
                    <ul class="list-unstyled ps-2">
                        <li class="mb-1 p-1 px-4">
                            <a href="{{ route('laporan.barang') }}" target="_blank" class="text-black text-decoration-none d-block">Laporan Data Barang</a>
                        </li>
                        <li class="mb-1 p-1 px-4">
                            <a href="{{ route('laporan.transaksi') }}" class="text-black text-decoration-none d-block">Laporan Transaksi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="mb-2 bg-brown p-2 px-4">
            <a href="{{ route('logout') }}" class="text-white text-decoration-none d-block">Logout</a>
        </li>


    </ul>

</div>

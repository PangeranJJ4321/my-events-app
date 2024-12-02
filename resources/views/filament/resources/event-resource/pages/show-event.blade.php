<x-filament-panels::page>
    @php
        $data = $this->getData();
    @endphp
    <div class="p-6 space-y-6">
        <!-- Detail Acara -->
        <x-filament::card>
            <h1 class="text-center font-bold mb-5 " style="font-size: 1.7rem">{{$data['nama_acara']}}</h1>
            <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 30px">
                <img src="{{ asset('storage/' . $data['gambar_acara']) }}" alt="Event Image" style="width: 500px; height: 300px; border-radius: 5px;">
            </div>            
            <h2 class="text-xl font-semibold ">Deskripsi Acara</h2>
            <p class="mt-2 text-lg" style="margin: 10px; text-align:justify">{{ $data['deskripsi'] }}</p><br>
            <h2 class="text-xl font-semibold">Detail Acara</h2>
            <table class="min-w-full table-auto" style="margin: 10px;">
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>: {{ \Carbon\Carbon::parse($data['tanggal_waktu'])->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Waktu</strong></td>
                    <td>: {{ \Carbon\Carbon::parse($data['tanggal_waktu'])->format('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td><strong>Lokasi</strong></td>
                    <td>: {{ $data['lokasi'] }}</td>
                </tr>
                <tr>
                    <td><strong>Harga Tiket</strong></td>
                    <td>: IDR {{ number_format($data['harga_tiket'], 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td><strong>Kuota Tiket</strong></td>
                    <td>: {{ $data['kouta_tiket'] }} peserta</td>
                </tr>
            </table>
            
            <br>
            
            <h2 class="text-xl font-semibold">Contact Person</h2>
            <table class="min-w-full table-auto" style="margin: 15px;">
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>: {{ $data->user->name }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>: <a href="mailto:{{$data->user->email}}">{{$data->user->email}}</a></td>
                </tr>
            </table>            
        </x-filament::card>
    </div>
</x-filament-panels::page>


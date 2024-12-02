<x-filament::widget>
    <x-filament::card>
        <div class="text-xl font-bold">Tiket Terjual per Hari</div>

        <div>
            <canvas id="salesChart"></canvas>
        </div>

        <x-filament::scripts>
            <script>
                var ctx = document.getElementById('salesChart').getContext('2d');
                var salesChart = new Chart(ctx, {
                    type: 'line', // Tipe grafik (bisa diganti line, bar, dll)
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'Tiket Terjual',
                            data: @json($data),
                            borderColor: '#4CAF50', // Warna grafik
                            backgroundColor: 'rgba(76, 175, 80, 0.2)', // Background warna
                            borderWidth: 1,
                            fill: true,
                        }],
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal',
                                },
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Jumlah Tiket Terjual',
                                },
                                beginAtZero: true,
                            },
                        },
                    },
                });
            </script>
        </x-filament::scripts>
    </x-filament::card>
</x-filament::widget>

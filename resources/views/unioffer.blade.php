{{-- resources/views/pdf/offer.blade.php --}}
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Árajánlat</title>
    <style>
        @page { margin: 40px 30px; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }
        .header img, .footer img {
            width: 100%;
        }
        .subject { font-weight: bold; margin: 20px 0; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th { background: #f2f2f2; }
        .signature {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>
<body>

    {{-- Header (image from PDF) --}}
    <div class="header">
        <img src="{{ public_path('images/sze-header.png') }}" alt="Header">
    </div>

    <p class="subject">Tárgy: Ajánlat</p>

    <p>Tisztelt {{ $client_name ?? 'XY' }}!</p>

    <p>
        A Széchenyi István Egyetem nevében küldöm Önnek árajánlatunkat a
        <strong>{{ $event_name ?? 'XY esemény' }}</strong> helyszínére.
    </p>

    <p>
        1. Rendezvény tervezett időpontja: <strong>{{ $event_date ?? '2028. október 18-21.' }}</strong><br>
        2. Rendezvény tervezett helyszíne: <strong>{{ $event_location ?? 'Széchenyi István Egyetem – Győr Városi Egyetemi Csarnok – ÚT Aula – Menedzsment Campus' }}</strong>
    </p>

    <table>
        <thead>
            <tr>
                <th>Megnevezés</th>
                <th>Mennyiség</th>
                <th>Nettó ár</th>
                <th>Áfa</th>
                <th>Bruttó ár</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service['name'] ?? $service['offer_name'] }}</td>
                    <td>{{ $service['quantity'] ?? $service['duration'] }}</td>
                    <td>{{ $service['quantity'] ?  number_format($service['quantity'] * $service['excluding_vat'] , 0, ',', ' ') : $service['total_price'] }} Ft</td>
                    <td>{{ $service['vat'] ?? '- ' }}%</td>
                    <td>{{ $service['gross'] ? number_format($service['gross'], 0, ',', ' ') : number_format($service['total_price'], 0, ',', ' ') }}  Ft</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        Az itt fel nem sorolt szolgáltatások egyedi megrendelés alapján vehetők igénybe,
        és egyedi megállapodás alapján kerülnek kiszámlázásra.
    </p>

    <p>Bízom benne, hogy ajánlatunk megfelel Önöknek.</p>

    <div class="signature">
        Győr, {{ $date ?? '2025. 03. 04.' }} <br><br>
        <strong>{{ $sender_name ?? 'Söller Klaudia' }}</strong><br>
        Szolgáltató Központ és Kollégium
    </div>

    {{-- Footer (optional image) --}}
    <div class="footer">
        <img src="{{ public_path('images/sze-footer.png') }}" alt="Footer">
    </div>

</body>
</html>

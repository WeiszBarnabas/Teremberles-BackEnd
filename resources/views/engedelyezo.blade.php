<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendezvényengedélyező nyomtatvány</title>
    <style>

        body {
            font-family: 'custom-font', sans-serif ;
            margin: 0;
            padding: 0;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            z-index: 100;
            background: white; /* Optional: To ensure the header has a background */
        }
        .content {
            margin-top: 100px; /* Adjust this value to match the height of the header */
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            width: 60%;
        }
        .underline {
            text-decoration: underline;
        }
        .signature-section {
            margin-top: 50px;
        }
        .signature-line {
            display: flex;
            justify-content: flex-end;
            margin-top: 80px;
        }
        .signature-box {
            width: 45%;
            text-align: center;
        }
        .decision {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/logo.jpg'))) }}" alt="Logo" style="width: 30%; float: left;">
    <p style="margin-left: 150px; text-align: left; float: left;">Határozatszám: SZKK-R-2025/</p>
</div>

<div class="content">
<h2>RENDEZVÉNYENGEDÉLYEZŐ NYOMTATVÁNY</h2>
<hr/>
<h3><strong>Rendezvény adatai:</strong></h3>
<table>
    <tr>
        <th>Elnevezése:</th>
        <td>{{ $form['event_name'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Típusa:</th>
        <td>{{ $form['event_type'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Jellege:</th>
        <td>{{ $form['nature'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Minősítése:</th>
        <td>{{ $form['event_classification'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Helyszíne:</th>
        <td>{{ $form['event_place'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Pontos cím:</th>
        <td>{{ $form['event_address'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Kezdete:</th>
        <td>{{ $form['start_date'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Vége:</th>
        <td>{{ $form['end_date'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Résztvevők tervezett száma:</th>
        <td>{{ $form['participants'] ?? '' }}</td>
    </tr>
</table>
<h3><strong>Rendezvény leírása, részletes programterve:</strong></h3>
<table>
    <tr>
        <td style="height:250px; text-align: left; vertical-align: top;">
            {{ $form['program_plan'] ?? '' }}
        </td>
    </tr>
</table>
</div>
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/szolgaltatoKozpontEsKollegium.png'))) }}" alt="Logo" style="width: 100%; position:absolute; bottom:0;">
<div style="page-break-after: always;"></div>
<div class="content">

<h3><strong>Rendezvény részletes adatai:</strong></h3>

    <table>
        <tr>
            <th>Sajtónyilvános rendezvény?</th>
            <td>{{ $form['press_public'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Van a rendezvény idejére szállásigénye?</th>
            <td>{{ $form['accommodation_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Van parkolóhely igénye?</th>
            <td>{{ $form['parking_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Keletkezik hulladék?</th>
            <td>{{ $form['waste_generated'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Szükséges internetkapcsolat (WiFi) a rendezvény idejére?</th>
            <td>{{ $form['internet_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Szükséges-e oktatástechnikai támogatás?</th>
            <td>{{ $form['tech_support_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Korlátozott mozgású személyek részt vesznek?</th>
            <td>{{ $form['limited_mobility'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Fotó és/vagy videófelvétel készül-e a rendezvényen?</th>
            <td>{{ $form['photo_video_recording'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Lesz a rendezvény területén catering?</th>
            <td>{{ $form['catering_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Várhatóak a rendezvényen építési és bontási munkálatok?</th>
            <td>{{ $form['construction_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Igényel takarítást a rendezvény előtt?</th>
            <td>{{ $form['cleaning_before'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Igényel takarítási ügyeletet a rendezvény alatt?</th>
            <td>{{ $form['cleaning_during'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Szükséges villanyszerelői ügyelet?</th>
            <td>{{ $form['electrical_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Szükséges rendezvényszekrényből áram vételezése?</th>
            <td>{{ $form['power_cabinet'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Tűzveszélyes tevékenység várható-e?</th>
            <td>{{ $form['fire_hazard'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Vegyi anyag felhasználása várható-e?</th>
            <td>{{ $form['chemical_usage'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Várható-e dekoráció a helyiség légterében?</th>
            <td>{{ $form['decorations'] ? 'igen' : 'nem' }}</td>
        </tr>
</table>
</div>
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/szolgaltatoKozpontEsKollegium.png'))) }}" alt="Logo" style="width: 100%; position:absolute; bottom:0;">
<div style="page-break-after: always;"></div>
<div class="content">

{{--@if($form->needs_accommodation)--}}
<h3><strong>Szállásigény</strong></h3>
<table>
    <tr>
        <th>Szállásigény várható létszáma:</th>
        <td>{{ $form['accommodation_count'] ?? '0' }} fő</td>
    </tr>
</table>
{{--@endif--}}

{{--@if($form->needs_parking)--}}
<h3><strong>Parkolóhely igény</strong></h3>
    <table>
        <tr>
            <th>Várható gépkocsiforgalom és parkolóhely igény:</th>
            <td>{{ $form['parking_details'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}


{{--@if($form->produces_waste)--}}
<h3><strong>Hulladék elszállítás</strong></h3>
    <table>
        <tr>
            <th>Hulladék elszállításának módja:</th>
            <td>{{ $form['waste_disposal'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Ki végzi a hulladék elszállítását?</th>
            <td>{{ $form['waste_handler'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}

{{--@if($form->needs_educational_support)--}}
<h3><strong>Oktatástechnikai támogatás</strong></h3>
    <table>
        <tr>
            <th>Eszközigény:</th>
            <td>{{ $form['tech_equipment'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}

{{--@if($form->has_photography)--}}
<h3><strong>Fotó és/vagy videófelvétel</strong></h3>
    <table>
        <tr>
            <th>Használt eszköz:</th>
            <td>{{ $form['recording_tools'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}

{{--@if($form->has_catering)--}}
<h3><strong>Catering</strong></h3>
    <table>
        <tr>
            <th>Catering típusa:</th>
            <td>{{ $form['catering_type'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}
</div>
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/szolgaltatoKozpontEsKollegium.png'))) }}" alt="Logo" style="width: 100%; position:absolute; bottom:0;">
<div style="page-break-after: always;"></div>
<div class="content">
{{--@if($form->needs_cleaning_before)--}}
{{--@if($form->has_cleaning_before)--}}
{{--@if($form->has_construction)--}}
<h3><strong>Építési és bontási munkálatok</strong></h3>
    <table>
        <tr>
            <th>Rendezvényterület igénybevételének kezdete:</th>
            <td>{{ $form['construction_start_date'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Rendezvényterület visszaadásának időpontja:</th>
            <td>{{ $form['construction_end_date'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Megjelenő alvállalkozó(k):</th>
            <td>{{ $form['subcontractors'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Lesz magasban végzett tevékenység az építés során?</th>
            <td>{{ $form['high_altitude_work'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Szükséges állvány az építéshez?</th>
            <td>{{ $form['scaffolding_needed'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Lesz rendezvényelemeknek <span class="underline">kézi</span> anyagmozgatása?</th>
            <td>{{ $form['manual_material_handling'] ? 'igen' : 'nem' }}</td>
        </tr>
        <tr>
            <th>Lesz rendezvényelemeknek <span class="underline">gépi</span> anyagmozgatása?</th>
            <td>{{ $form['mechanical_material_handling'] ? 'igen' : 'nem' }}</td>
        </tr>
{{--        @if($form->has_mechanical_material_handling)--}}
            <tr>
                <th>Gépi anyagmozgatás eszköze?</th>
                <td>{{ $form['mechanical_equipment'] ?? '' }}</td>
            </tr>
{{--        @endif--}}
    </table>
{{--@endif--}}
<h3><strong>Áramigény:</strong></h3>
<table>
    <tr>
        <td style="height:100px; text-align: left; vertical-align: top;">
            {{ $form['power_cabinet'] ?? '' }}
        </td>
    </tr>
</table><h3><strong>Tűzveszélyes tevékenység:</strong></h3>
<table>
    <tr>
        <td style="height:100px; text-align: left; vertical-align: top;">
            {{ $form['fire_hazard_description'] ?? '' }}
        </td>
    </tr>
</table><h3><strong>Vegyianyag felhasználás:</strong></h3>
<table>
    <tr>
        <td style="height:100px; text-align: left; vertical-align: top;">
            {{ $form['chemical_description'] ?? '' }}
        </td>
    </tr>
</table>
</div>
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/szolgaltatoKozpontEsKollegium.png'))) }}" alt="Logo" style="width: 100%; position:absolute; bottom:0;">
<div style="page-break-after: always;"></div>
<div class="content">

<h3><strong>Rendezvényért felelős személy (szervező) adatai:</strong></h3>
<table>
    <tr>
        <th>Teljes név:</th>
        <td>{{ $form['organizer_name'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Telefonszám:</th>
        <td>{{ $form['organizer_phone'] ?? '' }}</td>
    </tr>
    <tr>
        <th>E-mail cím:</th>
        <td>{{ $form['organizer_email'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Lakcím:</th>
        <td>{{ $form['organizer_address'] ?? '' }}</td>
    </tr>
</table>

{{--@if($form->has_legal_background)--}}
<h3><strong>Megrendelő (jogi háttér esetén) adatai:</strong></h3>
    <table>
        <tr>
            <th>Név/Cégnév:</th>
            <td>{{ $form['client_name'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Cím:</th>
            <td>{{ $form['client_address'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Adószám:</th>
            <td>{{ $form['client_tax_number'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Telefonszám:</th>
            <td>{{ $form['client_phone'] ?? '' }}</td>
        </tr>
        <tr>
            <th>E-mail cím:</th>
            <td>{{ $form['client_email'] ?? '' }}</td>
        </tr>
    </table>
{{--@endif--}}

<div class="decision">
    <p>Kelt: {{ date('Y. F d.') }}</p>
    <p><strong>Határozat:</strong></p>
    <p><i>A rendezvény a Rendezvénybejelentő Űrlapon bejelentett adatok alapján megszervezhető és engedélyezésre került. További teendője a szervezőnek nincs! Sikeres lebonyolítást kívánunk!</i></p>
</div>

<div class="signature-line">
    <div class="signature-box" style="float: right;">
        <p><strong>Egyházi-Máté Eszter</strong></p>
        <p><strong>Központvezető</strong></p>
        <p>Rendezvényt engedélyező</p>
    </div>
</div>
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/szolgaltatoKozpontEsKollegium.png'))) }}" alt="Logo" style="width: 100%; position:absolute; bottom:0;">
</div>

</body>
</html>

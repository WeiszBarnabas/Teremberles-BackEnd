<?php

namespace App\Enums;

enum Statuses: string
{
    case BEERKEZETT = "Beérkezett";
    case ELUTASITVA = "Elutasítva";
    case UF_ARAJANLATRA_VAR = "UF Árajánlatra vár";
    case UF_ARAJANLAT_ELFOGADASRA_VAR = "UF Árajánlat elfogadásra vár";
    case ARAJANLAT_ELFOGADASRA_VAR = "Árajánlat elfogadásra vár";
    case ARAJANLTAN_KESZITESRE_VAR = "Árajánlat készítésre vár";
    case LEMONDVA = "Lemondva";
    case JOVAHAGYVA = "Jóváhagyva";
    case MEGVALOSULASR_VAR = "Megvalósulásra vár";
    case SZERZODESES_ADATOKRA_VAR = "Szerződéses adatokra vár";
    case SZERZODES_ATTNEZESRE_VAR = "Szerződés áttnézésre vár";
    case PARTNERI_ALAIRASRA_VAR = "Partneri aláírásra vár";
    case EGYETEMI_ALAIRASRA_VAR = "Egyetemi aláírásra vár";
    case SZERZODES_KIKULDESRE_VAR = "Szerződés kiküldésre vár";
    case SZERZODES_ALAIRVA = "Szerződés aláírva";
    case TIG_JOVAHAGYASRA_VAR = "TIG jóváhagyásra vár";
    case MEGVALOSULT_UF_IGAZOLASRA_VAR = "Megvalósult - UF igazolásra vár";
    case ADATKOZLO_FELKULDESERE_VAR = "Adatközlő felküldésére vár";
    case ADATKOZLO_FELKULDVE = "Adatközlő felküldve";
    case RENDEZVENY_LEZARVA = "Rendezvény lezárva";

}

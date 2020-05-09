<?php
    /*header('Content-type: text/html; charset=utf-8');

    $jmeno = $_POST["jmeno"];
    $email = $_POST["email"];
    $zvolenaPomoc = $_POST["bezpecnostniOtazka"];


    $zvolenaPomocBezCisel = preg_replace('/[0-9]+/', '', $zvolenaPomoc);
    $kontrolniCislo = round(6.6);
    if ($zvolenaPomocBezCisel . $kontrolniCislo !== $zvolenaPomoc) {
        require "index.html";
        echo "
            <chyba>
                <h2>Špatně jste přepsali slovo do poslední kolonky.</h2>
                <button>Zavřít</button>
            </chyba>";
        $nepokracovat = true;
    }

    if (!isset($jmeno) || !isset($email) || !isset($zvolenaPomoc)) {
        require "index.html";
        echo "
            <chyba>
                <h2>Nevyplnili jste všechna políčka.</h2>
                <button>Zavřít</button>
            </chyba>";
        $nepokracovat = true;
    }

    if (!$nepokracovat) {
        $zprava = "Anglická záchranka: nový pacient\n\n"
        . "Zvolená pomoc: " . $zvolenaPomocBezCisel . "\n\n"
        . "Jméno: " . $jmeno . "\n\n"
        . "E-mail: " . $email . "\n\n";

        if (mail("buresdv@icloud.com", "A-Z: Nový uchazeč o " . $zvolenaPomocBezCisel, $zprava)) {
            require "odeslano.html";
        }
    }*/
    header("Content-type: text/html; charset=utf-8");

    $email = $_POST["email"];
    $sluzba = array_filter($_POST["sluzba"]);
    $stranky = array_filter($_POST["stranky"]);
    $zahrnoutKorekturu = $_POST["zahrnoutKorekturu"];
    $zahrnoutGrafickouUpravu = $_POST["grafickaUprava"];
    $mimoStandardniHodiny = $_POST["mimoStandardniHodiny"];

    $sluzba = implode("I", $sluzba);
    $stranky = implode("I", $stranky);
    $arrayPointer = $_POST["typSluzbyHack"];
    
    $vypocitanaCena = $_POST["cenaHack"];

    $zahrnoutKorekturuMail = "❌ <b>Korektura</b> nezahrnuta";
    $zahrnoutGrafickouUpravuMail = "❌ <b>Grafická úrava</b> nezahrnuta";
    $mimoStandardniHodinyMail = "❌ <b>Zakázka mimo standardní hodiny</b>";

    if (!empty($zahrnoutKorekturu)) {
        $zahrnoutKorekturuMail = "✔ Zahrnuta <b>korektura</b>";
    }
    if (!empty($zahrnoutGrafickouUpravu)) {
        $zahrnoutGrafickouUpravuMail = "✔ Zahrnuta <b>grafická úprava</b>";
    }
    if (!empty($mimoStandardniHodiny)) {
        $mimoStandardniHodinyMail = "✔ Zakázka <b>mimo standardní hodiny</b>";
    }

    $doporuceni = array(
        'uceleneTexty' => 'text, který chcete přeložit, ve formátech Word .docx, OpenOffice .odt, nebo .pdf.',
        'appleAplikace' => 'lokalizační soubory, které budete chtít přeložit (např. složku cs.lproj nebo soubory .strings).',
        'weboveStranky' => 'všechny .html soubory, které budete chtít přeložit, a jakékoliv další soubory, které jsou třeba k tomu, aby vaše stránka správně vypadala (např. relevantní .css soubory).',
        'tlumoceni' => 'pár informací o vaší zakázce, například co přesně chcete přetlumočit, v jakém prostředí (budova, venkovní prostory apod.) a v jakém časovém rozmezí.'
    );
    $doplnekDoZpravy = $doporuceni[0][$arrayPointer];

    $headers = 'From: David Bureš <ja@davidbures.cz>' . PHP_EOL .
    'Reply-To: David Bureš <buresdv@gmail.com>' . PHP_EOL .
    'Content-Type: text/html; charset=UTF-8' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    $headersZakaznik = 'From: davidbures.cz <buresdv@gmail.com>' . PHP_EOL .
    'Reply-To: David Bureš <buresdv@gmail.com>' . PHP_EOL .
    'Content-Type: text/html; charset=UTF-8' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    $zprava = "E-mail: " . $email . "\n\n"
        . "Zvolená služba: " . $sluzba . "\n\n"
        . "Počet stránek: " . $stranky . "\n\n"
        . "Cena: " . $vypocitanaCena . "\n\n"
        . $zahrnoutKorekturuMail . "\n\n"
        . $zahrnoutGrafickouUpravuMail . "\n\n"
        . $mimoStandardniHodinyMail . "\n\n"
        . $doplnekDoZpravy;

    mail("buresdv@icloud.com", "Test " . $sluzba, $zprava, $headers);

    $zpravaZakaznik = 'Vaši objednávku jsem přijal a brzy vám poušlu e-mail s dalšími informacemi' . "\n\n"
        . 'Přeji pěkný zbytek dne,' . "\n\n"
        . 'David Bureš';
    

    $subject = "davidbures.cz: Informace o vaší objednávce";
    $sub = '=?UTF-8?B?'.base64_encode($subject).'?=';
    mail($email, $sub, $zpravaZakaznik, $headersZakaznik);

    /*echo "Elčaaaa 💗💗💗💗💗💗";
    echo "I seriously love you so so so much... You're just... perfect... 💗💗💗💗💗💗 >___<";
    echo '<br> e-mail: <b>' . $email . '</b>';
    echo '<pre>'; print_r($sluzba); echo '</pre>';
    echo '<pre>'; print_r($stranky); echo '</pre>';
    if (!empty($zahrnoutKorekturu)) {
        echo "✔ Zahrnuta <b>korektura</b>";
    }
    if (!empty($zahrnoutGrafickouUpravu)) {
        echo "✔ Zahrnuta <b>grafická úprava</b>";
    }
    if (!empty($mimoStandardniHodiny)) {
        echo "✔ Zakázka <b>mimo standardní hodiny</b>";
    }
    echo "Cena: " . $vypocitanaCena;*/
    /*echo '<pre>'; print_r($zahrnoutKorekturu); echo '</pre>';*/
    /*echo '<pre>'; print_r($zahrnoutGrafickouUpravu); echo '</pre>';*/
?>
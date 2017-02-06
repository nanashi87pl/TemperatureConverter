# TemperatureConverter
Converts temperature from one scale to another





Zadanie: konwerter temperatur
=============================

Utwórz stronę przy użyciu HTML, CSS i PHP, która będzie służyć do konwersji temperatury między stopniami Celsjusza, Fahrenheita oraz kelwinami.
Na stronie powinien znaleźć się formularz do wpisania wartości temperatury w wybranej jednostce oraz wyboru jednostki docelowej.
Po naciśnięciu przycisku `Przelicz` pojawia się wartość po konwersji.

Po odebraniu danych z formularza, skrypt PHP powinien sprawdzać poprawność tych danych.
Na przykład temperatura zera absolutnego to `-273,15` stopni Celsjusza.
Z kolei skala Kelvina zaczyna się od `0 K`.
Pokaż użytkownikowi błędy walidacji danych.
Sprawdź, czy wpisano poprawną liczbę i wybrano prawidłową jednostkę.

Choć zadanie wydaje się trywialne, to z punktu widzenia kodu można wykonać je na wiele różnych sposobów.
My będziemy oceniać kod według następujących kryteriów:

1. Czytelność kodu i jego logiczna struktura. Elastyczność, łatwość rozbudowy i testowania. Zrozumiałe nazwy klas, metod, zmiennych - w języku angielskim.

2. Poprawne działanie w najnowszej wersji PHP. Odporność na błędy i niepoprawne dane.

3. Programowanie obiektowe: oddzielenie logiki biznesowej od wyglądu strony. Spróbuj na przykład potraktować temperaturę jako tzw. _value object_, czyli osobną klasę przechowującą jedną konkretną wartość z mechanizmem walidacji - jak `Integer` w Javie. Umieść swoje klasy w osobnym _namespace_, np. `JanKowalski\KonwerterTemperatur`.

4. Testy jednostkowe klas wykonywane za pomocą PHPUnit lub innego narzędzia. Stopień pokrycia kodu testami, sprawdzanie różnych przypadków.

5. Użycie dodatkowych narzędzi i bibliotek, np. Bootstrap, Composer, SASS, Gulp - jeśli uznasz je za przydatne w projekcie.

6. Czy Twój konwerter może zostać łatwo udostępniony jako REST-owe API lub działać w środowisku CLI? Spróbuj wykonać takie interfejsy.

7. Sformatuj kod PHP zgodnie ze standardem PSR-2.

8. Zalecamy umieszczenie kodu w publicznym repozytorium, np. GitHub i przesłanie nam linka.

Wykonanie kodu zgodnego z powyższymi wytycznymi nie tylko zwiększy Twoje szanse w procesie rekrutacji, ale pokaże Ci nasz styl pracy, jak również pomoże rozwinąć Twój warsztat programisty.
Powodzenia!

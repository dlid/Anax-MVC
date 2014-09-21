Redovisning
====================================
 
Kmom03: Bygg ett eget tema
------------------------------------

> Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?

Jag har aldrig använt LESS eller SASS i något projekt tidigare, men jag har testat LESS
med PHP förut men har inte gjort något mer avancerat. Jag har även sneglat på SASS men
har inte använt det. Som jag förstått det så är den stora skillnaden mellan LESS och SASS
att SASS kompileras på serversidan medan det för LESS finns möjligheten att göra det
på klientsidan med JavaScript.

Personligen tycker jag att man ändå borde hantera kompileringen på serversidan och 
inte förlita sig blint på att JavaScript är aktiverat i webbläsaren. Men förutom
att SASS inte riktigt har stöd för kompilering på klientsidan så har jag inte
sett några större skillnader mellan de två.

Anledningen till att jag började med LESS var att jag testade Bootstrap och då
fanns bara en LESS-version tillgänglig. Nu finns däremot en SASS-version också.

> Vad tycker du om LESS, lessphp och Semantic.gs?

Även fast jag tidigare har använt LESS så känns det fortfarande lite magiskt. Jag tycker
att det hierarkiska sättet att skriva på känns väldigt naturligt.

LESS är vad CSS borde ha varit från början. Mixins är otroligt kraftfullt, 
och det gör det så mycket enklare att dela med sig av och återanvända kod.

Jag satt nyligen i ett .NET-projekt där vi började kika på att kompilera SASS-kod
på sreversidan på ett liknande sätt som lessphp gör. På grund av olika omständigheter
så var det väldigt svårt att få till, och vi fick istället kompilera det i ett
script i och med deployen istället. Jämfört med det så är lessphp väldigt enkelt
och lätt att använda.

Jag använde mycket Bootstrap tidigare och tröttnade lite på att man fick för mycket
layout. Jag ville endast ha grid-biten. Då hittade jag [Dead Simple Grid](http://mourner.github.io/dead-simple-grid/) som
jag testade, och semantic.gs har ett liknande - väldigt grundläggande - upplägg.

Med ramverk som bootstrap kan man ganska lätt få väldigt mycket grejer på köpet
som man aldrig använder, om man bara är ute efter grid-systemet så tycker jag det
är skönt att det finns alternativ som Semantic.gs och Dead Simple Grid.

> Vad tycker du om gridbaserad layout, vertikalt och horisontellt?

Det horisontella rutnätet är jag ju bekant med sedan tidigare, jag tror det är
ett ganska vedertaget sätt att bygga sidor nu i.o.m. alla ramverk som hjälper
till med det. Speciellt nu när allt byggs mer och mer responsivt så tror jag att
det horisontella rutnätet har blivit en de facto standard - ungefär som tabeller
var nyckeln till att designa sidor i begynnelsen.

Vertikalt rutnät var däremot något jag aldrig ägnat en tanke åt tidigare. Det
magiska numret och att 16px var den ideala storleken för typsnitt på webben
hade jag heller inte hört talas om. Det var lite meck att få till så det blev rätt 
med alla element som fanns i Lydia:s HTML för typografi, men jag tror att jag
till slut fick det att stämma.	

Detta var en ny aspekt av designtänkandet som jag tycker lade till en spännande
aspekt.

> Har du några kommentarer om Font Awesome, Bootstrap, Normalize?

Font Awsome beskriver sig själv och det är jättesmidigt att ha tillgång till
alla ikoner på ett så enkelt sätt. 

Bootstrap nämnade jag här lite tidigare och jag har bara gott att säga om det. Man
får mycket på köpet, men i vissa fall kanske det är mer än man vill ha. En bra grej
är ju då att helt enkelt använda LESS och välja ut precis de delar man behöver.

Normalize brukar jag använda, men jag har ingen stenkoll på skillnaderna som
normaliseras mellan olika versioner av webbläsare. Jag kan tänka mig att skillnaderna
är störst för äldre webbläsare, men det kanske även finns skillnader i nya versionerna.

> Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?

Jag ritade en liten logotyp som jag scannade in och fixade till med Inkscape. Jag
ville ha ett ganska platt tema med mörk bakgrund, och bilden med polygonen samt
den lilla polygonen i footern tycker jag lyfte upp designen.

Med snygga bilder är det ju enklare att fixa en bra design och jag tog de flesta
bilderna från [unsplash.com](https://unsplash.com/) förutom den på "me"-sidan
som jag tagit själv.

Responsivt så finns det tre brytpunkter.

* När fönstret är minst 960px så låser jag bredden till 960
* När fönstret är 768 eller mindre så visas varje kolumn på separata rader (förutom footer-kolumnerna)
 * Bilden för Main banner justeras så att den ser lite bättre ut på mindre skärm
* När man har större skärm än 1622 så visar jag ev. "flashes" till vänster om wrappern istället. Inte säker på att det är optimalt, men jag testade åtminstone. Om någon vill använda temat så är det ju lätt att fixa så att den visas som vanligt igen.

Utsvävningarna blev väl just "flash"-delen. Har inte övertygat mig själv helt och hållet
att det är bra att lägga ut flash-delarna till vänster om själva wrappern om skärmstorleken tillåter det. Men jag ville som sagt
testa att utnyttja den större yta på något sätt eftersom jag låser bredden på min wrapper vid 960px.

Jag fixade navigeringen så att den blir lite mer touchvänlig om man har en mindre
skärm, och undermenyn fungerar också bra åtminstone till nivå ett.

För övrigt så för Font Awsome och Semantic.gs med sig lite CSS som inte validerar,
men det är jag medveten om.

> Antog du utmaningen som extra uppgift?

Jag valde att prioritera tiden till finjusteringar av layouten; den responsiva
delen och inte minst det vertikala rutnätet som fångade mitt intresse. Så den
här gången gjorde jag inte extrauppgiften.

Kmom02: Kontroller och modeller
------------------------------------

> Hur känns det att jobba med Composer?

Jag var på ett seminarium för en tid sedan där jag fick se hur man jobbar med
[yo](https://www.npmjs.org/package/yo), 
[bower](http://bower.io/) och 
[grunt](http://gruntjs.com/) och blev rätt imponerad. Själv är jag ingrodd
Windowsanvändare med Linuxwannabe - och jag har en tröskel att komma över när
det gäller terminalen och alla utsökta möjligheter som verkar finnas där.

När jag fått igång composer på min lokala miljö så fick jag lite flashback på
seminariet och tyckte det var rätt kul att få det att fungera i Windows på det
sättet. För att testa på studentservern fick jag dock [gå tillbaka lite](http://dbwebb.se/kunskap/att-koppla-upp-dig-mot-en-server-med-ssh-via-terminalen)
för att kolla hur jag kopplade upp mig med putty, men efter det var det inga 
problem.

-----

> Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?

Min första tanke var att det är ju fantastiskt smidigt! Åter igen så föll tankarna
tillbaka på seminariet där han med några kommandon kunde ladda ned en mängd paket
och alla dess dependencies. Jag kan helt klart se nyttan i att lägga upp och
hantera paket på detta sätt - och att via composer enkelt kunna hålla referenserna
uppdaterade är ju också väldigt smidigt!

Jag är dock inte van att sitta med kommandopromoten öppen och jobba så pass aktivt
med den hela tiden, men det är något jag gärna skulle vilja vänja mig vid.

Jag hittade en mängd paket för LESS och minifiering av CSS, JavaScript och HTML som
jag tyckte så intressanta ut. Sedan fanns det ju paket för t.ex. fotoalbum, 
porfolios och sökning m.m. Ett riktigt smörgåsbord som jag måste kika i nästa
gång jag ska bygga något.

-----

> Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt? 

Det begrepp som jag inte riktigt hade hört tidigare var "dispatchern". Men jag tycker
att begreppen sitter rätt bra nu, och i instruktionerna så läste jag meningen som
sammanfattade allt på ett väldigt bra sätt:

>"En frontcontroller som tar emot requesten och dispatchar till controllern
>som använder sig av modellen för att hämta och uppdatera informationen och därefter
>används vyn för att rendera resultatet till en HTML-sida.""

Att sitta och vidareutveckla kommentarfunktionen ledde ju till att jag fick
skapa nya vyer, utöka CommentController, skapa en ny klass som laddas in i
DI, få undersöka vilka funktioner som finns för t.ex. session, request och response.

Även om jag förstod begreppen innan så var det nyttigt att lösa olika utmaningar med
hjälp av ramverket för att få en bättre förståelse. 

-----

> Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?

Jag samlade lite funktionalitet i en ny klass som jag kallade [PageComments](source?path=vendor/phpmvc/comment/src/Comment/PageComments.php).
När man lagt in den klassen och CommentController så är det lätt att lägga in all kommentarfunktionalitet
med funktionen [addToPage](http://localhost:2014/phpmvc/kmom02/webroot/source?path=webroot/index.php#L48).

Lade även in extrafunktionerna med att den större delen av kommentar-formuläret visas
när textarean får fokus. Om man tömmer textfältet och textarean inte har fokus 
så döljs det igen.

Även gravatarfunktionaliteten är inlagd, både med PHP och JavaScript så att den
uppdateras automatiskt när man skriver in en e-postadress och fältet förlorar fokus.

Jämfört med Icke-MVC-Anax så tycker jag redan att den här versionen känns bättre
att jobba med. Strukturen känns tydligare i och med att man alltid har DI i grunden
där man kommer åt allt man kan behöva.

Jag lade in lite validering så att man måste fylla i åtminstone kommentar och namn.

Jag fixade även en liten bugg där [CSession::get](source?path=src/Session/CSession.php#L68)
returnerade null istället för det defaultvärde man kan skicka in som parameter.

Nästa logiska steg vore ju att spara kommentarerna i en databas, och med fördel
att använda något spam-filter som t.ex. Akismet.

Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------

> Vilken utvecklingsmiljö använder du?

Jag sitter med Windows 8.1, XAMPP v3.2.1, PHP 5.4.22 och Sublime Text 3. Jag
har min utvecklingsmiljö portabel i en mapp i min DropBox som gör att det är
ganska lätt att utveckla var jag än sitter eller vilken dator jag än har. Det
ger mig en flexibilitet som gör det lite lättare att läsa dessa kurser eftersom
jag samtidigt jobbar, åker runt mycket och sitter på många olika datorer.

> Är du bekant med ramverk sedan tidigare?

Nej. Jag har vid tillfällen börjat kika runt lite med ambitionen att läsa och
lära mig mer om hur dessa ramverk fungerar så att jag själv kan bygga någonting
liknande med en bra standard. Men det har slutat med att andra saker har fått
prioritet istället.

Jag tyckte guiden om Me-sidan med ANAX MVC var bra, men kände mig också rätt
förvirrad. Det tar jag som ett gott tecken såhär i början av kursen

Jag gillade kapitlet om "Dependency Injection/Service Location" i dokumentationen
för Phalcon och fick både mersmak och huvudvärk då jag insåg hur mycket jag
skulle vilja lära mig mer om detta!

> Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?

Det var ett gäng nya begrepp som jag inte har haft koll på tidigare. T.ex. 
är "Dispatcher" något som jag nog aldrig haft ett namn på tidigare och som
vad jag förstått är koden som tar reda på vilken kontroller som ska användas.

Dependency Injection är något jag inte heller haft en term för, men i varje
litet hobbyprojekt jag gjort så har ju precis de tankarna varit i fokus många
gånger, men de har aldrig riktigt landat.

Övriga begrepp är bektanta. Men även om jag känner till begreppen så skulle
jag inte påstå att jag har någon djupare förståelse för dem, så jag ser fram
emot att lära mig mer!

> Din uppfattning om Anax, och speciellt Anax-MVC?

Som sagt, något förvirrande till en början. Det är många filer och många
moduler i ramverket. Jag blev först lite fundersam över att det allra första steget
var att ladda ned det färdiga ramverket, jag hade ju velat koda själv för att
förstå det djupare. 

Men jag sneglade på kmom02 och ska fortsätta läsa länkarna i kmom01, och jag
tror att jag kommer att ha rätt mycket att göra utan att skriva allt från grunden!

Från tidigare kurser har Anax kännts som en väldigt smidig mall att använda
för att snabbt få upp en sida, och vad jag sett hittills av Anax-MVC så är det
en väldigt spännande förbättring.

Jag lade även upp Anax-MVC på min Github med ambitionen att hålla den uppdaterad
under kursens gång.
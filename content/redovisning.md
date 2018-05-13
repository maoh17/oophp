---
...
Redovisning
=========================



Kmom01
-------------------------

### Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Det gick ganska bra att komma in i tänket med objekt och klasser, trots att jag inte programmerat objektorienterat på många många år. Det som var svårt var som vanligt att komma in i en ny struktur med olika koncept som ska hänga ihop. Det var inte heller helt smärtfritt att komma in i PHP igen efter ett halvårs uppehåll.

### Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Jag tycker att övningsuppgifterna i guiden "Kom igång med objektorienterad programmering i PHP" var bra och pedagogiska. Uppgiften "Gissa numret" var en bra uppgift och strukturerad på ett bra sätt. Det gick bra att bygga koden i klassen. Det var en bra hjälp att följa videoserien även om jag tycker att det borde funnits många fler exempel på hur man använder GET, POST och SESSION i den här strukturen. Jag körde fast ordentligt på SESSION och den lilla kodsnutten som fanns i övningen var inte mycket till hjälp. Jag sparade hela objektet i sessionen, men jag tycker ändå det var knepigt hur jag skulle kombinera sessionen med formuläret och hade önskat att kursmateralet var betydligt bättre här.

### Har du några inledande reflektioner kring me-sidan och dess struktur?
Det var inga problem att få ihop me-sidan eller att få in den på GitHub. Men jag lyckades inte alls hänga med på hur alla delarna i ramverket Anax hänger ihop. Det var för mycket på en gång för att det skulle gå att få en överblick. Jag hade nog också föredragit att skriva den här texten i html istället för markdown. Jag känner att jag har bättre koll på hur jag formaterar texten i html.

### Vilken är din TIL för detta kmom?
Som vanligt i en ny kurs är det trögt att komma igång och få en överblick över vad man håller på med även om det egentligen inte är någon särskilt svår programmering. Men jag tycker att tänket med objekt och klasser är bra och det var en bra grundläggande introduktion till objektorienterad programmering i PHP.


Kmom02
-------------------------

### Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Det gick bra att överföra "Gissa mitt nummer" med GET och POST med hjälp av videoserien. Däremot fick jag än en gång problem med SESSION. Jag kände att jag hade inte tillräcklig koll på hur ramverket funkade även om jag gått igenom hela videoserien i detalj. Nu efteråt vet jag faktiskt inte vad jag körde fast på, mer än att jag la mer än 10 timmar på några rader kod som borde tagit 10 minuter. Jag fick prova mig fram, visste inte hur jag skulle felsöka och jag var inte långt ifrån att ge upp hela kursen i det här kursmomentet.

### Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Efter mina problem med sessioner i både kmom01 och kmom02 tänkte jag först att jag skulle lösa uppgiften utan sessioner, men ju längre jag kom desto mer insåg jag att det skulle nog bli bäst med sessioner i alla fall. Det var en knivig och omfattande uppgift (egentligen alldeles för stor för att vara redan i kmom02) och det gällde att ha koll på både ramverket och objektorienteringen. Men jag försökte gå systematiskt till väga. Börja att lägga in att kunna slå en tärning i ramverket. Sedan göra tärningarna grafiska. Därefter skapade jag en klass för en spelrunda och implementerade den. Till sist skapade jag klassen för hela spelet och kodade så att en spelare kunde spela till 100. När allt detta var klart var det inte jättesvårt att lägga till datorn som spelare. Jag är sjukt nöjd med att jag lyckades få ihop hela spelet utan hjälp, för det var verkligen ingen lätt uppgift som nybörjare på både ramverket och objektorienteringen.

### Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
Jag hade faktiskt stor nytta av UML-modelleringen när jag löste uppgiften med tärningsspelet. Jag skapade först klassen i modellen med dess properties och metoder. Sedan kodade jag klassen. Naturligtvis fick jag gå tillbaka och modifiera modellen ibland när jag upptäckte att jag behövde fler metoder.

phpDocumentor och make doc är ett smidigt sätt att generera dokumentation av den färdiga koden.

### Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Jag ser absolut fördelar med att skriva kod i ett ramverk. Man får mycket kod på köpet. Däremot är det riktigt jobbigt att komma in i och jag tycker nog att kursen gick lite för fort fram med alldeles för lite exempelkod innan man fick försöka lösa uppgifterna själv. Några timmars mer övningar hade nog kunnat spara många dagar i slutändan.

### Vilken är din TIL för detta kmom?
Att objektorienterad PHP funkar alldeles utmärkt för att skriva ett spelprogram. Klasser och objekt var ett naturligt sätt att implementera koden och jag tycker att jag har kommit in bra i tänket.


Kmom03
-------------------------

### Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Nej, inte med enhetstester på det här sättet. Jag har mest skrivit testkod blandat med källkoden tidigare.

### Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Jag tror det är en fördel att tänka lite på att koden ska vara lätt att testa när man skriver källkoden. Att skriva testbar kod innebär att man bör skriva sina klasser med publika metoder som är enkla att definiera testfall för. Kodtäckningen visar hur stor del av källkoden som är testad av enhetstesterna och det är inte alltid möjligt att nå 100%.

Enhetstester är ett bra sätt att testa enskilda klasser och metoder. Det är också bra att automatisera enhetstesterna så att de kan användas vid regressionstestning för att testa att inte nya ändringar gör så gammal kod slutar fungera.

### Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
**White box testing** - Enhetstester där vi har full insyn i källkoden som testas. Vi kan se vilka delar av koden som testas med hjälp av verktyg för kodtäckning.

**Black box testing** - Vi har inte koll på koden som testas, utan det som testas är ofta funktionstester av ett API.

**Grey box testing** - En kombination av white och black box testing. Delar av den interna strukturen är känd, som tex algoritmerna i källkoden.

**Positiva tester** - Testar att mjukvaran fungerar som förväntat.

**Negativa tester** - Syftet med negativa tester är att framkalla fel, tex med felaktig indata och validera att felet hanteras på ett korrekt sätt.


### Hur gick det att genomföra uppgifterna med enhetstester, använde du egna klasser som bas för din testning?
Det här var ett märkligt kursmoment. Jag la nog 90% av tiden på att försöka installera Xdebug på min Mac. Jag gick igenom allt som fanns på dbwebb och följde alla stegen i dokumentationen på Xdebugs webbplats utan att det funkade. phpinfo visade att Xdebug var installerad med den hittades inte av kommandot *php -i | grep Xdebug*. Till slut provade jag att kopiera min php.ini så att den låg både under XAMPP och i /etc/. Då plötsligt...

Själva uppgiften med enhetstesterna gick bra. Det var lätt att förstå hur testfallen skulle skrivas och otroligt överskåligt att se kodtäckningen grafiskt. Jag bytte inte exempelklasserna mot mina egna för mina såg nästan likadana ut.

Jag tyckte att PHPUnit-manualen var riktigt dålig på att beskriva hur test av Exceptions fungerar och hur resultatet ska tolkas. Synd att dbwebb inte ger något mer än att hänvisa till manualen.


### Vilken är din TIL för detta kmom?
Att jag har lärt mig skriva enkla enhetstester med verktyget PHPUnit.


Kmom04
-------------------------

### Vilka är dina tankar och funderingar kring trait och interface?
Trait är kodmoduler som kan återanvändas i flera klasser. Då PHP inte har stöd för multipelt arv kan trait användas istället. Precis som i vanligt arv så utökas funktionaliteten i en klass med nya metoder och variabler.

Ett interface är ett slags kontrakt där en klass lovar att erbjuda en viss uppsättning metoder. Metoderna i interfacet kan finnas antingen i klassen direkt eller t.ex. i en trait som används av klassen.

Jag ser fördelarna med att kunna återanvända kod med trait och interface, men samtidigt tycker jag att strukturen blir mer komplex med fler filer. Det var inte helt enkelt att få ett grepp om vilken fil som gör vad. Kanske beror det på att allt är nytt för mig just nu.

### Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Jag gjorde först en sannolikhetsberäkning av var gränsvärdet för när man bör stanna ligger. Inte helt säker på att formeln jag tog fram i ett kalkylark är hundra procent korrekt, men resultatet 16 verkar rimligt. Grundregeln är alltså att om poängen i spelrundan är 16 eller högre bör man stanna. Sedan la jag bara till några enkla specialfall.

Om båda spelarna är nära slutet (har över en viss poäng) och det är stor risk att motspelaren vinner i nästa kast då fortsätter jag spela. Om motspelaren har över 70 poäng och jag ligger mer än 30 poäng efter då börjar jag chansa och ökar gränsvärdet. De här specialfallen är helt ovetenskapliga och bygger enbart på min egen intuition.

### Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Jag antar att det finns fördelar eftersom det nämndes i videon. Koden ser bra ut och det ska bland annat bli enklare att testa. Nackdelen är förstås om man skulle byta ramverk i framtiden. Då blir det mer kod att skriva om.

### Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Det gick ganska bra. Det blev mycket kod men det mesta var enkelt att skriva. Utmaningen var att validera tärningskasten som ju är slumpmässiga. När jag nått en kodtäckning på 96% kände jag mig nöjd.

### Vilken är din TIL för detta kmom?
Jag tror jag har greppat konceptet med trait och interface så pass mycket att jag vet ungefär när det kan användas. Det får bli ett specialverktyg i den objektorienterade verktygslådan att plocka fram när det behövs (men inte annars).


Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten

var Detector = function getFontsEnum(){
    // Code taken from fingerprintjs2
    var fontsToTest = ['Arial Narrow Gras', 'NewJumja', 'TSCu', 'Times Italique', 'CL', 'Latin Modern Roman Dunhill', 'Latin Modern Roman Unslanted', 'Helvetica Gras', 'Times New Roman Italique', 'Arial Narrow Gras Italique', 'MotoyaG04Mincho', 'Ume Gothic S4', 'SignPainter', 'Bordeaux Roman Bold LET', 'Ume Gothic O5', 'Latin Modern Mono Light Cond', 'Bell Gothic Std Light', 'pcf', 'boot', 'Latin Modern Mono', 'Arial Gras Italique', 'Police système Moyen', 'Letter Gothic', 'IV50', 'Trebuchet MS Gras Italique', 'Kohinoor Devanagari', 'Times Gras', 'cursor', 'Latin Modern Sans Demi Cond', 'Courier Gras', 'MSung B5HK', 'Police système Intense', 'Police système Gras', 'Courier New Gras Italique', 'Apple Emoji couleur', 'SAPDings', 'Coronet', 'Latin Modern Mono Prop', 'Georgia Gras Italique', 'Times Gras italique', 'Klee', 'Orange LET', 'TAMu', 'Ume Gothic S5', 'Ruach LET', 'Ume P Gothic O5', 'Arial Italique', 'ITF Devanagari', 'Nuosu SIL', 'Wolf', 'Trebuchet MS Gras', 'TG Pagella Math', 'Police système Léger', 'HolidayPi BT', 'Ro', 'Westwood LET', 'Latin Modern Mono Caps', 'Charlie', 'Ume P Gothic S4', 'Yuanti TC', 'Bradley Hand', 'Times New Roman Gras', 'HCR Batang', 'Ume P Mincho', 'Trebuchet MS Italique', 'msam10', 'SchoolHouse Printed A', 'ParkAvenue BT', 'stmary10', 'Earth', 'Tlwg Typewriter', 'Latin Modern Roman Demi', 'W', 'Courier New Italique', 'eufm10', 'Comic Sans MS Gras', 'Lohit Odia', 'Brush Script MT Italique', 'Bodoni 72', 'Arial Black Normal', 'Police système Courant', 'John Handy LET', 'Highlight LET', 'Kievit Offc Pro', 'Verdana Italique', 'AR PL UMing TW', 'Victorian LET', 'Ume Mincho S3', 'Laksaman', 'Ume Mincho', 'Smudger LET', 'Phosphate', 'La Bamba LET', 'Arial Gras', 'Bickham Script Pro Regular', 'Police système Italique', 'SAPIcons', 'Droid Sans Devanagari', 'Clarendon', 'Princetown LET', 'Odessa LET', 'Police système', 'Ume Gothic C4', 'University Roman LET', 'Ki', 'TG Termes Math', 'Latin Modern Roman Slanted', 'Quixley LET', 'Verdana Gras Italique', 'Times New Roman Gras Italique', 'Synchro LET', 'Georgia Gras', 'Blackletter686 BT', 'wasy10', '36p Kana', 'AR PL UMing TW MBE', 'HCR Dotum', 'Eeyek Unicode', 'rsfs10', 'MotoyaG04GothicMono', 'Scruff LET', 'Gabo Drive', 'Latin Modern Roman Caps', 'One Stroke Script LET', 'Rage Italic LET', 'Lohit Gurmukhi', 'Latin Modern Mono Slanted', 'Arial monospaced for SAP', 'Bodoni 72 Oldstyle', 'MotoyaG04Gothic', 'Ume P Gothic C4', 'PingFang HK', 'Oxygen-Sans', 'Ume P Gothic', 'Khmer OS Content', 'Tsukushi A Round Gothic', 'MSung GB18030', 'Latin Modern Sans Quotation', 'HyhwpEQ', 'Ume Gothic C5', 'Albertus Medium', 'Broadway BT', 'Tlwg Mono', 'Calligraph421 BT', 'FixedSys', 'MisterEarl BT', 'Cataneo BT', 'Pump Demi Bold LET', 'Latin Modern Mono Prop Light', 'Tahoma Gras', 'Marigold', 'Nimbus Sans Narrow', 'Microsoft Yahei', 'Bodoni 72 Smallcaps', 'SchoolHouse Cursive B', 'Mekanik LET', 'Montserrat SemiBold', 'Verdana Gras', 'Enigmatic Unicode', 'Ume Gothic', 'PingFang TC', 'Latin Modern Sans', 'URW Gothic', 'Bradley Hand Gras', 'WenQuanYi Zen Hei Sharp', 'PingFang SC', 'ITF Devanagari Marathi', 'Georgia Italique', 'Latin Modern Mono Light', 'P', 'Tiranti Solid LET', 'Garamond Premr Pro', 'Mona Lisa Solid ITC TT', 'Hiragino Sans', 'AR PL UMing HK', 'Virgo 01', 'AR PL UMing CN', 'Staccato222 BT', 'ori1Uni', 'Ume P Mincho S3', 'OldDreadfulNo7 BT', 'Latin Modern Roman', 'Milano LET', 'esint10', 'WST', 'IPT', 'Courier New Gras', 'Ume UI Gothic', 'Arial Narrow Italique', 'Fixed', 'msbm10', 'Ume P Gothic S5', 'Mishafi Gold', 'Police système Semi-gras', 'Noto Sans Emoji', 'Thonburi Gras', 'Ume UI Gothic O5', 'Roman SD', 'PakType Naqsh', 'Ostrich Sans Heavy', 'Ume P Gothic C5', 'BRK', 'MotoyaG04MinchoMono', 'Tsukushi B Round Gothic', 'IV25', '12x10'];
    fontsToTest = fontsToTest.concat(['cursive', 'monospace', 'serif', 'sans-serif', 'fantasy', 'default', 'Arial', 'Arial Black', 'Arial Narrow', 'Arial Rounded MT Bold', 'Book Antiqua', 'Bookman Old Style', 'Bradley Hand ITC', 'Bodoni MT', 'Calibri', 'Century', 'Century Gothic', 'Casual', 'Comic Sans MS', 'Consolas', 'Copperplate Gothic Bold', 'Courier', 'Courier New', 'English Text MT', 'Felix Titling', 'Futura', 'Garamond', 'Geneva', 'Georgia', 'Gentium', 'Haettenschweiler', 'Helvetica', 'Impact', 'Jokerman', 'King', 'Kootenay', 'Latha', 'Liberation Serif', 'Lucida Console', 'Lalit', 'Lucida Grande', 'Magneto', 'Mistral', 'Modena', 'Monotype Corsiva', 'MV Boli', 'OCR A Extended', 'Onyx', 'Palatino Linotype', 'Papyrus', 'Parchment', 'Pericles', 'Playbill', 'Segoe Print', 'Shruti', 'Tahoma', 'TeX', 'Times', 'Times New Roman', 'Trebuchet MS', 'Verdana', 'Verona', 'Arial Cyr', 'Comic Sans MS', 'Arial Black', 'Chiller', 'Arial Narrow', 'Arial Rounded MT Bold', 'Baskerville Old Face', 'Berlin Sans FB', 'Blackadder ITC', 'Lucida Console', 'Symbol', 'Times New Roman', 'Webdings', 'Agency FB', 'Vijaya', 'Algerian', 'Arial Unicode MS', 'Bodoni MT Poster Compressed', 'Bookshelf Symbol 7', 'Calibri', 'Cambria', 'Cambria Math', 'Kartika', 'MS Mincho', 'MS Outlook', 'MT Extra', 'Segoe UI', 'Aharoni', 'Aparajita', 'Amienne', 'cursive', 'Academy Engraved LET', 'LCD', 'LuzSans-Book', 'sans-serif', 'ZWAdobeF', 'Eurostile', 'SimSun-PUA', 'Blackletter686 BT', 'Myriad Web Pro Condensed', 'Matisse ITC', 'Bell Gothic Std Black', 'David Transparent', 'Adobe Caslon Pro', 'AR BERKLEY', 'Australian Sunrise', 'Myriad Web Pro', 'Gentium Basic', 'Highlight LET', 'Adobe Myungjo Std M', 'GothicE', 'HP PSG', 'DejaVu Sans', 'Arno Pro', 'Futura Bk', 'DejaVu Sans Condensed', 'Euro Sign', 'Neurochrome', 'Bell Gothic Std Light', 'Jokerman Alts LET', 'Adobe Fan Heiti Std B', 'Baby Kruffy', 'Tubular', 'Woodcut', 'HGHeiseiKakugothictaiW3', 'YD2002', 'Tahoma Small Cap', 'Helsinki', 'Bickley Script', 'Unicorn', 'X-Files', 'GENISO', 'Frutiger SAIN Bd v.1', 'Opus', 'ZDingbats', 'ABSALOM', 'Vagabond', 'Year supply of fairy cakes', 'Myriad Condensed Web', 'Segoe Media Center', 'Coronet', 'Helsinki Metronome', 'Segoe Condensed', 'Weltron Urban', 'AcadEref', 'DecoType Naskh', 'Freehand521 BT', 'Opus Chords Sans', 'Enviro', 'SWGamekeys MT', 'Croobie', 'Arial Narrow Special G1', 'AVGmdBU', 'Candles', 'Futura Bk BT', 'Andy', 'QuickType', 'WP Arabic Sihafa', 'DigifaceWide', 'ELEGANCE', 'BRAZIL', 'Pepita MT', 'Nina', 'Geneva', 'OCR B MT', 'Futura', 'Blade Runner Movie Font', 'Allegro BT', 'Lucida Blackletter', 'AGA Arabesque', 'AdLib BT', 'Clarendon', 'Monotype Sorts', 'Alibi', 'Bremen Bd BT', 'mono', 'News Gothic MT', 'AvantGarde Bk BT', 'chs_boot', 'fantasy', 'Palatino', 'BernhardFashion BT', 'Courier New', 'CloisterBlack BT', 'Scriptina', 'Tahoma', 'BernhardMod BT', 'Virtual DJ', 'Nokia Smiley', 'Boulder', 'Andale Mono IPA', 'Belwe Lt BT', 'Calligrapher', 'Belwe Cn BT', 'Tanseek Pro Arabic', 'FuturaBlack BT', 'Abadi MT Condensed', 'Mangal', 'Chaucer', 'Belwe Bd BT', 'Liberation Serif', 'DomCasual BT', 'Bitstream Vera Sans', 'URW Gothic L', 'GeoSlab703 Lt BT', 'Bitstream Vera Sans Mono', 'Nimbus Mono L', 'Heather', 'Antique Olive', 'Clarendon Cn BT', 'Amazone BT', 'Bitstream Vera Serif', 'Utopia', 'Americana BT', 'Map Symbols', 'Bitstream Charter', 'Aurora Cn BT', 'CG Omega', 'Lohit Punjabi', 'Balloon XBd BT', 'Akhbar MT', 'Courier 10 Pitch', 'Benguiat Bk BT', 'Market', 'Cursor', 'Bodoni Bk BT', 'Letter Gothic', 'Luxi Sans', 'Brush455 BT', 'Sydnie', 'Lohit Hindi', 'Lithograph', 'Albertus', 'DejaVu LGC Serif', 'Lydian BT', 'Antique Olive Compact', 'KacstArt', 'Incised901 Bd BT', 'Clarendon Extended', 'Lohit Telugu', 'Incised901 Lt BT', 'GiovanniITCTT', 'KacstOneFixed', 'Folio XBd BT', 'Edda', 'Loma', 'Formal436 BT', 'Fine Hand', 'Garuda', 'Impress BT', 'RefSpecialty', 'Sazanami Mincho', 'Staccato555 BT', 'VL Gothic', 'Hkmer OS', 'WP BoxDrawing', 'Clarendon Blk BT', 'Droid Sans', 'CommonBullets', 'Sherwood', 'Helvetica', 'CopprplGoth Bd BT', 'Smudger Alts LET', 'BPG Rioni', 'CopprplGoth BT', 'Guitar Pro 5', 'Estrangelo TurAbdin', 'Dauphin', 'Arial Tur', 'English111 Vivace BT', 'Steamer', 'OzHandicraft BT', 'Futura Lt BT', 'Liberation Sans Narrow', 'Futura XBlk BT', 'Candy Round BTN Cond', 'GoudyHandtooled BT', 'GrilledCheese BTN Cn', 'GoudyOlSt BT', 'Galeforce BTN', 'Kabel Bk BT', 'Sneakerhead BTN Shadow', 'OCR-A BT', 'Denmark', 'OCR-B 10 BT', 'Swiss921 BT', 'PosterBodoni BT', 'Arial (Arabic)', 'Serifa BT', 'FlemishScript BT', 'Arial', 'American Typewriter', 'Arial Black', 'Apple Symbols', 'Arial Narrow', 'AppleMyungjo', 'Arial Rounded MT Bold', 'Zapfino', 'Arial Unicode MS', 'BlairMdITC TT-Medium', 'Century Gothic', 'Cracked', 'Papyrus', 'KufiStandardGK', 'Plantagenet Cherokee', 'Courier', 'Helvetica', 'Baskerville Old Face', 'Apple Casual', 'Type Embellishments One LET', 'Bookshelf Symbol 7', 'Abadi MT Condensed Extra Bold', 'Calibri', 'Calibri Bold', 'Calisto MT', 'Chalkduster', 'Cambria', 'Franklin Gothic Book Italic', 'Century', 'Geneva CY', 'Franklin Gothic Book', 'Helvetica Light', 'Gill Sans MT', 'Academy Engraved LET', 'MT Extra', 'Bank Gothic', 'Eurostile', 'Bodoni SvtyTwo SC ITC TT-Book', 'Tekton Pro', 'Courier CE', 'Maestro', 'BO Futura BoldOblique', 'Lucida Bright Demibold', 'New', 'AGaramond', 'Charcoal', 'DIN-Black', 'Lucida Sans Demibold', 'Stone Sans OS ITC TT-Bold', 'AGaramond Italic', 'Bickham Script Pro Regular', 'Adobe Arabic Bold', 'AGaramond Semibold', 'Al Bayan Bold', 'Doremi', 'AGaramond SemiboldItalic', 'Arno Pro Bold', 'Casual', 'B Futura Bold', 'Frutiger 47LightCn', 'Gadget', 'HelveticaNeueLT Std Bold', 'Frutiger 57Cn', 'DejaVu Serif Italic Condensed', 'Myriad Pro Black It', 'Frutiger 67BoldCn', 'Gentium Basic Bold', 'Sand', 'GillSans', 'H Futura Heavy', 'Liberation Mono Bold', 'GillSans Bold', 'Cambria Math', 'Courier Final Draft', 'HelveticaNeue BlackCond', 'cursive', 'Techno', 'HelveticaNeue BlackCondObl', 'Gabriola', 'JazzText Extended', 'HelveticaNeue BlackExt', 'sans-serif', 'Textile', 'HelveticaNeue BlackExtObl fantasy', 'HelveticaNeue BoldCond', 'Palatino Linotype Bold', 'HelveticaNeue BoldCondObl', 'BIRTH OF A HERO', 'HelveticaNeue BoldExt', 'Bleeding Cowboys', 'HelveticaNeue BoldExtObl', 'ChopinScript', 'HelveticaNeue ExtBlackCond', 'LCD', 'HelveticaNeue ExtBlackCondObl', 'Myriad Web Pro Condensed', 'HelveticaNeue HeavyCond', 'Scriptina', 'HelveticaNeue HeavyCondObl', 'OpenSymbol', 'HelveticaNeue HeavyExt', 'Virtual DJ', 'HelveticaNeue HeavyExtObl', 'Guitar Pro 5', 'HelveticaNeue LightCondObl', 'Nueva Std', 'HelveticaNeue ThinCond', 'Chicago', 'HelveticaNeue ThinCondObl', 'Nueva Std Bold', 'Brush Script MT', 'Capitals', 'Myriad Web Pro', 'Avant Garde', 'B Avant Garde Demi', 'Nueva Std Bold Italic', 'BI Avant Garde DemiOblique', 'MaestroTimes', 'Univers BoldExtObl', 'APC Courier', 'Myriad Web Pro Bold', 'Liberation Serif', 'Myriad Pro Light', 'Carta', 'DIN-Bold', 'DIN-Light', 'Myriad Web Pro Condensed Italic', 'DIN-Medium', 'Tekton Pro Oblique', 'DIN-Regular', 'AScore', 'HelveticaNeue UltraLigCondObl', 'Opus', 'HelveticaNeue UltraLigExt', 'Myriad Pro Light It', 'HelveticaNeue UltraLigExtObl', 'Opus Chords Sans', 'HO Futura HeavyOblique', 'Opus Japanese Chords', 'L Frutiger Light', 'VT100', 'L Futura Light', 'Helsinki', 'LO Futura LightOblique', 'Helsinki Metronome', 'Myriad Pro Black', 'New York', 'O Futura BookOblique', 'R Frutiger Roman', 'Reprise', 'TradeGothic', 'Warnock Pro Bold Caption', 'Univers 45 Light', 'Warnock Pro', 'XBO Futura ExtraBoldOblique', 'Univers 45 LightOblique', 'Liberation Mono', 'Univers 55 Oblique', 'UC LCD', 'Univers 57 Condensed', 'Warnock Pro Bold', 'Univers ExtraBlack', 'Warnock Pro Light Ital Subhead', 'Univers LightUltraCondensed', 'Matrix Ticker', 'Univers UltraCondensed', 'Fang Song']);

    return new Promise(function(resolve, reject){
        document.addEventListener("DOMContentLoaded", function(event){
            var baseFonts = ["monospace", "sans-serif", "serif"];
            var testString = "mmmmmmmmmmlli";
            var testSize = "72px";
            var h = document.getElementsByTagName("body")[0];

            // div to load spans for the base fonts
            var baseFontsDiv = document.createElement("div");

            // div to load spans for the fonts to detect
            var fontsDiv = document.createElement("div");

            var defaultWidth = {};
            var defaultHeight = {};

            // creates a span where the fonts will be loaded
            var createSpan = function() {
                var s = document.createElement("span");
                /*
                * We need this css as in some weird browser this
                * span elements shows up for a microSec which creates a
                * bad user experience
                */
                s.style.position = "absolute";
                s.style.left = "-9999px";
                s.style.fontSize = testSize;
                s.style.lineHeight = "normal";
                s.innerHTML = testString;
                return s;
            };

            var createSpanWithFonts = function(fontToDetect, baseFont) {
                var s = createSpan();
                s.style.fontFamily = "'" + fontToDetect + "'," + baseFont;
                return s;
            };

            var initializeBaseFontsSpans = function() {
                var spans = [];
                for (var index = 0, length = baseFonts.length; index < length; index++) {
                    var s = createSpan();
                    s.style.fontFamily = baseFonts[index];
                    baseFontsDiv.appendChild(s);
                    spans.push(s);
                }
                return spans;
            };

            var initializeFontsSpans = function() {
                var spans = {};
                for(var i = 0, l = fontsToTest.length; i < l; i++) {
                    var fontSpans = [];
                    for(var j = 0, numDefaultFonts = baseFonts.length; j < numDefaultFonts; j++) {
                        var s = createSpanWithFonts(fontsToTest[i], baseFonts[j]);
                        fontsDiv.appendChild(s);
                        fontSpans.push(s);
                    }
                    spans[fontsToTest[i]] = fontSpans;
                }
                return spans;
            };

            var isFontAvailable = function(fontSpans) {
                var detected = false;
                for(var i = 0; i < baseFonts.length; i++) {
                    detected = (fontSpans[i].offsetWidth !== defaultWidth[baseFonts[i]] || fontSpans[i].offsetHeight !== defaultHeight[baseFonts[i]]);
                    if(detected) {
                        return detected;
                    }
                }
                return detected;
            };

            var baseFontsSpans = initializeBaseFontsSpans();

            // add the spans to the DOM
            h.appendChild(baseFontsDiv);

            // get the default width for the three base fonts
            for (var index = 0, length = baseFonts.length; index < length; index++) {
                defaultWidth[baseFonts[index]] = baseFontsSpans[index].offsetWidth; // width for the default font
                defaultHeight[baseFonts[index]] = baseFontsSpans[index].offsetHeight; // height for the default font
            }

            // create spans for fonts to detect
            var fontsSpans = initializeFontsSpans();

            // add all the spans to the DOM
            h.appendChild(fontsDiv);

            // check available fonts
            var available = [];
            for(var i = 0, l = fontsToTest.length; i < l; i++) {
                if(isFontAvailable(fontsSpans[fontsToTest[i]])) {
                    available.push(fontsToTest[i]+"--true");
                }else{
                    available.push(fontsToTest[i]+"--false");
                }
            }

            // remove spans from DOM
            h.removeChild(fontsDiv);
            h.removeChild(baseFontsDiv);
            return resolve(available.join(";;"));
        });
    });
}
/*var Detector = function() {
    // a font will be compared against all the three default fonts.
    // and if it doesn't match all 3 then that font is not available.
    var baseFonts = ['monospace', 'sans-serif', 'serif'];

    //we use m or w because these two characters take up the maximum width.
    // And we use a LLi so that the same matching fonts can get separated
    var testString = "mmmmmmmmmmlli";

    //we test using 72px font size, we may use any size. I guess larger the better.
    var testSize = '72px';

    var h = document.getElementsByTagName("body")[0];

    // create a SPAN in the document to get the width of the text we use to test
    var s = document.createElement("span");
    s.style.fontSize = testSize;
    s.innerHTML = testString;
    var defaultWidth = {};
    var defaultHeight = {};
    for (var index in baseFonts) {
        //get the default width for the three base fonts
        s.style.fontFamily = baseFonts[index];
        h.appendChild(s);
        defaultWidth[baseFonts[index]] = s.offsetWidth; //width for the default font
        defaultHeight[baseFonts[index]] = s.offsetHeight; //height for the defualt font
        h.removeChild(s);
    }

    function detect(font) {
        var detected = false;
        for (var index in baseFonts) {
            s.style.fontFamily = font + ',' + baseFonts[index]; // name of the font along with the base font for fallback.
            h.appendChild(s);
            var matched = (s.offsetWidth != defaultWidth[baseFonts[index]] || s.offsetHeight != defaultHeight[baseFonts[index]]);
            h.removeChild(s);
            detected = detected || matched;
        }
        return detected;
    }

    this.detect = detect;
};*/
var x = Detector();
var txt += "fuentes detectadas: ";
for (int i=0; i<x.length; i++){
    txt+= x[i] + "<br/>";
}
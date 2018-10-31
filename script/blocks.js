        console.log("blocks.js");
        var startLeft = -15;
        var lungimeRand = -50;
        var temp = 0;
        var rand = 0;
        var tempLungime = 0;
        var tempStanga = 20;
        var stop = 0;
        var pozitie = 1;

        //
        function drawPiesa() {
            if (stop == 1) {
                window.location.reload();
            } else {
                stop = 1;
            }

            $(".container").html("");
            for (var i = 0; rand < 11; i++) {

                if (i > 0 && lungimeRand > 474) {
                    lungimeRand = -50;
                    rand++;
                }

                if (i % 2 == 0 || i == 0) {

                    $(".container").html($(".container").html() + CreazaPiesa(2));
                } else {
                    $(".container").html($(".container").html() + CreazaPiesa(1));
                }
            }
            $("button").html("Reload Page");
        }

        function newShape() {
            var tint = getRandom();

        }

        function getRandom() {
            return Math.floor(Math.random() * 20);
        }

        function CreazaPiesa(numar) {
            var dreapta = getRandom();
            tempLungime = (50 - tempStanga);
            lungimeRand += tempLungime;
            var rezultat = '<div id="spatiu_'+pozitie+' "class="piesa' + numar + '" style="border-left-width: ' + (tempStanga) + 'px;border-right-width: ' + dreapta + 'px;left:' + (lungimeRand) + 'px; top: ' + (rand * 51) + 'px"></div>';
            tempStanga = dreapta;
            console.log("creeare piesa");
            pozitie++;

            return rezultat;
        }

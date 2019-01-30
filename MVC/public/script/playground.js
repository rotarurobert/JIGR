Array.prototype.remove = function(start, end) {
            this.splice(start, end);
            return this;
        }

        view.currentScroll = new Point(0, 0);
        var scrollVector = new Point(0,0);
        var scrollMargin = 32;

        var imgWidth = document.getElementById("puzzle-image").width ;
        var imgHeight = document.getElementById("puzzle-image").height;

        //setari pentru puzzle : numar piese rand/coloana,dimensiunea piesei, dimensiunea imaginii dupa care sa se faca puzelul
        var tileWidth = 50;

        var config = ({
            zoomScaleOnDrag: 1.125,
            imgName: 'puzzle-image',
            tileWidth: tileWidth,
            tilesPerRow: 10,
            tilesPerColumn: 8,
            imgWidth: Math.floor(imgWidth/tileWidth)*tileWidth,
            imgHeight: Math.floor(imgHeight/tileWidth)*tileWidth,
            shadowWidth: 120
        });
        //cream entitatea puzzle dupa configul creat mai sus
        var puzzle = new Html5Puzzle(config);
        console.log(puzzle);
        //setam un zoom default pentru a se incadra mai bine in containerul nostru
        puzzle.zoom(-.3);
        var path;
        var movePath = false;


        document.getElementById("preview").addEventListener("click", function previewImage(){
            var image = document.getElementById("puzzle-image");
            var canvas = document.getElementById("canvas");
            var grid = document.getElementsByClassName("item main");
            console.log(grid[0].clientWidth);
            if(canvas.style.display === "none"){
                canvas.style.display = "block";
                image.style = '';
                image.style.display = "none";
            }
            else{
                canvas.style.display = "none";
                image.style.display = "block";
                image.style.marginLeft = String(grid[0].clientWidth/2 - imgWidth/2) + "px" ;
                image.style.marginTop = String(grid[0].clientHeight - imgHeight/2) + "px";
            }
        });


        document.getElementById("reset").addEventListener("click", function resetGame(){
            location.reload();
        });


        document.getElementById("save").addEventListener("click", function saveGame(){
            for (i = 0 ; i< puzzle.tiles.length; i++){
                localStorage.setItem(i, JSON.stringify(puzzle.tiles[i]));
            }
        });




        

        //setam un event pentru cand dam click pe piesa
        function onMouseDown(event) {
            puzzle.pickTile();
        }


//setam un event pentru cand dam drumu la click de pe piesa
        function onMouseUp(event) {
            puzzle.releaseTile();
        }


//setam un event pentru cand miscam mouseul
        function onMouseMove(event) {
            puzzle.mouseMove(event.point, event.delta);

            if (event.point.x < scrollMargin) {
                scrollVector = new Point(scrollMargin - event.point.x, 0);
            }
            else {
                scrollVector = new Point(0, 0);
            }
        }



        function onMouseDrag(event) {
            puzzle.dragTile(event.delta);
        }



        function onKeyUp(event) {
            switch(event.key) {
                case 'z':
                    puzzle.zoom(.1);
                    break;
                case 'x':
                    puzzle.zoom(-.1);
                    break;
                }
        }


//metoda principala a jocului
        function Html5Puzzle(config) {
        //din configul mai sus mentionat punem variabilele in pozitia aferenta
            instance = this;
            this.currentZoom = 1;
            this.zoomScaleOnDrag = config.zoomScaleOnDrag;
            this.imgName = config.imgName;
            this.shadowWidth = config.shadowWidth;
            this.puzzleImage = new Raster(config.imgName);
            this.puzzleImage.position = view.center;
            this.puzzleImage.visible = false;
            this.tileWidth = config.tileWidth;
            this.tilesPerRow = Math.ceil(config.imgWidth / config.tileWidth);
            this.tilesPerColumn = Math.ceil(config.imgHeight / config.tileWidth);
            this.tileMarginWidth = this.tileWidth * 0.203125;
            this.selectedTile = undefined;
            this.selectedTileIndex = undefined;
            this.selectionGroup = undefined;
            this.shadowScale = 1.5;
            this.tiles = createTiles(this.tilesPerRow, this.tilesPerColumn);



            //cream piesele utilizand date din config
            function createTiles(xTileCount, yTileCount) {
                var tiles = new Array();
                var tileRatio = instance.tileWidth / 100.0;
                //cream array-ul de piese
                var shapeArray = getRandomShapes(xTileCount, yTileCount);
                var tileIndexes = new Array();


                for (var y = 0; y < yTileCount; y++) {
                    for (var x = 0; x < xTileCount; x++) {
                        //piesa
                        var shape = shapeArray[y * xTileCount + x];
                        //ii dam forma
                        var mask = getMask(tileRatio, shape.topTab, shape.rightTab, shape.bottomTab, shape.leftTab, instance.tileWidth);
                        mask.opacity = 0.25;
                        mask.strokeColor = '#fff';
                        //clonam imaginea initiala
                        var cloneImg = instance.puzzleImage.clone();
                        //setam clona la piesa in pozitia care ii arata doar zona ocupata de piesa
                        var img = getTileRaster(
                            cloneImg,
                            new Size(instance.tileWidth, instance.tileWidth),
                            new Point(instance.tileWidth * x, instance.tileWidth * y)
                        );

                        var border = mask.clone();
                        border.strokeColor = '#ccc';
                        border.strokeWidth = 5;
                        //le unim pentru a crea piesa de puzzle propriuzisa
                        var tile = new Group(mask, border, img, border);
                        tile.clipped = true;
                        tile.opacity = 1;

                        tile.shape = shape;
                        //setam pozitia sa
                        tile.imagePosition = new Point(x, y);
                        tiles.push(tile);
                        tileIndexes.push(tileIndexes.length);
                    }
                }


                //returnam piesele in pozitii random pentru a incepe jocul
                for (var y = 0; y < yTileCount; y++) {
                    for (var x = 0; x < xTileCount; x++) {

                        var index1 = Math.floor(Math.random() * tileIndexes.length);
                        var index2 = tileIndexes[index1];
                        var tile = tiles[index2];
                        tileIndexes.remove(index1, 1);

                        var position = view.center -
                                        new Point(instance.tileWidth, instance.tileWidth / 2) +
                                        new Point(instance.tileWidth * (x * 2 + ((y % 2))), instance.tileWidth  * y) -
                                        new Point(instance.puzzleImage.size.width, instance.puzzleImage.size.height / 2);

                        var cellPosition = new Point(
                            Math.round(position.x / instance.tileWidth) + 1,
                            Math.round(position.y / instance.tileWidth) + 1);

                        tile.position = cellPosition * instance.tileWidth;
                        tile.cellPosition = cellPosition;
                    }
                }

                return tiles;
            }



            //generam piesele in functie de pozitia lor(adica daca sunt colturi margini sau interior)
            function getRandomShapes(width, height) {
                var shapeArray = new Array();

                for (var y = 0; y < height; y++) {
                    for (var x = 0; x < width; x++) {

                        var topTab = undefined;
                        var rightTab = undefined;
                        var bottomTab = undefined;
                        var leftTab = undefined;

                        if (y == 0)
                            topTab = 0;

                        if (y == height - 1)
                            bottomTab = 0;

                        if (x == 0)
                            leftTab = 0;

                        if (x == width - 1)
                            rightTab = 0;

                        shapeArray.push(
                            ({
                                topTab: topTab,
                                rightTab: rightTab,
                                bottomTab: bottomTab,
                                leftTab: leftTab
                            })
                        );
                    }
                }

                for (var y = 0; y < height; y++) {
                    for (var x = 0; x < width; x++) {

                        var shape = shapeArray[y * width + x];

                        var shapeRight = (x < width - 1) ?
                            shapeArray[y * width + (x + 1)] :
                            undefined;

                        var shapeBottom = (y < height - 1) ?
                            shapeArray[(y + 1) * width + x] :
                            undefined;

                        shape.rightTab = (x < width - 1) ?
                            getRandomTabValue() :
                            shape.rightTab;

                        if (shapeRight)
                            shapeRight.leftTab = - shape.rightTab;

                        shape.bottomTab = (y < height - 1) ?
                            getRandomTabValue() :
                            shape.bottomTab;

                        if (shapeBottom)
                            shapeBottom.topTab = - shape.bottomTab;
                    }
                }
                return shapeArray;
            }




            function getRandomTabValue() {
                return Math.pow(-1, Math.floor(Math.random() * 2));
            }

            function getMask(tileRatio, topTab, rightTab, bottomTab, leftTab, tileWidth) {

                var curvyCoords = [
                      0, 0, 35, 15, 37, 5,
                      37, 5, 40, 0, 38, -5,
                      38, -5, 20, -20, 50, -20,
                      50, -20, 80, -20, 62, -5,
                      62, -5, 60, 0, 63, 5,
                      63, 5, 65, 15, 100, 0
                ];

                var mask = new Path();
                var tileCenter = view.center;

                var topLeftEdge = new Point(-4,4);

                mask.moveTo(topLeftEdge);

                //Top
                for (var i = 0; i < curvyCoords.length / 6; i++) {
                    var p1 = topLeftEdge + new Point(curvyCoords[i * 6 + 0] * tileRatio, topTab * curvyCoords[i * 6 + 1] * tileRatio);
                    var p2 = topLeftEdge + new Point(curvyCoords[i * 6 + 2] * tileRatio, topTab * curvyCoords[i * 6 + 3] * tileRatio);
                    var p3 = topLeftEdge + new Point(curvyCoords[i * 6 + 4] * tileRatio, topTab * curvyCoords[i * 6 + 5] * tileRatio);

                    mask.cubicCurveTo(p1, p2, p3);
                }
                //Right
                var topRightEdge = topLeftEdge + new Point(tileWidth, 0);
                for (var i = 0; i < curvyCoords.length / 6; i++) {
                    var p1 = topRightEdge + new Point(-rightTab * curvyCoords[i * 6 + 1] * tileRatio, curvyCoords[i * 6 + 0] * tileRatio);
                    var p2 = topRightEdge + new Point(-rightTab * curvyCoords[i * 6 + 3] * tileRatio, curvyCoords[i * 6 + 2] * tileRatio);
                    var p3 = topRightEdge + new Point(-rightTab * curvyCoords[i * 6 + 5] * tileRatio, curvyCoords[i * 6 + 4] * tileRatio);

                    mask.cubicCurveTo(p1, p2, p3);
                }
                //Bottom
                var bottomRightEdge = topRightEdge + new Point(0, tileWidth);
                for (var i = 0; i < curvyCoords.length / 6; i++) {
                    var p1 = bottomRightEdge - new Point(curvyCoords[i * 6 + 0] * tileRatio, bottomTab * curvyCoords[i * 6 + 1] * tileRatio);
                    var p2 = bottomRightEdge - new Point(curvyCoords[i * 6 + 2] * tileRatio, bottomTab * curvyCoords[i * 6 + 3] * tileRatio);
                    var p3 = bottomRightEdge - new Point(curvyCoords[i * 6 + 4] * tileRatio, bottomTab * curvyCoords[i * 6 + 5] * tileRatio);

                    mask.cubicCurveTo(p1, p2, p3);
                }
                //Left
                var bottomLeftEdge = bottomRightEdge - new Point(tileWidth, 0);
                for (var i = 0; i < curvyCoords.length / 6; i++) {
                    var p1 = bottomLeftEdge - new Point(-leftTab * curvyCoords[i * 6 + 1] * tileRatio, curvyCoords[i * 6 + 0] * tileRatio);
                    var p2 = bottomLeftEdge - new Point(-leftTab * curvyCoords[i * 6 + 3] * tileRatio, curvyCoords[i * 6 + 2] * tileRatio);
                    var p3 = bottomLeftEdge - new Point(-leftTab * curvyCoords[i * 6 + 5] * tileRatio, curvyCoords[i * 6 + 4] * tileRatio);

                    mask.cubicCurveTo(p1, p2, p3);
                }

                return mask;
            }



            function getTileRaster(sourceRaster, size, offset) {
                var targetRaster = new Raster('empty');
                var tileWithMarginWidth = size.width + instance.tileMarginWidth * 2;
                var data = sourceRaster.getData(new Rectangle(
                    offset.x - instance.tileMarginWidth,
                    offset.y - instance.tileMarginWidth,
                    tileWithMarginWidth,
                    tileWithMarginWidth));
                targetRaster.setData(data, new Point(0, 0))
                targetRaster.position = new Point(28, 36);
                return targetRaster;
            }

            this.pickTile = function() {
                if (instance.selectedTile) {
                    if (!instance.selectedTile.lastScale) {
                        instance.selectedTile.lastScale = instance.zoomScaleOnDrag;
                        instance.selectedTile.scale(instance.selectedTile.lastScale);
                    }
                    else {
                        if (instance.selectedTile.lastScale > 1) {
                            instance.releaseTile();
                            return;
                        }
                    }

                    instance.selectedTile.cellPosition = undefined;

                    instance.selectionGroup = new Group(instance.selectedTile);

                    var pos = new Point(instance.selectedTile.position.x, instance.selectedTile.position.y);
                    instance.selectedTile.position = new Point(0, 0);

                    instance.selectionGroup.position = pos;
                }
            }

            this.releaseTile = function() {
                if (instance.selectedTile) {

                    var cellPosition = new Point(
                        Math.round(instance.selectionGroup.position.x / instance.tileWidth),
                        Math.round(instance.selectionGroup.position.y / instance.tileWidth));

                    var roundPosition = cellPosition * instance.tileWidth;

                    var hasConflict = false;

                    var alreadyPlacedTile = getTileAtCellPosition(cellPosition);

                    hasConflict = alreadyPlacedTile;

                    var topTile = getTileAtCellPosition(cellPosition + new Point(0, -1));
                    var rightTile = getTileAtCellPosition(cellPosition + new Point(1, 0));
                    var bottomTile = getTileAtCellPosition(cellPosition + new Point(0, 1));
                    var leftTile = getTileAtCellPosition(cellPosition + new Point(-1, 0));

                    if (topTile) {
                        hasConflict = hasConflict || !(topTile.shape.bottomTab + instance.selectedTile.shape.topTab == 0);
                    }

                    if (bottomTile) {
                        hasConflict = hasConflict || !(bottomTile.shape.topTab + instance.selectedTile.shape.bottomTab == 0);
                    }

                    if (rightTile) {
                        hasConflict = hasConflict || !(rightTile.shape.leftTab + instance.selectedTile.shape.rightTab == 0);
                    }

                    if (leftTile) {
                        hasConflict = hasConflict || !(leftTile.shape.rightTab + instance.selectedTile.shape.leftTab == 0);
                    }

                    if (!hasConflict) {

                        if (instance.selectedTile.lastScale) {
                            instance.selectedTile.scale(1 / instance.selectedTile.lastScale);
                            instance.selectedTile.lastScale = undefined;
                        }

                        instance.selectionGroup.remove();
                        var tile = instance.tiles[instance.selectedTileIndex];
                        tile.position = roundPosition;
                        tile.cellPosition = cellPosition;
                        instance.selectionGroup.remove();
                        instance.selectedTile =
                        instance.selectionGroup = null;
                        project.activeLayer.addChild(tile);

                        var errors = checkTiles();
                        if (errors == 0) {
                            alert('You did it!');
                        }
                    }
                }
            }




            function getTileAtCellPosition(point) {
                var width = instance.tilesPerRow;
                var height = instance.tilesPerColumn;
                var tile = undefined;
                for (var i = 0; i < instance.tiles.length; i++) {
                    if (instance.tiles[i].cellPosition == point) {
                        tile = instance.tiles[i];
                        break;
                    }
                }
                return tile;
            }

            this.dragTile = function(delta) {
                if (instance.selectedTile) {
                    instance.selectionGroup.position += delta;
                    instance.selectedTile.opacity = 1;
                }
                else {
                    var currentScroll = view.currentScroll - delta * instance.currentZoom;
                    view.scrollBy(currentScroll);
                    view.currentScroll = currentScroll;
                }
            }

            this.mouseMove = function(point, delta) {
                if (!instance.selectionGroup) {
                    project.activeLayer.selected = false;
                    if (delta.x < 8 && delta.y < 8) {
                        var tolerance = instance.tileWidth * .5;
                        var hit = false;
                        for (var index = 0; index < instance.tiles.length; index++) {
                            var tile = instance.tiles[index];
                            var row = parseInt(index / config.tilesPerRow);
                            var col = index % config.tilesPerRow;

                            var tileCenter = tile.position;

                            var deltaPoint = tileCenter - point;
                            hit = (deltaPoint.x * deltaPoint.x +
                                        deltaPoint.y * deltaPoint.y) < tolerance * tolerance;

                            if (hit) {
                                instance.selectedTile = tile;
                                instance.selectedTileIndex = index;
                                tile.opacity = .5;
                                project.activeLayer.addChild(tile);
                                return;
                            }
                            else {
                                tile.opacity = 1;
                            }
                        }
                        if (!hit)
                            instance.selectedTile = null;
                    }
                }
                else {
                    instance.dragTile(delta);
                }
            }

            this.zoom = function(zoomDelta) {
                var newZoom = instance.currentZoom + zoomDelta;
                if (newZoom >= 0.3 && newZoom <= 1) {
                    view.zoom =
                    instance.currentZoom = newZoom;
                }
            }





            function checkTiles() {
                var errors = 0;
                var firstTile = instance.tiles[0];
                var firstCellPosition = firstTile.cellPosition;

                for (var y = 0; y < instance.tilesPerColumn; y++) {
                    for (var x = 0; x < instance.tilesPerRow; x++) {
                        var index = y * instance.tilesPerRow + x;
                        var cellPosition = instance.tiles[index].cellPosition;

                        if (cellPosition != firstCellPosition + new Point(x, y)) {
                            errors++;
                        }
                    }
                }

                return errors;
            }
            for (i = 0 ; i< this.tiles.length; i++){
                console.log(this.tiles[i]);
            }
            
        }


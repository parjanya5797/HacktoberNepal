(() => {
    const canvas = document.getElementById("game");
    const ctx = canvas.getContext("2d");

    // Grid configuration
    const tileSize = 24; // pixels per tile
    const tilesX = Math.floor(canvas.width / tileSize);
    const tilesY = Math.floor(canvas.height / tileSize);

    /** @type {{x:number,y:number}[]} */
    let snake = [];
    /** @type {{x:number,y:number}} */
    let direction = { x: 1, y: 0 };
    /** @type {{x:number,y:number}} */
    let nextDirection = { x: 1, y: 0 };
    /** @type {{x:number,y:number}} */
    let food = { x: 10, y: 10 };
    let score = 0;
    let highScore = Number(localStorage.getItem("snakeHighScore") || 0);
    let speedMs = 120; // lower is faster
    let timerId = null;
    let running = false;

    // UI elements
    const scoreEl = document.getElementById("score");
    const bestEl = document.getElementById("highScore");
    const startBtn = document.getElementById("startBtn");
    const restartBtn = document.getElementById("restartBtn");
    const overlay = document.getElementById("overlay");
    const overlayStart = document.getElementById("overlayStart");
    const overlayTitle = document.getElementById("overlayTitle");
    const overlaySubtitle = document.getElementById("overlaySubtitle");

    bestEl.textContent = String(highScore);

    function resetGame() {
        const startX = Math.floor(tilesX / 2);
        const startY = Math.floor(tilesY / 2);
        snake = [
            { x: startX - 1, y: startY },
            { x: startX, y: startY },
        ];
        direction = { x: 1, y: 0 };
        nextDirection = { x: 1, y: 0 };
        placeFood();
        score = 0;
        speedMs = 120;
        scoreEl.textContent = String(score);
    }

    function randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function placeFood() {
        while (true) {
            const x = randomInt(0, tilesX - 1);
            const y = randomInt(0, tilesY - 1);
            if (!snake.some((s) => s.x === x && s.y === y)) {
                food = { x, y };
                return;
            }
        }
    }

    function drawCell(x, y, color) {
        ctx.fillStyle = color;
        ctx.fillRect(x * tileSize, y * tileSize, tileSize - 1, tileSize - 1);
    }

    function drawBoard() {
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        // draw checker grid subtle
        for (let y = 0; y < tilesY; y++) {
            for (let x = 0; x < tilesX; x++) {
                if ((x + y) % 2 === 0) {
                    ctx.fillStyle = "#0b0b0b";
                    ctx.fillRect(x * tileSize, y * tileSize, tileSize, tileSize);
                }
            }
        }
    }

    function drawSnake() {
        for (let i = 0; i < snake.length; i++) {
            const segment = snake[i];
            const color = i === snake.length - 1 ? "#6ee7b7" : "#22c55e";
            drawCell(segment.x, segment.y, color);
        }
    }

    function drawFood() {
        drawCell(food.x, food.y, "#e11d48");
    }

    function setDirectionFromKey(key) {
        const map = {
            ArrowUp: { x: 0, y: -1 },
            ArrowDown: { x: 0, y: 1 },
            ArrowLeft: { x: -1, y: 0 },
            ArrowRight: { x: 1, y: 0 },
            w: { x: 0, y: -1 },
            s: { x: 0, y: 1 },
            a: { x: -1, y: 0 },
            d: { x: 1, y: 0 },
            W: { x: 0, y: -1 },
            S: { x: 0, y: 1 },
            A: { x: -1, y: 0 },
            D: { x: 1, y: 0 },
        };
        const nd = map[key];
        if (!nd) return;
        // prevent reversing
        if (nd.x === -direction.x && nd.y === -direction.y) return;
        nextDirection = nd;
    }

    function step() {
        direction = nextDirection;
        const head = snake[snake.length - 1];
        const newHead = { x: head.x + direction.x, y: head.y + direction.y };

        // wrap around edges
        if (newHead.x < 0) newHead.x = tilesX - 1;
        if (newHead.x >= tilesX) newHead.x = 0;
        if (newHead.y < 0) newHead.y = tilesY - 1;
        if (newHead.y >= tilesY) newHead.y = 0;

        // collision with self
        if (snake.some((s) => s.x === newHead.x && s.y === newHead.y)) {
            endGame();
            return;
        }

        snake.push(newHead);
        const ate = newHead.x === food.x && newHead.y === food.y;
        if (ate) {
            score += 1;
            scoreEl.textContent = String(score);
            placeFood();
            // increase speed modestly
            speedMs = Math.max(60, speedMs - 3);
            restartLoop();
        } else {
            snake.shift();
        }

        draw();
    }

    function draw() {
        drawBoard();
        drawFood();
        drawSnake();
    }

    function startLoop() {
        if (timerId) return;
        timerId = setInterval(step, speedMs);
    }

    function stopLoop() {
        if (timerId) {
            clearInterval(timerId);
            timerId = null;
        }
    }

    function restartLoop() {
        stopLoop();
        startLoop();
    }

    function startGame() {
        resetGame();
        running = true;
        overlay.classList.add("d-none");
        draw();
        startLoop();
    }

    function showOverlay(title, subtitle, showStartBtn = true) {
        overlayTitle.textContent = title;
        overlaySubtitle.textContent = subtitle;
        overlayStart.classList.toggle("d-none", !showStartBtn);
        overlay.classList.remove("d-none");
    }

    function endGame() {
        running = false;
        stopLoop();
        if (score > highScore) {
            highScore = score;
            localStorage.setItem("snakeHighScore", String(highScore));
            bestEl.textContent = String(highScore);
        }
        showOverlay("Game Over", `Score ${score} · Best ${highScore}`);
    }

    // input handlers
    document.addEventListener("keydown", (e) => {
        if (["ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight", " ", "w", "a", "s", "d", "W", "A", "S", "D"].includes(e.key)) {
            e.preventDefault();
        }
        if (!running && (e.key === " " || e.key === "Enter")) {
            startGame();
            return;
        }
        setDirectionFromKey(e.key);
    });

    startBtn.addEventListener("click", () => startGame());
    overlayStart.addEventListener("click", () => startGame());
    restartBtn.addEventListener("click", () => {
        startGame();
    });

    // Touch controls: buttons
    document.getElementById("touchControls").addEventListener("click", (e) => {
        const target = /** @type {HTMLElement} */ (e.target);
        if (target.tagName === "BUTTON") {
            const dir = target.getAttribute("data-dir");
            const map = {
                up: "ArrowUp",
                down: "ArrowDown",
                left: "ArrowLeft",
                right: "ArrowRight",
            };
            if (dir && map[dir]) setDirectionFromKey(map[dir]);
        }
    });

    // Touch controls: swipe
    let touchStartX = 0;
    let touchStartY = 0;
    canvas.addEventListener("touchstart", (e) => {
        const t = e.changedTouches[0];
        touchStartX = t.clientX;
        touchStartY = t.clientY;
    });
    canvas.addEventListener("touchend", (e) => {
        const t = e.changedTouches[0];
        const dx = t.clientX - touchStartX;
        const dy = t.clientY - touchStartY;
        if (Math.abs(dx) < 10 && Math.abs(dy) < 10) return;
        if (Math.abs(dx) > Math.abs(dy)) {
            setDirectionFromKey(dx > 0 ? "ArrowRight" : "ArrowLeft");
        } else {
            setDirectionFromKey(dy > 0 ? "ArrowDown" : "ArrowUp");
        }
    });

    // initial render and overlay
    draw();
    showOverlay("Snake", "Press Start to play", true);
})();



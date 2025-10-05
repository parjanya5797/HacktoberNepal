(function () {
    "use strict";

    /** @type {HTMLButtonElement[]} */
    const cells = Array.from(document.querySelectorAll(".cell"));
    /** @type {HTMLElement} */
    const statusEl = document.getElementById("status");
    /** @type {HTMLButtonElement} */
    const resetBtn = document.getElementById("reset");

    /**
     * Game state: indexes 0..8
     * Values: "X" | "O" | null
     * @type {("X"|"O"|null)[]}
     */
    let board = Array(9).fill(null);
    /** @type {"X"|"O"} */
    let currentPlayer = "X";
    let gameOver = false;

    const winningLines = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ];

    function setStatus(text) {
        statusEl.textContent = text;
    }

    function handleCellClick(event) {
        if (gameOver) return;
        const button = event.currentTarget;
        const index = Number(button.getAttribute("data-index"));
        if (Number.isNaN(index)) return;
        if (board[index] !== null) return;

        // Place mark
        board[index] = currentPlayer;
        button.textContent = currentPlayer;
        button.setAttribute("data-value", currentPlayer);
        button.setAttribute("aria-label", `cell ${index + 1} ${currentPlayer}`);

        const winInfo = getWinner(board);
        if (winInfo) {
            gameOver = true;
            highlightWin(winInfo.line);
            setStatus(`Player ${winInfo.player} wins!`);
            return;
        }

        if (board.every((v) => v !== null)) {
            gameOver = true;
            setStatus("It's a draw!");
            return;
        }

        // Switch player
        currentPlayer = currentPlayer === "X" ? "O" : "X";
        setStatus(`Player ${currentPlayer}'s turn`);
    }

    /**
     * @param {("X"|"O"|null)[]} b
     * @returns {{player: "X"|"O", line: number[]}|null}
     */
    function getWinner(b) {
        for (const line of winningLines) {
            const [a, c, d] = line;
            if (b[a] && b[a] === b[c] && b[a] === b[d]) {
                return { player: b[a], line };
            }
        }
        return null;
    }

    function highlightWin(line) {
        for (const i of line) {
            cells[i].classList.add("winning");
        }
    }

    function resetGame() {
        board = Array(9).fill(null);
        currentPlayer = "X";
        gameOver = false;
        for (const cell of cells) {
            cell.textContent = "";
            cell.removeAttribute("data-value");
            cell.classList.remove("winning");
            const idx = Number(cell.getAttribute("data-index"));
            cell.setAttribute("aria-label", `cell ${idx + 1}`);
        }
        setStatus("Player X's turn");
    }

    // Init
    for (const cell of cells) {
        cell.addEventListener("click", handleCellClick);
    }
    resetBtn.addEventListener("click", resetGame);
})();



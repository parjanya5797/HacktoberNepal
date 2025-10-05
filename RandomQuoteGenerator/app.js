(() => {
    const quoteEl = document.getElementById("quote");
    const authorEl = document.getElementById("author");
    const newQuoteBtn = document.getElementById("new-quote");
    const tweetBtn = document.getElementById("tweet-quote");

    /** Local fallback quotes if network fails */
    const fallbackQuotes = [
        { text: "The best way to get started is to quit talking and begin doing.", author: "Walt Disney" },
        { text: "It always seems impossible until it's done.", author: "Nelson Mandela" },
        { text: "Whether you think you can or you think you can’t, you’re right.", author: "Henry Ford" },
        { text: "Do what you can, with what you have, where you are.", author: "Theodore Roosevelt" },
        { text: "Dream big and dare to fail.", author: "Norman Vaughan" }
    ];

    /** @type {{text: string, author: string}[]} */
    let quotes = [];
    /** @type {{text: string, author: string} | null} */
    let current = null;

    function setBusy(isBusy) {
        const card = document.querySelector(".card");
        if (!card) return;
        card.setAttribute("aria-busy", String(isBusy));
        newQuoteBtn.disabled = isBusy || quotes.length === 0;
        tweetBtn.disabled = isBusy || !current;
    }

    function randomItem(items) {
        if (!items.length) return null;
        const index = Math.floor(Math.random() * items.length);
        return items[index];
    }

    function render(quote) {
        const text = quote?.text?.trim?.();
        const author = quote?.author?.trim?.();
        quoteEl.textContent = text || "Keep going. You’re doing great.";
        authorEl.textContent = author ? `— ${author}` : "— Unknown";
    }

    function showRandomQuote() {
        current = randomItem(quotes) ?? randomItem(fallbackQuotes);
        render(current);
        tweetBtn.disabled = !current;
    }

    function tweetCurrent() {
        if (!current) return;
        const text = `"${current.text}" ${current.author ? "— " + current.author : ""}`.trim();
        const url = new URL("https://twitter.com/intent/tweet");
        url.searchParams.set("text", text);
        window.open(url.toString(), "_blank", "noopener,noreferrer");
    }

    async function loadQuotes() {
        setBusy(true);
        try {
            const res = await fetch("https://type.fit/api/quotes", { cache: "no-store" });
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            const data = await res.json();
            // Normalize into { text, author }
            quotes = (Array.isArray(data) ? data : []).map(q => ({
                text: q?.text ?? q?.quote ?? "",
                author: q?.author ?? q?.source ?? ""
            })).filter(q => q.text && typeof q.text === "string");
        } catch (err) {
            console.warn("Failed to fetch quotes; using fallback.", err);
            quotes = [...fallbackQuotes];
        } finally {
            setBusy(false);
        }
        showRandomQuote();
    }

    newQuoteBtn.addEventListener("click", () => {
        showRandomQuote();
    });

    tweetBtn.addEventListener("click", () => {
        tweetCurrent();
    });

    // Initialize
    loadQuotes();
})();



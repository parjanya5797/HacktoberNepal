// Accessible, reusable modal component (vanilla JS)
// API: new Modal(rootEl, options?).open() / close() / isOpen()

/**
 * @typedef {Object} ModalOptions
 * @property {boolean} [trapFocus=true] Trap focus within the modal
 * @property {boolean} [closeOnOverlay=true] Allow closing when clicking overlay or [data-modal-close]
 * @property {boolean} [restoreFocus=true] Restore focus to the trigger element that opened the modal
 */

export class Modal {
    /**
     * @param {HTMLElement} rootElement The `.modal` root element
     * @param {ModalOptions} [options]
     */
    constructor(rootElement, options = {}) {
        if (!(rootElement instanceof HTMLElement)) {
            throw new Error("Modal requires a root HTMLElement");
        }

        this.root = rootElement;
        this.dialog = /** @type {HTMLElement|null} */ (this.root.querySelector(".modal__dialog"));
        if (!this.dialog) {
            throw new Error("Modal root must contain .modal__dialog");
        }

        this.options = {
            trapFocus: options.trapFocus !== false,
            closeOnOverlay: options.closeOnOverlay !== false,
            restoreFocus: options.restoreFocus !== false,
        };

        /** @type {HTMLElement|null} */
        this.lastFocusedBeforeOpen = null;

        this.onKeydown = this.onKeydown.bind(this);
        this.onClick = this.onClick.bind(this);

        // Ensure aria-hidden default
        if (!this.root.hasAttribute("aria-hidden")) {
            this.root.setAttribute("aria-hidden", "true");
        }
    }

    /**
     * Open the modal
     */
    open() {
        if (this.isOpen()) return;
        this.lastFocusedBeforeOpen = /** @type {HTMLElement|null} */ (document.activeElement);
        this.root.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-open");

        document.addEventListener("keydown", this.onKeydown, true);
        this.root.addEventListener("click", this.onClick, true);

        // Focus first focusable in dialog, else dialog itself
        const focusable = this.getFocusableElements();
        const target = focusable[0] || this.dialog;
        window.requestAnimationFrame(() => target.focus());
    }

    /**
     * Close the modal
     */
    close() {
        if (!this.isOpen()) return;
        this.root.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-open");

        document.removeEventListener("keydown", this.onKeydown, true);
        this.root.removeEventListener("click", this.onClick, true);

        if (this.options.restoreFocus && this.lastFocusedBeforeOpen) {
            this.lastFocusedBeforeOpen.focus();
        }
    }

    /**
     * @returns {boolean}
     */
    isOpen() {
        return this.root.getAttribute("aria-hidden") === "false";
    }

    /**
     * @param {KeyboardEvent} event
     */
    onKeydown(event) {
        if (!this.isOpen()) return;

        // Escape closes
        if (event.key === "Escape") {
            event.preventDefault();
            this.close();
            return;
        }

        if (this.options.trapFocus && event.key === "Tab") {
            this.handleFocusTrap(event);
        }
    }

    /**
     * @param {MouseEvent} event
     */
    onClick(event) {
        if (!this.isOpen()) return;
        const target = /** @type {HTMLElement} */ (event.target);

        // Close if clicking overlay or any element with data-modal-close
        if (
            this.options.closeOnOverlay && (
                target.matches(".modal__overlay") || target.closest("[data-modal-close]")
            )
        ) {
            event.preventDefault();
            this.close();
        }
    }

    /**
     * @param {KeyboardEvent} event
     */
    handleFocusTrap(event) {
        const focusable = this.getFocusableElements();
        if (focusable.length === 0) {
            // Focus the dialog to keep focus within
            event.preventDefault();
            this.dialog.focus();
            return;
        }

        const first = focusable[0];
        const last = focusable[focusable.length - 1];
        const active = /** @type {HTMLElement} */ (document.activeElement);
        const goingBackward = event.shiftKey;

        if (!goingBackward && active === last) {
            event.preventDefault();
            first.focus();
        } else if (goingBackward && active === first) {
            event.preventDefault();
            last.focus();
        }
    }

    /**
     * @returns {HTMLElement[]}
     */
    getFocusableElements() {
        const selectors = [
            'a[href]:not([tabindex="-1"])',
            'area[href]:not([tabindex="-1"])',
            'input:not([disabled]):not([tabindex="-1"])',
            'select:not([disabled]):not([tabindex="-1"])',
            'textarea:not([disabled]):not([tabindex="-1"])',
            'button:not([disabled]):not([tabindex="-1"])',
            'iframe:not([tabindex="-1"])',
            'audio[controls]:not([tabindex="-1"])',
            'video[controls]:not([tabindex="-1"])',
            '[contenteditable="true"]:not([tabindex="-1"])',
            '[tabindex]:not([tabindex="-1"])'
        ];

        const nodes = /** @type {NodeListOf<HTMLElement>} */ (
            this.dialog.querySelectorAll(selectors.join(","))
        );

        return Array.from(nodes).filter((el) => this.isVisible(el));
    }

    /**
     * @param {HTMLElement} el
     * @returns {boolean}
     */
    isVisible(el) {
        const style = window.getComputedStyle(el);
        const rect = el.getBoundingClientRect();
        return style.visibility !== "hidden" && style.display !== "none" && rect.width > 0 && rect.height > 0;
    }
}



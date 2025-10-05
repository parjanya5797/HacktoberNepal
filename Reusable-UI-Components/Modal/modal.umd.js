(function (global) {
    "use strict";

    /**
     * @param {HTMLElement} el
     * @returns {boolean}
     */
    function isVisible(el) {
        var style = window.getComputedStyle(el);
        var rect = el.getBoundingClientRect();
        return style.visibility !== "hidden" && style.display !== "none" && rect.width > 0 && rect.height > 0;
    }

    function Modal(rootElement, options) {
        if (!(this instanceof Modal)) return new Modal(rootElement, options);
        if (!(rootElement instanceof HTMLElement)) {
            throw new Error("Modal requires a root HTMLElement");
        }

        this.root = rootElement;
        this.dialog = this.root.querySelector(".modal__dialog");
        if (!this.dialog) {
            throw new Error("Modal root must contain .modal__dialog");
        }

        options = options || {};
        this.options = {
            trapFocus: options.trapFocus !== false,
            closeOnOverlay: options.closeOnOverlay !== false,
            restoreFocus: options.restoreFocus !== false,
        };

        this.lastFocusedBeforeOpen = null;

        this.onKeydown = this.onKeydown.bind(this);
        this.onClick = this.onClick.bind(this);

        if (!this.root.hasAttribute("aria-hidden")) {
            this.root.setAttribute("aria-hidden", "true");
        }
    }

    Modal.prototype.open = function () {
        if (this.isOpen()) return;
        this.lastFocusedBeforeOpen = document.activeElement;
        this.root.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-open");

        document.addEventListener("keydown", this.onKeydown, true);
        this.root.addEventListener("click", this.onClick, true);

        var focusable = this.getFocusableElements();
        var target = focusable[0] || this.dialog;
        window.requestAnimationFrame(function () { target.focus(); });
    };

    Modal.prototype.close = function () {
        if (!this.isOpen()) return;
        this.root.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-open");

        document.removeEventListener("keydown", this.onKeydown, true);
        this.root.removeEventListener("click", this.onClick, true);

        if (this.options.restoreFocus && this.lastFocusedBeforeOpen && this.lastFocusedBeforeOpen.focus) {
            this.lastFocusedBeforeOpen.focus();
        }
    };

    Modal.prototype.isOpen = function () {
        return this.root.getAttribute("aria-hidden") === "false";
    };

    Modal.prototype.onKeydown = function (event) {
        if (!this.isOpen()) return;
        if (event.key === "Escape") {
            event.preventDefault();
            this.close();
            return;
        }
        if (this.options.trapFocus && event.key === "Tab") {
            this.handleFocusTrap(event);
        }
    };

    Modal.prototype.onClick = function (event) {
        if (!this.isOpen()) return;
        var target = event.target;
        if (this.options.closeOnOverlay && (target.matches(".modal__overlay") || target.closest && target.closest("[data-modal-close]"))) {
            event.preventDefault();
            this.close();
        }
    };

    Modal.prototype.handleFocusTrap = function (event) {
        var focusable = this.getFocusableElements();
        if (focusable.length === 0) {
            event.preventDefault();
            this.dialog.focus();
            return;
        }
        var first = focusable[0];
        var last = focusable[focusable.length - 1];
        var active = document.activeElement;
        var goingBackward = event.shiftKey;
        if (!goingBackward && active === last) {
            event.preventDefault();
            first.focus();
        } else if (goingBackward && active === first) {
            event.preventDefault();
            last.focus();
        }
    };

    Modal.prototype.getFocusableElements = function () {
        var selectors = [
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
        var nodes = this.dialog.querySelectorAll(selectors.join(","));
        var result = [];
        for (var i = 0; i < nodes.length; i++) {
            if (isVisible(nodes[i])) result.push(nodes[i]);
        }
        return result;
    };

    // UMD export
    global.Modal = Modal;

})(typeof window !== "undefined" ? window : this);



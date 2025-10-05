# Reusable Modal (Accessible, Vanilla JS)

A keyboard-accessible, reusable modal component with a simple API. Includes focus trapping, Escape-to-close, overlay click-to-close, and return-focus to the trigger.

## Features

- Toggleable open/close via API
- Focus trap inside the modal while open
- Close on Escape key and overlay click
- Restores focus to the element that opened the modal
- Prevents background scroll while open

## Usage

1) Include the CSS and JS

```html
<link rel="stylesheet" href="./modal.css" />
<script type="module">
  import { Modal } from "./modal.js";
  // ... see example below
  </script>
```

2) Add the markup (or create dynamically)

```html
<div class="modal" id="demoModal" aria-hidden="true">
  <div class="modal__overlay" data-modal-close></div>
  <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="demoModalTitle">
    <header class="modal__header">
      <h2 id="demoModalTitle" class="modal__title">Demo Modal</h2>
      <button class="modal__close" type="button" aria-label="Close dialog" data-modal-close>&times;</button>
    </header>
    <div class="modal__body">
      <!-- content -->
    </div>
    <footer class="modal__footer">
      <button class="btn" data-modal-close>Close</button>
    </footer>
  </div>
  </div>
```

3) Initialize

```js
import { Modal } from "./modal.js";

const modalElement = document.getElementById("demoModal");
const modal = new Modal(modalElement);

document.getElementById("openBtn").addEventListener("click", () => modal.open());
```

## API

```ts
class Modal {
  constructor(root: HTMLElement, options?: {
    trapFocus?: boolean;
    closeOnOverlay?: boolean;
    restoreFocus?: boolean;
  });
  open(): void;
  close(): void;
  isOpen(): boolean;
}
```

## Accessibility Notes

- Uses `role="dialog"` and `aria-modal="true"` on the dialog container
- `aria-labelledby` ties to a visible title element
- Focus is trapped within the dialog while open
- Escape closes the dialog
- Focus returns to the trigger element that opened the modal

## Development

Open `index.html` in a browser. No build step required.



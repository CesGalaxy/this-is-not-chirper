import {customElement} from "lit/decorators.js";
import {html, LitElement} from "lit";

@customElement('my-element')
export default class MyElement extends LitElement {
    render() {
        return html`
            <div>Hello from MyElement!</div>
        `;
    }
}

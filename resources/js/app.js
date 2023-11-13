import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const channel = Echo.channel("player.remove");

console.log("hi");
channel.subscribed(() => {
    console.log("Subs");
});

import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import axios from "axios";

let channel = Echo.join("presence-chat.1")
    .here((users) => {
        // console.log(users);
    })
    .joining((user) => {
        // console.log(user.name);
    })
    .leaving((user) => {
        // console.log(user.name);
    })
    .listen(".chatMessage", (e) => {
        // console.log(e.message);
    })
    .listenForWhisper(".isTyping", (e) => {
        // console.log(e);
    });

document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
    let message = document.getElementById("message").value;
    axios.post("/ws", {
        message: message,
    });
    document.getElementById("message").value = "";
});



window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

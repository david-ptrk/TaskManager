const quote = document.getElementById("quote");
const text = "Your future is built one task at a time";

let i = 0;
const typingSpeed = 100;

const textSpan = document.createElement("span");
const cursor = document.createElement("span");
cursor.id = "cursor";
quote.appendChild(textSpan);
quote.appendChild(cursor);

function typeLetter() {
    if(i < text.length) {
        textSpan.textContent += text.charAt(i);
        ++i;
        setTimeout(typeLetter, typingSpeed);
    }
    else {
        cursor.style.animation = "none";
        cursor.style.opacity = "1";
    }
}

typeLetter();

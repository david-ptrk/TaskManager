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



// const canvas = document.getElementById("myCanvas");
// const ctx = canvas.getContext("2d");

// let x = 20;
// let y = canvas.height - 20;
// let stepCount = 0;

// function drawPerson(x, y) {
//     ctx.beginPath();
//     ctx.arc(x, y - 40, 10, 0, Math.PI * 2);
//     ctx.moveTo(x, y - 30);
//     ctx.lineTo(x, y);
//     ctx.moveTo(x, y - 20);
//     ctx.lineTo(x - 10, y - 10);
//     ctx.moveTo(x, y - 20);
//     ctx.lineTo(x + 10, y - 10);
//     ctx.moveTo(x, y);
//     ctx.lineTo(x - 10, y + 20);
//     ctx.moveTo(x, y);
//     ctx.lineTo(x + 10, y + 20);
//     ctx.stroke();
// }

// function animate() {
//     ctx.clearRect(0, 0, canvas.width, canvas.height);
//     drawPerson(x, y);

//     stepCount++;
//     if(stepCount % 10 === 0) {
//         y -= 15;
//         x += 30;
//     }

//     if(y > 50) {
//         requestAnimationFrame(animate);
//     }
// }

// animate();

const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

// STAIR SETTINGS
const stepWidth = 50;      // wider steps
const stepHeight = 25;     // taller steps
const totalSteps = 10;     // fewer, larger steps

// START PERSON AT BOTTOM-LEFT OF STAIRS
let x = canvas.width - totalSteps * stepWidth + 10;
let y = canvas.height - 10;

let stepCount = 0;

function drawStairs() {
    ctx.fillStyle = "#654321"; // dark brown

    for (let i = 0; i < totalSteps; i++) {
        let stairX = i * stepWidth + 285;
        let stairY = canvas.height - (i + 1) * stepHeight;
        ctx.fillRect(stairX, stairY, stepWidth, canvas.height - stairY);
    }
}

function drawPerson(x, y) {
    ctx.beginPath();
    ctx.arc(x, y - 40, 10, 0, Math.PI * 2); // head
    ctx.moveTo(x, y - 30);
    ctx.lineTo(x, y); // body
    ctx.moveTo(x, y - 20);
    ctx.lineTo(x - 10, y - 10); // left arm
    ctx.moveTo(x, y - 20);
    ctx.lineTo(x + 10, y - 10); // right arm
    ctx.moveTo(x, y);
    ctx.lineTo(x - 10, y + 20); // left leg
    ctx.moveTo(x, y);
    ctx.lineTo(x + 10, y + 20); // right leg
    ctx.stroke();
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawStairs();
    drawPerson(x, y - 33);

    // Slow movement: move every 30 frames
    stepCount++;
    if (stepCount % 30 === 0) {
        x += stepWidth;   // rightward
        y -= stepHeight;  // upward
    }

    // Stop when all steps are climbed
    if (stepCount / 30 < totalSteps) {
        requestAnimationFrame(animate);
    }
}

animate();

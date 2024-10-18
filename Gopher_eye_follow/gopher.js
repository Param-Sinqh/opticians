document.addEventListener('DOMContentLoaded', () => {
    const gopher = document.querySelector('.gopher');
    const gopher_proximity = document.querySelector('.gopher-proximity');

    // Set initial top position on page load
    // gopher.style.top = '141px';

    // Function to handle mouse enter
    function handleMouseEnter() {
        gopher.style.top = '-43px';
    }

    // Function to handle mouse leave
    function handleMouseLeave() {
        gopher.style.top = '-73px';
    }

    // Mouse enter event handler
    gopher_proximity.addEventListener('mouseenter', handleMouseEnter);

    // Mouse leave event handler
    gopher_proximity.addEventListener('mouseleave', handleMouseLeave);

});

document.addEventListener('mousemove', (e) => {
    //console.log(e);

    const mouseX = e.clientX;
    const mouseY = e.clientY;

    // Right eye
    const eye_R = document.getElementById('eye_R');
    const rect_eye_R = eye_R.getBoundingClientRect();
    const eye_R_X = rect_eye_R.left + rect_eye_R.width / 2;
    const eye_R_Y = rect_eye_R.top + rect_eye_R.height / 2;

    const angleDeg_eye_R = angle(mouseX, mouseY, eye_R_X, eye_R_Y);

    //console.log(angleDeg_eye_R);

    eye_R.style.transform = `rotate(${angleDeg_eye_R}deg)`;

    // Left eye
    const eye_L = document.getElementById('eye_L');
    const rect_eye_L = eye_L.getBoundingClientRect();
    const eye_L_X = rect_eye_L.left + rect_eye_L.width / 2;
    const eye_L_Y = rect_eye_L.top + rect_eye_L.height / 2;

    const angleDeg_eye_L = angle(mouseX, mouseY, eye_L_X, eye_L_Y);

    //console.log(angleDeg_eye_L);

    eye_L.style.transform = `rotate(${angleDeg_eye_L}deg)`;
});

function angle(cx, cy, ex, ey) {
    const dy = ey - cy;
    const dx = ex - cx;
    const rad = Math.atan2(dy, dx);
    const deg = rad * 180 / Math.PI;
    return deg;
}
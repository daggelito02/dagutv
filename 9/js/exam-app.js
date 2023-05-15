// initialize functions
function init() {
	document.getElementById("print-QR").addEventListener("click", printTheQRimage);
}
window.addEventListener("load",init);

//print the qr image and it's heading
function printTheQRimage() {
    window.print()
} 
var qrSelect;

function init() {
	document.getElementById("print-QR").addEventListener("click", printTheQRimage);
}
window.addEventListener("load",init);

function printTheQRimage() {
    window.print()
} 
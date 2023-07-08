let eventBox = document.querySelector(".teclados");
let outputContainer = document.querySelector(".teclados");
VanillaTilt.init(eventBox);


eventBox.addEventListener("tiltChange", function (event) {
	let li = document.createElement("li");
	li.textContent = JSON.stringify(event.detail);
	outputContainer.insertBefore(li, outputContainer.firstChild);
});
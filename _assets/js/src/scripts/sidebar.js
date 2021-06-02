var sidebar = document.getElementById("secondary");

function stickyFunction() {
	var windowHeight = window.innerHeight;
	if (sidebar.offsetHeight > windowHeight) {
		sidebar.classList.remove("stick");
	}
	else {
		sidebar.classList.add("stick");
	}
}

if (sidebar) {
	stickyFunction();
	window.addEventListener("resize", stickyFunction);
}
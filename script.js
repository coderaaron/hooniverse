window.onload = () => {
	const searchRow = document.getElementsByClassName('search-form')[0];
	document.getElementsByClassName('dashicons-search')[0].onclick = ( (e) => {
		searchRow.classList.toggle('search-hidden');
	});
}

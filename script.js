window.onload = () => {
	const searchForm = document.getElementsByClassName('wp-block-search')[0];
	document.getElementsByClassName('dashicons wp-block-navigation-link')[0].onclick = ( (e) => {
		searchForm.classList.toggle('search-hidden')
		e.target.classList.toggle('dashicons-no');
		e.target.classList.toggle('dashicons-search');
	});
}

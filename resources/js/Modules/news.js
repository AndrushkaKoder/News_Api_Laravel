const fetchData = async () => {
	const data = await fetch('http://news.loc/api/v1/news');
	return  await data.json();

}

const render = async () => {
	const data = await fetchData();
	for (let el of data) {
		console.log(el.title);
	}
}

render();

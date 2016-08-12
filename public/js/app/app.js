function base_url(url) {
	if (url) {
		return 'http://' + document.location.host + '/starter-pack/' + url;
	} else {
		return 'http://' + document.location.host + '/starter-pack';
	}
}
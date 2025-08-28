const domain = document.querySelector('meta[name="DR.domain.github"]').getAttribute('content');

document.querySelectorAll('.ajax-link').forEach(link => {
	link.addEventListener('click', function(event) {
		event.preventDefault();
		const link = this.getAttribute('href');
        const absoluteLink = [domain, link].join('');

        // gets the html content of the absolute link and puts it into the <div id="content"></div>
        fetch(absoluteLink)
          .then(response => response.text())
          .then(html => {
            document.querySelector('#content').innerHTML = html;
          })
          .catch(error => {
            console.error('Error fetching content:', error);
          });
	});
});
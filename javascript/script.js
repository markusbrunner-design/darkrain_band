const domain = document.querySelector('meta[name="DR.domain.github"]').getAttribute('content');
const contentSelector = '#content';
let contentContainer = document.querySelector(contentSelector);

let getTextFileContent = function(file) {
  return fetch(file)
    .then(response => response.text())
    .catch(error => {
      // Handle any error that occurred during the fetch
      console.error('Error:', error);
    });
}

document.querySelectorAll('.ajax-link').forEach(link => {
	link.addEventListener('click', function(event) {
		event.preventDefault();
		const link = this.getAttribute('href');
    const relativeLink = ['./', link].join('');
    const absoluteLink = [domain, link].join('');

    let text = getTextFileContent(relativeLink).then(
      (html) => {
        contentContainer.innerHTML = html;
        location.hash = contentSelector;
      }
    );
	});
});
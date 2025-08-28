const base = document.querySelector('base').getAttribute('href');
const contentSelector = '#content';
let contentContainer = document.querySelector(contentSelector);

let getTextFileContent = function(file) {
  return fetch(file)
    .then(response => response.text())
    .catch(error => {
      // Handle any error that occurred during the fetch
      console.error('Error:', error);
    });
};

let addLinkEventListeners = function(wrapper) {
  wrapper.querySelectorAll('.ajax-link').forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const link = this.getAttribute('href');
      const relativeLink = ['./', link].join('');
      const absoluteLink = [base, link].join('');

      let text = getTextFileContent(link).then(
        (html) => {
          contentContainer.innerHTML = html;
          location.hash = contentSelector;
          addLinkEventListeners(contentContainer);
        }
      );
    });
  });
};

addLinkEventListeners(document);
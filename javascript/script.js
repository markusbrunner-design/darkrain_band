const base = document.querySelector('base').getAttribute('href');
const contentSelector = '#content';
let contentContainer = document.querySelector(contentSelector);

let GETPARAMS = {
  get: function(name) {
    let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
  },
  set: function(name, value) {
    let urlParams = new URLSearchParams(window.location.search);
    urlParams.set(name, value);
    window.history.replaceState({}, '', `${location.pathname}?${urlParams}`);
  }
};

let navigator = {
  getTextFileContent: function(file) {
    return fetch(file)
      .then(response => response.text())
      .catch(error => {
        // Handle any error that occurred during the fetch
        console.error('Error:', error);
      });
  },
  checkLink: function(link) {
    // no protocol and domain should be in the link
    return link && link.trim() !== '' && !link.startsWith('http');
  },
  loadContent: function(link) {
    if (!this.checkLink(link)) {
      console.error('Invalid link:', link);
      return;
    }
    this.getTextFileContent(link).then(
      (html) => {
        GETPARAMS.set('page', link);
        contentContainer.innerHTML = html;
        location.hash = contentSelector;
        addLinkEventListeners(contentContainer);
      }
    );
  },
  addLinkEventListeners: function(wrapper) {
    wrapper.querySelectorAll('.ajax-link').forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const link = this.getAttribute('href');
        //const relativeLink = ['./', link].join('');
        //const absoluteLink = [base, link].join('');
        this.loadContent(link);
      });
    });
  };
};

// on page load loadContent if GETPARAMS.get('page') is not null
let page = GETPARAMS.get('page');
if (page) {
  navigator.loadContent(page);
}

navigator.addLinkEventListeners(document);
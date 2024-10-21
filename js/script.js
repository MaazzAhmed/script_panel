let processedFields = new Set();

function fetchDataAndInjectDirectly(host, id, field, scriptTag) {
  if (processedFields.has(field)) {
    console.log(`Field ${field} has already been processed, skipping duplicate fetch.`);
    return;
  }

  let apiUrl = `${host}/Scripts_panel/api/fetch_data.php?id=${id}&field=${field}`;
  console.log('Fetching from:', apiUrl);

  fetch(apiUrl)
    .then(response => {
      console.log('Response status:', response.status);
      if (!response.ok) {
        throw new Error(`Network response was not ok. Status: ${response.status}`);
      }
      return response.text(); // Parse as text
    })
    .then(content => {
      if (content) {
        let tempContainer = document.createElement('div');
        tempContainer.innerHTML = content;

        while (tempContainer.firstChild) {
          let node = tempContainer.firstChild;

          // Handle script and noscript nodes specially
          if (node.tagName === 'SCRIPT' || node.tagName === 'NOSCRIPT') {
            let newElement = document.createElement(node.tagName);
            newElement.textContent = node.textContent;
            scriptTag.parentNode.insertBefore(newElement, scriptTag.nextSibling);
            console.log(`Injected ${node.tagName} from ${field}`);
          } else {
            // Create a new element for the content (e.g., div)
            let newElement = document.createElement('div');
            newElement.innerHTML = content; // Set the HTML content
            scriptTag.parentNode.insertBefore(newElement, scriptTag.nextSibling);
            console.log(`Injected non-script content from ${field}`);
          }

          // Remove the node directly from the document after inserting
          scriptTag.parentNode.removeChild(node);
        }
      } else {
        console.error(`Field data not found for field: ${field}`);
      }
    })
    .catch(error => {
      console.error(`Error fetching data for field: ${field}`, error);
    });
}

// Fetch and inject content for each script tag
document.querySelectorAll('script[data-host][data-id][data-field]').forEach(scriptTag => {
  let host = scriptTag.getAttribute('data-host');
  let id = scriptTag.getAttribute('data-id');
  let field = scriptTag.getAttribute('data-field');

  fetchDataAndInjectDirectly(host, id, field, scriptTag);
});
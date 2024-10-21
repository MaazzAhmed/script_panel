// Get attributes from the script tag
let host = document.currentScript.getAttribute('data-host');
let id = document.currentScript.getAttribute('data-id');
let field = document.currentScript.getAttribute('data-field');

// Construct the API endpoint
let apiUrl = `${host}/Scripts_panel/api/fetch_thank_you_body.php?id=${id}&field=${field}`;

console.log('Fetching from:', apiUrl);

fetch(apiUrl)
  .then(response => {
    console.log('Response status:', response.status);
    if (!response.ok) {
      throw new Error(`Network response was not ok. Status: ${response.status}`);
    }
    return response.json();  // Parse the response as JSON
  })
  .then(data => {
    let content = data[field];

    if (content) {
      // Create a temporary container to hold the content
      let tempContainer = document.createElement('div');
      tempContainer.innerHTML = content;  // Insert the fetched content

      // Append the content to the body or a specific element
      document.body.appendChild(tempContainer);

      // Execute any scripts that may have been included in the fetched content
      tempContainer.querySelectorAll('script').forEach(script => {
        let newScript = document.createElement('script');
        newScript.textContent = script.innerHTML;  // Get the content of the script
        document.body.appendChild(newScript);  // Execute the script
      });
    } else {
      console.error("Field data not found");
    }
  })
  .catch(error => {
    console.error("Error fetching data:", error);
  });

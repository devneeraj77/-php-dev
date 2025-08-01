const containerDiv = document.getElementById('container');

const newDiv = document.createElement('div');

newDiv.classList.add('my-dynamic-div');
newDiv.textContent = 'This div was created dynamically using JavaScript!';

// newDiv.style = 'border: 2px solid blue;';

newDiv.style.color = "red";
newDiv.style.border = "2px solid blue";

containerDiv.appendChild(newDiv);
const newParagraph = document.createElement('p');
newParagraph.textContent = 'This is a paragraph inside the new div.';

newDiv.appendChild(newParagraph);
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dropdown Example</title>
</head>
<body>

<!-- Dropdown menu -->
<select id="nameDropdown" onchange="displaySelectedName()">
  <option value="">Select a name</option>
</select>

<!-- Div to display selected name -->
<div id="selectedName"></div>

<script>
// Array of random names
var names = ['Alice', 'Bob', 'Charlie', 'David', 'Emma', 'Frank', 'Grace', 'Henry', 'Ivy', 'Jack'];

// Function to populate the dropdown with random names
function populateDropdown() {
  var dropdown = document.getElementById('nameDropdown');

  // Shuffle the names array to get random order
  names = shuffleArray(names);

  names.forEach(function(name) {
    var option = document.createElement('option');
    option.value = name;
    option.textContent = name;
    dropdown.appendChild(option);
  });
}

// Function to shuffle array elements (Fisher-Yates shuffle algorithm)
function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

// Function to display the selected name in the div
function displaySelectedName() {
  var selectedName = document.getElementById('nameDropdown').value;
  var selectedNameDiv = document.getElementById('selectedName');
  selectedNameDiv.textContent = 'Selected Name: ' + selectedName;
}

// Populate the dropdown when the page loads
populateDropdown();
</script>

</body>
</html>

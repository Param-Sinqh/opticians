document.addEventListener("DOMContentLoaded", function () {
  const editButton = document.getElementById("editButton");
  const saveButton = document.getElementById("saveButton");
  const cancelButton = document.getElementById("cancelButton");
  const deleteButton = document.getElementById("deleteButton");
  const editableCells = document.querySelectorAll(".editable");

  const originalData = {};

  editableCells.forEach((cell) => {
    const columnName = cell.dataset.columnName; // Assuming you have added a data-column-name attribute to identify columns
    originalData[columnName] = cell.textContent.trim(); // Store the updated value in the object
  });

  function Reset() {
    editableCells.forEach((cell) => {
      cell.contentEditable = false;
      cell.classList.remove("editable-active"); // Add a CSS class to change the background color
    });

    saveButton.style.display = "none";
    cancelButton.style.display = "none";
    editButton.style.display = "inline";
    deleteButton.style.display = "inline";

    editableCells.forEach((cell) => {
      const columnName = cell.dataset.columnName; // Assuming you have added a data-column-name attribute to identify columns
      cell.textContent = originalData[columnName] || ""; // Restore the original value if available, otherwise set it to an empty string
    });
  }

  editButton.addEventListener("click", function () {
    // Enable editing for all cells with the 'editable' class
    editableCells.forEach((cell) => {
      cell.contentEditable = true;
      cell.classList.add("editable-active"); // Add a CSS class to change the background color
    });

    // Show the save button and hide the edit button
    saveButton.style.display = "inline";
    cancelButton.style.display = "inline";
    editButton.style.display = "none";
    deleteButton.style.display = "none";
  });

  cancelButton.addEventListener("click", function () {
    // Reload the page to revert the changes
    // location.reload();

    Reset();
  });

  saveButton.addEventListener("click", function () {
    // Disable editing for all cells with the 'editable' class

    editableCells.forEach((cell) => {
      cell.contentEditable = false;
      cell.classList.remove("editable-active"); // Add a CSS class to change the background color
    });

    saveButton.style.display = "none";
    cancelButton.style.display = "none";
    editButton.style.display = "inline";
    deleteButton.style.display = "inline";

    const confirmed = window.confirm(
      "Are you sure you want to save the changes?"
    );

    if (!confirmed) {
      // Confirmation rejected
      console.log("Changes not saved.");
      // Add any other actions you want to perform when confirmation is rejected
    } else {
      // Confirmation accepted
      console.log("Saving changes...");
      // Add code to save changes
    }

    if (confirmed) {
      // Extract the updated data from the table
      const updatedData = {};
      editableCells.forEach((cell) => {
        const columnName = cell.dataset.columnName; // Assuming you have added a data-column-name attribute to identify columns
        updatedData[columnName] = cell.textContent.trim(); // Store the updated value in the object
      });

      // Send the updated data to the server using AJAX
      fetch("backend/update_data.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(updatedData),
      })
        .then((response) => response.text())
        .then((data) => {
          // Display a success message
          alert("Data saved successfully!");
        })
        .catch((error) => {
          console.error("Error:", error); // Log any errors that occur during the fetch request
        });

      // Show the edit button and hide the save button
      saveButton.style.display = "none";
      editButton.style.display = "inline";
    } else {
      Reset();
    }
  });
});

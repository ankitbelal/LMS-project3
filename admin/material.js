document.addEventListener("DOMContentLoaded", () => {
    const addMaterialBtn = document.querySelector(".add-material-btn");
    const addMaterialFormContainer = document.querySelector(".add-material-form-container");
  
    if (addMaterialBtn && addMaterialFormContainer) {
      // Add a single event listener for the Add Material button
      addMaterialBtn.addEventListener("click", () => {
        console.log("Add Material button clicked!");
        addMaterialFormContainer.classList.toggle("hidden");
      });
    } else {
      console.error("Add Material button or form container not found!");
    }
  
    // Approve Button Functionality
    document.querySelectorAll(".approve-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.querySelector("td:nth-child(5)").textContent = "Approved";
        row.querySelector("td:nth-child(5)").classList.remove("pending");
        row.querySelector("td:nth-child(5)").classList.add("approved");
        btn.remove(); // Remove Approve button
      });
    });
  
    // Reject Button Functionality
    document.querySelectorAll(".reject-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.remove(); // Remove the row
      });
    });
  
    // Delete Button Functionality
    document.querySelectorAll(".delete-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.remove(); // Remove the row
      });
    });
  });
  
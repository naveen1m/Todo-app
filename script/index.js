function openModal(description, itemId) {
  // Show modal
  document.getElementById("modal").classList.remove("hidden");
  // Populate modal fields
  document.getElementById("itemId").value = itemId;
  document.getElementById("itemDescription").value = description;
}

function closeModal() {
  document.getElementById("modal").classList.add("hidden");
}

function edit(desc, itemid) {
  openModal(desc, itemid);
  console.log(desc, itemid);
  // alert("clicked");
}

function deleteTodo(itemid) {
  fetch("php/delete.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ itemId: itemid }),
  })
    .then((response) => {
      console.log("Response status:", response.status);
      console.log("Response headers:", response.headers);
      return response.text();
    })
    .then((data) => {
      console.log("Raw response:", data);
      try {
        let jsonData = JSON.parse(data);
        console.log("Parsed JSON:", jsonData);
        console.log("json_encode is working correctly");

        setTimeout(() => {
          location.reload();
        }, 500);
      } catch (error) {
        console.error("Error parsing JSON:", error);
        console.log("json_encode might not be working correctly");
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });

  // alert(itemid);
}

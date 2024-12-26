const searchBar = document.getElementById("inputsearch");

searchBar.addEventListener("keyup",(e)=>{
    const searchedLetters = e.target.value.toLowerCase();
    const contacts = document.querySelectorAll(".contact-table tbody tr");
    filterElements(searchedLetters,contacts);
});

function filterElements(searchedLetters, contacts) {
    contacts.forEach((contact) => {
      const contactInfo = contact.textContent.toLowerCase(); 
      if (contactInfo.includes(searchedLetters)) {
        contact.style.display = "";
      } else {
        contact.style.display = "none"; 
      }
    });
  }
  
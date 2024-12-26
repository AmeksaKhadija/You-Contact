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
  



  function validateForm() {
    const nomContact = document.getElementById('nom').value.trim();
    const prenomContact = document.getElementById('prenom').value.trim();
    const emailContact = document.getElementById('email').value.trim();
    const teleContact = document.getElementById('telephone').value.trim();

    const nameRegex = /^[a-zA-ZÀ-ÿ\s-]{2,30}$/;
    const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    const numeroRegex = /^(?:\+212|0)([ \-]?)\d{9}$/;

        if (!nomContact.match(nameRegex)) {
            document.getElementById('message').textContent = "Nom invalide.";
            return false;
        }
        if (!prenomContact.match(nameRegex)) {
            document.getElementById('message').textContent = "Prenom invalide.";
            return false;
        }
        if (!emailContact.match(emailRegex)) {
            document.getElementById('message').textContent = "Email invalide.";
            return false;
        }
        if (!teleContact.match(teleRegex)) {
            document.getElementById('message').textContent = "Tele invalide.";
            return false;
        }

        

        document.getElementById('message').textContent = "";
        return true;

}
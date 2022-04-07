function expandform() {
  let check = document.getElementById('hidden');
  if (check.className === 'expandform') {
    check.className = '';
  }
  else {
    check.className = 'expandform';
  }
}

function selectRegisterForm(evt) {

  if (evt.target.id === "customerTab") {
    document.getElementById("divCustomerForm").style.display = "block";
    document.getElementById("customerTab").classList.add("active");

    document.getElementById("divFarmerForm").style.display = "none";
    document.getElementById("farmerTab").classList.remove("active");
  }

  if (evt.target.id === 'farmerTab') {
    document.getElementById("divCustomerForm").style.display = "none";
    document.getElementById("customerTab").classList.remove("active");

    document.getElementById("divFarmerForm").style.display = "block";
    document.getElementById("farmerTab").classList.add("active");
  }
} 
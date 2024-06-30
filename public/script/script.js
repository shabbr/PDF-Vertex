
// Select the help button
const helpButton = document.getElementById("helpButton");

// Select all elements with data-bs-toggle="popover" attribute except for the toggle button and help button
const popoverTriggerList = document.querySelectorAll(
  '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
  (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);

// Function to toggle all popovers
const toggleAllPopovers = () => {
  popoverList.forEach((popover) => {
    popover.toggle();
  });
};

// Event listener for the toggle button
helpButton.addEventListener("click", toggleAllPopovers);

 





const elements = document.getElementsByClassName("color-mode");
for (let i = 0; i < elements.length; i++) {
  elements[i].addEventListener("click", () => {
    if (elements[i].classList.contains("light-icon")) {
      /* for dark mode */
      /* --bg-main:rgb(23, 23, 23);
            --bg-secondary:rgb(39, 38, 38);
            --clr-hover-icons:rgb(220, 217, 217);
            --text-light:rgb(43, 42, 42);
            --text-dark:rgb(238, 238, 238); */
      document.documentElement.style.setProperty(
        "--bg-main",
        "rgb(23, 23, 23)"
      );
      document.documentElement.style.setProperty(
        "--bg-secondary",
        "rgb(39, 38, 38)"
      );
      document.documentElement.style.setProperty(
        "--clr-hover-icons",
        "rgb(220, 217, 217)"
      );
      document.documentElement.style.setProperty(
        "--text-light",
        "rgb(43, 42, 42)"
      );
      document.documentElement.style.setProperty(
        "--text-dark",
        "rgb(238, 238, 238)"
      );
      document.documentElement.style.setProperty(
        "--bg-li-gr-1",
        "rgb(52, 52, 52)"
      );
      document.documentElement.style.setProperty(
        "--bg-li-gr-2",
        "rgb(66, 56, 56)"
      );
      document.documentElement.style.setProperty(
        "--filter-svg",
        "  brightness(0) invert(1)"
      );

      document
        .getElementsByClassName("hide-icon")[0]
        .classList.remove("hide-icon");
      elements[i].classList.add("hide-icon");
    } else {
      /* for light mode */
      // --bg-main:#2a3c4e3b;
      // --bg-secondary:rgb(234, 232, 232);
      // --clr-icons:rgb(68, 67, 67);
      // --clr-hover-icons:rgb(29, 29, 29);
      // --text-light:rgb(255, 255, 255);
      // --text-dark:rgb(33, 33, 33);

      document.documentElement.style.setProperty("--bg-main", "#d3d7dc");
      document.documentElement.style.setProperty(
        "--bg-secondary",
        "rgb(250, 250, 250)"
      );
      document.documentElement.style.setProperty(
        "--clr-hover-icons",
        "rgb(68, 67, 67)"
      );
      document.documentElement.style.setProperty(
        "--text-light",
        "rgb(255, 255, 255)"
      );
      document.documentElement.style.setProperty(
        "--text-dark",
        "rgb(33, 33, 33)"
      );
      document.documentElement.style.setProperty(
        "--bg-li-gr-1",
        "rgb(255, 255, 255)"
      );
      document.documentElement.style.setProperty(
        "--bg-li-gr-2",
        "rgb(13, 110, 253)"
      );
      document.documentElement.style.setProperty(
        "--filter-svg",
        "brightness(1) invert(0)"
      );

      document
        .getElementsByClassName("hide-icon")[0]
        .classList.remove("hide-icon");
      elements[i].classList.add("hide-icon");
    }
  });
}

// styles modal
const pageHead = document.getElementsByClassName("styles");
for (let i = 0; i < pageHead.length; i++) {
  pageHead[i].addEventListener("click", () => {
    document.getElementById("styles-dialog").showModal();
  });
}
// close styles modal
document
  .getElementsByClassName("close-styles-modal")[0]
  .addEventListener("click", () => {
    document.getElementById("styles-dialog").close();
  });
// close with save and cancel
const closeBtns = document.getElementsByClassName("btn-close-styles");
for (let i = 0; i < closeBtns.length; i++) {
  closeBtns[i].addEventListener("click", () => {
    document.getElementById("styles-dialog").close();
  });
}

// citation modal
const modal = document.getElementById("citation-modal");
const openModal = document.getElementsByClassName("open-citation-modal")[0];
openModal.addEventListener("click", () => {
  modal.showModal();
});

document
  .getElementsByClassName("open-citation")[0]
  .addEventListener("click", () => {
    modal.showModal();
  });

document
  .getElementsByClassName("close-modal")[0]
  .addEventListener("click", () => {
    modal.close();
  });

// import btn implementation
const importBtn = document.getElementById("import-slide-btn");
importBtn.addEventListener("click", () => {
  document.getElementsByClassName("import-slide")[0].style.bottom = "0";
});

document
  .getElementsByClassName("import-close")[0]
  .addEventListener("click", () => {
    document.getElementsByClassName("import-slide")[0].style.bottom = "-100vh";
  });

// options form
const options = document.getElementsByClassName("options");
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener("click", () => {
    document.getElementsByClassName("input-form")[0].style.display = "block";
  });
}

document
  .getElementsByClassName("back-form")[0]
  .addEventListener("click", () => {
    document.getElementsByClassName("input-form")[0].style.display = "none";
  });






const searchinputField = document.getElementsByClassName("main-side-1")[0];

function showInput() {
  if (searchinputField.style.display === "none") {
    searchinputField.style.display = "flex"; // Show the element if it's currently hidden
  } else {
    searchinputField.style.display = "none"; // Hide the element if it's currently visible
  }
}
document.addEventListener("click", function (event) {
  if (
    !searchinputField.contains(event.target) &&
    !document.getElementsByClassName("main-side-2")[0].contains(event.target)
  ) {
    searchinputField.style.display = "none";
  }
});

// const dropdownLink = document.getElementById('#dropdown-link1');
// const loginListModal = document.getElementById('loginlist');

// dropdownLink.addEventListener('click', () => {

//     const dropdownLinkRect = dropdownLink.getBoundingClientRect();
//     const dropdownLinkTop = dropdownLinkRect.top + window.scrollY;
//     const dropdownLinkLeft = dropdownLinkRect.left + window.scrollX;
//     loginListModal.style.top = dropdownLinkTop + dropdownLink.offsetHeight + 'px';
//     loginListModal.style.left = dropdownLinkLeft + 'px';

//     loginListModal.showModal();
// });

// msg
const msg = document.getElementsByClassName("msg")[0];
const openSupport = document.getElementById("contact-dialog");
const closeSupport = document.getElementsByClassName("close-support");
// ------------------
const msgBody1 = document.getElementsByClassName("dialog-body")[0];
const msgBody2 = document.getElementsByClassName("dialog-body-1")[0];
const msgBody3 = document.getElementsByClassName("dialog-body-2")[0];
const supportMsg = document.getElementsByClassName("body1-item1")[0];
const supportOther = document.getElementsByClassName("body1-item2")[0];
// ------------

msg.addEventListener("click", () => {
  openSupport.showModal();
});
for (let i = 0; i < closeSupport.length; i++) {
  closeSupport[i].addEventListener("click", () => {
    openSupport.close();
    msgBody1.style.display = "block";
    msgBody2.style.display = "none";
    msgBody3.style.display = "none";
  });
}

supportMsg.addEventListener("click", () => {
  msgBody1.style.display = "none";
  msgBody3.style.display = "none";
  msgBody2.style.display = "block";
});
supportOther.addEventListener("click", () => {
  msgBody1.style.display = "none";
  msgBody2.style.display = "none";
  msgBody3.style.display = "block";
});
// ------

const shareBtn = document.getElementsByClassName("share-button")[0];
const shareDialog = document.getElementById("share-dialog");
const closeShareModel = document.getElementsByClassName("close-share-model")[0];

shareBtn.addEventListener("click", function () {
  shareDialog.showModal();
});
closeShareModel.addEventListener("click", () => {
  shareDialog.close();
});

const deleteClose = document.getElementsByClassName("delete-close");
const deleteDialog = document.getElementById("delete-dialog");
const deleteBtn = document.getElementById("deleteBtn");

deleteBtn.addEventListener("click", () => {
  deleteDialog.showModal();
});
for (let i = 0; i < 2; i++) {
  deleteClose[i].addEventListener("click", () => {
    deleteDialog.close();
  });
}
const archiveClose = document.getElementsByClassName("archive-close");
const archiveDialog = document.getElementById("archive-dialog");
const archiveBtn = document.getElementById("archiveBtn");
archiveBtn.addEventListener("click", () => {
  archiveDialog.showModal();
});
for (let i = 0; i < 2; i++) {
  archiveClose[i].addEventListener("click", () => {
    archiveDialog.close();
  });
}
const userDialog = document.getElementsByClassName("user-dialog")[0];
const UserButton = document.getElementById("user-account");
userDialog.close();
UserButton.addEventListener("click", () => {
  userDialog.showModal();
});
document.addEventListener("click", function (event) {
  if (!UserButton.contains(event.target)) {
    userDialog.close();
  }
});

const notifiDialog = document.getElementsByClassName("notifi-dialog")[0];
const closeNotifi = document.getElementsByClassName("close-notifi")[0];
const notifiBtn = document.getElementById("notifi-btn");

notifiBtn.addEventListener("click", function () {
  notifiDialog.showModal();
});
closeNotifi.addEventListener("click", function () {
  notifiDialog.close();
});

const SwitchBtn = document.getElementsByClassName("switch-btn")[0];
const switchShare = document.getElementsByClassName("switch-share")[0];
SwitchBtn.checked
  ? (switchShare.style.display = "block")
  : (switchShare.style.display = "none");
SwitchBtn.addEventListener("change", function () {
  SwitchBtn.checked
    ? (switchShare.style.display = "block")
    : (switchShare.style.display = "none");
});
const shareEmailBtn = document.getElementsByClassName("share-email-btn")[0];
const shareEmail = document.getElementsByClassName("share-email")[0];

shareEmailBtn.addEventListener("click", () => {
  shareEmail.style.display === "block"
    ? (shareEmail.style.display = "none")
    : (shareEmail.style.display = "block");
});

// --------------lang-dialog
const languageDialog = document.getElementsByClassName("lang-dialog")[0];
const languageBtn = document.getElementsByClassName("language")[0];

// languageDialog.showModal();
languageBtn.addEventListener("click", function () {
  languageDialog.showModal();
});
document.addEventListener("click", function (event) {
  if (!languageBtn.contains(event.target)) {
    languageDialog.close();
  }
});

const org = (event) => {
  const a = event.parentElement.parentElement.children; // Use currentTarget to ensure correct element reference
  // Check for correct condition syntax and default action
  if (a[0].style.display === "none") {
    a[0].style.display = "block";
    event.children[0].src = "./images/happy-48.png";
    a[1].placeholder = "Last Name";
  } else {
    a[0].style.display = "none";
    event.children[0].src = "./images/orgi.png";
    a[1].placeholder = "Organization Name";
  }
};

// const orLine =  document.getElementById("orline");
// const dragDrop =  document.getElementsByClassName("drag-drop")[0];

function searchData1(event) {
  let inputValue = document.getElementById("inputValue1").value;
  if (inputValue.length > 0) {
    if (inputValue.startsWith("http://") || inputValue.startsWith("https://")) {
      document.getElementsByClassName("searchDataCite")[0].style =
        "display: block;";
      document.getElementById("httpErr").style = "display: none";
    } else {
      document.getElementById("httpErr").style = "display: block";
      document.getElementsByClassName("searchDataCite")[0].style =
        "display: none;";
    }
  } else {
    document.getElementById("httpErr").style = "display: none";
    document.getElementsByClassName("searchDataCite")[0].style =
      "display: none;";
  }
}
function searchData2(event) {
  let inputValue = document.getElementById("inputValue2").value;
  if (inputValue.length > 0) {
    document.getElementsByClassName("searchDataCite")[1].style =
      "display: block;";
  } else {
    document.getElementsByClassName("searchDataCite")[1].style =
      "display: none;";
  }
}
function searchData3(event) {
  let inputValue = document.getElementById("inputValue3").value;
  if (inputValue.length > 0) {
    document.getElementsByClassName("searchDataCite")[2].style =
      "display: block;";
  } else {
    document.getElementsByClassName("searchDataCite")[2].style =
      "display: none;";
  }
}
function searchData4(event) {
  let inputValue = document.getElementById("inputValue4").value;
  if (inputValue.length > 0) {
    document.getElementsByClassName("searchDataCite")[3].style =
      "display: block;";
  } else {
    document.getElementsByClassName("searchDataCite")[3].style =
      "display: none;";
  }
}

function urlToForm(SelectOption) {
  document.getElementsByClassName("input-form")[0].style.display = "block";
  document.querySelectorAll(".cite-form").forEach((element) => {
    element.style.display = "none";
    console.log("none");
  });

  const optionName = SelectOption.headTittle; // Get the name of the selected option
  // Show the corresponding header and body divs
  document.getElementById(`form${SelectOption.option}`).style.display = "block";

  // Show the name of the selected option in the headertitle div
  document.getElementById("headertitle").textContent = optionName;

  

  const allInputs = document.querySelectorAll(
    `#form${SelectOption.option} input, #form${SelectOption.option} textarea`
  );
  const prev = document.querySelector(`#form${SelectOption.option} #preview1`);
  console.log(prev);
  const size = allInputs.length;
  for (let i = 0; i < size; i++) {
    prev.innerHTML += "<span></span>";
  }
  allInputs.forEach((item, i) => {
    item.addEventListener("change", () => {
      prev.children[i].innerHTML = item.value + " ";
    });
  });

}





//-------------- styles-dialog-----------

const  styleDialog = document.querySelectorAll("#styles-dialog .form-select");
const styleSubmit = document.getElementById("style_submit");
styleSubmit.onclick = function() {
  
  let sort = styleDialog[1].value;
  let fontFamily = styleDialog[0].value;
  let fontSize = styleDialog[2].value;
 
    document.getElementsByClassName("responses")[0].style = `font-size: ${fontSize}px ;`;
 const responseFontFamily = document.getElementsByClassName("response");
  for (let i = 0; i < responseFontFamily.length; i++) {
   responseFontFamily[i].children[1].style = `font-family: ${fontFamily};`;
for (let j = 0; j < responseFontFamily[i].children[1].children.length; j++) {
  responseFontFamily[i].children[1].children[j].style =  `font-family: ${fontFamily};`;
  
}
console.log(responseFontFamily[i].children[1].childNodes);
    
  } 
    if (sort == "A-A-Z") {
      sortAndUpdate(sortByAuthorNameAZ);
    }
    else if (sort == "A-Z-A") {
      sortAndUpdate(sortByAuthorNameZA);
    }
    else if (sort == "T-A-Z") {
      sortAndUpdate(sortByTitleNameAZ);
    }
    else if (sort == "T-Z-A") {
      sortAndUpdate(sortByTitleNameZA);
    }
};

  // Get response container
  const responseContainer = document.getElementsByClassName('responses')[0];

  // Get all response elements
  const responses = document.querySelectorAll('.response');

  // Convert NodeList to Array
  const responseArray = Array.from(responses);

  // Sort function for A-Z
  function sortByAuthorNameAZ(a, b) {
      const authorNameA = a.querySelector('.authorName').textContent.trim();
      const authorNameB = b.querySelector('.authorName').textContent.trim();
      return authorNameA.localeCompare(authorNameB);
  }

  // Sort function for Z-A
  function sortByAuthorNameZA(a, b) {
      const authorNameA = a.querySelector('.authorName').textContent.trim();
      const authorNameB = b.querySelector('.authorName').textContent.trim();
      return authorNameB.localeCompare(authorNameA);
  }
  // Sort function for title A-Z
  function sortByTitleNameAZ(a, b) {
      const titleNameA = a.querySelector('.titleName').textContent.trim();
      const titleNameB = b.querySelector('.titleName').textContent.trim();
      return titleNameA.localeCompare(titleNameB);
  }

  // Sort function for title Z-A
  function sortByTitleNameZA(a, b) {
      const titleNameA = a.querySelector('.titleName').textContent.trim();
      const titleNameB = b.querySelector('.titleName').textContent.trim();
      return titleNameB.localeCompare(titleNameA);
  }

  // Function to sort and update DOM
  function sortAndUpdate(sortFunction) {
      // Sort responses
      const sortedResponses = responseArray.slice().sort(sortFunction);

      // Remove existing responses
      responseArray.forEach(response => responseContainer.removeChild(response));

      // Append sorted responses to container
      sortedResponses.forEach(response => responseContainer.appendChild(response));
  }



  // --------------
// document.getElementsByClassName("response")


var checkboxColorGradient = document.getElementsByClassName("checkbox1");
for (let i = 0; i < checkboxColorGradient.length; i++) {
  checkboxColorGradient[i].addEventListener("click", (e) => {
    const res = e.target.parentElement.parentElement;
    e.currentTarget.checked
      ? (res.style =
          "background: linear-gradient(to right ,  var(--bg-li-gr-1), var(--bg-li-gr-2));")
      : (res.style =
          "background: var(--bg-secondary)");
    // document.getElementsByClassName("response")[i].style = "&:hover"
  });
}
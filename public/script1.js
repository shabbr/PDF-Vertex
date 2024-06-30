

// creating new project
// document.getElementsByClassName('start-project')[0].addEventListener('click', ()=>{


//         const newElement = document.createElement("div");
//         newElement.classList.add('new-project');

//         newElement.innerHTML = ` <p>0  &nbsp; &nbsp; New project</p> `;

//         const targetDiv = document.getElementsByClassName('sidebar-center')[0];
//         targetDiv.appendChild(newElement);

// })

const elements = document.getElementsByClassName('color-mode');
for(let i = 0; i<elements.length; i++){

    elements[i].addEventListener('click' , ()=>{
        if(elements[i].classList.contains('light-icon')){
             /* for dark mode */
            /* --bg-main:rgb(23, 23, 23);
            --bg-secondary:rgb(39, 38, 38);
            --clr-hover-icons:rgb(220, 217, 217);
            --text-light:rgb(43, 42, 42);
            --text-dark:rgb(238, 238, 238); */
            document.documentElement.style.setProperty('--bg-main', 'rgb(23, 23, 23)');
            document.documentElement.style.setProperty('--bg-secondary', 'rgb(39, 38, 38)')
            document.documentElement.style.setProperty('--clr-hover-icons', 'rgb(220, 217, 217)')
            document.documentElement.style.setProperty('--text-light', 'rgb(43, 42, 42)')
            document.documentElement.style.setProperty('--text-dark', 'rgb(238, 238, 238)')


            document.getElementsByClassName('hide-icon')[0].classList.remove('hide-icon');
            elements[i].classList.add('hide-icon');



        }
        else{


             /* for light mode */
            // --bg-main:#2a3c4e3b;
            // --bg-secondary:rgb(234, 232, 232);
            // --clr-icons:rgb(68, 67, 67);
            // --clr-hover-icons:rgb(29, 29, 29);
            // --text-light:rgb(255, 255, 255);
            // --text-dark:rgb(33, 33, 33);

            document.documentElement.style.setProperty('--bg-main', '#d3d7dc');
            document.documentElement.style.setProperty('--bg-secondary', 'rgb(250, 250, 250)')
            document.documentElement.style.setProperty('--clr-hover-icons', 'rgb(68, 67, 67)')
            document.documentElement.style.setProperty('--text-light', 'rgb(255, 255, 255)')
            document.documentElement.style.setProperty('--text-dark', 'rgb(33, 33, 33)')


            document.getElementsByClassName('hide-icon')[0].classList.remove('hide-icon');
            elements[i].classList.add('hide-icon');



        }
    });

}



// styles modal
const pageHead = document.getElementsByClassName('styles');
for(let i=0; i<pageHead.length; i++)
{
    pageHead[i].addEventListener('click', ()=>{
        document.getElementById('styles-dialog').showModal()
    })
}
// close styles modal
document.getElementsByClassName('close-styles-modal')[0].addEventListener('click', ()=>{
    document.getElementById('styles-dialog').close()

})
// close with save and cancel
const closeBtns = document.getElementsByClassName('btn-close-styles')
for(let i = 0; i<closeBtns.length; i++)
{
    closeBtns[i].addEventListener('click', ()=>{
        document.getElementById('styles-dialog').close()

    })
}




// citation modal
const modal = document.getElementById('citation-modal');
const openModal = document.getElementsByClassName('open-citation-modal')[0];
openModal.addEventListener('click', ()=>{
    modal.showModal()
});

document.getElementsByClassName('open-citation')[0].addEventListener('click', ()=>{
    modal.showModal()
});

document.getElementsByClassName('close-modal')[0].addEventListener('click', ()=>{
    modal.close();
})






// import btn implementation
const importBtn = document.getElementById('import-slide-btn');
importBtn.addEventListener('click', ()=>{
    document.getElementsByClassName('import-slide')[0].style.bottom = '0'

})

document.getElementsByClassName('import-close')[0].addEventListener('click', ()=>{
    document.getElementsByClassName('import-slide')[0].style.bottom = '-100vh'

})


// options form
const options = document.getElementsByClassName('options');
for(let i=0; i<options.length; i++)
{
    options[i].addEventListener('click', ()=>{
        document.getElementsByClassName('input-form')[0].style.display='block'
    })
}

document.getElementsByClassName('back-form')[0].addEventListener('click', ()=>{
    document.getElementsByClassName('input-form')[0].style.display='none'

})



//change font family of complete page
var fontSelector = document.getElementById('changeFont');

// Add event listener for the change event
fontSelector.addEventListener('change', function() {
    // Get the selected font value
    var selectedFont = fontSelector.value;

    // Set the font family of the body
    document.body.style.fontFamily = selectedFont;
});





//Dowenload Bibliography
document.getElementById('downloadBtn').addEventListener('click', function() {
    // Get the data from the input field
    // var dataToSend = document.getElementById('citations').value;
    // var dataToSend ='shabbar';

    // Construct the URL with the data
    var url = "{{ route('downloadImage') }}?dataInput=" + encodeURIComponent(dataToSend);

    // Redirect the user to the URL
    window.location.href = url;
});



  // Automatically submit the form when the file input changes
  document.getElementById('ris-file').addEventListener('change', function() {
    document.getElementById('uploadForm').submit();
});


//for bib form
document.getElementById('bib-file').addEventListener('change', function() {
    document.getElementById('uploadBibForm').submit();
});

//for ref form
document.getElementById('ref-file').addEventListener('change', function() {
    document.getElementById('uploadRefForm').submit();
});








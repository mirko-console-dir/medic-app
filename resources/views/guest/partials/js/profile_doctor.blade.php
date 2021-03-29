<script type="application/javascript">

// Funzione di scrolling con i tasti

var scrollPosition = document.getElementById('services_pagination').scrollTop;

function goUpServices(){
  document.getElementById('services_pagination').scrollTo({
    top: scrollPosition - 200,
    behavior: 'smooth'
  });
}

function goDownServices(){
  document.getElementById('services_pagination').scrollTo({
    top: scrollPosition + 200,
    behavior: 'smooth'
  });
}

//forms appear
// message
function appearMessage(){
  // var scrollY = window.scrollY;

  document.getElementById('form_review').style.display="none";

  document.getElementById('form_message').style.display="block";

  document.getElementById('form_message').scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
 }

 // review

 function appearReview(){
   // var scrollY = window.scrollY;

  document.getElementById('form_message').style.display="none";

   document.getElementById('form_review').style.display="block";

   document.getElementById('form_review').scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
  }

/*******************************
 Pagination per le reviews
********************************/

var user = {!!$user!!};
var reviews = {!!$reviews!!};

(function() {
    "use strict";

    function Pagination() {

        var reviews_user = [];

        reviews.forEach(element => {
            if (element.user_id == user.id) {
                reviews_user.push(element);
            }
        });

        console.log(reviews_user);


        const prevButton = document.getElementById('button_prev');
        const nextButton = document.getElementById('button_next');
        const clickPageNumber = document.querySelectorAll('.clickPageNumber');

        let current_page = 1;
        let records_per_page = 4;

        this.init = function() {
            changePage(1);
            pageNumbers();
            selectedPage();
            clickPage();
            addEventListeners();
        }

        let addEventListeners = function() {
            prevButton.addEventListener('click', prevPage);
            nextButton.addEventListener('click', nextPage);
        }

        let selectedPage = function() {
            let page_number = document.getElementById('page_number').getElementsByClassName('clickPageNumber');

            for (let i = 0; i < page_number.length; i++) {
                if (i == current_page - 1) {
                    page_number[i].style.opacity = "1.0";
                } else {
                    page_number[i].style.opacity = "0.5";
                }
            }
        }

        let checkButtonOpacity = function() {
            current_page == 1 ? prevButton.classList.add('opacity') : prevButton.classList.remove('opacity');
            current_page == numPages() ? nextButton.classList.add('opacity') : nextButton.classList.remove('opacity');
        }

        let changePage = function(page) {
            const listingTable = document.getElementById('listingTable');

            if (page < 1) {
                page = 1;
            }
            if (page > (numPages() - 1)) {
                page = numPages();
            }

            listingTable.innerHTML = "";


            var stars = reviews_user.forEach(element=>{

                console.log(element.vote);



            });


            for (var i = (page - 1) * records_per_page; i < (page * records_per_page) && i < reviews_user.length; i++) {

                if(reviews_user[i].vote == 1){

                    var stars = `<i class="fas fa-star star"></i>`
                    var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                }
                else if(reviews_user[i].vote == 2){

                    var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                    var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                }
                else if(reviews_user[i].vote == 3){

                    var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                    var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                }
                else if(reviews_user[i].vote == 4){

                    var stars =  `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                    var emptyStar = `<i class="far fa-star empty_star"></i>`
                }
                 else if(reviews_user[i].vote == 5){

                    var stars =  `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                    var emptyStar = ``
                }


                listingTable.innerHTML += `
            <div class='objectBlock d_flex_column'>
              <div class='d_flex title_vote'>
                <h4 class="title">${reviews_user[i].title}</h4>

                <p id="vote">${stars}${emptyStar}</p>

              </div>

              <div class="d_flex review">
                <h4 class='header_message'> ${reviews_user[i].name} ${reviews_user[i].lastname} </h4>
              </div>
              <p class="body_message">  ${reviews_user[i].body}
              </p>

            </div>
            `;
            }

            checkButtonOpacity();
            selectedPage();
        }

        let prevPage = function() {
            if (current_page > 1) {
                current_page--;
                changePage(current_page);
            }
        }

         let numPages = function() {
            return Math.ceil(reviews_user.length / records_per_page);
        }

        let nextPage = function() {
            if (current_page < numPages()) {
                current_page++;
                changePage(current_page);
            }
        }

        let clickPage = function() {
            document.addEventListener('click', function(e) {
                if (e.target.nodeName == "SPAN" && e.target.classList.contains("clickPageNumber")) {
                    current_page = e.target.textContent;
                    changePage(current_page);
                }
            });
        }

        let pageNumbers = function() {
            let pageNumber = document.getElementById('page_number');
            pageNumber.innerHTML = "";

            for (let i = 1; i < numPages() + 1; i++) {
                pageNumber.innerHTML += "<span class='clickPageNumber'>" + i + "</span>";
            }
        }


    }
    let pagination = new Pagination();
    pagination.init();
})();

</script>

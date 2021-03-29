@extends('layouts.app')
@section('title')
My Reviews
@endsection

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Reviews</h2>

                <div class="pagination">
                    <div class="tableList d_flex_column" id="listingTable"></div>
                    <div class="pagination-block">
                        <span class="pageButton outline-none hidden" id="button_prev">Prev</span>
                        <span id="page_number" class="outline-none"></span>
                        <span class="pageButton outline-none hidden" id="button_next">Next</span>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>

</div>
<script>
    console.log('ciao');
    var reviews = {!!$reviews!!};
    var user = {!!$user!!};



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
            let records_per_page = 3;

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


                var stars = reviews_user.forEach(element => {

                    console.log(element.vote);



                });


                for (var i = (page - 1) * records_per_page; i < (page * records_per_page) && i < reviews_user.length; i++) {

                    if (reviews_user[i].vote == 0) {

                        var stars = ``
                        var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                    } else if (reviews_user[i].vote == 1) {

                        var stars = `<i class="fas fa-star star"></i>`
                        var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                    } else if (reviews_user[i].vote == 2) {

                        var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                        var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                    } else if (reviews_user[i].vote == 3) {

                        var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                        var emptyStar = `<i class="far fa-star empty_star"></i><i class="far fa-star empty_star"></i>`

                    } else if (reviews_user[i].vote == 4) {

                        var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                        var emptyStar = `<i class="far fa-star empty_star"></i>`
                    } else if (reviews_user[i].vote == 5) {

                        var stars = `<i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i><i class="fas fa-star star"></i>`
                        var emptyStar = ``
                    }


                    listingTable.innerHTML += `
                <div class='objectBlock d_flex_column'>
                    <div class='d_flex review'>
                        <div class="review_name d_flex">
                            <span class='header_message'>${reviews_user[i].name} ${reviews_user[i].lastname} </span>
                         </div>
                         <div class="review_vote d_flex">
                            <span id="vote">${stars}${emptyStar}</span>
                         </div>
                    </div>
                
                <div class="d_flex">
                <h4>${reviews_user[i].title}</h4>
                </div>
                <span class="body_message">${reviews_user[i].body}</span>

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
@endsection
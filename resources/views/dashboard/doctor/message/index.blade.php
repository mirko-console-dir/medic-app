@extends('layouts.app')
@section('title')
My Messages
@endsection

@section('content')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>My Messages</h2>
                <div class="pagination">
                    <div class="tableList d_flex_column" id="listingTable"></div>
                    <div class="pagination-block">
                        <span class="pageButton outline-none" id="button_prev">Prev</span>
                        <span id="page_number" class="outline-none"></span>
                        <span class="pageButton outline-none" id="button_next">Next</span>
                    </div>
                </div>

            </div>


        </div>

    </div>



</div>

</div>
<script>
    console.log('ciao');
    var messages = {!!$messages!!};
    var user = {!!$user!!};



    (function() {
        "use strict";

        function Pagination() {


            var messages_user = [];

            messages.forEach(element => {
                if (element.user_id == user.id) {
                    messages_user.push(element);
                }
            });

            console.log(messages_user);




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

                for (var i = (page - 1) * records_per_page; i < (page * records_per_page) && i < messages_user.length; i++) {
                    listingTable.innerHTML += `
                <div class='objectBlock d_flex_column'>
                <h4> ${messages_user[i].name} ${messages_user[i].lastname} </h4>
                <h4> ${messages_user[i].title}</h4>
                </div>
                `;
                }

                // `
                // <div class='objectBlock d_flex_column'>
                // <h3> ${messages_user[i].name} </h3>
                // <h3> ${messages_user[i].email}</h3> + "</div>
                // `

                checkButtonOpacity();
                selectedPage();
            }

            let prevPage = function() {
                if (current_page > 1) {
                    current_page--;
                    changePage(current_page);
                }
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

            let numPages = function() {
                return Math.ceil(messages_user.length / records_per_page);
            }
        }
        let pagination = new Pagination();
        pagination.init();
    })();
</script>
@endsection
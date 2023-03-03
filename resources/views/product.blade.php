@extends('layouts.app')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Category page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Fashon Category</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        @foreach ($categories as $category)
                            <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable"
                                    aria-expanded="false" aria-controls="fruitsVegetable"><span
                                        class="lnr lnr-arrow-right"></span>{{ $category->name }}<span
                                        class="number"></span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <select id="changeShow">
                            <option value="10">Show 10</option>
                            <option value="20">Show 20</option>
                            <option value="50">Show 50</option>
                        </select>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row" id="paginated-list" data-current-page="1" aria-live="polite">
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-6 list-item">
                                <div class="single-product">
                                   <a href="{{ route('product.detail' , ['id' => $item->id] ) }}"><img class="img-fluid" style="max-width:250px !important; max-height:250px !important;"
                                        src="{{ asset('storage/image/' . $item->image) }}" width="300px" alt=""/></a>
                                    <div class="product-details">
                                        <h6>{{ $item->name }}</h6>
                                        <div class="price">
                                            <h6>@convert($item->price)</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="{{ route('addCart' , ['id' => $item->id] ) }}" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class=" mr-auto">
                        <select id="changeShow" >
                            <option value="10">Show 10</option>
                            <option value="20">Show 20</option>
                            <option value="50">Show 50</option>
                        </select>
                    </div>
                    <nav class="pagination-container">
                        <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        </button>

                        <div id="pagination-numbers">

                        </div>

                        <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </button>
                    </nav>

                </div>
                <!-- End Filter Bar -->


            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            const paginationNumbers = document.getElementById("pagination-numbers");
            const paginatedList = document.getElementById("paginated-list");
            const listItems = paginatedList.querySelectorAll(".list-item");
            const nextButton = document.getElementById("next-button");
            const prevButton = document.getElementById("prev-button");

        const paginationLimit = 9;
        const pageCount = Math.ceil(listItems.length / paginationLimit);
        let currentPage = 1;

        const disableButton = (button) => {
            button.classList.add("disabled");
            button.setAttribute("disabled", true);
        };

        const enableButton = (button) => {
            button.classList.remove("disabled");
            button.removeAttribute("disabled");
        };

        const handlePageButtonsStatus = () => {
            if (currentPage === 1) {
                disableButton(prevButton);
            } else {
                enableButton(prevButton);
            }

            if (pageCount === currentPage) {
                disableButton(nextButton);
            } else {
                enableButton(nextButton);
            }
        };

        const handleActivePageNumber = () => {
            document.querySelectorAll(".pagination-number").forEach((button) => {
                button.classList.remove("active");
                const pageIndex = Number(button.getAttribute("page-index"));
                if (pageIndex == currentPage) {
                    button.classList.add("active");
                }
            });
        };

        const appendPageNumber = (index) => {
            const pageNumber = document.createElement("button");
            pageNumber.className = "pagination-number";
            pageNumber.innerHTML = index;
            pageNumber.setAttribute("page-index", index);
            pageNumber.setAttribute("aria-label", "Page " + index);

            paginationNumbers.appendChild(pageNumber);
        };

        const getPaginationNumbers = () => {
            for (let i = 1; i <= pageCount; i++) {
                appendPageNumber(i);
            }
        };

        const setCurrentPage = (pageNum) => {
            currentPage = pageNum;
            console.log(currentPage);
            handleActivePageNumber();
            handlePageButtonsStatus();

            const prevRange = (pageNum - 1) * paginationLimit;
            const currRange = pageNum * paginationLimit;

            listItems.forEach((item, index) => {
                item.classList.add("hidden");
                if (index >= prevRange && index < currRange) {
                    item.classList.remove("hidden");
                }
            });
        };

        window.addEventListener("load", () => {
            getPaginationNumbers();
            setCurrentPage(1);

            prevButton.addEventListener("click", () => {
                setCurrentPage(currentPage - 1);
            });

            nextButton.addEventListener("click", () => {
                setCurrentPage(currentPage + 1);
            });

            document.querySelectorAll(".pagination-number").forEach((button) => {
                const pageIndex = Number(button.getAttribute("page-index"));

                if (pageIndex) {
                    button.addEventListener("click", () => {
                        setCurrentPage(pageIndex);
                    });
                }
            });
        });
        $('#changeShow').on('change' , function (){
            alert(listItems.length);
            listItems.forEach((item, index) => {
                item.classList.add("hidden");
                if (index < this.value) {
                    item.classList.remove("hidden");
                }
            });
        })


        });

    </script>
@endsection

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
                            <li class="main-nav-list">
                                <a  href="{{route('product', ['id' => $category->id])}}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <form method="get" action="{{route('product', ['id' => $category->id])}}" class="col-xl-9 col-lg-8 col-md-7">
                <div class="">
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
                    <div class="mt-3 form-group col-10 d-flex">
                        <input type="text" name="search" id="search"  value="{{Request::get('search')}}" class="form-control" placeholder="Search" />
                        <button type="submit" class="btn btn-primary" style="margin-left: 16px;">Search</button>
                    </div>
            
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list" style="color: red; padding: 27px">
                        <div class="row" id="paginated-list" data-current-page="1" aria-live="polite">
                            
                        @if(count($products) == 0)
                            <tr>
                                <td colspan="7">Không có dữ liêu</td>
                            </tr>
                        @else
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
                                            <div class="prd-bottom" style="top:-67px; margin-left: 161px;">
                                                <a href="{{ route('addCart' , ['id' => $item->id] ) }}" class="social-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-suit-heart-fill text-danger" viewBox="0 0 16 16">
                                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                                    </svg>
                                                    <p class="hover-text">add cart</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif    
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
            </form>
 
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

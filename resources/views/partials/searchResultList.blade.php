<div id="searchPage" class="col d-flex flex-column">
    <header class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 border-bottom" id="searchControlsTop">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-{{$searchResults->count()}}</span> of <span id="totalResults">{{$searchResults->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <div class="d-flex flex-column justify-content-center">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                    <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link link-secondary">Next</a></li>
                </ul>
            </div>
        </nav>
        <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
            <label for="orderSelect" class="align-middle me-2">Order by </label>
            <select id="orderSelect" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 rounded-top">
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
                <option value="3">Price: Most expensive first</i></option>
                <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
            </select>
        </div>
    </header>
    <ul class="list-group list-group-flush px-md-5 px-1" id="searchItemsList">
        <?php $user = Auth::user(); ?>
        @foreach ($searchResults as $item)
            @include('partials.searchResultItemCard',array($item))
        @endforeach
    </ul>
    <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 px-2 border-top" id="searchControlsBottom">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-{{$searchResults->count()}}</span> of <span id="totalResults">{{$searchResults->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link link-secondary">Next</a></li>
            </ul>
        </nav>
    </footer>
</div>
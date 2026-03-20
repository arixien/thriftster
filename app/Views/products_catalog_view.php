<?= view('includes/header_view') ?>

<!-- Page CSS -->
<link rel="stylesheet" href="<?= base_url('css/pages/products_catalog_view.css') ?>">

<div class="container mt-5">

    <!-- CATEGORY BAR -->
    <div class="row justify-content-center mb-5">

        <div class="col-md-8">
            <div class="category-bar d-flex justify-content-between align-items-center px-4 py-2">

                <span>LOREM</span>
                <span>LOREM</span>
                <span>LOREM</span>
                <span>LOREM</span>

            </div>
        </div>

        <div class="col-md-1 text-center">
            <div class="filter-icon">
                ☰
            </div>
        </div>

    </div>


    <!-- PRODUCT GRID -->
    <div class="row g-4">

        <?php for ($i = 0; $i < 12; $i++): ?>

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="product-card">

                <div class="product-image"></div>

                <div class="d-flex justify-content-between mt-2">
                    <span class="fw-bold">LOREM IPSUM</span>
                    <span class="text-muted">₱XXX</span>
                </div>

            </div>

        </div>

        <?php endfor; ?>

    </div>


    <!-- PAGINATION -->
    <div class="row mt-5">

        <div class="col text-center">

            <nav>

                <ul class="pagination justify-content-center">

                    <li class="page-item">
                        <a class="page-link" href="#">&lt;</a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">&gt;</a>
                    </li>

                </ul>

            </nav>

        </div>

    </div>

</div>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>
    <div class="page-content">
        <div class="container">
            <div class="section px-3 px-lg-4 pt-5" id="products">
                <div class="container-narrow">
                    <div class="text-center mb-5">
                        <h2 class="marker marker-center">My "Products"</h2>
                    </div>
                    <div class="text-center">
                        <p class="mx-auto mb-3" style="max-width:600px">This is some of my "products". If you want to
                            see more of it, please feel free to go to my <a
                                href="https://github.com/TravisMai">TravisMai</a> Github page to see more.</a></p>
                    </div>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <div class="text-center">
                            <h2 class="marker marker-center" style="color: red"><b>YOU NEED TO LOGIN FIRST</b></h2><BR />
                            <h2 class="marker marker-center" style="color: red"><b>IF YOU DONT HAVE AN ACCOUNT FEEL FREE TO CREATE ONE</b></h2>
                            <br />
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0): ?>
                        <div class="text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#getProductsModal">Get
                                Products</button>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add
                                Product</button>
                            <div class="mt-3">
                                <input type="text" id="searchInput" class="form-control" name="searchInput"
                                    placeholder="Search products...">
                                <div id="searchResults" class="list-group"></div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <?php
                            $servername = DB_SERVER;
                            $username = DB_USERNAME;
                            $password = "";
                            $dbname = "onlinestore";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            $search_input = $_GET['searchInput'] ?? '';

                            if (!empty($search_input)) {
                                $search_input = '%' . $search_input . '%';
                                $products = $conn->query("SELECT * FROM products WHERE name LIKE '%$search_input%' OR type LIKE '%$search_input%' OR description LIKE '%$search_input%'");
                            } else {
                                $products = $conn->query("SELECT * FROM products");
                            }

                            while ($row = $products->fetch_assoc()):
                                ?>
                                <div class="col-md-6 mb-5" data-aos="fade-right" data-aos-delay="100">
                                    <div class="d-flex ms-md-3"><span><i class="fas fa-2x fa-quote-left"></i></span><span
                                            class="m-2"><?= $row['description'] ?><span></div>
                                    <div class="d-flex justify-content-end align-items-end">
                                        <div class="text-end me-2">
                                            <div class="fw-bolder">
                                                <?= $row['type'] ?>
                                            </div>
                                            <div class="text-small"><a href="<?= $row['link'] ?>"><?= $row['name'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('inc/footer.php') ?>
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i
                    class="fas fa-angle-up fa-x"></i></span></a></div>
    <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
    <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
    <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="./scripts/aos.min.js?ver=1.2.0"></script>
    <script src="./scripts/main.js?ver=1.2.0"></script>
    <div class="modal fade" id="getProductsModal" tabindex="-1" aria-labelledby="getProductsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="getProductsModalLabel">Products List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="productList"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./action/add_product.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="url" class="form-control" id="link" name="link" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="decimal" class="form-control" id="price" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: './action/search_product.php',
                    type: 'POST',
                    data: { query: query },
                    success: function (response) {
                        $('#searchResults').html(response);
                    }
                });
            } else {
                $('#searchResults').empty();
            }
        });
    });
    $(document).ready(function () {
        $('#getProductsModal').on('show.bs.modal', function () {
            $.ajax({
                url: 'action/get_products.php',
                type: 'GET',
                dataType: 'xml',
                success: function (data) {
                    $('#productList').empty();
                    $(data).find('product').each(function () {
                        var name = $(this).find('name').text();
                        var type = $(this).find('type').text();
                        var description = $(this).find('description').text();
                        var link = $(this).find('link').text();
                        var item = '<div class="card mb-3"><div class="card-body"><h5 class="card-title">' +
                            name + '</h5><p class="card-text">' + description + '</p><a href="' + link +
                            '" class="btn btn-primary">' + type + '</a></div></div>';
                        $('#productList').append(item);
                    });
                }
            });
        });
    });
</script>
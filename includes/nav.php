<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ecommerce Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= isset($_GET['do']) && $_GET['do'] == 'home' ? 'active' : '' ?>" aria-current="page" href="?do=home">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isset($_GET['do']) && $_GET['do'] == 'add' ? 'active' : '' ?>" href="?do=add">Add products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
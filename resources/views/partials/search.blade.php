<div class="col-lg-7 col-md-7">

    <div class="advanced-search">
        <button type="button" class="category-btn">Catégories</button>
        <form class="custom-search-form" action="{{ route('products.recherche') }}">
            <div class="input-group">
                <input type="text" name="q" placeholder="Que cherchez vous ? ">
                <button type="submit" class="custom-search-btn"><i class="ti-search"></i></button>
            </div>
        </form>
    </div>

</div>

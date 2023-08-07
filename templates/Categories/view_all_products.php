<!-- src/Template/Categories/view_all_products.ctp -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    div.scroll-container {
        background-color: #333;
        overflow: auto;
        white-space: nowrap;
        padding: 10px;
    }

    div.scroll-container img {
        padding: 10px;
    }

    div.scroll-container::-webkit-scrollbar {
        display: none;
    }

    #heading {
        margin-top: 20px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-weight: normal;
    }

    .Oproducts {
        margin: 20px;
        text-align: center;
        justify-content: center;
        scroll-behavior: smooth;
        display: inline-block;
    }

    .Oproducts img {
        border: 1px solid transparent;
        border-radius: 20px;
        width: 200px;
        height: 200px;
        display: block;
        padding: 10px;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    .Oproducts::after {
        content: "";
        clear: both;
        display: table;
    }

    #details {
        border-top: 2px dashed lightgray;
        margin-top: 10px;
        margin-bottom: 20px;
        font-family: 'Times New Roman', Times, serif;
        color: black;
        width: 200px;
        text-align: left;
        display: block;
    }

    #click {
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 20px;
        color: blue;
        font-family: 'Times New Roman', Times, serif;
        margin-top: 5px;
    }

    #click:hover {
        border: 1px solid blue;
        background-color: blue;
        color: white;
    }
</style>

<center>
    <h2 id="heading">New Arrivals</h2>
</center>
<div class="scroll-container">
    <?php foreach ($products as $product): ?>
        <div id="new_arrivals">
            <a href="<?= $product->product_url ?>" target="_blank">
                <?= $this->Html->image($product->product_img, ['alt' => 'No Image']) ?>
            </a>
            <div class="details">
                <p>
                    <?= $product->launched_on ?>
                </p>
                <p>Price: &#8377;
                    <?= $product->price ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<br>
<center>
    <h2 id="heading">Other Products</h2>
</center>
<div class="Oproducts">
    <?php foreach ($otherProducts as $otherProduct): ?>
        <div class="column">
            <?= $this->Html->image($otherProduct->img, ['alt' => 'No Image']) ?>
            <div id="details">
                <p>
                    <?= $otherProduct->product_info ?>
                </p>
                <p>Price: &#8377;
                    <?= $otherProduct->product_price ?>
                </p>
                <a
                    href="<?= $this->Url->build(['controller' => 'OtherProducts', 'action' => 'view', $otherProduct->id]) ?>">
                    <p id="click">View Multiple Prices</p>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?= $this->Html->css('style.css'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Initialize Slick Carousel on the slideshow container
    $(document).ready(function () {
        $('.slideshow').slick({
            autoplay: true,
            autoplaySpeed: 3000, // Set the duration between slide transitions (in milliseconds)
            dots: true, // Display navigation dots
            // Add more Slick Carousel options as needed
        });
    });
</script>
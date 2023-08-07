<!-- view_stores.ctp -->

<div class="container">
    <div id="product-details">
        <center>
            <h1>Online Price Comparison</h1>
        </center>
        <p>
            <?= $this->Html->image($otherProduct->img, ['alt' => 'No Image']) ?>
        </p>
        <p id="info">
            <?= h($otherProduct->product_info) ?>
        </p>
    </div>
    <!-- Add other fields from the other_products table as needed -->

    <div id="table">
        <center>
            <h2 id="heading">Multi-Store Prices</h2>
        </center>
        <table>
            <tr>
                <th>Store Logo</th>
                <th>Store Price</th>
                <th>Store URL</th>
            </tr>
            <?php foreach ($otherProduct->stores as $store): ?>
                <tr>
                    <td>
                        <?= $this->Html->image($store->store_logo, ['alt' => 'No image']) ?>
                    </td>
                    <td>
                        <?php if (!empty($store->store_price)): ?>
                            <?= $store->store_price ?>
                        <?php else: ?>
                            <p>Grab To View Price</p>
                        <?php endif; ?>
                    </td>
                    <td id=>
                        <p id="grab">
                            <?= $this->Html->link('Grab Deal Now', $store->store_url, ['target' => '_blank']) ?>
                        </p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<style>
    .container {
        display: flex;
    }

    #product-details {
        margin: 20px;
        text-align: center;
        justify-content: center;
        display: inline-block;
        flex: 1;
        padding: 10px;
    }

    #product-details img {
        border: 1px solid transparent;
        border-radius: 20px;
        width: 300px;
        height: 300px;
        display: block;
        padding: 10px;
    }

    #product-details p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-family: 'Times New Roman', Times, serif;
        color: black;
        width: 300px;
        text-align: left;
        display: block;
    }

    #info {
        border-top: 2px dashed lightgray;
    }

    #table {
        flex: 1;
        padding: 10px;
        margin-top: 180px;
        border: 2px solid lightgray;
    }

    #heading {
        border-bottom: 2px solid lightgray;
    }

    #grab {
        text-align: center;
        border: 1px solid yellow;
        background-color: yellow;
        border-radius: 20px;
        color: black;
        font-family: 'Times New Roman', Times, serif;
        margin-top: 5px;
    }

    #grab:hover {
        border: 1px solid lightgreen;
        background-color: lightgreen;
    }
</style>
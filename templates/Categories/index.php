<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<div id="main">
    <table>
        <tr>
            <th id=heading>
                <h2>New Launches :)</h2>
            </th>
        </tr>
        <tr>
            <td>
                <div class="category-container">
                    <?php if (!empty($categories)): ?>
                        <div class="category-item">
                            <?php foreach ($categories as $category): ?>
                                <div id="item">
                                    <?php if (isset($category->category_img) && !empty($category->category_img)): ?>
                                        <span class="<?= h($category->category_img); ?> icon"
                                            onclick="showProductDetails(<?= $category->category_id; ?>,'<?= $category->category_name; ?>','<?= h($category->category_img); ?>');"></span>
                                    <?php else: ?>
                                        <span class="icon" onclick="showProductDetails(<?= $category->category_id; ?>,'Launches')">
                                            <?= h($category->category_name); ?>
                                        </span>
                                    <?php endif; ?>
                                    <p>
                                        <?= h($category->category_name); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No categories found.</p>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>
    <div id="product_details"></div>
</div>


<?= $this->Html->css('style.css'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add this script in your HTML or in a separate .js file -->
<script>
    function showProductDetails(categoryId, categoryName, categoryImg) {
        // Make an AJAX request to fetch product details for the selected category
        // You can use any JavaScript library like jQuery or fetch API for AJAX
        // I'll demonstrate using fetch API here:
        var baseUrl = '<?= $this->Url->build('/') ?>';
        fetch('<?= $this->Url->build(['controller' => 'Categories', 'action' => 'product']) ?>/' + categoryId, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                // Build the HTML to display product details
                let html = '<div class="product-container"><h3 class="product_heading">--------------------------------New ' + '<span class="' + categoryImg + '"> </span>' + categoryName + '-----------------------------</h3>';

                console.log("Product Image Paths:", <?= json_encode($categories) ?>);

                if (data.products.length > 0) {
                    data.products.forEach(product => {
                        html += '<div class="product-item">';
                        console.log("Product Image Path:", product.product_img);
                        // Create an anchor element around the image with the desired URL
                        html += '<a href="' + product.product_url + '" target="_blank">';
                        html += '<img src="<?= $this->Url->image('/') ?>img/' + product.product_img + '" alt="' + product.product_description + '">';
                        html += '</a>';
                        html += '<div class="details">'
                        html += '<p>Launched Date: ' + product.launched_on + '</p>';
                        html += '<p>Todays Price: &#8377; ' + product.price + '</p>';
                        html += '</div>'
                        html += '</div>';
                    });
                } else {
                    html += '<p>No products found for this category.</p>';
                }
                if (categoryId != 1) {
                    html += '<div id="view">';
                    const viewAllUrl = baseUrl + 'categories/view_all_products/' + categoryId;
                    html += '<a href="' + viewAllUrl + '">View All ' + categoryName + '</a>';
                    html += '</div>';
                }
                html += '</div >';


                // Update the product_details div with the generated HTML
                document.getElementById('product_details').innerHTML = html;
            })
            .catch(error => {

                document.getElementById('product_details').innerHTML = '<p>Error fetching product details.</p>';
            });
    }




</script>